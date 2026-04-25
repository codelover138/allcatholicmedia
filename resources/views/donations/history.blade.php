@extends('plugins/member::themes.dashboard.layouts.master')

@push('header')
<style>
    .history-header-card {
        background: linear-gradient(135deg, #0a417a 0%, #0d1f3c 100%);
        border-radius: 14px;
        padding: 28px 32px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 16px;
        margin-bottom: 24px;
        position: relative;
        overflow: hidden;
    }
    .history-header-card::before {
        content: '';
        position: absolute;
        top: -30px; right: -30px;
        width: 160px; height: 160px;
        border-radius: 50%;
        background: rgba(201,162,39,.14);
        pointer-events: none;
    }
    .history-header-card h5 { color: #fff; font-weight: 700; margin: 0; font-size: 1.15rem; }
    .history-header-card p  { color: rgba(255,255,255,.65); margin: 4px 0 0; font-size: .85rem; }
    .give-again-btn {
        background: #c9a227;
        color: #0a417a;
        font-weight: 700;
        border: none;
        border-radius: 8px;
        padding: 10px 22px;
        text-decoration: none;
        font-size: .9rem;
        white-space: nowrap;
        transition: opacity .2s;
    }
    .give-again-btn:hover { opacity: .88; color: #0a417a; }

    .history-table-card {
        background: #fff;
        border: 1px solid #e8eaf0;
        border-radius: 14px;
        overflow: hidden;
        box-shadow: 0 4px 20px rgba(10,65,122,.06);
    }
    .history-table-card table thead th {
        background: #f8f9fc;
        color: #868e96;
        font-size: .75rem;
        font-weight: 700;
        letter-spacing: .8px;
        text-transform: uppercase;
        border-bottom: 1px solid #e8eaf0;
        padding: 14px 20px;
        white-space: nowrap;
    }
    .history-table-card table tbody td {
        padding: 14px 20px;
        vertical-align: middle;
        border-bottom: 1px solid #f1f3f7;
        font-size: .9rem;
    }
    .history-table-card table tbody tr:last-child td { border-bottom: none; }
    .history-table-card table tbody tr:hover td { background: #f8f9fc; }
    .amount-cell { font-weight: 700; color: #0a417a; font-size: 1.05rem; }
    .txn-code { font-family: monospace; font-size: .75rem; color: #868e96; max-width: 160px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; }
    .status-pill { background: #e9f7ef; color: #1a7a44; font-size: .72rem; font-weight: 700; padding: 4px 12px; border-radius: 20px; white-space: nowrap; }
    .empty-state { text-align: center; padding: 64px 24px; }
    .empty-icon { color: #d0d7e3; margin-bottom: 16px; }
    .empty-state h5 { color: #1a2b45; font-weight: 700; margin-bottom: 6px; }
    .empty-state p { color: #868e96; margin-bottom: 24px; }
    .empty-donate-btn {
        background: linear-gradient(135deg, #0a417a, #0d1f3c);
        color: #c9a227;
        font-weight: 700;
        border: none;
        border-radius: 10px;
        padding: 12px 28px;
        text-decoration: none;
        display: inline-block;
    }
    .empty-donate-btn:hover { opacity: .88; color: #c9a227; }
</style>
@endpush

@section('content')

    {{-- Page header --}}
    <div class="history-header-card">
        <div>
            <h5>Donation History</h5>
            <p>A record of every gift you've given — thank you for your generosity.</p>
        </div>
        <a href="{{ route('donation.index') }}" class="give-again-btn">+ Give Again</a>
    </div>

    @if ($donations->isEmpty())
        <div class="history-table-card">
            <div class="empty-state">
                <div class="empty-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="56" height="56" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/>
                    </svg>
                </div>
                <h5>No donations yet</h5>
                <p>Your completed gifts will appear here after each donation.</p>
                <a href="{{ route('donation.index') }}" class="empty-donate-btn">Make Your First Gift</a>
            </div>
        </div>
    @else
        <div class="history-table-card">
            <div class="table-responsive">
                <table class="table mb-0">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Amount</th>
                            <th class="d-none d-md-table-cell">Transaction ID</th>
                            <th class="d-none d-lg-table-cell">Message</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($donations as $donation)
                            <tr>
                                <td>
                                    <div style="font-weight:600; color:#1a2b45">{{ $donation->created_at->format('M d, Y') }}</div>
                                    <div style="font-size:.78rem; color:#868e96">{{ $donation->created_at->format('g:i A') }}</div>
                                </td>
                                <td>
                                    <span class="amount-cell">{{ $donation->formatted_amount }}</span>
                                </td>
                                <td class="d-none d-md-table-cell">
                                    <span class="txn-code">{{ $donation->getAttribute('paypal_capture_id') ?? '—' }}</span>
                                </td>
                                <td class="d-none d-lg-table-cell">
                                    @if ($donation->getAttribute('message'))
                                        <span
                                            class="d-inline-block text-truncate"
                                            style="max-width:200px; color:#555; font-size:.88rem"
                                            title="{{ $donation->getAttribute('message') }}"
                                        >{{ $donation->getAttribute('message') }}</span>
                                    @else
                                        <span style="color:#ccc">—</span>
                                    @endif
                                </td>
                                <td><span class="status-pill">✓ Completed</span></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            @if ($donations->hasPages())
                <div style="padding: 16px 20px; border-top: 1px solid #e8eaf0; background: #f8f9fc;">
                    {{ $donations->links() }}
                </div>
            @endif
        </div>
    @endif

@endsection
