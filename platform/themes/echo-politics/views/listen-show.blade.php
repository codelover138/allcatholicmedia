@php
    Theme::layout('full-width');
    SeoHelper::setTitle($show->name . ' | AllCatholicMedia Listen');
    SeoHelper::setDescription($show->description ?: 'Listen to episodes from ' . $show->name . ' on AllCatholicMedia.');
@endphp

<style>
:root{--lv-primary:#046bd2;--lv-green:#2d8a3e;--lv-gold:#c9a227;--lv-page:#f4f7fb;--lv-card:#fff;--lv-border:#e2e8f0;--lv-heading:#0f172a;--lv-body:#475569;--lv-muted:#94a3b8}
html[data-theme='dark']{--lv-page:#0d1117;--lv-card:#141a27;--lv-border:rgba(255,255,255,.08);--lv-heading:#e8f0fe;--lv-body:rgba(226,232,240,.78);--lv-muted:#64748b}

.acm-lshow{background:var(--lv-page);padding-bottom:80px}
.acm-lshow-shell{padding-top:34px}
.acm-lshow-back{display:inline-flex;align-items:center;gap:8px;color:var(--lv-green);text-decoration:none;font-weight:700;margin-bottom:18px}
.acm-lshow-back:hover{color:var(--lv-gold);text-decoration:none}
.acm-lshow-header{background:linear-gradient(135deg,#0d1b0e 0%,#1a3320 52%,#0d1b0e 100%);border-radius:22px;overflow:hidden;margin-bottom:28px;color:#f8fbff}
.acm-lshow-banner{height:220px;background:linear-gradient(135deg,#0d1b0e,#1a3320)}
.acm-lshow-banner img{width:100%;height:100%;object-fit:cover;display:block}
.acm-lshow-header-body{display:flex;align-items:end;gap:22px;padding:0 28px 28px;margin-top:-58px;flex-wrap:wrap}
.acm-lshow-logo{width:116px;height:116px;border-radius:24px;overflow:hidden;border:5px solid #fff;background:#fff;box-shadow:0 14px 34px rgba(15,23,42,.22);flex-shrink:0}
.acm-lshow-logo img{width:100%;height:100%;object-fit:cover}
.acm-lshow-logo-placeholder{width:100%;height:100%;display:flex;align-items:center;justify-content:center;background:linear-gradient(135deg,#1a3320,#2d5a3d);font-size:2.6rem}
.acm-lshow-copy{flex:1;min-width:260px}
.acm-lshow-copy h1{margin:0 0 10px;font-family:'Playfair Display',Georgia,serif;font-size:clamp(1.8rem,4vw,2.7rem);font-weight:700;letter-spacing:-.025em}
.acm-lshow-copy p{margin:0;color:rgba(226,232,240,.78);font-size:1rem;line-height:1.7}
.acm-lshow-actions{display:flex;align-items:center;gap:10px;flex-wrap:wrap}
.acm-lshow-badge{display:inline-flex;align-items:center;gap:8px;border-radius:999px;padding:10px 16px;font-size:.9rem;font-weight:700;background:rgba(201,162,39,.12);color:#f3cb58;border:1px solid rgba(201,162,39,.3)}
.acm-lshow-cta{display:inline-flex;align-items:center;gap:8px;border-radius:999px;padding:10px 16px;font-size:.9rem;font-weight:700;background:#fff;color:#0f172a;text-decoration:none}
.acm-lshow-cta:hover{color:var(--lv-green);text-decoration:none}

/* Player */
.acm-lshow-player{background:var(--lv-card);border:1px solid var(--lv-border);border-radius:20px;overflow:hidden;box-shadow:0 10px 28px rgba(15,23,42,.06);margin-bottom:26px;padding:24px}
.acm-lshow-player h2{margin:0 0 8px;color:var(--lv-heading);font-size:1.4rem;font-weight:700;line-height:1.35}
.acm-lshow-player-meta{display:flex;align-items:center;gap:14px;flex-wrap:wrap;margin-bottom:16px;color:var(--lv-muted);font-size:.88rem;font-weight:600}
.acm-lshow-player-desc{color:var(--lv-body);font-size:.95rem;line-height:1.8;margin:0 0 16px}
.acm-lshow-audio{width:100%;border-radius:8px;accent-color:var(--lv-green);margin-top:6px}
.acm-lshow-embed{position:relative;width:100%;border-radius:12px;overflow:hidden;background:#000;margin-top:6px}
.acm-lshow-embed iframe{width:100%;border:0;display:block}
.acm-lshow-embed--soundcloud iframe{height:166px}
.acm-lshow-embed--youtube{aspect-ratio:16/9}
.acm-lshow-embed--youtube iframe{width:100%;height:100%}

/* Episode grid */
.acm-ep-grid{--bs-gutter-x:22px;--bs-gutter-y:22px}
.acm-ep-card{display:block;background:var(--lv-card);border:1px solid var(--lv-border);border-radius:18px;overflow:hidden;text-decoration:none;box-shadow:0 8px 22px rgba(15,23,42,.05);height:100%;transition:transform .25s ease,box-shadow .25s ease,border-color .25s ease}
.acm-ep-card:hover{transform:translateY(-4px);box-shadow:0 16px 34px rgba(15,23,42,.10);border-color:rgba(40,140,60,.22);text-decoration:none}
.acm-ep-card--active{border-color:rgba(201,162,39,.55);box-shadow:0 0 0 2px rgba(201,162,39,.18),0 16px 34px rgba(15,23,42,.10)}
.acm-ep-thumb{position:relative;aspect-ratio:16/9;overflow:hidden;background:linear-gradient(135deg,#0d1b0e,#1a3320)}
.acm-ep-thumb img{width:100%;height:100%;object-fit:cover;display:block}
.acm-ep-thumb-placeholder{width:100%;height:100%;display:flex;align-items:center;justify-content:center;font-size:2rem;color:rgba(255,255,255,.3)}
.acm-ep-pill{position:absolute;top:12px;left:12px;display:inline-flex;align-items:center;gap:5px;padding:5px 10px;border-radius:999px;font-size:.72rem;font-weight:700;text-transform:uppercase;letter-spacing:.05em}
.acm-ep-pill--play{background:rgba(45,138,62,.9);color:#fff}
.acm-ep-pill--featured{background:rgba(201,162,39,.9);color:#fff}
.acm-ep-body{padding:16px 18px 18px}
.acm-ep-body h3{margin:0 0 8px;color:var(--lv-heading);font-size:1.02rem;line-height:1.45;font-weight:700}
.acm-ep-meta{display:flex;align-items:center;gap:10px;flex-wrap:wrap;color:var(--lv-muted);font-size:.82rem;font-weight:600}
.acm-ep-empty{background:var(--lv-card);border:1px solid var(--lv-border);border-radius:18px;padding:38px 26px;text-align:center;color:var(--lv-body)}
.acm-ep-pagination{margin-top:28px;display:flex;justify-content:center}
</style>

<div class="acm-lshow">
    <div class="container acm-lshow-shell">

        <a href="{{ route('public.listen') }}" class="acm-lshow-back">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><line x1="19" y1="12" x2="5" y2="12"/><polyline points="12 19 5 12 12 5"/></svg>
            {{ __('Back to shows') }}
        </a>

        {{-- Show header --}}
        <section class="acm-lshow-header">
            <div class="acm-lshow-banner">
                @if ($show->banner)
                    <img src="{{ $show->banner }}" alt="{{ $show->name }}">
                @endif
            </div>
            <div class="acm-lshow-header-body">
                <div class="acm-lshow-logo">
                    @if ($show->thumbnail)
                        <img src="{{ $show->thumbnail }}" alt="{{ $show->name }}">
                    @else
                        <div class="acm-lshow-logo-placeholder">🎙</div>
                    @endif
                </div>
                <div class="acm-lshow-copy">
                    <h1>{{ $show->name }}</h1>
                    <p>{{ $show->description ?: __('Listen to episodes from this Catholic audio show.') }}</p>
                </div>
                <div class="acm-lshow-actions">
                    <span class="acm-lshow-badge">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polygon points="10 8 16 12 10 16 10 8"/></svg>
                        {{ trans_choice(':count episode|:count episodes', $show->episodes_count, ['count' => number_format($show->episodes_count)]) }}
                    </span>
                    @if ($show->website_url)
                        <a href="{{ $show->website_url }}" target="_blank" rel="noopener noreferrer" class="acm-lshow-cta">
                            {{ __('Visit website') }}
                        </a>
                    @endif
                </div>
            </div>
        </section>

        {{-- Active player --}}
        @if ($selectedEpisode)
            <section class="acm-lshow-player">
                <h2>{{ $selectedEpisode->title }}</h2>
                <div class="acm-lshow-player-meta">
                    @if ($selectedEpisode->episode_number)
                        <span>{{ __('Episode') }} {{ $selectedEpisode->episode_number }}</span>
                    @endif
                    @if ($selectedEpisode->published_at)
                        <span>{{ $selectedEpisode->published_at->format('M j, Y') }}</span>
                    @endif
                    @if ($selectedEpisode->duration)
                        <span>{{ $selectedEpisode->duration }}</span>
                    @endif
                </div>
                @if ($selectedEpisode->description)
                    <p class="acm-lshow-player-desc">{{ \Illuminate\Support\Str::limit($selectedEpisode->description, 300) }}</p>
                @endif

                @if ($selectedEpisode->embed_type === 'html5' && $selectedEpisode->audio_url)
                    <audio controls class="acm-lshow-audio" preload="none">
                        <source src="{{ $selectedEpisode->audio_url }}" type="audio/mpeg">
                        {{ __('Your browser does not support the audio element.') }}
                    </audio>
                @elseif ($selectedEpisode->embed_type === 'soundcloud' && $selectedEpisode->embed_url)
                    <div class="acm-lshow-embed acm-lshow-embed--soundcloud">
                        <iframe scrolling="no" frameborder="no" allow="autoplay"
                            src="{{ $selectedEpisode->embed_url }}&auto_play=false&show_artwork=true&show_comments=false&color=%232d8a3e">
                        </iframe>
                    </div>
                @elseif ($selectedEpisode->embed_type === 'youtube' && $selectedEpisode->embed_url)
                    <div class="acm-lshow-embed acm-lshow-embed--youtube">
                        <iframe src="{{ $selectedEpisode->embed_url }}?autoplay=0&rel=0&modestbranding=1"
                            allowfullscreen title="{{ $selectedEpisode->title }}"></iframe>
                    </div>
                @elseif ($selectedEpisode->audio_url)
                    <a href="{{ $selectedEpisode->audio_url }}" target="_blank" rel="noopener noreferrer" class="btn btn-success mt-2">
                        {{ __('Open / Download Episode') }} →
                    </a>
                @endif
            </section>
        @endif

        {{-- Episode grid --}}
        @if ($episodes->isEmpty())
            <div class="acm-ep-empty">
                <h3>{{ __('No episodes yet') }}</h3>
                <p class="mb-0">{{ __('Episodes will appear here once they are added in the admin panel.') }}</p>
            </div>
        @else
            <div class="row acm-ep-grid">
                @foreach ($episodes as $episode)
                    <div class="col-xl-4 col-md-6">
                        <a href="{{ route('public.listen.show', ['slug' => $show->slug, 'episode' => $episode->id]) }}"
                           class="acm-ep-card @if($selectedEpisode && $selectedEpisode->id === $episode->id) acm-ep-card--active @endif">
                            <div class="acm-ep-thumb">
                                @if ($episode->thumbnail)
                                    <img src="{{ $episode->thumbnail }}" alt="{{ $episode->title }}">
                                @else
                                    <div class="acm-ep-thumb-placeholder">🎙</div>
                                @endif
                                @if ($episode->is_featured)
                                    <span class="acm-ep-pill acm-ep-pill--featured">★ {{ __('Featured') }}</span>
                                @else
                                    <span class="acm-ep-pill acm-ep-pill--play">▶ {{ __('Play') }}</span>
                                @endif
                            </div>
                            <div class="acm-ep-body">
                                <h3>{{ $episode->title }}</h3>
                                <div class="acm-ep-meta">
                                    @if ($episode->episode_number)
                                        <span>Ep. {{ $episode->episode_number }}</span>
                                    @endif
                                    @if ($episode->published_at)
                                        <span>{{ $episode->published_at->format('M j, Y') }}</span>
                                    @endif
                                    @if ($episode->duration)
                                        <span>{{ $episode->duration }}</span>
                                    @endif
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>

            @if ($episodes->hasPages())
                <div class="acm-ep-pagination">
                    {!! $episodes->withQueryString()->links(Theme::getThemeNamespace('partials.pagination')) !!}
                </div>
            @endif
        @endif

    </div>
</div>
