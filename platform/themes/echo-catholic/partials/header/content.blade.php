<div class="echo-home-1-menu catholic-header-main">
    <div class="echo-site-main-logo-menu-social">
        <div class="container">
            <div class="d-flex align-items-center justify-content-between">

                {{-- Logo --}}
                <div class="logo-header-sidebar">
                    {!! Theme::partial('header.partials.logo') !!}
                    @if (!theme_option('logo') && !theme_option('logo_dark'))
                        <a href="{{ route('public.index') }}" class="catholic-text-logo">
                            <span class="text-logo-main">AllCatholicMedia</span><span class="text-logo-dot">.</span>
                        </a>
                    @endif
                </div>

                {{-- Desktop Navigation --}}
                <div class="echo-home-1-menu d-none d-lg-flex justify-content-center">
                    {!!
                        Menu::renderMenuLocation('main-menu', [
                            'options' => ['class' => 'list-unstyled echo-desktop-menu'],
                            'view'    => 'main-menu',
                        ])
                    !!}
                </div>

                {{-- Right controls: search | dark toggle | language | account | hamburger --}}
                <div class="d-flex justify-content-between align-items-center catholic-header-controls">

                    {{-- Search toggle --}}
                    <button class="catholic-icon-btn catholic-search-toggle me-1" aria-label="{{ __('Search') }}">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.35-4.35"/></svg>
                    </button>

                    {{-- Dark / Light mode toggle --}}
                    <button class="catholic-icon-btn rts-dark-light me-1" id="rts-data-toggle" aria-label="{{ __('Toggle dark mode') }}">
                        <svg class="icon-sun" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="5"/><line x1="12" y1="1" x2="12" y2="3"/><line x1="12" y1="21" x2="12" y2="23"/><line x1="4.22" y1="4.22" x2="5.64" y2="5.64"/><line x1="18.36" y1="18.36" x2="19.78" y2="19.78"/><line x1="1" y1="12" x2="3" y2="12"/><line x1="21" y1="12" x2="23" y2="12"/><line x1="4.22" y1="19.78" x2="5.64" y2="18.36"/><line x1="18.36" y1="5.64" x2="19.78" y2="4.22"/></svg>
                        <svg class="icon-moon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"/></svg>
                    </button>

                    {{-- Language switcher --}}
                    @if (is_plugin_active('language') && theme_option('language_switcher_enabled', true))
                        {!! Theme::partial('language-switcher') !!}
                    @endif

                    {{-- Member account --}}
                    {!! Theme::partial('account') !!}

                    {{-- Hamburger — hidden on desktop (d-lg-none) via override partial --}}
                    {!! Theme::partial('header-sticky-button-toggle-sidebar') !!}

                </div>
            </div>
        </div>
    </div>
</div>

{{-- Search overlay (shown/hidden via catholic.js) --}}
<div class="search-input-area" id="catholicSearchOverlay">
    <div class="container">
        <div class="d-flex align-items-center gap-2">
            <form action="{{ route('public.search') }}" method="GET" class="d-flex align-items-center gap-2 flex-grow-1">
                <input type="text" name="q" class="form-control" placeholder="{{ __('Search news, videos, live streams…') }}" value="{{ request('q') }}">
                <button type="submit" class="catholic-btn-primary d-flex align-items-center px-3 py-2" style="white-space:nowrap">
                    {{ __('Search') }}
                </button>
            </form>
            <button class="catholic-icon-btn catholic-search-close" aria-label="{{ __('Close search') }}">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
            </button>
        </div>
    </div>
</div>
