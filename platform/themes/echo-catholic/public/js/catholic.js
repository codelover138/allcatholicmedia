;(function () {
    'use strict';

    document.addEventListener('DOMContentLoaded', function () {

        // ── Search overlay toggle ─────────────────────────────
        var searchToggle = document.querySelector('.catholic-search-toggle');
        var searchClose  = document.querySelector('.catholic-search-close');
        var searchArea   = document.getElementById('catholicSearchOverlay');

        if (searchToggle && searchArea) {
            searchToggle.addEventListener('click', function () {
                searchArea.classList.toggle('open');
                if (searchArea.classList.contains('open')) {
                    var input = searchArea.querySelector('input[type="text"]');
                    if (input) { input.focus(); }
                }
            });
        }

        if (searchClose && searchArea) {
            searchClose.addEventListener('click', function () {
                searchArea.classList.remove('open');
            });
        }

        // ── Sync dark-mode icons on initial load ──────────────
        // echo's script.js handles the actual data-theme toggle.
        // We just make sure the icon state matches on page load.
        var currentTheme = localStorage.getItem('echo-theme') ||
            document.documentElement.getAttribute('data-theme') || 'light';

        document.documentElement.setAttribute('data-theme', currentTheme);

    });

})();
