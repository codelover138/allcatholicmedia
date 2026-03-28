<?php

app()->booted(function (): void {
    remove_sidebar('header_top_sidebar');

    /*
     * Inject resource hints into <head> for performance.
     * Preconnects to Google Fonts and DNS-prefetch to embed providers.
     */
    add_filter(THEME_FRONT_HEADER, function (?string $html): string {
        $html = (string) $html;
        $html .= '<link rel="preconnect" href="https://fonts.googleapis.com">' . PHP_EOL;
        $html .= '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>' . PHP_EOL;
        $html .= '<link rel="dns-prefetch" href="https://www.youtube.com">' . PHP_EOL;
        $html .= '<link rel="dns-prefetch" href="https://player.vimeo.com">' . PHP_EOL;
        $html .= '<meta name="theme-color" content="#0f172a">' . PHP_EOL;
        return $html;
    }, 20, 1);
});
