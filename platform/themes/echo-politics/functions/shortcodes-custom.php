<?php

use Acm\LiveStream\Models\LiveStream;
use App\Models\PodcastShow;
use App\Models\YouTubeChannel;
use App\Models\YouTubeChannelVideo;
use Botble\Blog\Models\Post;
use Botble\Shortcode\Compilers\Shortcode as ShortcodeCompiler;
use Botble\Shortcode\Facades\Shortcode;
use Botble\Shortcode\Forms\ShortcodeForm;
use Botble\Base\Forms\FieldOptions\TextFieldOption;
use Botble\Base\Forms\FieldOptions\NumberFieldOption;
use Botble\Base\Forms\Fields\TextField;
use Botble\Base\Forms\Fields\NumberField;
use Botble\Theme\Facades\Theme;
use Illuminate\Routing\Events\RouteMatched;

app('events')->listen(RouteMatched::class, function (): void {

    /*
    |--------------------------------------------------------------------------
    | [video-posts] — Catholic Video Library section
    |--------------------------------------------------------------------------
    | Renders posts that have a video_url meta value (stored in meta_boxes).
    */
    Shortcode::register(
        'video-posts',
        'Video Posts',
        'Video Posts — posts with an embedded video URL',
        function (ShortcodeCompiler $shortcode): ?string {
            $limit = (int) ($shortcode->limit ?: 6);

            $posts = Post::query()
                ->with(['slugable', 'categories'])
                ->wherePublished()
                ->whereHas('metadata', fn ($q) => $q
                    ->where('meta_key', 'video_url')
                    ->whereNotNull('meta_value')
                    ->where('meta_value', '!=', '')
                )
                ->latest()
                ->limit($limit)
                ->get();

            if ($posts->isEmpty()) {
                return null;
            }

            $title          = $shortcode->title ?: 'Videos';
            $variableStyles = [];

            return Theme::partial('shortcodes.video-posts.index', compact('shortcode', 'posts', 'title', 'variableStyles'));
        }
    );

    Shortcode::setAdminConfig('video-posts', function (array $attributes) {
        return ShortcodeForm::createFromArray($attributes)
            ->add('title',  TextField::class, TextFieldOption::make()->label('Section Title')->defaultValue('Videos')->toArray())
            ->add('limit',  NumberField::class, NumberFieldOption::make()->label('Number of Videos')->defaultValue(6)->toArray());
    });

    /*
    |--------------------------------------------------------------------------
    | [podcast-shows] — Podcast / Listen section
    |--------------------------------------------------------------------------
    | Renders active podcast shows from the podcast_shows table.
    */
    Shortcode::register(
        'podcast-shows',
        'Podcast Shows',
        'Podcast Shows — grid of active podcast shows',
        function (ShortcodeCompiler $shortcode): ?string {
            $limit = (int) ($shortcode->limit ?: 6);

            $shows = PodcastShow::query()
                ->where('is_active', 1)
                ->withCount('episodes')
                ->orderBy('sort_order')
                ->orderBy('name')
                ->limit($limit)
                ->get();

            if ($shows->isEmpty()) {
                return null;
            }

            $title = $shortcode->title ?: 'Listen';

            return Theme::partial('shortcodes.podcast-shows.index', compact('shortcode', 'shows', 'title'));
        }
    );

    Shortcode::setAdminConfig('podcast-shows', function (array $attributes) {
        return ShortcodeForm::createFromArray($attributes)
            ->add('title', TextField::class, TextFieldOption::make()->label('Section Title')->defaultValue('Listen')->toArray())
            ->add('limit', NumberField::class, NumberFieldOption::make()->label('Number of Shows')->defaultValue(6)->toArray());
    });

    /*
    |--------------------------------------------------------------------------
    | [live-streams-section] — Live Now section
    |--------------------------------------------------------------------------
    | Renders active live streams from the live_streams table.
    */
    Shortcode::register(
        'live-streams-section',
        'Live Streams Section',
        'Live Streams — shows currently live and upcoming streams',
        function (ShortcodeCompiler $shortcode): ?string {
            $liveNow  = LiveStream::query()->where('is_live', 1)->orderBy('order_column')->limit(6)->get();
            $upcoming = LiveStream::query()->where('is_live', 0)->whereNotNull('scheduled_at')
                ->where('scheduled_at', '>', now())->orderBy('scheduled_at')->limit(4)->get();

            if ($liveNow->isEmpty() && $upcoming->isEmpty()) {
                return null;
            }

            $title = $shortcode->title ?: 'Live Now';

            return Theme::partial('shortcodes.live-streams-section.index', compact('shortcode', 'liveNow', 'upcoming', 'title'));
        }
    );

    Shortcode::setAdminConfig('live-streams-section', function (array $attributes) {
        return ShortcodeForm::createFromArray($attributes)
            ->add('title', TextField::class, TextFieldOption::make()->label('Section Title')->defaultValue('Live Now')->toArray());
    });

    /*
    |--------------------------------------------------------------------------
    | [youtube-channels] — Watch / YouTube Channels section
    |--------------------------------------------------------------------------
    | Renders YouTube channels with their latest videos.
    */
    Shortcode::register(
        'youtube-channels',
        'YouTube Channels',
        'YouTube Channels — grid of active YouTube channels',
        function (ShortcodeCompiler $shortcode): ?string {
            $limit = (int) ($shortcode->limit ?: 6);

            $channels = YouTubeChannel::query()
                ->where('is_active', 1)
                ->withCount('videos')
                ->orderBy('sort_order')
                ->orderBy('name')
                ->limit($limit)
                ->get();

            if ($channels->isEmpty()) {
                return null;
            }

            $title = $shortcode->title ?: 'Watch';

            return Theme::partial('shortcodes.youtube-channels.index', compact('shortcode', 'channels', 'title'));
        }
    );

    Shortcode::setAdminConfig('youtube-channels', function (array $attributes) {
        return ShortcodeForm::createFromArray($attributes)
            ->add('title', TextField::class, TextFieldOption::make()->label('Section Title')->defaultValue('Watch')->toArray())
            ->add('limit', NumberField::class, NumberFieldOption::make()->label('Number of Channels')->defaultValue(6)->toArray());
    });

});
