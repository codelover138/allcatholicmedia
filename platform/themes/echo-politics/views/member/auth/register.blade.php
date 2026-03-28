@php
    Theme::set('pageTitle', __('Create Account'));
    Theme::layout('full-width');
    SeoHelper::setTitle('Create Account | AllCatholicMedia');
@endphp

@push('header')
<style>
.acm-auth-hero { background: linear-gradient(135deg,#0f172a,#1e293b); padding: 36px 0 28px; text-align: center; margin-bottom: 0; }
.acm-auth-cross { font-size: 1.8rem; line-height: 1; margin-bottom: 8px; }
.acm-auth-title { font-size: 1.5rem; font-weight: 700; color: #f8fafc; margin: 0 0 4px; }
.acm-auth-sub { font-size: .88rem; color: #94a3b8; }
.acm-auth-wrap { padding: 0 0 60px; }
.acm-mission-notice { background: #f0f9ff; border: 1px solid #bae6fd; border-radius: 8px; padding: 12px 16px; margin: 0 auto 20px; max-width: 480px; display: flex; gap: 10px; align-items: flex-start; font-size: .83rem; color: #0c4a6e; line-height: 1.5; }
.acm-mission-notice svg { flex-shrink: 0; margin-top: 1px; color: #0369a1; }
html[data-theme='dark'] .acm-mission-notice { background: #0c1a2e; border-color: #1e3a5f; color: #7dd3fc; }
</style>
@endpush

<section class="acm-auth-hero">
    <div class="acm-auth-cross">✝</div>
    <h1 class="acm-auth-title">{{ __('Join AllCatholicMedia') }}</h1>
    <p class="acm-auth-sub">{{ __('Connect with the global Catholic community') }}</p>
</section>

<div class="acm-auth-wrap">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-8">
                <div class="acm-mission-notice">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/>
                    </svg>
                    <span>{{ __('Your data will never be used to promote content contrary to Catholic magisterial teaching.') }}</span>
                </div>
            </div>
        </div>
    </div>

    {!! $form->renderForm() !!}
</div>
