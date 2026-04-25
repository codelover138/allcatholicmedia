@extends('plugins/member::themes.dashboard.layouts.master')

@push('header')
<style>
    .success-wrap {
        max-width: 600px;
        margin: 0 auto;
    }
    .success-hero {
        background: linear-gradient(135deg, #0a417a 0%, #0d1f3c 100%);
        border-radius: 16px 16px 0 0;
        padding: 48px 40px 36px;
        text-align: center;
        position: relative;
        overflow: hidden;
    }
    .success-hero::before {
        content: '';
        position: absolute;
        top: -40px; right: -40px;
        width: 200px; height: 200px;
        border-radius: 50%;
        background: radial-gradient(ellipse, rgba(201,162,39,.20) 0%, transparent 70%);
        pointer-events: none;
    }
    .success-icon-wrap {
        width: 80px; height: 80px;
        border-radius: 50%;
        background: rgba(201,162,39,.15);
        border: 2px solid rgba(201,162,39,.4);
        display: flex; align-items: center; justify-content: center;
        margin: 0 auto 18px;
    }
    .success-hero h3 { color: #fff; font-weight: 800; font-size: 1.7rem; margin-bottom: 6px; }
    .success-hero p  { color: rgba(255,255,255,.72); font-size: .95rem; margin: 0; }
    .success-body {
        background: #fff;
        border: 1px solid #e8eaf0;
        border-top: none;
        border-radius: 0 0 16px 16px;
        padding: 36px 40px;
        box-shadow: 0 8px 32px rgba(10,65,122,.08);
    }
    .receipt-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px 0;
        border-bottom: 1px solid #f1f3f7;
        font-size: .9rem;
    }
    .receipt-row:last-child { border-bottom: none; }
    .receipt-row .label { color: #868e96; }
    .receipt-row .value { font-weight: 600; color: #1a2b45; text-align: right; max-width: 60%; word-break: break-all; }
    .amount-badge {
        background: linear-gradient(135deg, #0a417a, #0d1f3c);
        color: #c9a227;
        font-size: 1.6rem;
        font-weight: 800;
        text-align: center;
        border-radius: 10px;
        padding: 18px;
        margin-bottom: 24px;
    }
    .scripture-quote {
        border-left: 4px solid #c9a227;
        padding: 12px 16px;
        background: #f8f9fc;
        border-radius: 0 8px 8px 0;
        margin-top: 20px;
        font-size: .85rem;
        color: #555;
        font-style: italic;
    }
    .action-btn-primary {
        background: linear-gradient(135deg, #0a417a, #0d1f3c);
        color: #c9a227;
        font-weight: 700;
        border: none;
        border-radius: 10px;
        padding: 12px 24px;
        text-decoration: none;
        display: inline-block;
        transition: opacity .2s;
    }
    .action-btn-primary:hover { opacity: .88; color: #c9a227; }
    .action-btn-outline {
        border: 2px solid #dee2e6;
        color: #495057;
        font-weight: 600;
        border-radius: 10px;
        padding: 10px 20px;
        text-decoration: none;
        display: inline-block;
        font-size: .9rem;
        transition: border-color .2s;
    }
    .action-btn-outline:hover { border-color: #0a417a; color: #0a417a; }
</style>
@endpush

@section('content')
    <div class="success-wrap">

        <div class="success-hero">
            <div class="success-icon-wrap">
                <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="#c9a227" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/>
                    <polyline points="22 4 12 14.01 9 11.01"/>
                </svg>
            </div>
            <h3>Thank You! 🙏</h3>
            <p>Your generous gift has been received. May God bless you abundantly.</p>
        </div>

        <div class="success-body">

            <div class="amount-badge">
                {{ $donation->formatted_amount }}
                <div style="font-size:.8rem; font-weight:500; color:rgba(201,162,39,.7); margin-top:2px;">Donation Confirmed</div>
            </div>

            <div class="mb-4">
                <div class="receipt-row">
                    <span class="label">Date</span>
                    <span class="value">{{ $donation->created_at->format('F j, Y · g:i A') }}</span>
                </div>
                <div class="receipt-row">
                    <span class="label">Donor</span>
                    <span class="value">{{ $donation->getAttribute('donor_name') }}</span>
                </div>
                <div class="receipt-row">
                    <span class="label">Email</span>
                    <span class="value">{{ $donation->getAttribute('donor_email') }}</span>
                </div>
                @if ($donation->getAttribute('paypal_capture_id'))
                    <div class="receipt-row">
                        <span class="label">Transaction ID</span>
                        <span class="value" style="font-family:monospace; font-size:.78rem">{{ $donation->getAttribute('paypal_capture_id') }}</span>
                    </div>
                @endif
                <div class="receipt-row">
                    <span class="label">Status</span>
                    <span class="value">
                        <span style="background:#e9f7ef; color:#1a7a44; font-size:.75rem; font-weight:700; padding:3px 12px; border-radius:20px;">✓ Completed</span>
                    </span>
                </div>
            </div>

            @if ($donation->getAttribute('message'))
                <div style="background:#f8f9fc; border:1px solid #e8eaf0; border-radius:10px; padding:14px 18px; margin-bottom:20px;">
                    <div style="font-size:.72rem; font-weight:700; color:#c9a227; letter-spacing:1px; text-transform:uppercase; margin-bottom:6px;">Your Message</div>
                    <p class="mb-0 fst-italic" style="color:#555; font-size:.9rem">"{{ $donation->getAttribute('message') }}"</p>
                </div>
            @endif

            <div class="scripture-quote">
                "Well done, good and faithful servant!" — Matthew 25:21
            </div>

            <p style="font-size:.82rem; color:#868e96; text-align:center; margin-top:20px; margin-bottom:24px;">
                A confirmation email has been sent to <strong>{{ $donation->getAttribute('donor_email') }}</strong>.
            </p>

            <div class="d-flex flex-wrap gap-3 justify-content-center">
                <a href="{{ route('donation.index') }}" class="action-btn-primary">Give Again</a>
                <a href="{{ route('donation.history') }}" class="action-btn-outline">Donation History</a>
                <a href="{{ route('public.member.dashboard') }}" class="action-btn-outline">Dashboard</a>
            </div>

        </div>
    </div>
@endsection
