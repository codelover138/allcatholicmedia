<?php

use App\Models\PodcastShow;
use Botble\Shortcode\Compilers\Shortcode as ShortcodeCompiler;
use Botble\Shortcode\Facades\Shortcode;
use Botble\Theme\Facades\Theme;
use Botble\Theme\Supports\ThemeSupport;
use Illuminate\Routing\Events\RouteMatched;

app('events')->listen(RouteMatched::class, function (): void {
    // Set Catholic-specific default theme options
    // These are used by css-variable-declare.blade.php if not overridden in admin
    add_filter('theme_option_primary_color_default', fn () => '#046bd2');
    add_filter('theme_option_heading_color_default', fn () => '#1e293b');
    add_filter('theme_option_footer_background_color_default', fn () => '#0f172a');

    // Register podcast-shows shortcode
    Shortcode::register('podcast-shows', __('Podcast Shows'), __('Display podcast shows in a grid layout'), function (ShortcodeCompiler $shortcode): ?string {
        $limit = $shortcode->get('limit', 6);
        $title = $shortcode->get('title', 'Podcasts');

        $shows = PodcastShow::query()
            ->withCount('episodes')
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->orderBy('name')
            ->limit($limit)
            ->get();

        return Theme::partial('shortcodes.podcast-shows.index', compact('shows', 'title', 'shortcode'));
    });

    Shortcode::setAdminConfig('podcast-shows', function (array $attributes) {
        return [
            'title' => [
                'type' => 'text',
                'label' => 'Title',
                'default' => 'Podcasts',
            ],
            'limit' => [
                'type' => 'number',
                'label' => 'Limit',
                'default' => 6,
            ],
        ];
    });
});
