@if (is_plugin_active('newsletter'))
<section class="catholic-newsletter-section" @style($variableStyles ?? [])>
    <div class="container">
        <div class="catholic-newsletter-inner">

            <div class="catholic-newsletter-icon" aria-hidden="true">&#10013;</div>

            @if ($title = $shortcode->title)
                <h2 class="catholic-newsletter-title">{!! BaseHelper::clean($title) !!}</h2>
            @endif

            @if ($subtitle = $shortcode->subtitle)
                <p class="catholic-newsletter-subtitle">{!! BaseHelper::clean($subtitle) !!}</p>
            @endif

            <div class="catholic-newsletter-form">
                {!! $form->renderForm() !!}
            </div>

            <p class="catholic-newsletter-privacy">
                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                {{ __('No spam, ever. Unsubscribe anytime.') }}
            </p>

        </div>
    </div>
</section>
@endif
