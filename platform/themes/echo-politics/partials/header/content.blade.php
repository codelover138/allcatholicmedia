@push('footer')
<style>
/* Hide gear (dark/light toggle) and hamburger menu from navbar */
.rts-darkmode,
.echo-header-top-menu-bar-wrapper { display: none !important; }

#acm-suggest-box { position: absolute; top: calc(100% + 6px); left: 0; right: 0; background: var(--bg-card,#fff); border: 1px solid var(--border-color,#e2e8f0); border-radius: 8px; box-shadow: 0 8px 24px rgba(0,0,0,.12); z-index: 9999; overflow: hidden; display: none; }
.acm-suggest-item { display: flex; align-items: center; gap: 10px; padding: 10px 14px; font-size: .88rem; color: var(--color-heading-1,#1e293b); text-decoration: none; border-bottom: 1px solid var(--border-color,#e2e8f0); }
.acm-suggest-item:last-child { border-bottom: none; }
.acm-suggest-item:hover, .acm-suggest-item.highlighted { background: var(--bg-light,#f0f5fa); }
.acm-suggest-icon { font-size: 1rem; flex-shrink: 0; }
.acm-suggest-label { flex: 1; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; }
.acm-suggest-type { font-size: .72rem; color: #94a3b8; flex-shrink: 0; }
html[data-theme='dark'] #acm-suggest-box { background: #1a1d2e; border-color: rgba(255,255,255,.1); }
html[data-theme='dark'] .acm-suggest-item { color: #f1f5f9; border-color: rgba(255,255,255,.06); }
html[data-theme='dark'] .acm-suggest-item:hover,.acm-suggest-item.highlighted { background: #0f172a; }
</style>
<script>
(function () {
    'use strict';
    var SUGGEST_URL = '{{ route("api.search-suggest") }}';
    var timer = null;
    var activeIdx = -1;

    function initAutocomplete(input) {
        if (!input) return;

        // Wrap relative to search-input-area
        var area = input.closest('.search-input-area') || input.parentElement;
        area.style.position = 'relative';

        var box = document.createElement('div');
        box.id = 'acm-suggest-box';
        area.appendChild(box);

        function showResults(items) {
            box.innerHTML = '';
            activeIdx = -1;
            if (!items.length) { box.style.display = 'none'; return; }
            items.forEach(function (item, i) {
                var a = document.createElement('a');
                a.href = item.url;
                a.className = 'acm-suggest-item';
                a.dataset.idx = i;
                a.innerHTML = '<span class="acm-suggest-icon">' + item.icon + '</span>' +
                    '<span class="acm-suggest-label">' + item.label + '</span>' +
                    '<span class="acm-suggest-type">' + item.type + '</span>';
                box.appendChild(a);
            });
            box.style.display = 'block';
        }

        function fetch_suggest(q) {
            if (q.length < 2) { box.style.display = 'none'; return; }
            fetch(SUGGEST_URL + '?q=' + encodeURIComponent(q), { headers: { 'Accept': 'application/json' } })
                .then(function (r) { return r.json(); })
                .then(function (data) { showResults(data.results || []); })
                .catch(function () { box.style.display = 'none'; });
        }

        input.addEventListener('input', function () {
            clearTimeout(timer);
            var q = this.value.trim();
            timer = setTimeout(function () { fetch_suggest(q); }, 260);
        });

        input.addEventListener('keydown', function (e) {
            var items = box.querySelectorAll('.acm-suggest-item');
            if (!items.length) return;
            if (e.key === 'ArrowDown') {
                e.preventDefault();
                activeIdx = Math.min(activeIdx + 1, items.length - 1);
                items.forEach(function (el, i) { el.classList.toggle('highlighted', i === activeIdx); });
            } else if (e.key === 'ArrowUp') {
                e.preventDefault();
                activeIdx = Math.max(activeIdx - 1, -1);
                items.forEach(function (el, i) { el.classList.toggle('highlighted', i === activeIdx); });
            } else if (e.key === 'Enter' && activeIdx >= 0) {
                e.preventDefault();
                items[activeIdx].click();
            } else if (e.key === 'Escape') {
                box.style.display = 'none';
            }
        });

        document.addEventListener('click', function (e) {
            if (!area.contains(e.target)) box.style.display = 'none';
        });
    }

    // Init on the header search input (may not exist until search overlay opens)
    document.addEventListener('DOMContentLoaded', function () {
        initAutocomplete(document.getElementById('searchInput1'));
    });
}());
</script>
@endpush

<div class="echo-home-1-menu header-three">
    <div class="echo-site-main-logo-menu-social">
        <div class="hm-7-container">
            <div class="d-flex align-items-center justify-content-between">
                <div class="logo-header-sidebar">
                    {!! Theme::partial('header.partials.logo', ['onlyLogoLight' => true]) !!}
                </div>

                <div class="echo-home-1-menu d-none d-lg-flex justify-content-center">
                    {!!
                       Menu::renderMenuLocation('main-menu', [
                           'options' => ['class' => 'list-unstyled echo-desktop-menu'],
                           'view' => 'main-menu',
                       ])
                    !!}
                </div>

                <div class="d-flex justify-content-between align-items-center">
                    @if (is_plugin_active('language') && theme_option('language_switcher_enabled', true))
                        {!! Theme::partial('language-switcher') !!}
                    @endif

                    {!! Theme::partial('account') !!}

                    {!! dynamic_sidebar('header_sidebar') !!}
                </div>
            </div>
        </div>
    </div>
</div>
