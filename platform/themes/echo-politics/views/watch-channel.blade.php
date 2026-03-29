@php
    Theme::layout('full-width');
    SeoHelper::setTitle(__('plugins/watch-manager::watch.seo.channel_title', ['channel' => $channel->name]));
    SeoHelper::setDescription($channel->description ?: __('plugins/watch-manager::watch.seo.channel_description', ['channel' => $channel->name]));
@endphp

<style>
:root{--wv-primary:#046bd2;--wv-gold:#c9a227;--wv-page:#f4f7fb;--wv-card:#fff;--wv-border:#e2e8f0;--wv-heading:#0f172a;--wv-body:#475569;--wv-muted:#94a3b8}
html[data-theme='dark']{--wv-page:#0d1117;--wv-card:#141a27;--wv-border:rgba(255,255,255,.08);--wv-heading:#e8f0fe;--wv-body:rgba(226,232,240,.78);--wv-muted:#64748b}
.acm-watch-channel{background:var(--wv-page);padding-bottom:80px}.acm-watch-shell{padding-top:34px}.acm-watch-back{display:inline-flex;align-items:center;gap:8px;color:var(--wv-primary);text-decoration:none;font-weight:700;margin-bottom:18px}.acm-watch-back:hover{color:var(--wv-gold);text-decoration:none}.acm-watch-header{background:linear-gradient(135deg,#091523 0%,#0d2a4e 52%,#091523 100%);border-radius:22px;overflow:hidden;margin-bottom:28px;color:#f8fbff}.acm-watch-banner{height:220px;background:linear-gradient(135deg,#10213b,#173c6b)}.acm-watch-banner img{width:100%;height:100%;object-fit:cover;display:block}.acm-watch-header-body{display:flex;align-items:end;gap:22px;padding:0 28px 28px;margin-top:-58px;flex-wrap:wrap}.acm-watch-logo{width:116px;height:116px;border-radius:24px;overflow:hidden;border:5px solid #fff;background:#fff;box-shadow:0 14px 34px rgba(15,23,42,.22);flex-shrink:0}.acm-watch-logo img{width:100%;height:100%;object-fit:cover}.acm-watch-channel-copy{flex:1;min-width:260px}.acm-watch-channel-copy h1{margin:0 0 10px;font-family:'Playfair Display',Georgia,serif;font-size:clamp(2rem,4vw,2.9rem);font-weight:700;letter-spacing:-.025em}.acm-watch-channel-copy p{margin:0;color:rgba(226,232,240,.78);font-size:1rem;line-height:1.7}.acm-watch-channel-actions{display:flex;align-items:center;gap:10px;flex-wrap:wrap}.acm-watch-badge,.acm-watch-cta{display:inline-flex;align-items:center;gap:8px;border-radius:999px;padding:10px 16px;font-size:.9rem;font-weight:700;text-decoration:none}.acm-watch-badge{background:rgba(201,162,39,.12);color:#f3cb58;border:1px solid rgba(201,162,39,.3)}.acm-watch-cta{background:#fff;color:#0f172a}.acm-watch-cta:hover{color:var(--wv-primary);text-decoration:none}.acm-watch-player{background:var(--wv-card);border:1px solid var(--wv-border);border-radius:20px;overflow:hidden;box-shadow:0 10px 28px rgba(15,23,42,.06);margin-bottom:26px}.acm-watch-embed{position:relative;aspect-ratio:16/9;background:#020617}.acm-watch-embed iframe{width:100%;height:100%;border:0;display:block}.acm-watch-player-copy{padding:22px 24px 24px}.acm-watch-player-copy h2{margin:0 0 8px;color:var(--wv-heading);font-size:1.5rem;line-height:1.35}.acm-watch-player-meta{display:flex;align-items:center;gap:14px;flex-wrap:wrap;margin-bottom:14px;color:var(--wv-muted);font-size:.88rem;font-weight:600}.acm-watch-player-desc{color:var(--wv-body);font-size:.96rem;line-height:1.8;margin:0}.acm-watch-grid{--bs-gutter-x:22px;--bs-gutter-y:22px}.acm-watch-card{display:block;background:var(--wv-card);border:1px solid var(--wv-border);border-radius:18px;overflow:hidden;text-decoration:none;box-shadow:0 8px 22px rgba(15,23,42,.05);height:100%;transition:transform .25s ease,box-shadow .25s ease,border-color .25s ease}.acm-watch-card:hover{transform:translateY(-4px);box-shadow:0 16px 34px rgba(15,23,42,.10);border-color:rgba(4,107,210,.22);text-decoration:none}.acm-watch-card--active{border-color:rgba(201,162,39,.55);box-shadow:0 0 0 2px rgba(201,162,39,.18),0 16px 34px rgba(15,23,42,.10)}.acm-watch-thumb{position:relative;aspect-ratio:16/9;overflow:hidden;background:#0f172a}.acm-watch-thumb img{width:100%;height:100%;object-fit:cover;display:block}.acm-watch-pill{position:absolute;top:12px;left:12px;display:inline-flex;align-items:center;gap:6px;padding:5px 10px;border-radius:999px;background:rgba(4,107,210,.9);color:#fff;font-size:.72rem;font-weight:700;text-transform:uppercase;letter-spacing:.05em}.acm-watch-pill--live{background:rgba(220,38,38,.92)}.acm-watch-body{padding:16px 18px 18px}.acm-watch-body h3{margin:0 0 8px;color:var(--wv-heading);font-size:1.04rem;line-height:1.45;font-weight:700}.acm-watch-card-meta{display:flex;align-items:center;gap:10px;flex-wrap:wrap;color:var(--wv-muted);font-size:.82rem;font-weight:600}.acm-watch-empty{background:var(--wv-card);border:1px solid var(--wv-border);border-radius:18px;padding:38px 26px;text-align:center;color:var(--wv-body)}.acm-watch-pagination{margin-top:28px;display:flex;justify-content:center}
</style>

<div class="acm-watch-channel">
    <div class="container acm-watch-shell">
        <a href="{{ route('public.watch') }}" class="acm-watch-back">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><line x1="19" y1="12" x2="5" y2="12"/><polyline points="12 19 5 12 12 5"/></svg>
            {{ __('plugins/watch-manager::watch.frontend.back_to_channels') }}
        </a>

        <section class="acm-watch-header">
            <div class="acm-watch-banner">
                @if ($channel->banner)
                    <img src="{{ $channel->banner }}" alt="{{ $channel->name }}">
                @endif
            </div>
            <div class="acm-watch-header-body">
                <div class="acm-watch-logo">
                    @if ($channel->thumbnail)
                        <img src="{{ $channel->thumbnail }}" alt="{{ $channel->name }}">
                    @endif
                </div>
                <div class="acm-watch-channel-copy">
                    <h1>{{ $channel->name }}</h1>
                    <p>{{ $channel->description ?: __('plugins/watch-manager::watch.frontend.channel_fallback_watch_description') }}</p>
                </div>
                <div class="acm-watch-channel-actions">
                    <span class="acm-watch-badge">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                        {{ trans_choice('plugins/watch-manager::watch.video_count', $channel->videos_count, ['count' => number_format($channel->videos_count)]) }}
                    </span>
                    @if ($selectedVideo)
                        <a href="{{ $selectedVideo->video_url }}" target="_blank" rel="noopener noreferrer" class="acm-watch-cta">{{ __('plugins/watch-manager::watch.frontend.open_on_youtube') }}</a>
                    @endif
                </div>
            </div>
        </section>

        @if ($selectedVideo)
            <section class="acm-watch-player">
                <div class="acm-watch-embed">
                    <iframe src="{{ $selectedVideo->embed_url }}?autoplay=0&rel=0&modestbranding=1" allowfullscreen title="{{ $selectedVideo->title }}"></iframe>
                </div>
                <div class="acm-watch-player-copy">
                    <h2>{{ $selectedVideo->title }}</h2>
                    <div class="acm-watch-player-meta">
                        @if ($selectedVideo->published_at)
                            <span>{{ $selectedVideo->published_at->format('M j, Y') }}</span>
                        @endif
                        <span>{{ number_format($selectedVideo->view_count) }} {{ __('plugins/watch-manager::watch.frontend.views') }}</span>
                        @if ($selectedVideo->is_live)
                            <span>{{ __('plugins/watch-manager::watch.frontend.live_now') }}</span>
                        @endif
                    </div>
                    @if ($selectedVideo->description)
                        <p class="acm-watch-player-desc">{{ \Illuminate\Support\Str::limit($selectedVideo->description, 260) }}</p>
                    @endif
                </div>
            </section>
        @endif

        @if ($videos->isEmpty())
            <div class="acm-watch-empty">
                <h3>{{ __('plugins/watch-manager::watch.frontend.no_videos_title') }}</h3>
                <p class="mb-0">{{ __('plugins/watch-manager::watch.frontend.no_videos_description') }}</p>
            </div>
        @else
            <div class="row acm-watch-grid">
                @foreach ($videos as $video)
                    <div class="col-xl-4 col-md-6">
                        <a href="{{ route('public.watch.channel', ['slug' => $channel->slug, 'video' => $video->youtube_video_id]) }}" class="acm-watch-card @if($selectedVideo && $selectedVideo->id === $video->id) acm-watch-card--active @endif">
                            <div class="acm-watch-thumb">
                                @if ($video->thumbnail)
                                    <img src="{{ $video->thumbnail }}" alt="{{ $video->title }}">
                                @endif
                                <span class="acm-watch-pill @if($video->is_live) acm-watch-pill--live @endif">@if($video->is_live){{ __('plugins/watch-manager::watch.frontend.live') }}@else{{ __('plugins/watch-manager::watch.frontend.watch') }}@endif</span>
                            </div>
                            <div class="acm-watch-body">
                                <h3>{{ $video->title }}</h3>
                                <div class="acm-watch-card-meta">
                                    @if ($video->published_at)
                                        <span>{{ $video->published_at->format('M j, Y') }}</span>
                                    @endif
                                    <span>{{ number_format($video->view_count) }} {{ __('plugins/watch-manager::watch.frontend.views') }}</span>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>

            @if ($videos->hasPages())
                <div class="acm-watch-pagination">
                    {!! $videos->withQueryString()->links(Theme::getThemeNamespace('partials.pagination')) !!}
                </div>
            @endif
        @endif
    </div>
</div>
