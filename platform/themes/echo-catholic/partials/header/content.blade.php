{{-- Thin gradient faith bar --}}
<div class="catholic-faith-bar" aria-hidden="true"></div>

<style>
    .catholic-header-main .echo-desktop-menu > li > a {
        color: #fff !important;
        -webkit-text-fill-color: #fff !important;
        opacity: 1 !important;
        font-size: 1.08rem !important;
        font-weight: 600 !important;
        letter-spacing: 0.015em !important;
        padding-inline: 18px !important;
    }

    .catholic-header-main .echo-desktop-menu > li:hover > a,
    .catholic-header-main .echo-desktop-menu > li.active > a,
    .catholic-header-main .echo-desktop-menu > li.current-menu-item > a,
    .catholic-header-main .echo-desktop-menu > li.current-menu-ancestor > a,
    .catholic-header-main .echo-desktop-menu > li.current_page_item > a,
    .catholic-header-main .echo-desktop-menu > li.current_page_ancestor > a,
    .catholic-header-main .echo-desktop-menu > li.current > a {
        color: #C9A227 !important;
        -webkit-text-fill-color: #C9A227 !important;
        opacity: 1 !important;
    }

    .catholic-header-main .echo-desktop-menu > li:hover > a::after,
    .catholic-header-main .echo-desktop-menu > li.active > a::after,
    .catholic-header-main .echo-desktop-menu > li.current-menu-item > a::after,
    .catholic-header-main .echo-desktop-menu > li.current-menu-ancestor > a::after,
    .catholic-header-main .echo-desktop-menu > li.current_page_item > a::after,
    .catholic-header-main .echo-desktop-menu > li.current_page_ancestor > a::after,
    .catholic-header-main .echo-desktop-menu > li.current > a::after {
        background: #C9A227 !important;
        transform: scaleX(1);
    }
</style>

{{-- Breaking news ticker --}}
{!! Theme::partial('breaking-news') !!}

{{-- Main navigation header --}}
<div class="echo-home-1-menu catholic-header-main">
    <div class="echo-site-main-logo-menu-social">
        <div class="container">
            <div class="d-flex align-items-center justify-content-between">

                {{-- Logo --}}
                <div class="logo-header-sidebar flex-shrink-0">
                    {!! Theme::partial('header.partials.logo') !!}
                    @if (!theme_option('logo') && !theme_option('logo_dark'))
                        <a href="{{ route('public.index') }}" class="catholic-text-logo">
                            <span class="text-logo-main">AllCatholicMedia</span><span class="text-logo-dot">.</span>
                        </a>
                    @endif
                </div>

                {{-- Desktop Navigation --}}
                <nav class="echo-home-1-menu d-none d-lg-flex justify-content-center" aria-label="{{ __('Main navigation') }}">
                    @php
                        $menuHtml = Menu::renderMenuLocation('main-menu', [
                            'options' => ['class' => 'list-unstyled echo-desktop-menu'],
                            'view'    => 'main-menu',
                        ]);

                        $menuHtml = preg_replace(
                            '/(<a\b[^>]*href=")[^"]*(".*?>\s*Watch\s*<\/a>)/i',
                            '$1' . e(route('public.watch')) . '$2',
                            $menuHtml,
                            1
                        ) ?? $menuHtml;
                    @endphp
                    {!! $menuHtml !!}
                </nav>

                {{-- Right controls --}}
                <div class="d-flex justify-content-end align-items-center catholic-header-controls flex-shrink-0">

                    <button class="catholic-icon-btn catholic-search-toggle" aria-label="{{ __('Search') }}" aria-expanded="false" aria-controls="catholicSearchOverlay">
                        <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.35-4.35"/></svg>
                    </button>

                    <button class="catholic-icon-btn rts-dark-light" id="rts-data-toggle" aria-label="{{ __('Toggle dark mode') }}">
                        <svg class="icon-sun" width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="5"/><line x1="12" y1="1" x2="12" y2="3"/><line x1="12" y1="21" x2="12" y2="23"/><line x1="4.22" y1="4.22" x2="5.64" y2="5.64"/><line x1="18.36" y1="18.36" x2="19.78" y2="19.78"/><line x1="1" y1="12" x2="3" y2="12"/><line x1="21" y1="12" x2="23" y2="12"/><line x1="4.22" y1="19.78" x2="5.64" y2="18.36"/><line x1="18.36" y1="5.64" x2="19.78" y2="4.22"/></svg>
                        <svg class="icon-moon" width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"/></svg>
                    </button>

                    @if (is_plugin_active('language') && theme_option('language_switcher_enabled', true))
                        {!! Theme::partial('language-switcher') !!}
                    @endif

                    {!! Theme::partial('account') !!}

                    {!! Theme::partial('header-sticky-button-toggle-sidebar') !!}

                </div>
            </div>
        </div>
    </div>
</div>

{{-- Search overlay --}}
<div class="search-input-area" id="catholicSearchOverlay" role="search">
    <div class="container">
        <div class="search-input-inner">
            <form action="{{ route('public.search') }}" method="GET" class="d-flex align-items-center gap-2 flex-grow-1">
                <input
                    type="text"
                    name="q"
                    class="form-control"
                    placeholder="{{ __('Search news, videos, live streams…') }}"
                    value="{{ request('q') }}"
                    autocomplete="off"
                    spellcheck="false"
                >
                <button type="submit" class="search-submit-btn">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.35-4.35"/></svg>
                    {{ __('Search') }}
                </button>
            </form>
            <button class="catholic-icon-btn catholic-search-close" aria-label="{{ __('Close search') }}">
                <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
            </button>
        </div>
    </div>
</div>

{{-- Reading progress bar (shown on article pages) --}}
<div class="catholic-reading-progress" id="catholicReadingProgress" aria-hidden="true">
    <div class="catholic-reading-progress-bar" id="catholicReadingBar"></div>
</div>
