<?php

use App\Models\PodcastEpisode;
use App\Models\PodcastShow;
use App\Models\YouTubeChannel;
use App\Models\YouTubeChannelVideo;
use Acm\Community\Models\CommunityGroup;
use Acm\Community\Models\ForumTopic;
use Acm\LiveStream\Models\LiveStream;
use Botble\Blog\Models\Category;
use Botble\Blog\Models\Post;
use Botble\Blog\Models\Tag;
use Botble\Member\Models\Member;
use Botble\Theme\Facades\Theme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['web', 'core']], function (): void {

    /*
    |--------------------------------------------------------------------------
    | Search Autocomplete API — /api/search-suggest
    |--------------------------------------------------------------------------
    | Returns JSON of top matches across content types for autocomplete.
    */
    Route::get('api/search-suggest', function (Request $request) {
        $q = trim($request->input('q', ''));
        if (strlen($q) < 2) {
            return response()->json(['results' => []]);
        }

        $like = "%{$q}%";
        $results = [];

        // Articles
        $articles = Post::query()
            ->wherePublished()
            ->where('name', 'like', $like)
            ->whereDoesntHave('metadata', fn ($mq) => $mq->where('meta_key', 'video_url')->whereNotNull('meta_value')->where('meta_value', '!=', ''))
            ->limit(4)
            ->get(['id', 'name', 'image']);

        foreach ($articles as $p) {
            $results[] = ['type' => 'article', 'label' => $p->name, 'url' => $p->url, 'icon' => '📰'];
        }

        // Videos
        $videos = Post::query()
            ->wherePublished()
            ->where('name', 'like', $like)
            ->whereHas('metadata', fn ($mq) => $mq->where('meta_key', 'video_url')->whereNotNull('meta_value')->where('meta_value', '!=', ''))
            ->limit(3)
            ->get(['id', 'name']);

        foreach ($videos as $v) {
            $results[] = ['type' => 'video', 'label' => $v->name, 'url' => $v->url, 'icon' => '🎬'];
        }

        // Forum topics
        $topics = \Acm\Community\Models\ForumTopic::published()
            ->where('title', 'like', $like)
            ->limit(3)
            ->get(['id', 'title', 'slug']);

        foreach ($topics as $t) {
            $results[] = ['type' => 'forum', 'label' => $t->title, 'url' => route('public.community.forum.topic', $t->slug), 'icon' => '💬'];
        }

        // Live streams
        $streams = \Acm\LiveStream\Models\LiveStream::published()
            ->where('title', 'like', $like)
            ->limit(2)
            ->get(['id', 'title']);

        foreach ($streams as $s) {
            $results[] = ['type' => 'stream', 'label' => $s->title, 'url' => route('public.live'), 'icon' => '📺'];
        }

        return response()->json(['results' => array_slice($results, 0, 8)]);
    })->name('api.search-suggest');

    /*
    |--------------------------------------------------------------------------
    | Catholic Video Library — /videos
    |--------------------------------------------------------------------------
    | Browse all video posts (posts with video_url metadata).
    | Supports filtering by tag (topic, mass type) and sort order.
    */
    Route::get('videos', function (Request $request) {
        $tagId = $request->integer('tag');
        $sort  = $request->input('sort', 'latest');

        $query = Post::query()
            ->with(['slugable', 'categories', 'tags'])
            ->wherePublished()
            ->whereHas('metadata', fn ($q) => $q->where('meta_key', 'video_url')
                ->whereNotNull('meta_value')
                ->where('meta_value', '!=', ''))
            ->when($tagId, fn ($q) => $q->whereHas('tags', fn ($tq) => $tq->where('id', $tagId)))
            ->when($sort === 'popular', fn ($q) => $q->orderByDesc('views'), fn ($q) => $q->latest());

        $videos   = $query->paginate(12)->withQueryString();
        $videoTags = Tag::query()->whereHas('posts', fn ($q) => $q->wherePublished()
            ->whereHas('metadata', fn ($mq) => $mq->where('meta_key', 'video_url'))
        )->orderBy('name')->get();

        return Theme::scope('videos', compact('videos', 'videoTags', 'tagId', 'sort'))->render();
    })->name('public.videos');

    Route::get('watch', function () {
        $channels = Cache::remember('watch.channels', now()->addMinutes(10), function () {
            return YouTubeChannel::query()
                ->active()
                ->withCount('videos')
                ->orderBy('sort_order')
                ->orderBy('name')
                ->get();
        });

        return Theme::scope('watch-channels', compact('channels'))->render();
    })->name('public.watch');

    Route::get('channel-list', fn () => redirect()->route('public.watch'));

    Route::get('watch/{slug}', function (Request $request, string $slug) {
        $channel = YouTubeChannel::query()
            ->active()
            ->withCount('videos')
            ->where('slug', $slug)
            ->firstOrFail();

        $videos = YouTubeChannelVideo::query()
            ->where('youtube_channel_id', $channel->id)
            ->orderByDesc('is_live')
            ->orderByDesc('published_at')
            ->paginate(18)
            ->withQueryString();

        $selectedVideo = null;
        $videoId = trim((string) $request->input('video', ''));

        if ($videoId !== '') {
            $selectedVideo = YouTubeChannelVideo::query()
                ->where('youtube_channel_id', $channel->id)
                ->where('youtube_video_id', $videoId)
                ->first();
        }

        $selectedVideo ??= $videos->first();

        return Theme::scope('watch-channel', compact('channel', 'videos', 'selectedVideo'))->render();
    })->name('public.watch.channel');

    Route::get('watch-page', function (Request $request) {
        $channelValue = trim((string) $request->input('channel', ''));
        $videoValue = trim((string) $request->input('video', ''));

        $channel = YouTubeChannel::query()
            ->active()
            ->when($channelValue !== '', function ($query) use ($channelValue) {
                $slug = \Illuminate\Support\Str::slug($channelValue);

                $query->where(function ($inner) use ($channelValue, $slug) {
                    $inner->where('slug', $slug)
                        ->orWhere('name', $channelValue);
                });
            })
            ->orderBy('sort_order')
            ->first();

        if (! $channel) {
            return redirect()->route('public.watch');
        }

        return redirect()->route('public.watch.channel', array_filter([
            'slug' => $channel->slug,
            'video' => $videoValue ?: null,
        ]));
    })->name('public.watch.legacy');

    /*
    |--------------------------------------------------------------------------
    | Live Streaming Hub — /live
    |--------------------------------------------------------------------------
    | Displays currently live streams and upcoming scheduled streams.
    */
    Route::get('live', function () {
        $liveNow  = LiveStream::live()->orderBy('order_column')->get();
        $upcoming = LiveStream::upcoming()->limit(20)->get();

        return Theme::scope('live', compact('liveNow', 'upcoming'))->render();
    })->name('public.live');

    /*
    |--------------------------------------------------------------------------
    | Live Streams API — /api/live-streams
    |--------------------------------------------------------------------------
    | Returns JSON of active live streams (for future mobile app use).
    */
    Route::get('api/live-streams', function () {
        $streams = LiveStream::live()
            ->orderBy('order_column')
            ->get(['id', 'title', 'embed_url', 'source_name', 'location', 'thumbnail', 'is_live', 'scheduled_at']);

        return response()->json([
            'data'  => $streams,
            'total' => $streams->count(),
        ]);
    })->name('api.live-streams');

    /*
    |--------------------------------------------------------------------------
    | Members Directory — /members
    |--------------------------------------------------------------------------
    | Public listing of all community members with search.
    */
    Route::get('members', function (Request $request) {
        $query = $request->input('q', '');

        $members = Member::query()
            ->where('status', 'activated')
            ->when($query, fn ($q) => $q->where(function ($sq) use ($query) {
                $sq->where('first_name', 'like', "%{$query}%")
                   ->orWhere('last_name', 'like', "%{$query}%")
                   ->orWhere('description', 'like', "%{$query}%");
            }))
            ->orderByDesc('created_at')
            ->paginate(24)
            ->withQueryString();

        $totalMembers = Member::where('status', 'activated')->count();
        $totalGroups  = CommunityGroup::where('status', 'published')->count();
        $totalTopics  = ForumTopic::where('status', 'published')->count();

        return Theme::scope('members', compact('members', 'query', 'totalMembers', 'totalGroups', 'totalTopics'))->render();
    })->name('public.members');

    /*
    |--------------------------------------------------------------------------
    | Listen / Audio — /listen
    |--------------------------------------------------------------------------
    | Browse Catholic audio content (posts with 'audio' meta key).
    */
    /*
    |--------------------------------------------------------------------------
    | Podcast Shows Directory — /listen
    |--------------------------------------------------------------------------
    | Grid of all active podcast shows (like the YouTube channel list).
    */
    Route::get('listen', function (Request $request) {
        $category = trim((string) $request->input('category', ''));
        $sort = $request->input('sort', 'name');

        $shows = PodcastShow::query()
            ->active()
            ->withCount('episodes')
            ->when($category !== '', fn ($query) => $query->where('category', $category))
            ->when(
                $sort === 'episodes',
                fn ($query) => $query->orderByDesc('episodes_count')->orderBy('name'),
                fn ($query) => $query->orderBy('sort_order')->orderBy('name')
            )
            ->get();

        $categories = PodcastShow::query()
            ->active()
            ->whereNotNull('category')
            ->where('category', '!=', '')
            ->distinct()
            ->orderBy('category')
            ->pluck('category');

        return Theme::scope('listen-shows', compact('shows', 'categories', 'category', 'sort'))->render();
    })->name('public.listen');

    /*
    |--------------------------------------------------------------------------
    | Podcast Show Episodes — /listen/{slug}
    |--------------------------------------------------------------------------
    | Individual show page with episode list + audio player.
    */
    Route::get('listen/{slug}', function (Request $request, string $slug) {
        $show = PodcastShow::query()
            ->active()
            ->withCount('episodes')
            ->where('slug', $slug)
            ->firstOrFail();

        $episodes = PodcastEpisode::query()
            ->where('podcast_show_id', $show->id)
            ->orderByDesc('is_featured')
            ->orderByDesc('published_at')
            ->orderByDesc('episode_number')
            ->paginate(18)
            ->withQueryString();

        $selectedEpisode = null;
        $epId = (int) $request->input('episode', 0);

        if ($epId > 0) {
            $selectedEpisode = PodcastEpisode::query()
                ->where('podcast_show_id', $show->id)
                ->find($epId);
        }

        $selectedEpisode ??= $episodes->first();

        return Theme::scope('listen-show', compact('show', 'episodes', 'selectedEpisode'))->render();
    })->name('public.listen.show');

    /*
    |--------------------------------------------------------------------------
    | Saints Directory — /saints
    |--------------------------------------------------------------------------
    | Browse posts from the Saints & Feast Days category with A-Z filter.
    */
    Route::get('saints', function (Request $request) {
        $query  = $request->input('q', '');
        $letter = $request->input('letter', '');

        // Category ID 3 = Saints & Feast Days
        $saintsQuery = Post::query()
            ->with(['slugable', 'categories', 'tags'])
            ->wherePublished()
            ->whereHas('categories', fn ($q) => $q->where('id', 3))
            ->when($query, fn ($q) => $q->where('name', 'like', "%{$query}%"))
            ->when($letter, fn ($q) => $q->where('name', 'like', "{$letter}%"))
            ->orderBy('name');

        $saints = $saintsQuery->paginate(18)->withQueryString();

        // Build available letters for A-Z filter
        $availableLetters = Post::query()
            ->wherePublished()
            ->whereHas('categories', fn ($q) => $q->where('id', 3))
            ->selectRaw('UPPER(LEFT(name, 1)) as letter')
            ->distinct()
            ->orderBy('letter')
            ->pluck('letter')
            ->toArray();

        return Theme::scope('saints', compact('saints', 'query', 'letter', 'availableLetters'))->render();
    })->name('public.saints');

});
