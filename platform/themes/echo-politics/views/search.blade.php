@php
    use Acm\Community\Models\CommunityGroup;
    use Acm\Community\Models\ForumTopic;
    use Acm\LiveStream\Models\LiveStream;
    use Botble\Blog\Models\Post;

    Theme::set('pageTitle', __('Search Results'));
    Theme::layout('full-width');

    $query = request()->input('q', '');
    $tab   = request()->input('tab', 'articles');

    // Additional result sets (beyond $posts passed by blog controller)
    $videos = collect();
    $streams = collect();
    $topics = collect();
    $groups = collect();

    if ($query) {
        $videos = Post::query()
            ->with(['slugable', 'categories'])
            ->wherePublished()
            ->whereHas('metadata', fn ($q) => $q->where('meta_key', 'video_url')->whereNotNull('meta_value')->where('meta_value', '!=', ''))
            ->where('name', 'like', "%{$query}%")
            ->limit(8)
            ->get();

        $streams = LiveStream::published()
            ->where(fn ($q) => $q->where('title', 'like', "%{$query}%")->orWhere('source_name', 'like', "%{$query}%"))
            ->limit(6)
            ->get();

        $topics = ForumTopic::published()
            ->where(fn ($q) => $q->where('title', 'like', "%{$query}%")->orWhere('content', 'like', "%{$query}%"))
            ->with('category')
            ->limit(8)
            ->get();

        $groups = CommunityGroup::where('status', 'published')
            ->where(fn ($q) => $q->where('name', 'like', "%{$query}%")->orWhere('description', 'like', "%{$query}%"))
            ->limit(6)
            ->get();
    }

    // Tab counts
    $articleCount = $posts->total();
    $videoCount   = $videos->count();
    $streamCount  = $streams->count();
    $topicCount   = $topics->count();
    $groupCount   = $groups->count();

    SeoHelper::setTitle(__('Search: ":query" | AllCatholicMedia', ['query' => $query]));
@endphp

@push('header')
<style>
.acm-search-hero { background: linear-gradient(135deg,#0f172a,#1e293b); padding: 32px 0 24px; margin-bottom: 28px; }
.acm-search-form { max-width: 560px; margin: 0 auto; display: flex; gap: 0; border: 2px solid #046bd2; border-radius: 8px; overflow: hidden; }
.acm-search-form input { flex: 1; border: none; padding: 12px 16px; font-size: 1rem; background: #fff; color: #1e293b; outline: none; }
.acm-search-form button { background: #046bd2; color: #fff; border: none; padding: 12px 20px; cursor: pointer; font-weight: 600; }
.acm-search-form button:hover { background: #045cb4; }
.acm-search-title { color: #94a3b8; font-size: .9rem; text-align: center; margin-top: 10px; }
.acm-search-title strong { color: #f8fafc; }

/* Tabs */
.acm-tabs { display: flex; gap: 0; border-bottom: 2px solid var(--border-color,#e2e8f0); margin-bottom: 24px; overflow-x: auto; }
.acm-tab { padding: 10px 18px; font-size: .88rem; font-weight: 600; color: var(--color-body,#475569); border-bottom: 2px solid transparent; margin-bottom: -2px; cursor: pointer; white-space: nowrap; text-decoration: none; display: inline-block; }
.acm-tab:hover { color: #046bd2; }
.acm-tab.active { color: #046bd2; border-bottom-color: #046bd2; }
.acm-tab-badge { display: inline-flex; align-items: center; justify-content: center; background: #e2e8f0; color: #64748b; border-radius: 10px; font-size: .72rem; font-weight: 700; padding: 1px 7px; margin-left: 4px; }
.acm-tab.active .acm-tab-badge { background: #dbeafe; color: #046bd2; }

/* Article cards */
.acm-result-card { background: var(--bg-card,#fff); border: 1px solid var(--border-color,#e2e8f0); border-radius: 10px; padding: 16px; margin-bottom: 12px; display: flex; gap: 14px; align-items: flex-start; }
.acm-result-img { width: 72px; height: 60px; border-radius: 6px; object-fit: cover; flex-shrink: 0; background: #e2e8f0; }
.acm-result-title { font-size: .92rem; font-weight: 600; color: var(--color-heading-1,#1e293b); text-decoration: none; display: block; margin-bottom: 4px; }
.acm-result-title:hover { color: #046bd2; }
.acm-result-meta { font-size: .78rem; color: #94a3b8; }
.acm-result-badge { display: inline-block; background: #dbeafe; color: #046bd2; border-radius: 4px; font-size: .72rem; font-weight: 700; padding: 2px 8px; margin-right: 6px; }
.acm-result-badge.video { background: #fce7f3; color: #9d174d; }
.acm-result-badge.live { background: #dcfce7; color: #166534; }
.acm-result-badge.forum { background: #fef3c7; color: #92400e; }
.acm-result-badge.group { background: #ede9fe; color: #5b21b6; }

/* Empty */
.acm-no-results { text-align: center; padding: 48px 24px; color: var(--color-body,#475569); }
.acm-no-results h3 { font-size: 1.1rem; font-weight: 700; color: var(--color-heading-1,#1e293b); margin-bottom: 8px; }

/* Dark */
html[data-theme='dark'] .acm-result-card { background: #1a1d2e; border-color: rgba(255,255,255,.08); }
html[data-theme='dark'] .acm-result-title { color: #f1f5f9; }
html[data-theme='dark'] .acm-search-form input { background: #1a1d2e; color: #f1f5f9; }
html[data-theme='dark'] .acm-no-results h3 { color: #f1f5f9; }
</style>
@endpush

{{-- Search hero --}}
<section class="acm-search-hero">
    <div class="container">
        <form action="{{ route('public.search') }}" method="GET" class="acm-search-form">
            <input type="text" name="q" value="{{ $query }}" placeholder="{{ __('Search for articles, videos, streams, topics...') }}" autocomplete="off">
            <button type="submit">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.35-4.35"/></svg>
            </button>
        </form>
        @if($query)
            <p class="acm-search-title">{{ __('Results for') }} <strong>"{{ $query }}"</strong></p>
        @endif
    </div>
</section>

<div class="container" style="padding-bottom:60px">

    @if($query)
    {{-- Tab navigation --}}
    <div class="acm-tabs">
        <a href="{{ route('public.search', ['q' => $query, 'tab' => 'articles']) }}" class="acm-tab @if($tab==='articles') active @endif">
            {{ __('Articles') }} <span class="acm-tab-badge">{{ $articleCount }}</span>
        </a>
        @if($videoCount > 0)
        <a href="{{ route('public.search', ['q' => $query, 'tab' => 'videos']) }}" class="acm-tab @if($tab==='videos') active @endif">
            {{ __('Videos') }} <span class="acm-tab-badge">{{ $videoCount }}</span>
        </a>
        @endif
        @if($streamCount > 0)
        <a href="{{ route('public.search', ['q' => $query, 'tab' => 'streams']) }}" class="acm-tab @if($tab==='streams') active @endif">
            {{ __('Live Streams') }} <span class="acm-tab-badge">{{ $streamCount }}</span>
        </a>
        @endif
        @if($topicCount > 0)
        <a href="{{ route('public.search', ['q' => $query, 'tab' => 'topics']) }}" class="acm-tab @if($tab==='topics') active @endif">
            {{ __('Forum Topics') }} <span class="acm-tab-badge">{{ $topicCount }}</span>
        </a>
        @endif
        @if($groupCount > 0)
        <a href="{{ route('public.search', ['q' => $query, 'tab' => 'groups']) }}" class="acm-tab @if($tab==='groups') active @endif">
            {{ __('Groups') }} <span class="acm-tab-badge">{{ $groupCount }}</span>
        </a>
        @endif
    </div>

    {{-- ARTICLES tab --}}
    @if($tab === 'articles')
        @forelse($posts as $post)
            <div class="acm-result-card">
                @if($post->image)
                    <img src="{{ RvMedia::getImageUrl($post->image, 'thumb') }}" alt="{{ $post->name }}" class="acm-result-img" loading="lazy">
                @endif
                <div>
                    <span class="acm-result-badge">{{ __('Article') }}</span>
                    <a href="{{ $post->url }}" class="acm-result-title">{{ $post->name }}</a>
                    <div class="acm-result-meta">
                        {{ $post->created_at->format('M j, Y') }}
                        @if($post->categories->first())
                            · {{ $post->categories->first()->name }}
                        @endif
                    </div>
                </div>
            </div>
        @empty
            <div class="acm-no-results">
                <h3>{{ __('No articles found') }}</h3>
                <p>{{ __('Try different keywords or browse our categories.') }}</p>
            </div>
        @endforelse

        @if($posts->hasPages())
            <div style="margin-top:20px">
                {!! $posts->appends(['q' => $query, 'tab' => 'articles'])->links(Theme::getThemeNamespace('partials.pagination')) !!}
            </div>
        @endif

    {{-- VIDEOS tab --}}
    @elseif($tab === 'videos')
        @forelse($videos as $video)
            <div class="acm-result-card">
                @if($video->image)
                    <img src="{{ RvMedia::getImageUrl($video->image, 'thumb') }}" alt="{{ $video->name }}" class="acm-result-img" loading="lazy">
                @endif
                <div>
                    <span class="acm-result-badge video">{{ __('Video') }}</span>
                    <a href="{{ $video->url }}" class="acm-result-title">{{ $video->name }}</a>
                    <div class="acm-result-meta">{{ $video->created_at->format('M j, Y') }}</div>
                </div>
            </div>
        @empty
            <div class="acm-no-results"><h3>{{ __('No videos found') }}</h3></div>
        @endforelse

    {{-- STREAMS tab --}}
    @elseif($tab === 'streams')
        @forelse($streams as $stream)
            <div class="acm-result-card">
                @if($stream->thumbnail)
                    <img src="{{ RvMedia::getImageUrl($stream->thumbnail, 'thumb') }}" alt="{{ $stream->title }}" class="acm-result-img" loading="lazy">
                @endif
                <div>
                    <span class="acm-result-badge live">{{ $stream->is_live ? __('Live') : __('Stream') }}</span>
                    <a href="{{ route('public.live') }}" class="acm-result-title">{{ $stream->title }}</a>
                    <div class="acm-result-meta">
                        {{ $stream->source_name }}
                        @if($stream->location) · {{ $stream->location }} @endif
                    </div>
                </div>
            </div>
        @empty
            <div class="acm-no-results"><h3>{{ __('No streams found') }}</h3></div>
        @endforelse

    {{-- FORUM TOPICS tab --}}
    @elseif($tab === 'topics')
        @forelse($topics as $topic)
            <div class="acm-result-card">
                <div>
                    <span class="acm-result-badge forum">{{ __('Forum') }}</span>
                    <a href="{{ route('public.community.forum.topic', $topic->slug) }}" class="acm-result-title">{{ $topic->title }}</a>
                    <div class="acm-result-meta">
                        {{ $topic->category->name ?? '' }} · {{ $topic->created_at->diffForHumans() }}
                        · {{ $topic->replies_count }} {{ __('replies') }}
                    </div>
                </div>
            </div>
        @empty
            <div class="acm-no-results"><h3>{{ __('No forum topics found') }}</h3></div>
        @endforelse

    {{-- GROUPS tab --}}
    @elseif($tab === 'groups')
        @forelse($groups as $group)
            <div class="acm-result-card">
                @if($group->cover_image)
                    <img src="{{ RvMedia::getImageUrl($group->cover_image, 'thumb') }}" alt="{{ $group->name }}" class="acm-result-img" loading="lazy">
                @endif
                <div>
                    <span class="acm-result-badge group">{{ __('Group') }}</span>
                    <a href="{{ route('public.community.groups.show', $group->slug) }}" class="acm-result-title">{{ $group->name }}</a>
                    <div class="acm-result-meta">{{ $group->members_count }} {{ __('members') }}</div>
                </div>
            </div>
        @empty
            <div class="acm-no-results"><h3>{{ __('No groups found') }}</h3></div>
        @endforelse
    @endif

    @else
    {{-- No query yet --}}
    <div class="acm-no-results">
        <h3>{{ __('Search AllCatholicMedia') }}</h3>
        <p>{{ __('Find articles, videos, live streams, forum topics, and community groups.') }}</p>
    </div>
    @endif

</div>
