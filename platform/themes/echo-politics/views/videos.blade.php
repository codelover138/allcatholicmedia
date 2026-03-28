@php
    Theme::set('pageTitle', __('Catholic Video Library'));
    Theme::layout('full-width');

    SeoHelper::setTitle('Catholic Video Library | AllCatholicMedia');
    SeoHelper::setDescription('Browse Catholic videos — Mass, Rosary, Adoration, Divine Mercy, Homilies, and more. Filter by topic or Mass type.');
@endphp

{{-- ── Page Hero ─────────────────────────────────────────────────── --}}
<section class="echo-hero-section inner echo-feature-area acm-videos-hero">
    <div class="container">
        <div class="acm-videos-hero-inner">
            <h1 class="acm-videos-title">
                <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="acm-title-icon"><polygon points="23 7 16 12 23 17 23 7"/><rect x="1" y="5" width="15" height="14" rx="2" ry="2"/></svg>
                {{ __('Catholic Video Library') }}
            </h1>
            <p class="acm-videos-subtitle">{{ __('Mass, Rosary, Adoration, Homilies and more — all in one place.') }}</p>
        </div>
    </div>
</section>

{{-- ── Filter Bar ───────────────────────────────────────────────────── --}}
<div class="acm-filter-bar">
    <div class="container">
        <form method="GET" action="{{ route('public.videos') }}" class="acm-filter-form">
            <div class="acm-filter-inner">

                {{-- Topic / Tag filter --}}
                <div class="acm-filter-group">
                    <label class="acm-filter-label">{{ __('Topic') }}</label>
                    <div class="acm-filter-chips">
                        <a href="{{ route('public.videos', ['sort' => $sort]) }}"
                           class="acm-chip @if(!$tagId) acm-chip--active @endif">
                            {{ __('All') }}
                        </a>
                        @foreach($videoTags as $tag)
                            <a href="{{ route('public.videos', ['tag' => $tag->id, 'sort' => $sort]) }}"
                               class="acm-chip @if($tagId == $tag->id) acm-chip--active @endif">
                                {{ $tag->name }}
                            </a>
                        @endforeach
                    </div>
                </div>

                {{-- Sort --}}
                <div class="acm-filter-sort">
                    <label class="acm-filter-label">{{ __('Sort') }}</label>
                    <select name="sort" class="acm-sort-select" onchange="this.form.submit()">
                        <option value="latest"  @selected($sort === 'latest')>{{ __('Latest') }}</option>
                        <option value="popular" @selected($sort === 'popular')>{{ __('Most Viewed') }}</option>
                    </select>
                    @if($tagId)
                        <input type="hidden" name="tag" value="{{ $tagId }}">
                    @endif
                </div>

            </div>
        </form>
    </div>
</div>

{{-- ── Video Grid ───────────────────────────────────────────────────── --}}
<section class="acm-videos-grid-section">
    <div class="container">

        @if($videos->isEmpty())
            <div class="acm-no-results">
                <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                <p>{{ __('No videos found. Try a different topic.') }}</p>
                <a href="{{ route('public.videos') }}" class="acm-btn-outline">{{ __('Clear filters') }}</a>
            </div>
        @else
            <div class="row acm-video-grid">
                @foreach($videos as $post)
                    @php
                        $videoUrl = echo_get_post_video_url($post);
                        $embedUrl = null;
                        if ($videoUrl && str_contains($videoUrl, 'youtube.com')) {
                            $videoId  = \Botble\Theme\Supports\Youtube::getYoutubeVideoID($videoUrl);
                            $embedUrl = 'https://www.youtube.com/embed/' . $videoId;
                            $thumbUrl = 'https://img.youtube.com/vi/' . $videoId . '/hqdefault.jpg';
                        } elseif ($videoUrl && str_contains($videoUrl, 'vimeo.com')) {
                            preg_match('/vimeo\.com\/(\d+)/', $videoUrl, $m);
                            $embedUrl = isset($m[1]) ? 'https://player.vimeo.com/video/' . $m[1] : null;
                            $thumbUrl = $post->image ? RvMedia::getImageUrl($post->image) : null;
                        }
                        $thumbUrl ??= ($post->image ? RvMedia::getImageUrl($post->image, 'large') : null);
                        $category  = $post->firstCategory;
                    @endphp

                    <div class="col-xl-4 col-lg-4 col-md-6 col-12 acm-video-col">
                        <div class="acm-video-card">
                            {{-- Thumbnail with play overlay --}}
                            <div class="acm-video-thumb" data-embed="{{ $embedUrl }}">
                                @if($thumbUrl)
                                    <img src="{{ $thumbUrl }}" alt="{{ $post->name }}" loading="lazy">
                                @else
                                    <div class="acm-video-thumb-placeholder"></div>
                                @endif
                                <div class="acm-play-overlay">
                                    <span class="acm-play-btn">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor"><polygon points="5 3 19 12 5 21 5 3"/></svg>
                                    </span>
                                </div>
                            </div>

                            {{-- Inline embed (hidden until play clicked) --}}
                            @if($embedUrl)
                                <div class="acm-video-embed" style="display:none">
                                    <div class="acm-embed-wrapper">
                                        <iframe src="" data-src="{{ $embedUrl }}?autoplay=1&rel=0"
                                                frameborder="0"
                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                allowfullscreen></iframe>
                                        <button class="acm-embed-close" aria-label="{{ __('Close video') }}">
                                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
                                        </button>
                                    </div>
                                </div>
                            @endif

                            {{-- Meta --}}
                            <div class="acm-video-meta">
                                @if($category)
                                    <a href="{{ $category->url }}" class="acm-video-cat-badge">{{ $category->name }}</a>
                                @endif

                                <h3 class="acm-video-title">
                                    <a href="{{ $post->url }}" title="{{ $post->name }}">{{ $post->name }}</a>
                                </h3>

                                @if($post->description)
                                    <p class="acm-video-desc">{{ Str::limit($post->description, 100) }}</p>
                                @endif

                                <div class="acm-video-footer">
                                    <span class="acm-view-count">
                                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                                        {{ number_format($post->views) }}
                                    </span>
                                    @if($post->tags->isNotEmpty())
                                        <div class="acm-video-tags">
                                            @foreach($post->tags->take(2) as $tag)
                                                <a href="{{ route('public.videos', ['tag' => $tag->id]) }}" class="acm-tag-link">{{ $tag->name }}</a>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Pagination --}}
            @if($videos->hasPages())
                <div class="acm-pagination">
                    {!! $videos->withQueryString()->links(Theme::getThemeNamespace('partials.pagination')) !!}
                </div>
            @endif
        @endif

    </div>
</section>

{{-- ── Inline styles for this view ─────────────────────────────────── --}}
@push('header')
<style>
/* Videos Hero */
.acm-videos-hero { padding: 40px 0 24px; }
.acm-videos-hero-inner { text-align: center; }
.acm-videos-title {
    display: inline-flex; align-items: center; gap: 10px;
    font-size: clamp(1.6rem, 3vw, 2.2rem);
    font-weight: 700; color: var(--color-heading-1);
    margin-bottom: 8px;
}
.acm-title-icon { color: var(--color-primary); flex-shrink: 0; }
.acm-videos-subtitle { color: var(--color-body); font-size: 1rem; margin: 0; }

/* Filter Bar */
.acm-filter-bar {
    background: #f8fafc;
    border-top: 1px solid #e2e8f0;
    border-bottom: 1px solid #e2e8f0;
    padding: 14px 0;
    margin-bottom: 36px;
    position: sticky;
    top: 0;
    z-index: 100;
}
html[data-theme='dark'] .acm-filter-bar {
    background: #1e293b;
    border-color: rgba(255,255,255,0.07);
}
.acm-filter-form { width: 100%; }
.acm-filter-inner {
    display: flex;
    align-items: center;
    gap: 20px;
    flex-wrap: wrap;
}
.acm-filter-label {
    font-size: 0.75rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.06em;
    color: var(--color-body);
    white-space: nowrap;
    margin-bottom: 0;
}
.acm-filter-group {
    display: flex;
    align-items: center;
    gap: 10px;
    flex: 1;
    flex-wrap: wrap;
}
.acm-filter-chips {
    display: flex;
    flex-wrap: wrap;
    gap: 6px;
}
.acm-chip {
    display: inline-block;
    padding: 4px 14px;
    border-radius: 20px;
    font-size: 0.82rem;
    font-weight: 500;
    background: #fff;
    border: 1px solid #e2e8f0;
    color: var(--color-heading-1);
    text-decoration: none;
    transition: all 0.15s;
    white-space: nowrap;
}
html[data-theme='dark'] .acm-chip {
    background: #2d3748; border-color: rgba(255,255,255,0.1); color: rgba(255,255,255,0.8);
}
.acm-chip:hover { border-color: var(--color-primary); color: var(--color-primary); }
.acm-chip--active {
    background: var(--color-primary);
    border-color: var(--color-primary);
    color: #fff !important;
}
.acm-filter-sort {
    display: flex;
    align-items: center;
    gap: 8px;
    flex-shrink: 0;
}
.acm-sort-select {
    border: 1px solid #e2e8f0;
    border-radius: 6px;
    padding: 5px 10px;
    font-size: 0.85rem;
    background: #fff;
    color: var(--color-heading-1);
    cursor: pointer;
}
html[data-theme='dark'] .acm-sort-select {
    background: #2d3748; border-color: rgba(255,255,255,0.1); color: rgba(255,255,255,0.8);
}

/* Video Grid */
.acm-videos-grid-section { padding-bottom: 60px; }
.acm-video-grid { row-gap: 28px; }
.acm-video-col { margin-bottom: 4px; }
.acm-video-card {
    border-radius: 8px;
    overflow: hidden;
    background: #fff;
    box-shadow: 0 1px 3px rgba(0,0,0,.06), 0 1px 2px rgba(0,0,0,.04);
    transition: box-shadow 0.2s, transform 0.2s;
    height: 100%;
}
.acm-video-card:hover {
    box-shadow: 0 8px 24px rgba(0,0,0,.10);
    transform: translateY(-2px);
}
html[data-theme='dark'] .acm-video-card { background: #1e293b; }

/* Thumbnail */
.acm-video-thumb {
    position: relative;
    aspect-ratio: 16 / 9;
    overflow: hidden;
    cursor: pointer;
    background: #0f172a;
}
.acm-video-thumb img {
    width: 100%; height: 100%;
    object-fit: cover;
    display: block;
    transition: transform 0.3s;
}
.acm-video-card:hover .acm-video-thumb img { transform: scale(1.04); }
.acm-video-thumb-placeholder { width: 100%; height: 100%; background: linear-gradient(135deg, #1e3a5f, #046bd2); }
.acm-play-overlay {
    position: absolute; inset: 0;
    display: flex; align-items: center; justify-content: center;
    background: rgba(0,0,0,0.25);
    transition: background 0.2s;
}
.acm-video-thumb:hover .acm-play-overlay { background: rgba(0,0,0,0.4); }
.acm-play-btn {
    width: 52px; height: 52px;
    background: rgba(4, 107, 210, 0.9);
    border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
    color: #fff;
    transform: scale(1);
    transition: transform 0.2s, background 0.2s;
}
.acm-video-thumb:hover .acm-play-btn {
    transform: scale(1.1);
    background: var(--color-primary, #046bd2);
}

/* Inline embed */
.acm-video-embed { position: relative; }
.acm-embed-wrapper {
    position: relative;
    aspect-ratio: 16 / 9;
    background: #000;
}
.acm-embed-wrapper iframe {
    width: 100%; height: 100%;
    border: 0; display: block;
}
.acm-embed-close {
    position: absolute; top: 8px; right: 8px;
    background: rgba(0,0,0,0.7);
    border: none; color: #fff;
    width: 28px; height: 28px;
    border-radius: 50%;
    cursor: pointer;
    display: flex; align-items: center; justify-content: center;
}
.acm-embed-close:hover { background: rgba(0,0,0,0.9); }

/* Video meta */
.acm-video-meta { padding: 14px 16px 16px; }
.acm-video-cat-badge {
    display: inline-block;
    font-size: 0.7rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    color: #fff;
    background: var(--color-primary, #046bd2);
    padding: 2px 8px;
    border-radius: 3px;
    margin-bottom: 8px;
    text-decoration: none;
}
.acm-video-title {
    font-size: 0.95rem;
    font-weight: 600;
    line-height: 1.4;
    margin: 0 0 6px;
    color: var(--color-heading-1);
}
.acm-video-title a {
    color: inherit;
    text-decoration: none;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
.acm-video-title a:hover { color: var(--color-primary, #046bd2); }
.acm-video-desc {
    font-size: 0.83rem;
    color: var(--color-body);
    margin: 0 0 10px;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
.acm-video-footer {
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 6px;
}
.acm-view-count {
    display: inline-flex;
    align-items: center;
    gap: 4px;
    font-size: 0.78rem;
    color: var(--color-body);
}
.acm-video-tags { display: flex; gap: 4px; flex-wrap: wrap; }
.acm-tag-link {
    font-size: 0.72rem;
    color: var(--color-primary, #046bd2);
    text-decoration: none;
    padding: 1px 6px;
    border: 1px solid currentColor;
    border-radius: 3px;
    white-space: nowrap;
}
.acm-tag-link:hover { background: var(--color-primary, #046bd2); color: #fff; }

/* No results */
.acm-no-results {
    text-align: center;
    padding: 80px 20px;
    color: var(--color-body);
}
.acm-no-results svg { opacity: 0.3; margin-bottom: 16px; }
.acm-no-results p { font-size: 1.1rem; margin-bottom: 20px; }
.acm-btn-outline {
    display: inline-block;
    padding: 8px 20px;
    border: 1px solid var(--color-primary, #046bd2);
    color: var(--color-primary, #046bd2);
    border-radius: 6px;
    text-decoration: none;
    font-size: 0.9rem;
    transition: all 0.2s;
}
.acm-btn-outline:hover { background: var(--color-primary); color: #fff; }

/* Pagination */
.acm-pagination { margin-top: 40px; display: flex; justify-content: center; }

/* Responsive */
@media (max-width: 767px) {
    .acm-filter-inner { gap: 12px; }
    .acm-videos-hero { padding: 24px 0 16px; }
    .acm-filter-bar { position: static; }
}
</style>
@endpush

{{-- ── Inline JS for play/close ─────────────────────────────────── --}}
@push('footer')
<script>
(function() {
    'use strict';
    document.querySelectorAll('.acm-video-thumb').forEach(function(thumb) {
        thumb.addEventListener('click', function() {
            var card   = thumb.closest('.acm-video-card');
            var embed  = card.querySelector('.acm-video-embed');
            if (!embed) return;
            var iframe = embed.querySelector('iframe');
            if (iframe && !iframe.src) {
                iframe.src = iframe.dataset.src;
            }
            thumb.style.display = 'none';
            embed.style.display = 'block';
        });
    });
    document.querySelectorAll('.acm-embed-close').forEach(function(btn) {
        btn.addEventListener('click', function() {
            var card  = btn.closest('.acm-video-card');
            var embed = card.querySelector('.acm-video-embed');
            var thumb = card.querySelector('.acm-video-thumb');
            var iframe = embed.querySelector('iframe');
            if (iframe) iframe.src = '';
            embed.style.display = 'none';
            thumb.style.display = '';
        });
    });
})();
</script>
@endpush
