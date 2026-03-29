<div class="catholic-footer-inner">

    {{-- Footer widget columns --}}
    <div class="container">
        <div class="row echo-row">
            {!! dynamic_sidebar('footer_sidebar') !!}
        </div>
    </div>

    {{-- Footer bottom bar --}}
    <div class="catholic-footer-bottom">
        <div class="container">
            <div class="catholic-footer-bottom-inner d-flex align-items-center justify-content-between flex-wrap">

                {{-- Logo --}}
                @if ($logoDark = theme_option('logo_dark'))
                    <div class="footer-logo">
                        <a href="{{ route('public.index') }}" aria-label="{{ theme_option('site_title', 'AllCatholicMedia') }}">
                            {{ RvMedia::image($logoDark, theme_option('site_title'), attributes: ['style' => 'height: 34px; width: auto;']) }}
                        </a>
                    </div>
                @else
                    <a href="{{ route('public.index') }}" class="catholic-text-logo footer-text-logo" aria-label="AllCatholicMedia — Home">
                        <span class="text-logo-main">AllCatholicMedia</span><span class="text-logo-dot">.</span>
                    </a>
                @endif

                {{-- Copyright --}}
                @if ($siteCopyright = Theme::getSiteCopyright())
                    <div class="footer-copyright">
                        {!! $siteCopyright !!}
                    </div>
                @else
                    <div class="footer-copyright">
                        &copy; {{ date('Y') }} AllCatholicMedia. All rights reserved.
                        <span class="footer-mission">Dedicated to the glory of God.</span>
                    </div>
                @endif

                {{-- Language switcher --}}
                @if (is_plugin_active('language'))
                    {!! Theme::partial('language-switcher', ['location' => 'footer']) !!}
                @endif

            </div>
        </div>
    </div>

</div>
