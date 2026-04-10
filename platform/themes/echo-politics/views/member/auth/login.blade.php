@php
    Theme::set('pageTitle', __('Sign In'));
    Theme::layout('full-width');
    SeoHelper::setTitle('Sign In | AllCatholicMedia');

    $form->setFormOption('has_wrapper', 'no');
    $form->setFormOption('banner', null);
@endphp

<section class="member-login-shell">
    <div class="container">
        <div class="member-login-layout member-login-layout--single">
            <div class="member-login-form member-login-form--single">
                <div class="member-login-intro">
                    <span class="member-login-intro__eyebrow">{{ __('Member Login') }}</span>
                    <h2>{{ __('Welcome Back') }}</h2>
                    <p>{{ __('Sign in to continue watching, listening, reading, and managing your account.') }}</p>
                </div>

                {!! $form->renderForm() !!}
            </div>
        </div>
    </div>
</section>
