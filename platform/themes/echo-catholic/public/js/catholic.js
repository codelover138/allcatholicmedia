;(function () {
    'use strict';

    document.addEventListener('DOMContentLoaded', function () {

        // ── Search overlay ────────────────────────────────────
        var searchToggle = document.querySelector('.catholic-search-toggle');
        var searchClose  = document.querySelector('.catholic-search-close');
        var searchArea   = document.getElementById('catholicSearchOverlay');

        function openSearch() {
            if (!searchArea) return;
            searchArea.classList.add('open');
            if (searchToggle) searchToggle.setAttribute('aria-expanded', 'true');
            var input = searchArea.querySelector('input[type="text"]');
            if (input) setTimeout(function () { input.focus(); }, 50);
        }
        function closeSearch() {
            if (!searchArea) return;
            searchArea.classList.remove('open');
            if (searchToggle) searchToggle.setAttribute('aria-expanded', 'false');
        }
        if (searchToggle) searchToggle.addEventListener('click', function () {
            searchArea.classList.contains('open') ? closeSearch() : openSearch();
        });
        if (searchClose) searchClose.addEventListener('click', closeSearch);
        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape' && searchArea && searchArea.classList.contains('open')) closeSearch();
        });

        // ── Sticky header scroll shadow ───────────────────────
        var header = document.querySelector('.echo-header-area');
        if (header) {
            var onScroll = function () {
                header.classList.toggle('scrolled', window.scrollY > 8);
            };
            window.addEventListener('scroll', onScroll, { passive: true });
            onScroll();
        }

        // ── Reading progress bar (article pages only) ─────────
        var progressWrap = document.getElementById('catholicReadingProgress');
        var progressBar  = document.getElementById('catholicReadingBar');
        var article = document.querySelector('.echo-hero-section.inner-post, .ck-content, .echo-hero.inner');

        if (progressWrap && progressBar && article) {
            progressWrap.classList.add('visible');
            var updateProgress = function () {
                var docH    = document.documentElement.scrollHeight;
                var winH    = window.innerHeight;
                var scrolled = window.scrollY;
                var pct = Math.min(100, Math.round((scrolled / (docH - winH)) * 100));
                progressBar.style.width = pct + '%';
            };
            window.addEventListener('scroll', updateProgress, { passive: true });
            updateProgress();
        }

        // ── Breaking news ticker — pause on hover ─────────────
        // (handled via CSS: .catholic-ticker-wrap:hover .catholic-ticker-track)
        // Extra: keyboard-accessible pause with space bar when ticker focused
        var ticker = document.querySelector('.catholic-ticker-track');
        var tickerWrap = document.querySelector('.catholic-ticker-wrap');
        if (ticker && tickerWrap) {
            tickerWrap.setAttribute('tabindex', '0');
            tickerWrap.setAttribute('aria-label', 'Latest news ticker. Press Space to pause.');
            tickerWrap.addEventListener('keydown', function (e) {
                if (e.key === ' ') {
                    e.preventDefault();
                    var paused = ticker.style.animationPlayState === 'paused';
                    ticker.style.animationPlayState = paused ? 'running' : 'paused';
                }
            });
        }

        // ── Dark mode icon sync on initial load ───────────────
        var currentTheme = localStorage.getItem('echo-theme') ||
            document.documentElement.getAttribute('data-theme') || 'light';
        document.documentElement.setAttribute('data-theme', currentTheme);

    });

})();
