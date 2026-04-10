@php
    $form->setFormOption('has_wrapper', 'no');
    $form->setFormOption('banner', null);
@endphp

<section class="member-login-shell">
    <div class="container">
        <div class="member-login-layout member-login-layout--single">
            <div class="member-login-form member-login-form--single">
                <div class="member-login-intro">
                    <span class="member-login-intro__eyebrow">Member Login</span>
                    <h2>Welcome Back</h2>
                    <p>Sign in to continue watching, listening, reading, and managing your account.</p>
                </div>

                {!! $form->renderForm() !!}
            </div>
        </div>
    </div>
</section>
