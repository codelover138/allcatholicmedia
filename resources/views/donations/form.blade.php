@extends('plugins/member::themes.dashboard.layouts.master')

@push('header')
<style>
    /* ── Donation page overrides ── */
    .donation-hero {
        background: linear-gradient(135deg, #0a417a 0%, #0d1f3c 60%, #050c18 100%);
        border-radius: 16px;
        padding: 40px 36px;
        margin-bottom: 28px;
        position: relative;
        overflow: hidden;
    }
    .donation-hero::before {
        content: '';
        position: absolute;
        top: -40px; right: -40px;
        width: 240px; height: 240px;
        border-radius: 50%;
        background: radial-gradient(ellipse, rgba(201,162,39,.22) 0%, transparent 70%);
        pointer-events: none;
    }
    .donation-hero::after {
        content: '';
        position: absolute;
        bottom: -60px; left: 20%;
        width: 320px; height: 120px;
        background: linear-gradient(90deg, transparent 5%, rgba(201,162,39,.18) 50%, transparent 95%);
        pointer-events: none;
    }
    .donation-hero h2 {
        color: #fff;
        font-size: 1.75rem;
        font-weight: 700;
        margin-bottom: 6px;
    }
    .donation-hero p {
        color: rgba(255,255,255,.72);
        margin-bottom: 0;
        font-size: 0.95rem;
    }
    .donation-hero .gold-line {
        width: 48px;
        height: 3px;
        background: #c9a227;
        border-radius: 2px;
        margin: 12px 0 16px;
    }

    /* Amount preset buttons */
    .amount-grid { display: flex; flex-wrap: wrap; gap: 10px; margin-bottom: 14px; }
    .preset-btn {
        border: 2px solid #dee2e6;
        background: #fff;
        color: #0a417a;
        font-weight: 600;
        font-size: 1rem;
        border-radius: 10px;
        padding: 10px 18px;
        cursor: pointer;
        transition: all .2s ease;
        min-width: 72px;
    }
    .preset-btn:hover {
        border-color: #0a417a;
        background: #f0f4f9;
    }
    .preset-btn.active {
        border-color: #c9a227;
        background: #0a417a;
        color: #c9a227;
        box-shadow: 0 2px 12px rgba(10,65,122,.25);
    }

    /* Custom amount input */
    .amount-input-wrap .input-group-text {
        background: #0a417a;
        color: #c9a227;
        border-color: #0a417a;
        font-weight: 700;
        font-size: 1.1rem;
    }
    .amount-input-wrap .form-control {
        border-left: none;
        font-size: 1.15rem;
        font-weight: 600;
        border-color: #dee2e6;
    }
    .amount-input-wrap .form-control:focus {
        border-color: #0a417a;
        box-shadow: 0 0 0 0.2rem rgba(10,65,122,.12);
    }

    /* PayPal button */
    .paypal-btn {
        background: linear-gradient(135deg, #0070ba 0%, #003087 100%);
        border: none;
        color: #fff;
        font-weight: 700;
        font-size: 1.05rem;
        border-radius: 10px;
        padding: 14px 24px;
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        transition: opacity .2s ease, transform .15s ease;
        cursor: pointer;
    }
    .paypal-btn:hover { opacity: .92; transform: translateY(-1px); }
    .paypal-btn:active { transform: translateY(0); }
    .paypal-btn .pp-wordmark { font-size: 1.2rem; font-style: italic; letter-spacing: -.5px; }
    .paypal-btn .pp-wordmark span { color: #009cde; }
    .paypal-btn .pp-wordmark em { color: #012169; font-style: normal; }

    /* Mission card */
    .mission-card {
        background: linear-gradient(135deg, #0a417a 0%, #0d1f3c 100%);
        border-radius: 14px;
        padding: 28px;
        color: #fff;
        position: relative;
        overflow: hidden;
    }
    .mission-card::before {
        content: '';
        position: absolute;
        top: -30px; right: -30px;
        width: 160px; height: 160px;
        border-radius: 50%;
        background: rgba(201,162,39,.15);
        pointer-events: none;
    }
    .mission-card h6 {
        color: #c9a227;
        font-weight: 700;
        font-size: .8rem;
        letter-spacing: 1.5px;
        text-transform: uppercase;
        margin-bottom: 12px;
    }
    .mission-card ul li {
        display: flex;
        align-items: flex-start;
        gap: 10px;
        margin-bottom: 10px;
        font-size: .92rem;
        color: rgba(255,255,255,.85);
    }
    .mission-card ul li .icon { color: #c9a227; font-size: 1rem; flex-shrink: 0; margin-top: 1px; }

    /* Recent donations */
    .recent-card { border-radius: 14px; border: 1px solid #e8eaf0; background: #fff; overflow: hidden; }
    .recent-card .rc-header {
        background: #f8f9fc;
        border-bottom: 1px solid #e8eaf0;
        padding: 14px 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .recent-card .rc-header h6 { margin: 0; font-weight: 700; color: #0a417a; font-size: .88rem; }
    .recent-card .rc-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 12px 20px;
        border-bottom: 1px solid #f1f3f7;
        transition: background .15s;
    }
    .recent-card .rc-row:last-of-type { border-bottom: none; }
    .recent-card .rc-row:hover { background: #f8f9fc; }
    .rc-amount { font-weight: 700; color: #0a417a; font-size: 1rem; }
    .rc-date { font-size: .78rem; color: #868e96; }
    .rc-badge { background: #e9f7ef; color: #1a7a44; font-size: .72rem; font-weight: 600; padding: 3px 10px; border-radius: 20px; }

    /* Secure note */
    .secure-note { color: #868e96; font-size: .78rem; display: flex; align-items: center; justify-content: center; gap: 5px; margin-top: 14px; }

    /* Form card */
    .form-card {
        background: #fff;
        border-radius: 16px;
        border: 1px solid #e8eaf0;
        box-shadow: 0 4px 24px rgba(10,65,122,.07);
        padding: 32px;
    }
    .form-label { font-weight: 600; color: #1a2b45; font-size: .88rem; margin-bottom: 6px; }
    .section-label {
        font-size: .72rem;
        font-weight: 700;
        letter-spacing: 1.2px;
        text-transform: uppercase;
        color: #868e96;
        margin-bottom: 10px;
    }
    .donor-info-field {
        background: #f8f9fc;
        border: 1px solid #e8eaf0;
        border-radius: 8px;
        padding: 10px 14px;
        font-size: .9rem;
        color: #495057;
        width: 100%;
    }
</style>
@endpush

@section('content')

    {{-- Hero banner --}}
    <div class="donation-hero">
        <div class="d-flex align-items-center gap-3">
            <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="#c9a227" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg>
            <div>
                <h2 class="mb-0">Support Our Mission</h2>
                <div class="gold-line"></div>
                <p>Your generosity keeps Catholic media alive and free for the faithful worldwide.</p>
            </div>
        </div>
    </div>

    {{-- Alerts --}}
    @if (session('info'))
        <div class="alert alert-info alert-dismissible fade show mb-4 rounded-3" role="alert">
            {{ session('info') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif
    @if ($errors->has('paypal'))
        <div class="alert alert-danger alert-dismissible fade show mb-4 rounded-3" role="alert">
            <strong>Payment Error:</strong> {{ $errors->first('paypal') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="row g-4 align-items-start">

        {{-- ── Donation form ── --}}
        <div class="col-lg-7">
            <div class="form-card">

                {{-- Amount selection --}}
                <div class="mb-4">
                    <div class="section-label">Step 1 — Choose Your Gift Amount</div>
                    <div class="amount-grid">
                        @foreach ($presetAmounts as $preset)
                            <button type="button" class="preset-btn" data-amount="{{ $preset }}">${{ $preset }}</button>
                        @endforeach
                        <button type="button" class="preset-btn" data-custom="true">Custom</button>
                    </div>
                    <div class="amount-input-wrap">
                        <div class="input-group">
                            <span class="input-group-text">$</span>
                            <input
                                type="number"
                                name="amount"
                                id="donation-amount"
                                class="form-control @error('amount') is-invalid @enderror"
                                placeholder="Enter amount"
                                min="1" max="10000" step="0.01"
                                value="{{ old('amount') }}"
                                required
                            >
                            @error('amount')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-text mt-1" style="color:#868e96">Minimum $1 · Maximum $10,000 · Secured by PayPal</div>
                    </div>
                </div>

                <hr style="border-color:#f0f0f5; margin: 20px 0;">

                <form action="{{ route('donation.initiate') }}" method="POST" id="donation-form">
                    @csrf
                    <input type="hidden" name="amount" id="hidden-amount" value="{{ old('amount') }}">

                    {{-- Message --}}
                    <div class="mb-4">
                        <div class="section-label">Step 2 — Add a Message <span style="font-weight:400;text-transform:none;letter-spacing:0">(optional)</span></div>
                        <textarea
                            name="message"
                            id="message"
                            class="form-control @error('message') is-invalid @enderror"
                            rows="3"
                            placeholder="Share an intention, a prayer request, or simply say why you give…"
                            maxlength="500"
                            style="border-radius:10px; border-color:#dee2e6; resize:none;"
                        >{{ old('message') }}</textarea>
                        @error('message')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="form-text mt-1" style="color:#868e96"><span id="char-count">0</span>/500</div>
                    </div>

                    {{-- Donor info --}}
                    <div class="mb-4">
                        <div class="section-label">Step 3 — Donor Details</div>
                        <div class="row g-3">
                            <div class="col-sm-6">
                                <label class="form-label">Name</label>
                                <div class="donor-info-field">{{ $member->getAttribute('name') }}</div>
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label">Email</label>
                                <div class="donor-info-field" style="overflow:hidden;text-overflow:ellipsis;white-space:nowrap">{{ $member->getAttribute('email') }}</div>
                            </div>
                        </div>
                        <p class="form-text mt-2" style="color:#868e96">Using your member account details. <a href="{{ route('public.member.settings') }}" class="text-primary">Edit profile →</a></p>
                    </div>

                    {{-- PayPal submit --}}
                    <button type="submit" class="paypal-btn" id="paypal-submit-btn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="white"><path d="M7.076 21.337H2.47a.641.641 0 0 1-.633-.74L4.944 2.79A.859.859 0 0 1 5.79 2h7.078c2.468 0 4.177.577 5.076 1.714.417.527.68 1.09.803 1.718.13.666.098 1.46-.094 2.373l-.007.043v.557l.393.221c.327.177.62.403.872.673.46.493.757 1.13.887 1.893.137.81.095 1.782-.13 2.888-.262 1.278-.692 2.39-1.279 3.306a6.436 6.436 0 0 1-2.024 1.99c-.773.492-1.688.864-2.724 1.101-.994.226-2.127.34-3.37.34H9.899a.857.857 0 0 0-.847.722L7.076 21.337z"/></svg>
                        <span>Donate with <span class="pp-wordmark"><span>Pay</span><em>Pal</em></span></span>
                    </button>

                    <div class="secure-note">
                        <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                        256-bit SSL encryption · You will be redirected to PayPal to complete payment
                    </div>

                </form>
            </div>
        </div>

        {{-- ── Sidebar ── --}}
        <div class="col-lg-5 d-flex flex-column gap-4">

            {{-- Mission --}}
            <div class="mission-card">
                <h6>Why Your Gift Matters</h6>
                <ul class="list-unstyled mb-0">
                    <li><span class="icon">✝</span> Expanding live Catholic Mass &amp; worship streams</li>
                    <li><span class="icon">🎙️</span> Funding our podcast and audio ministry</li>
                    <li><span class="icon">🌍</span> Reaching Catholics in every corner of the world</li>
                    <li><span class="icon">📖</span> Producing catechesis and formation content</li>
                    <li><span class="icon">🙏</span> Keeping the platform free and accessible for all</li>
                </ul>
            </div>

            {{-- Scripture --}}
            <div style="border-left: 4px solid #c9a227; padding: 14px 18px; background:#fff; border-radius:0 10px 10px 0; border-top:1px solid #e8eaf0; border-right:1px solid #e8eaf0; border-bottom:1px solid #e8eaf0;">
                <p class="mb-1 fst-italic" style="color:#444; font-size:.92rem; line-height:1.6">"Each of you should give what you have decided in your heart to give, not reluctantly or under compulsion, for God loves a cheerful giver."</p>
                <small style="color:#c9a227; font-weight:600">— 2 Corinthians 9:7</small>
            </div>

            {{-- Recent donations --}}
            @if ($recentDonations->isNotEmpty())
                <div class="recent-card">
                    <div class="rc-header">
                        <h6>Your Recent Gifts</h6>
                        <a href="{{ route('donation.history') }}" style="font-size:.78rem; color:#0a417a; font-weight:600;">View all →</a>
                    </div>
                    @foreach ($recentDonations as $d)
                        <div class="rc-row">
                            <div>
                                <div class="rc-amount">{{ $d->formatted_amount }}</div>
                                <div class="rc-date">{{ $d->created_at->format('M d, Y') }}</div>
                            </div>
                            <div class="rc-badge">Completed</div>
                        </div>
                    @endforeach
                </div>
            @endif

        </div>
    </div>
@endsection

@push('scripts')
<script>
(function () {
    const visibleInput = document.getElementById('donation-amount');
    const hiddenInput  = document.getElementById('hidden-amount');
    const presetBtns   = document.querySelectorAll('.preset-btn');
    const messageArea  = document.getElementById('message');
    const charCount    = document.getElementById('char-count');
    const submitBtn    = document.getElementById('paypal-submit-btn');

    function setActive(amount) {
        presetBtns.forEach(b => b.classList.remove('active'));
        presetBtns.forEach(b => {
            if (b.dataset.amount === String(amount)) b.classList.add('active');
        });
    }

    presetBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            if (btn.dataset.custom) {
                visibleInput.value = '';
                visibleInput.focus();
                presetBtns.forEach(b => b.classList.remove('active'));
                btn.classList.add('active');
            } else {
                visibleInput.value = btn.dataset.amount;
                hiddenInput.value  = btn.dataset.amount;
                setActive(btn.dataset.amount);
            }
        });
    });

    visibleInput.addEventListener('input', () => {
        hiddenInput.value = visibleInput.value;
        presetBtns.forEach(b => {
            b.classList.toggle('active', !b.dataset.custom && b.dataset.amount === visibleInput.value);
        });
    });

    messageArea.addEventListener('input', () => {
        charCount.textContent = messageArea.value.length;
    });

    document.getElementById('donation-form').addEventListener('submit', function (e) {
        hiddenInput.value = visibleInput.value;
        if (!hiddenInput.value || parseFloat(hiddenInput.value) < 1) {
            e.preventDefault();
            visibleInput.focus();
            visibleInput.setCustomValidity('Please enter a donation amount of at least $1.');
            visibleInput.reportValidity();
            return;
        }
        visibleInput.setCustomValidity('');
        submitBtn.disabled = true;
        submitBtn.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="spin"><line x1="12" y1="2" x2="12" y2="6"/><line x1="12" y1="18" x2="12" y2="22"/><line x1="4.93" y1="4.93" x2="7.76" y2="7.76"/><line x1="16.24" y1="16.24" x2="19.07" y2="19.07"/><line x1="2" y1="12" x2="6" y2="12"/><line x1="18" y1="12" x2="22" y2="12"/><line x1="4.93" y1="19.07" x2="7.76" y2="16.24"/><line x1="16.24" y1="7.76" x2="19.07" y2="4.93"/></svg> Redirecting to PayPal…';
    });

    // Pre-select on old value
    const oldAmount = '{{ old('amount') }}';
    if (oldAmount) { setActive(oldAmount); hiddenInput.value = oldAmount; }

    // Add spin animation
    const style = document.createElement('style');
    style.textContent = '@keyframes spin{to{transform:rotate(360deg)}} .spin{animation:spin 1s linear infinite}';
    document.head.appendChild(style);
})();
</script>
@endpush
