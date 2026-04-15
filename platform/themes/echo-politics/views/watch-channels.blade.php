@php
    Theme::layout('full-width');
    SeoHelper::setTitle(__('plugins/watch-manager::watch.seo.channels_title'));
    SeoHelper::setDescription(__('plugins/watch-manager::watch.seo.channels_description'));
    $totalVideosCount = $channels->sum('videos_count');
@endphp

<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400;1,600&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<style>
:root{--wc-primary:#046bd2;--wc-gold:#c9a227;--wc-gold-light:rgba(201,162,39,.12);--wc-page:#f0f4fb;--wc-card:#fff;--wc-border:#e2e8f0;--wc-heading:#0f172a;--wc-body:#475569;--wc-muted:#94a3b8}
html[data-theme='dark']{--wc-page:#0d1117;--wc-card:#141a27;--wc-border:rgba(255,255,255,.08);--wc-heading:#e8f0fe;--wc-body:rgba(226,232,240,.78);--wc-muted:#64748b}

/* ── Animated eyebrow dot ───────────────────────────── */
@keyframes wcDot{0%,100%{opacity:1;transform:scale(1)}50%{opacity:.25;transform:scale(.5)}}
.acm-watch-eyebrow-dot{width:7px;height:7px;border-radius:50%;background:#f6d365;animation:wcDot 2s ease-in-out infinite;flex-shrink:0}

.acm-watch-page{background:var(--wc-page);padding-bottom:80px}

/* ── Hero ───────────────────────────────────────────── */
.acm-watch-hero{
    position:relative;overflow:hidden;
    background:linear-gradient(158deg,#060e1d 0%,#0d1f3c 42%,#0b1a35 72%,#050c18 100%);
    padding:80px 0 68px;text-align:center
}
/* Radial gold glow — same as Saints / Live */
.acm-watch-hero::before{
    content:'';position:absolute;
    top:-130px;left:50%;transform:translateX(-50%);
    width:900px;height:620px;
    background:radial-gradient(ellipse at 50% 32%,
        rgba(201,162,39,.18) 0%,rgba(4,107,210,.07) 48%,transparent 68%);
    pointer-events:none;
}
/* Bottom gold accent line */
.acm-watch-hero::after{
    content:'';position:absolute;
    bottom:0;left:0;right:0;height:1px;
    background:linear-gradient(90deg,transparent 5%,rgba(201,162,39,.40) 50%,transparent 95%);
}
/* Dot-grid texture */
.acm-watch-hero-tex{
    position:absolute;inset:0;
    background-image:radial-gradient(circle,rgba(201,162,39,.045) 1px,transparent 1px);
    background-size:32px 32px;
    pointer-events:none;
}
/* Cross watermarks */
.acm-watch-cross{
    position:absolute;
    top:50%;transform:translateY(-50%);
    width:160px;height:160px;
    opacity:.04;pointer-events:none;
}
.acm-watch-cross.left{left:7%}
.acm-watch-cross.right{right:7%}
.acm-watch-hero-inner{position:relative;z-index:1}

.acm-watch-eyebrow{
    display:inline-flex;align-items:center;gap:10px;
    margin-bottom:24px;padding:7px 20px;border-radius:999px;
    background:rgba(15,23,42,.34);border:1px solid rgba(201,162,39,.50);
    color:#f6d365;font-family:'Inter',system-ui,sans-serif;
    font-size:.68rem;font-weight:700;letter-spacing:.14em;text-transform:uppercase;
    backdrop-filter:blur(6px)
}

.acm-watch-title{
    margin:0 0 16px;color:#f8fafc;
    font-family:'Playfair Display',Georgia,serif;
    font-size:clamp(2.4rem,5vw,4.2rem);
    font-weight:700;letter-spacing:-.03em;line-height:1.07;
    text-shadow:0 4px 20px rgba(0,0,0,.24)
}

.acm-watch-sub{
    max-width:540px;margin:0 auto 40px;
    font-family:'Inter',system-ui,sans-serif;
    font-size:clamp(.92rem,1.6vw,1.06rem);font-weight:300;
    color:rgba(226,232,240,.82);line-height:1.8
}

/* Stats pill — matches live page */
.acm-watch-stats{
    display:inline-flex;
    border:1px solid rgba(201,162,39,.28);border-radius:100px;
    background:rgba(255,255,255,.04);backdrop-filter:blur(12px);
    overflow:hidden;
}
.acm-watch-stat{
    padding:12px 28px;
    font-family:'Inter',system-ui,sans-serif;font-size:.72rem;
    color:rgba(226,232,240,.65);
    border-right:1px solid rgba(201,162,39,.14);
    text-align:center;line-height:1.3;
}
.acm-watch-stat:last-child{border-right:none}
.acm-watch-stat strong{
    display:block;font-size:1.12rem;font-weight:700;
    color:#fbbf24;font-family:'Playfair Display',Georgia,serif;margin-bottom:3px;
}

/* ── Channel grid & cards ───────────────────────────── */
.acm-channel-grid{margin-top:34px;--bs-gutter-x:24px;--bs-gutter-y:24px}
.acm-channel-card{display:block;height:100%;background:var(--wc-card);border:1px solid var(--wc-border);border-radius:18px;overflow:hidden;text-decoration:none;box-shadow:0 10px 26px rgba(15,23,42,.06);transition:transform .25s ease,box-shadow .25s ease,border-color .25s ease}
.acm-channel-card:hover{transform:translateY(-5px);box-shadow:0 18px 40px rgba(15,23,42,.12);border-color:rgba(4,107,210,.22);text-decoration:none}
.acm-channel-banner{position:relative;aspect-ratio:16/7;background:linear-gradient(135deg,#10213b,#173c6b)}
.acm-channel-banner img{width:100%;height:100%;object-fit:cover;display:block}
.acm-channel-logo{width:84px;height:84px;border-radius:20px;overflow:hidden;border:4px solid var(--wc-card);background:#fff;margin:-42px 0 0 22px;position:relative;z-index:1;box-shadow:0 12px 28px rgba(15,23,42,.14)}
.acm-channel-logo img{width:100%;height:100%;object-fit:cover}
.acm-channel-body{padding:18px 22px 22px}
.acm-channel-name{color:var(--wc-heading);font-family:'Playfair Display',Georgia,serif;font-size:1.25rem;font-weight:700;margin:0 0 10px;line-height:1.3}
.acm-channel-desc{color:var(--wc-body);font-family:'Inter',system-ui,sans-serif;font-size:.93rem;line-height:1.72;margin:0 0 16px;display:-webkit-box;-webkit-line-clamp:3;-webkit-box-orient:vertical;overflow:hidden}
.acm-channel-meta{display:flex;align-items:center;justify-content:space-between;gap:12px;flex-wrap:wrap}
.acm-channel-count{display:inline-flex;align-items:center;gap:8px;padding:7px 12px;border-radius:999px;background:var(--wc-gold-light);color:var(--wc-gold);font-family:'Inter',system-ui,sans-serif;font-size:.82rem;font-weight:700}
.acm-channel-link{color:var(--wc-primary);font-family:'Inter',system-ui,sans-serif;font-size:.88rem;font-weight:700}
.acm-empty-watch{margin-top:34px;background:var(--wc-card);border:1px solid var(--wc-border);border-radius:18px;padding:42px 28px;text-align:center;color:var(--wc-body)}

@media(max-width:767px){
    .acm-watch-hero{padding:56px 0 44px}
    .acm-watch-cross{display:none}
    .acm-watch-title{font-size:clamp(2rem,8vw,2.8rem)}
    .acm-watch-sub{font-size:.96rem;margin-bottom:28px}
    .acm-watch-stats{flex-direction:column;border-radius:14px}
    .acm-watch-stat{border-right:none;border-bottom:1px solid rgba(201,162,39,.12)}
    .acm-watch-stat:last-child{border-bottom:none}
}
</style>

<div class="acm-watch-page">
    <section class="acm-watch-hero">
        <div class="acm-watch-hero-tex" aria-hidden="true"></div>

        {{-- Cross watermarks --}}
        <svg class="acm-watch-cross left" viewBox="0 0 100 160" fill="none" aria-hidden="true">
            <rect x="38" y="0" width="24" height="160" rx="6" fill="white"/>
            <rect x="0" y="42" width="100" height="24" rx="6" fill="white"/>
        </svg>
        <svg class="acm-watch-cross right" viewBox="0 0 100 160" fill="none" aria-hidden="true">
            <rect x="38" y="0" width="24" height="160" rx="6" fill="white"/>
            <rect x="0" y="42" width="100" height="24" rx="6" fill="white"/>
        </svg>

        <div class="container acm-watch-hero-inner">

            <div>
                <span class="acm-watch-eyebrow">
                    <span class="acm-watch-eyebrow-dot"></span>
                    {{ __('plugins/watch-manager::watch.frontend.eyebrow') }}
                </span>
            </div>

            <h1 class="acm-watch-title">{{ __('plugins/watch-manager::watch.frontend.title') }}</h1>

            <p class="acm-watch-sub">{{ __('plugins/watch-manager::watch.frontend.subtitle') }}</p>

            <div class="acm-watch-stats">
                <div class="acm-watch-stat">
                    <strong>{{ $channels->count() }}</strong>
                    {{ __('Channels') }}
                </div>
                <div class="acm-watch-stat">
                    <strong>{{ number_format($totalVideosCount) }}</strong>
                    {{ __('Videos') }}
                </div>
                <div class="acm-watch-stat">
                    <strong>{{ __('Free') }}</strong>
                    {{ __('On YouTube') }}
                </div>
            </div>

        </div>
    </section>

    <section class="container">
        @if ($channels->isEmpty())
            <div class="acm-empty-watch">
                <h3>{{ __('plugins/watch-manager::watch.frontend.empty_title') }}</h3>
                <p class="mb-0">{{ __('plugins/watch-manager::watch.frontend.empty_description') }}</p>
            </div>
        @else
            <div class="row acm-channel-grid">
                @foreach ($channels as $channel)
                    <div class="col-xl-4 col-md-6">
                        <a href="{{ route('public.watch.channel', $channel->slug) }}" class="acm-channel-card">
                            <div class="acm-channel-banner">
                                @if ($channel->banner)
                                    <img src="{{ $channel->banner }}" alt="{{ $channel->name }}">
                                @endif
                            </div>
                            <div class="acm-channel-logo">
                                @if ($channel->thumbnail)
                                    <img src="{{ $channel->thumbnail }}" alt="{{ $channel->name }}">
                                @endif
                            </div>
                            <div class="acm-channel-body">
                                <h2 class="acm-channel-name">{{ $channel->name }}</h2>
                                <p class="acm-channel-desc">{{ $channel->description ?: __('plugins/watch-manager::watch.frontend.channel_fallback_description') }}</p>
                                <div class="acm-channel-meta">
                                    <span class="acm-channel-count">
                                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                                        {{ trans_choice('plugins/watch-manager::watch.video_count', $channel->videos_count, ['count' => number_format($channel->videos_count)]) }}
                                    </span>
                                    <span class="acm-channel-link">{{ __('plugins/watch-manager::watch.frontend.open_channel') }} &rarr;</span>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        @endif
    </section>
</div>
