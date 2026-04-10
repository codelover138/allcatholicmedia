@php
    Theme::layout('full-width');
    SeoHelper::setTitle('Live Catholic Streams | AllCatholicMedia');
    SeoHelper::setDescription('Watch live Catholic Mass, Rosary, Adoration and more from churches and organizations worldwide.');
@endphp

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;1,400&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<style>
/* ═══════════════════════════════════════════════════
   LIVE STREAMS PAGE  ·  AllCatholicMedia
   Red #dc2626  Navy #0d1f3c  Gold #c9a227
═══════════════════════════════════════════════════ */
:root {
    --lr: #dc2626;
    --lr-h: #b91c1c;
    --lr-soft: rgba(220,38,38,.12);
    --lg: #c9a227;
    --lg-lt: #e5c76b;
    --ln: #0d1f3c;
    --lb: #1a56db;
    --l-card: #ffffff;
    --l-bg: #f0f4fb;
    --l-border: #dde4f0;
    --l-head: #0d1f3c;
    --l-body: #475569;
    --l-muted: #94a3b8;
    --hf: 'Playfair Display', Georgia, serif;
    --bf: 'Inter', system-ui, sans-serif;
    --rad: 14px;
    --tr: .22s ease;
}
html[data-theme='dark'] {
    --l-card: #111827;
    --l-bg: #080d18;
    --l-border: rgba(255,255,255,.07);
    --l-head: #eef2f9;
    --l-body: rgba(218,228,244,.70);
    --l-muted: #4a5a6e;
}

/* ── Animations ─────────────────────────────────── */
@keyframes livePulse {
    0%,100%{opacity:1;transform:scale(1)}
    50%{opacity:.3;transform:scale(.55)}
}
@keyframes liveRing {
    0%{transform:scale(1);opacity:.6}
    100%{transform:scale(2.2);opacity:0}
}
@keyframes lCardIn {
    from{opacity:0;transform:translateY(16px)}
    to{opacity:1;transform:translateY(0)}
}

/* ══════════════════════════════════════════════════
   HERO
══════════════════════════════════════════════════ */
.lv-hero {
    position: relative;
    background: linear-gradient(158deg,#060e1d 0%,#0d1f3c 42%,#0b1a35 72%,#050c18 100%);
    padding: 64px 0 52px;
    text-align: center;
    overflow: hidden;
}
.lv-hero::before {
    content: '';
    position: absolute;
    top: -120px; left: 50%; transform: translateX(-50%);
    width: 900px; height: 580px;
    background: radial-gradient(ellipse at 50% 30%,
        rgba(220,38,38,.18) 0%,
        rgba(13,31,60,.10) 45%,
        transparent 68%);
    pointer-events: none;
}
.lv-hero::after {
    content: '';
    position: absolute;
    bottom: 0; left: 0; right: 0; height: 1px;
    background: linear-gradient(90deg,transparent 5%,rgba(220,38,38,.40) 50%,transparent 95%);
}
.lv-hero-tex {
    position: absolute; inset: 0;
    background-image: radial-gradient(circle,rgba(220,38,38,.04) 1px,transparent 1px);
    background-size: 34px 34px;
    pointer-events: none;
}
.lv-hero-inner { position: relative; z-index: 2; }

/* live indicator */
.lv-hero-badge {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    background: rgba(220,38,38,.12);
    border: 1px solid rgba(220,38,38,.35);
    color: #fca5a5;
    font-family: var(--bf);
    font-size: .68rem;
    font-weight: 700;
    letter-spacing: .14em;
    text-transform: uppercase;
    padding: 6px 18px;
    border-radius: 100px;
    margin-bottom: 22px;
}
.lv-badge-dot {
    position: relative;
    width: 8px; height: 8px;
}
.lv-badge-dot::before {
    content: '';
    position: absolute; inset: 0;
    border-radius: 50%;
    background: #ef4444;
    animation: livePulse 1.4s ease-in-out infinite;
}
.lv-badge-dot::after {
    content: '';
    position: absolute; inset: 0;
    border-radius: 50%;
    background: #ef4444;
    animation: liveRing 1.4s ease-out infinite;
}

.lv-hero-title {
    font-family: var(--hf);
    font-size: clamp(2.4rem,5vw,4rem);
    font-weight: 700;
    color: #f8fafc;
    margin: 0 0 10px;
    letter-spacing: -.025em;
    line-height: 1.08;
}
.lv-hero-title span {
    font-style: italic;
    background: linear-gradient(135deg,#fca5a5 0%,#ef4444 45%,#fca5a5 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}
.lv-hero-desc {
    font-family: var(--bf);
    font-size: clamp(.92rem,1.6vw,1.05rem);
    font-weight: 300;
    color: rgba(226,232,240,.80);
    max-width: 520px;
    margin: 0 auto 36px;
    line-height: 1.75;
}

/* hero stats */
.lv-hero-stats {
    display: inline-flex;
    border: 1px solid rgba(220,38,38,.22);
    border-radius: 100px;
    background: rgba(255,255,255,.035);
    backdrop-filter: blur(10px);
    overflow: hidden;
}
.lv-hero-stat {
    padding: 10px 24px;
    font-family: var(--bf);
    font-size: .75rem;
    color: rgba(226,232,240,.70);
    border-right: 1px solid rgba(220,38,38,.14);
    text-align: center;
    line-height: 1.3;
}
.lv-hero-stat:last-child { border-right: none; }
.lv-hero-stat strong {
    display: block;
    font-size: 1.08rem;
    font-weight: 700;
    color: #fca5a5;
    font-family: var(--hf);
    margin-bottom: 2px;
}

/* ══════════════════════════════════════════════════
   MAIN CONTENT
══════════════════════════════════════════════════ */
.lv-body {
    background: var(--l-bg);
    padding: 48px 0 88px;
    min-height: 60vh;
}

/* Section heading */
.lv-sh {
    display: flex;
    align-items: center;
    gap: 14px;
    margin-bottom: 28px;
}
.lv-sh-line { flex: 1; height: 1px; background: var(--l-border); }
.lv-sh-line::before {
    content: ''; display: block; height: 1px; width: 44px;
    background: linear-gradient(90deg,var(--lr),transparent);
}
.lv-sh-line.r::before {
    margin-left: auto;
    background: linear-gradient(270deg,var(--lr),transparent);
}
.lv-sh-title {
    font-family: var(--hf);
    font-size: 1.15rem;
    font-weight: 600;
    color: var(--l-head);
    white-space: nowrap;
    display: flex; align-items: center; gap: 10px;
}

/* LIVE badge */
.lv-badge {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    background: var(--lr);
    color: #fff;
    font-family: var(--bf);
    font-size: .62rem;
    font-weight: 700;
    letter-spacing: .08em;
    text-transform: uppercase;
    padding: 3px 10px;
    border-radius: 5px;
}
.lv-badge-d {
    width: 6px; height: 6px;
    border-radius: 50%; background: #fff;
    animation: livePulse 1.2s ease-in-out infinite;
    flex-shrink: 0;
}

/* upcoming calendar icon */
.lv-cal-ico {
    width: 34px; height: 34px;
    border-radius: 8px;
    background: rgba(220,38,38,.10);
    border: 1px solid rgba(220,38,38,.20);
    display: flex; align-items: center; justify-content: center;
    color: var(--lr);
    flex-shrink: 0;
}

/* ══════════════════════════════════════════════════
   STREAM CARDS
══════════════════════════════════════════════════ */
.lv-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill,minmax(290px,1fr));
    gap: 22px;
    margin-bottom: 56px;
}
.lv-card {
    background: var(--l-card);
    border: 1px solid var(--l-border);
    border-radius: var(--rad);
    overflow: hidden;
    display: flex; flex-direction: column;
    position: relative;
    box-shadow: 0 1px 4px rgba(0,0,0,.05),0 4px 16px rgba(0,0,0,.05);
    transition: transform .28s cubic-bezier(.22,1,.36,1),
                box-shadow .28s ease, border-color var(--tr);
    animation: lCardIn .5s cubic-bezier(.22,1,.36,1) both;
}
.lv-card::before {
    content: '';
    position: absolute;
    top: 0; left: 0; right: 0; height: 3px;
    background: linear-gradient(90deg,#dc2626,#ef4444 50%,#dc2626);
    opacity: 0; transition: opacity .2s ease; z-index: 3;
}
.lv-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 20px 48px rgba(0,0,0,.12),0 8px 20px rgba(220,38,38,.08);
    border-color: rgba(220,38,38,.28);
}
.lv-card:hover::before { opacity: 1; }

/* thumbnail */
.lv-thumb {
    position: relative;
    aspect-ratio: 16/9;
    background: linear-gradient(145deg,#0d1f3c,#162a4a 50%,#0a1628);
    overflow: hidden;
    cursor: pointer;
    flex-shrink: 0;
}
.lv-thumb img {
    width: 100%; height: 100%;
    object-fit: cover; display: block;
    transition: transform .45s cubic-bezier(.22,1,.36,1);
}
.lv-card:hover .lv-thumb img { transform: scale(1.055); }
.lv-thumb-overlay {
    position: absolute; inset: 0;
    background: linear-gradient(to top,rgba(6,14,29,.70) 0%,transparent 55%);
    pointer-events: none;
}

/* play button */
.lv-play-wrap {
    position: absolute; inset: 0;
    display: flex; align-items: center; justify-content: center;
    background: rgba(0,0,0,.22);
    transition: background var(--tr);
}
.lv-play-wrap:hover { background: rgba(0,0,0,.45); }
.lv-play-btn {
    width: 60px; height: 60px;
    background: rgba(255,255,255,.96);
    border-radius: 50%;
    border: none; cursor: pointer;
    display: flex; align-items: center; justify-content: center;
    box-shadow: 0 4px 20px rgba(0,0,0,.25);
    transition: transform .22s ease, box-shadow .22s ease;
}
.lv-play-btn:hover { transform: scale(1.12); box-shadow: 0 6px 28px rgba(0,0,0,.35); }
.lv-play-btn svg { margin-left: 4px; }

/* live badge on thumb */
.lv-thumb-badge {
    position: absolute;
    top: 10px; left: 10px; z-index: 4;
}

/* embed */
.lv-embed {
    display: none;
    position: relative;
    aspect-ratio: 16/9;
    background: #000;
}
.lv-embed iframe { width: 100%; height: 100%; border: none; }
.lv-close {
    position: absolute;
    top: 8px; right: 8px; z-index: 10;
    background: rgba(0,0,0,.72);
    color: #fff; border: none;
    border-radius: 50%;
    width: 30px; height: 30px;
    cursor: pointer;
    display: flex; align-items: center; justify-content: center;
    font-size: 13px;
    transition: background var(--tr);
}
.lv-close:hover { background: rgba(220,38,38,.80); }

/* card body */
.lv-card-body { padding: 18px 18px 16px; display: flex; flex-direction: column; flex: 1; }
.lv-card-source {
    display: flex; align-items: center; gap: 7px;
    font-family: var(--bf); font-size: .68rem; font-weight: 700;
    color: var(--lb); letter-spacing: .05em; text-transform: uppercase;
    margin-bottom: 7px;
}
.lv-card-title {
    font-family: var(--hf);
    font-size: 1.08rem; font-weight: 700;
    color: var(--l-head);
    margin-bottom: 10px; line-height: 1.30;
}
.lv-card-meta {
    display: flex; align-items: center; gap: 8px;
    font-family: var(--bf); font-size: .78rem; color: var(--l-muted);
    margin-top: auto;
}
.lv-card-meta svg { flex-shrink: 0; }

/* no-image placeholder */
.lv-no-thumb {
    width: 100%; height: 100%;
    background: linear-gradient(145deg,#0d1f3c,#162a4a);
    display: flex; align-items: center; justify-content: center;
}

/* ══════════════════════════════════════════════════
   UPCOMING LIST
══════════════════════════════════════════════════ */
.lv-upcoming { display: flex; flex-direction: column; gap: 12px; }
.lv-uitem {
    background: var(--l-card);
    border: 1px solid var(--l-border);
    border-radius: var(--rad);
    padding: 16px 20px;
    display: flex; align-items: center; gap: 18px;
    transition: transform .22s ease, box-shadow .22s ease, border-color var(--tr);
    box-shadow: 0 1px 4px rgba(0,0,0,.04);
    position: relative; overflow: hidden;
}
.lv-uitem::before {
    content: '';
    position: absolute;
    left: 0; top: 0; bottom: 0; width: 3px;
    background: linear-gradient(to bottom,#dc2626,#ef4444);
    opacity: 0; transition: opacity var(--tr);
}
.lv-uitem:hover {
    transform: translateX(4px);
    box-shadow: 0 4px 18px rgba(0,0,0,.08);
    border-color: rgba(220,38,38,.22);
}
.lv-uitem:hover::before { opacity: 1; }

.lv-utime {
    min-width: 88px; text-align: center;
    background: rgba(220,38,38,.07);
    border: 1px solid rgba(220,38,38,.14);
    border-radius: 10px;
    padding: 10px 8px;
    flex-shrink: 0;
}
.lv-utime-hm {
    font-family: var(--hf);
    font-size: 1.15rem; font-weight: 700;
    color: var(--lr); display: block; line-height: 1;
}
.lv-utime-date {
    font-family: var(--bf);
    font-size: .70rem; color: var(--l-muted);
    margin-top: 3px; display: block;
}
.lv-uinfo { flex: 1; min-width: 0; }
.lv-utitle {
    font-family: var(--hf);
    font-size: 1rem; font-weight: 700;
    color: var(--l-head); margin-bottom: 3px;
    white-space: nowrap; overflow: hidden; text-overflow: ellipsis;
}
.lv-usource {
    font-family: var(--bf);
    font-size: .80rem; color: var(--l-body);
    display: flex; align-items: center; gap: 5px;
}
.lv-uloc {
    font-family: var(--bf);
    font-size: .75rem; color: var(--l-muted);
    display: flex; align-items: center; gap: 4px;
    white-space: nowrap; flex-shrink: 0;
}

/* timezone note */
.lv-tz {
    font-family: var(--bf);
    font-size: .78rem; color: var(--l-muted);
    margin-bottom: 18px;
    display: flex; align-items: center; gap: 6px;
}
.lv-tz strong { color: var(--lb); font-weight: 600; }

/* ══════════════════════════════════════════════════
   EMPTY STATES
══════════════════════════════════════════════════ */
.lv-empty {
    text-align: center;
    padding: 72px 40px;
    background: var(--l-card);
    border: 1.5px dashed var(--l-border);
    border-radius: var(--rad);
}
.lv-empty-ico {
    width: 72px; height: 72px; border-radius: 50%;
    background: linear-gradient(145deg,#0d1f3c,#1a2e50);
    display: flex; align-items: center; justify-content: center;
    font-size: 2rem; margin: 0 auto 18px;
    box-shadow: 0 0 28px rgba(220,38,38,.14);
    color: rgba(220,38,38,.55);
}
.lv-empty h3 { font-family: var(--hf); font-size: 1.3rem; color: var(--l-head); margin-bottom: 8px; }
.lv-empty p  { font-family: var(--bf); font-size: .90rem; color: var(--l-muted); margin: 0; line-height: 1.65; }

/* ══════════════════════════════════════════════════
   RESPONSIVE
══════════════════════════════════════════════════ */
@media(max-width:768px){
    .lv-hero { padding:48px 0 38px; }
    .lv-hero-stats { flex-direction:column; border-radius:12px; }
    .lv-hero-stat { border-right:none; border-bottom:1px solid rgba(220,38,38,.12); }
    .lv-hero-stat:last-child { border-bottom:none; }
    .lv-grid { grid-template-columns:1fr; gap:16px; }
    .lv-uloc { display:none; }
}
@media(max-width:480px){
    .lv-hero-title { font-size:2rem; }
    .lv-uitem { padding:12px 14px; gap:12px; }
    .lv-utime { min-width:72px; }
}
</style>

{{-- ══════════════════════════════════════════════════
     HERO
══════════════════════════════════════════════════ --}}
<section class="lv-hero">
    <div class="lv-hero-tex" aria-hidden="true"></div>
    <div class="container">
        <div class="lv-hero-inner">

            <div>
                <span class="lv-hero-badge">
                    <span class="lv-badge-dot"></span>
                    {{ __('Broadcasting Live') }}
                </span>
            </div>

            <h1 class="lv-hero-title">
                {{ __('Live Catholic') }} <span>{{ __('Streams') }}</span>
            </h1>

            <p class="lv-hero-desc">
                {{ __('Mass, Rosary, Adoration and more — broadcasting live from churches and organizations around the world.') }}
            </p>

            <div class="lv-hero-stats">
                <div class="lv-hero-stat">
                    <strong>{{ $liveNow->count() }}</strong>
                    {{ __('Live Now') }}
                </div>
                <div class="lv-hero-stat">
                    <strong>{{ $upcoming->count() }}</strong>
                    {{ __('Upcoming') }}
                </div>
                <div class="lv-hero-stat">
                    <strong>24/7</strong>
                    {{ __('Catholic') }}
                </div>
            </div>

        </div>
    </div>
</section>

{{-- ══════════════════════════════════════════════════
     CONTENT
══════════════════════════════════════════════════ --}}
<div class="lv-body">
<div class="container">

    {{-- Live Now --}}
    <div style="margin-bottom:56px;">
        <div class="lv-sh">
            <span class="lv-sh-line"></span>
            <h2 class="lv-sh-title">
                <span class="lv-badge"><span class="lv-badge-d"></span>{{ __('LIVE NOW') }}</span>
                {{ __('Streaming Right Now') }}
            </h2>
            <span class="lv-sh-line r"></span>
        </div>

        @if($liveNow->count())
            <div class="lv-grid">
                @foreach($liveNow as $i => $stream)
                    @php $thumb = $stream->thumbnail ?: $stream->youtube_thumbnail; @endphp
                    <article class="lv-card" style="animation-delay:{{ $i * 60 }}ms">

                        <div class="lv-thumb js-lv-thumb">
                            @if($thumb)
                                <img src="{{ $thumb }}" alt="{{ $stream->title }}" loading="lazy">
                            @else
                                <div class="lv-no-thumb">
                                    <svg width="52" height="52" fill="none" stroke="rgba(148,163,184,.4)" stroke-width="1.5" viewBox="0 0 24 24"><polygon points="23 7 16 12 23 17 23 7"/><rect x="1" y="5" width="15" height="14" rx="2"/></svg>
                                </div>
                            @endif
                            <div class="lv-thumb-overlay"></div>
                            <span class="lv-thumb-badge">
                                <span class="lv-badge"><span class="lv-badge-d"></span>{{ __('LIVE') }}</span>
                            </span>
                            <button class="lv-play-wrap js-lv-play"
                                    data-embed="{{ $stream->embed_code }}"
                                    aria-label="{{ __('Watch Live') }}">
                                <span class="lv-play-btn">
                                    <svg width="22" height="22" viewBox="0 0 24 24" fill="#dc2626"><polygon points="5 3 19 12 5 21 5 3"/></svg>
                                </span>
                            </button>
                        </div>

                        <div class="lv-embed js-lv-embed">
                            <iframe src="" data-src="{{ $stream->embed_code }}"
                                    allowfullscreen allow="autoplay; encrypted-media"></iframe>
                            <button class="lv-close js-lv-close" aria-label="{{ __('Close') }}">&#x2715;</button>
                        </div>

                        <div class="lv-card-body">
                            <div class="lv-card-source">
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="currentColor"><circle cx="12" cy="12" r="10" opacity=".2"/><circle cx="12" cy="12" r="4"/></svg>
                                {{ $stream->source_name }}
                            </div>
                            <div class="lv-card-title">{{ $stream->title }}</div>
                            @if($stream->location)
                                <div class="lv-card-meta">
                                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                                    {{ $stream->location }}
                                </div>
                            @endif
                        </div>

                    </article>
                @endforeach
            </div>
        @else
            <div class="lv-empty">
                <div class="lv-empty-ico">
                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><polygon points="23 7 16 12 23 17 23 7"/><rect x="1" y="5" width="15" height="14" rx="2"/></svg>
                </div>
                <h3>{{ __('No Streams Live Right Now') }}</h3>
                <p>{{ __('No streams are live at this moment. Check the upcoming schedule below or come back soon.') }}</p>
            </div>
        @endif
    </div>

    {{-- Upcoming --}}
    <div>
        <div class="lv-sh">
            <span class="lv-sh-line"></span>
            <h2 class="lv-sh-title">
                <span class="lv-cal-ico">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                </span>
                {{ __('Upcoming Streams') }}
            </h2>
            <span class="lv-sh-line r"></span>
        </div>

        <div class="lv-tz">
            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
            {{ __('Times in your local timezone:') }}
            <strong id="lv-user-tz">—</strong>
        </div>

        @if($upcoming->count())
            <div class="lv-upcoming">
                @foreach($upcoming as $stream)
                    <div class="lv-uitem">
                        <div class="lv-utime">
                            <span class="lv-utime-hm">{{ $stream->scheduled_at->format('g:i A') }}</span>
                            <span class="lv-utime-date"
                                  data-utc="{{ $stream->scheduled_at->utc()->toIso8601String() }}">
                                {{ $stream->scheduled_at->format('M j') }}
                            </span>
                        </div>
                        <div class="lv-uinfo">
                            <div class="lv-utitle">{{ $stream->title }}</div>
                            <div class="lv-usource">
                                <svg width="11" height="11" viewBox="0 0 24 24" fill="currentColor"><circle cx="12" cy="12" r="10" opacity=".2"/><circle cx="12" cy="12" r="4"/></svg>
                                {{ $stream->source_name }}
                            </div>
                        </div>
                        @if($stream->location)
                            <div class="lv-uloc">
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                                {{ $stream->location }}
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
        @else
            <div class="lv-empty">
                <div class="lv-empty-ico">
                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                </div>
                <h3>{{ __('No Upcoming Streams') }}</h3>
                <p>{{ __('No upcoming streams scheduled yet. Check back soon.') }}</p>
            </div>
        @endif
    </div>

</div>
</div>

{{-- Inline JS (no @push — not supported in this theme) --}}
<script>
(function(){
    /* Play button */
    document.querySelectorAll('.js-lv-play').forEach(function(btn){
        btn.addEventListener('click',function(){
            var card=btn.closest('.lv-card');
            var thumb=card.querySelector('.js-lv-thumb');
            var embed=card.querySelector('.js-lv-embed');
            var iframe=embed.querySelector('iframe');
            iframe.src=iframe.dataset.src;
            thumb.style.display='none';
            embed.style.display='block';
        });
    });

    /* Close button */
    document.querySelectorAll('.js-lv-close').forEach(function(btn){
        btn.addEventListener('click',function(){
            var card=btn.closest('.lv-card');
            var thumb=card.querySelector('.js-lv-thumb');
            var embed=card.querySelector('.js-lv-embed');
            var iframe=embed.querySelector('iframe');
            iframe.src='';
            embed.style.display='none';
            thumb.style.display='block';
        });
    });

    /* User timezone */
    var tzEl=document.getElementById('lv-user-tz');
    if(tzEl){try{tzEl.textContent=Intl.DateTimeFormat().resolvedOptions().timeZone;}catch(e){}}

    /* Convert times to local */
    document.querySelectorAll('[data-utc]').forEach(function(el){
        try{
            var d=new Date(el.dataset.utc);
            var wrap=el.closest('.lv-utime');
            wrap.querySelector('.lv-utime-hm').textContent=d.toLocaleTimeString([],{hour:'numeric',minute:'2-digit'});
            el.textContent=d.toLocaleDateString([],{month:'short',day:'numeric'});
        }catch(e){}
    });
}());
</script>
