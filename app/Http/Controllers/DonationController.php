<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use Botble\SeoHelper\Facades\SeoHelper;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use Throwable;

class DonationController extends Controller
{
    private const PRESET_AMOUNTS = [5, 10, 25, 50, 100];
    private const MIN_AMOUNT = 1;
    private const MAX_AMOUNT = 10000;

    public function index(): View
    {
        SeoHelper::setTitle('Donate');

        $member = Auth::guard('member')->user();

        $recentDonations = Donation::where('member_id', $member->getKey())
            ->where('status', 'completed')
            ->latest()
            ->take(5)
            ->get();

        return view('donations.form', [
            'member' => $member,
            'presetAmounts' => self::PRESET_AMOUNTS,
            'recentDonations' => $recentDonations,
        ]);
    }

    public function initiate(Request $request): RedirectResponse
    {
        $request->validate([
            'amount' => ['required', 'numeric', 'min:' . self::MIN_AMOUNT, 'max:' . self::MAX_AMOUNT],
            'message' => ['nullable', 'string', 'max:500'],
        ]);

        $member = Auth::guard('member')->user();
        $amount = number_format((float) $request->input('amount'), 2, '.', '');

        $donation = Donation::create([
            'member_id' => $member->getKey(),
            'amount' => $amount,
            'currency' => 'USD',
            'status' => 'pending',
            'donor_name' => $member->getAttribute('name'),
            'donor_email' => $member->getAttribute('email'),
            'message' => $request->input('message'),
        ]);

        try {
            $provider = $this->makePayPalClient();

            $order = $provider->createOrder([
                'intent' => 'CAPTURE',
                'application_context' => [
                    'brand_name' => config('app.name'),
                    'locale' => 'en-US',
                    'landing_page' => 'BILLING',
                    'user_action' => 'PAY_NOW',
                    'return_url' => route('donation.return', ['donation' => $donation->getKey()]),
                    'cancel_url' => route('donation.cancel', ['donation' => $donation->getKey()]),
                ],
                'purchase_units' => [
                    [
                        'reference_id' => (string) $donation->getKey(),
                        'description' => 'Donation to ' . config('app.name'),
                        'amount' => [
                            'currency_code' => 'USD',
                            'value' => $amount,
                        ],
                    ],
                ],
            ]);

            if (isset($order['id']) && $order['status'] === 'CREATED') {
                $donation->update(['paypal_order_id' => $order['id']]);

                $approvalUrl = collect($order['links'])
                    ->firstWhere('rel', 'approve')['href'] ?? null;

                if ($approvalUrl) {
                    return redirect()->away($approvalUrl);
                }
            }

            $donation->update(['status' => 'failed']);

            return back()->withErrors(['paypal' => 'Unable to connect to PayPal. Please try again.']);
        } catch (Throwable $e) {
            $donation->update(['status' => 'failed']);
            report($e);

            return back()->withErrors(['paypal' => 'PayPal is currently unavailable. Please try again later.']);
        }
    }

    public function return(Request $request, Donation $donation): View|RedirectResponse
    {
        if ($donation->getAttribute('member_id') !== Auth::guard('member')->id()) {
            abort(403);
        }

        if ($donation->getAttribute('status') === 'completed') {
            return view('donations.success', compact('donation'));
        }

        if ($donation->getAttribute('status') !== 'pending') {
            return redirect()->route('donation.index')->withErrors(['paypal' => 'This donation is no longer valid.']);
        }

        $token = $request->query('token');

        if (! $token) {
            $donation->update(['status' => 'failed']);

            return redirect()->route('donation.index')->withErrors(['paypal' => 'Invalid PayPal response.']);
        }

        try {
            $provider = $this->makePayPalClient();
            $capturedOrder = $provider->capturePaymentOrder($token);

            if (
                isset($capturedOrder['status']) &&
                $capturedOrder['status'] === 'COMPLETED'
            ) {
                $capture = $capturedOrder['purchase_units'][0]['payments']['captures'][0] ?? [];

                $donation->update([
                    'status' => 'completed',
                    'paypal_capture_id' => $capture['id'] ?? null,
                    'paypal_payer_id' => $capturedOrder['payer']['payer_id'] ?? null,
                ]);

                return view('donations.success', compact('donation'));
            }

            $donation->update(['status' => 'failed']);

            return redirect()->route('donation.index')->withErrors(['paypal' => 'Payment could not be completed. Please try again.']);
        } catch (Throwable $e) {
            $donation->update(['status' => 'failed']);
            report($e);

            return redirect()->route('donation.index')->withErrors(['paypal' => 'A payment error occurred. Contact support if your account was charged.']);
        }
    }

    public function cancel(Donation $donation): RedirectResponse
    {
        if ($donation->getAttribute('member_id') !== Auth::guard('member')->id()) {
            abort(403);
        }

        if ($donation->getAttribute('status') === 'pending') {
            $donation->update(['status' => 'cancelled']);
        }

        return redirect()->route('donation.index')->with('info', 'Your donation was cancelled. You were not charged.');
    }

    public function history(): View
    {
        SeoHelper::setTitle('Donation History');

        $member = Auth::guard('member')->user();

        $donations = Donation::where('member_id', $member->getKey())
            ->where('status', 'completed')
            ->latest()
            ->paginate(10);

        return view('donations.history', compact('donations', 'member'));
    }

    private function makePayPalClient(): PayPalClient
    {
        $provider = new PayPalClient();
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();

        return $provider;
    }
}
