<?php

use Botble\Theme\Supports\ThemeSupport;

app()->booted(function (): void {
    // Set Catholic-specific default theme options
    // These are used by css-variable-declare.blade.php if not overridden in admin
    add_filter('theme_option_primary_color_default', fn () => '#046bd2');
    add_filter('theme_option_heading_color_default', fn () => '#1e293b');
    add_filter('theme_option_footer_background_color_default', fn () => '#0f172a');
});
