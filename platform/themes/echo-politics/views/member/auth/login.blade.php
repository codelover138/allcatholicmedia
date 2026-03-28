@php
    Theme::set('pageTitle', __('Sign In'));
    Theme::layout('full-width');
    SeoHelper::setTitle('Sign In | AllCatholicMedia');
@endphp

@push('header')
<style>
.acm-auth-hero { background: linear-gradient(135deg,#0f172a,#1e293b); padding: 36px 0 28px; text-align: center; margin-bottom: 0; }
.acm-auth-cross { font-size: 1.8rem; line-height: 1; margin-bottom: 8px; }
.acm-auth-title { font-size: 1.5rem; font-weight: 700; color: #f8fafc; margin: 0 0 4px; }
.acm-auth-sub { font-size: .88rem; color: #94a3b8; }
.acm-auth-wrap { padding: 0 0 60px; }
</style>
@endpush

<section class="acm-auth-hero">
    <div class="acm-auth-cross">✝</div>
    <h1 class="acm-auth-title">{{ __('Welcome Back') }}</h1>
    <p class="acm-auth-sub">{{ __('Sign in to your AllCatholicMedia account') }}</p>
</section>

<div class="acm-auth-wrap">
    {!! $form->renderForm() !!}
</div>
