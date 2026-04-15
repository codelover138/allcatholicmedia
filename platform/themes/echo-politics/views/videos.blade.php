@php
    Theme::layout('full-width');
    SeoHelper::setTitle('Catholic Video Library | AllCatholicMedia');
    SeoHelper::setDescription('Browse Catholic videos — Mass, Rosary, Adoration, Divine Mercy, Homilies, and more.');
    $totalVideos = $videos->total();
    $now = now();
@endphp

<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400;1,600&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

{{-- ══ Inline styles (Theme::header() doesn't support @stack) ══ --}}
<style>
/* ── Variables ─────────────────────────────────────── */
:root {
    --vp: #046bd2; --vp-h: #0358b0; --vp-light: rgba(4,107,210,.08);
    --vg: #c9a227; --vg-h: #a88520; --vg-light: rgba(201,162,39,.12);
    --vr: #dc2626;
    --vc-bg: #ffffff; --vc-border: #e2e8f0; --vc-muted: #94a3b8;
    --vc-heading: #0f172a; --vc-body: #475569; --vc-page: #f1f5f9;
    --vc-title-font: 'Playfair Display', Georgia, serif;
    --vc-copy-font: 'Inter', sans-serif;
    --vradius: 10px; --vradius-sm: 6px; --vt: .2s ease; --vt-s: .35s ease;
}
html[data-theme='dark'] {
    --vc-bg: #141a27; --vc-border: rgba(255,255,255,.08);
    --vc-muted: #64748b; --vc-heading: #e8f0fe;
    --vc-body: rgba(226,232,240,.78); --vc-page: #0d1117;
}

/* ── Hero ──────────────────────────────────────────── */
.acm-vhero {
    position: relative;
    padding: 80px 0 68px;
    text-align: center;
    overflow: hidden;
    background: linear-gradient(158deg, #040a14 0%, #0b1a35 38%, #0d2a4e 65%, #060d1a 100%);
}
/* Radial blue glow */
.acm-vhero::before {
    content: '';
    position: absolute;
    top: -80px; left: 50%; transform: translateX(-50%);
    width: 700px; height: 500px;
    background: radial-gradient(ellipse at center, rgba(4,107,210,.22) 0%, transparent 65%);
    pointer-events: none;
}
/* Bottom gold accent line */
.acm-vhero::after {
    content: '';
    position: absolute;
    bottom: 0; left: 0; right: 0; height: 1px;
    background: linear-gradient(90deg, transparent 5%, rgba(201,162,39,.40) 50%, transparent 95%);
}
/* Dot-grid texture */
.acm-vhero-tex {
    position: absolute; inset: 0;
    background-image: radial-gradient(circle, rgba(4,107,210,.045) 1px, transparent 1px);
    background-size: 32px 32px;
    pointer-events: none;
}
.acm-vhero-inner { position: relative; z-index: 2; }

.acm-vhero-eyebrow {
    display: inline-flex; align-items: center; gap: 10px;
    background: rgba(220,38,38,.14); border: 1px solid rgba(220,38,38,.40);
    color: #fca5a5; font-size: .68rem; font-weight: 700;
    letter-spacing: .14em; text-transform: uppercase;
    padding: 7px 20px; border-radius: 100px; margin-bottom: 24px;
    backdrop-filter: blur(6px);
}
.acm-vhero-dot { width: 7px; height: 7px; background: #f87171; border-radius: 50%; animation: vdot 1.4s ease-in-out infinite; flex-shrink: 0; }
@keyframes vdot { 0%,100%{opacity:1;transform:scale(1)} 50%{opacity:.4;transform:scale(.6)} }

.acm-vhero-title {
    font-family: 'Playfair Display', Georgia, serif;
    font-size: clamp(2.4rem, 5vw, 4.2rem);
    font-weight: 700; color: #f8fafc;
    line-height: 1.07; letter-spacing: -.03em;
    margin: 0 0 16px;
    text-shadow: 0 4px 20px rgba(0,0,0,.24);
}
.acm-vhero-sub {
    font-family: 'Inter', system-ui, sans-serif;
    font-size: clamp(.92rem, 1.6vw, 1.06rem);
    font-weight: 300;
    color: rgba(226,232,240,.82);
    max-width: 540px; margin: 0 auto 40px;
    line-height: 1.8;
}
/* Multi-item stats pill */
.acm-vhero-stats {
    display: inline-flex;
    border: 1px solid rgba(201,162,39,.28);
    border-radius: 100px;
    background: rgba(255,255,255,.04);
    backdrop-filter: blur(12px);
    overflow: hidden;
}
.acm-vhero-stat {
    padding: 12px 28px;
    font-family: 'Inter', system-ui, sans-serif;
    font-size: .72rem;
    color: rgba(226,232,240,.65);
    border-right: 1px solid rgba(201,162,39,.14);
    text-align: center;
    line-height: 1.3;
}
.acm-vhero-stat:last-child { border-right: none; }
.acm-vhero-stat strong {
    display: block;
    font-size: 1.12rem; font-weight: 700;
    color: #fbbf24;
    font-family: 'Playfair Display', Georgia, serif;
    margin-bottom: 3px;
}

/* ── Filter Bar ────────────────────────────────────── */
.acm-filter-bar {
    background: rgba(255,255,255,.97);
    backdrop-filter: blur(16px); -webkit-backdrop-filter: blur(16px);
    border-bottom: 1px solid var(--vc-border);
    padding: 18px 0;
    position: sticky; top: 0; z-index: 500;
    transition: box-shadow var(--vt);
    box-shadow: 0 1px 0 0 var(--vc-border);
}
html[data-theme='dark'] .acm-filter-bar {
    background: rgba(10,18,32,.96);
    border-color: rgba(255,255,255,.06);
}
.acm-filter-bar.is-scrolled { box-shadow: 0 4px 20px rgba(15,23,42,.10); }
html[data-theme='dark'] .acm-filter-bar.is-scrolled { box-shadow: 0 4px 20px rgba(0,0,0,.35); }

.acm-filter-inner { display: flex; align-items: center; gap: 14px; flex-wrap: wrap; }
.acm-filter-label {
    display: inline-flex; align-items: center; gap: 5px;
    font-size: .88rem; font-weight: 700; text-transform: uppercase;
    letter-spacing: .07em; color: var(--vc-muted); white-space: nowrap; flex-shrink: 0;
}
.acm-filter-group { display: flex; align-items: center; gap: 14px; flex: 1; flex-wrap: wrap; }
.acm-filter-chips { display: flex; flex-wrap: wrap; gap: 8px; }

.acm-chip {
    display: inline-block; padding: 10px 22px; border-radius: 100px;
    font-size: 1rem; font-weight: 600; line-height: 1.4;
    background: transparent; border: 1.5px solid var(--vc-border);
    color: var(--vc-body); text-decoration: none;
    transition: all var(--vt); white-space: nowrap;
}
.acm-chip:hover { border-color: var(--vp); color: var(--vp); background: var(--vp-light); transform: translateY(-1px); text-decoration: none; }
.acm-chip--active {
    background: var(--vp) !important; border-color: var(--vp) !important;
    color: #fff !important; box-shadow: 0 3px 10px rgba(4,107,210,.28);
}
html[data-theme='dark'] .acm-chip { border-color: rgba(255,255,255,.11); color: rgba(226,232,240,.72); }

.acm-filter-sort { display: flex; align-items: center; gap: 12px; flex-shrink: 0; }
.acm-sort-wrap { position: relative; }
.acm-sort-select {
    appearance: none; -webkit-appearance: none;
    border: 1.5px solid var(--vc-border); border-radius: var(--vradius-sm);
    padding: 12px 40px 12px 16px;
    font-size: 1rem; font-weight: 600;
    background: var(--vc-bg); color: var(--vc-heading); cursor: pointer;
    transition: border-color var(--vt), box-shadow var(--vt);
}
.acm-sort-select:focus { outline: none; border-color: var(--vp); box-shadow: 0 0 0 3px var(--vp-light); }
.acm-sort-caret { position: absolute; right: 12px; top: 50%; transform: translateY(-50%); pointer-events: none; color: var(--vc-muted); }

/* ── Grid ──────────────────────────────────────────── */
.acm-videos-section { padding: 36px 0 80px; }

/* ── Card ──────────────────────────────────────────── */
.acm-vcard {
    background: var(--vc-bg);
    border-radius: var(--vradius);
    border: 1px solid var(--vc-border);
    overflow: hidden;
    display: flex; flex-direction: column;
    height: 100%;
    transition: transform var(--vt-s), box-shadow var(--vt-s), border-color var(--vt);
    box-shadow: 0 1px 4px rgba(15,23,42,.06);
}
.acm-vcard:hover {
    transform: translateY(-5px);
    box-shadow: 0 16px 40px rgba(15,23,42,.12), 0 4px 12px rgba(15,23,42,.06);
    border-color: rgba(4,107,210,.22);
}
html[data-theme='dark'] .acm-vcard { background: #141a27; border-color: rgba(255,255,255,.07); box-shadow: 0 1px 4px rgba(0,0,0,.25); }
html[data-theme='dark'] .acm-vcard:hover { box-shadow: 0 16px 40px rgba(0,0,0,.4); border-color: rgba(96,165,250,.22); }

/* Featured (first) card */
.acm-vcard--feat {
    flex-direction: row;
    border: 1.5px solid rgba(4,107,210,.2);
    box-shadow: 0 4px 20px rgba(15,23,42,.08);
}
.acm-vcard--feat:hover { box-shadow: 0 20px 52px rgba(15,23,42,.14); }
html[data-theme='dark'] .acm-vcard--feat { border-color: rgba(96,165,250,.18); }
@media (max-width: 991px) { .acm-vcard--feat { flex-direction: column; } }

/* ── Thumbnail ─────────────────────────────────────── */
.acm-vthumb {
    position: relative; overflow: hidden;
    aspect-ratio: 16/9; background: #07101f; cursor: pointer; flex-shrink: 0;
}
.acm-vcard--feat .acm-vthumb { width: 54%; aspect-ratio: unset; min-height: 300px; }
@media (max-width: 991px) { .acm-vcard--feat .acm-vthumb { width: 100%; aspect-ratio: 16/9; min-height: unset; } }

.acm-vthumb img { width: 100%; height: 100%; object-fit: cover; display: block; transition: transform .45s cubic-bezier(.4,0,.2,1); }
.acm-vcard:hover .acm-vthumb img { transform: scale(1.06); }

.acm-vthumb-ph { width: 100%; height: 100%; background: linear-gradient(135deg, #0b1e38, #046bd2); }

/* Bottom gradient */
.acm-vthumb-grad {
    position: absolute; inset: 0;
    background: linear-gradient(to top, rgba(6,12,28,.65) 0%, rgba(6,12,28,.08) 50%, transparent 100%);
    pointer-events: none; transition: opacity var(--vt);
}
.acm-vcard:hover .acm-vthumb-grad { opacity: .9; }

/* YouTube badge */
.acm-yt-pill {
    position: absolute; bottom: 10px; left: 10px;
    background: rgba(0,0,0,.75); color: #fff;
    font-size: .62rem; font-weight: 700; letter-spacing: .03em;
    padding: 3px 8px 3px 6px; border-radius: 4px;
    display: inline-flex; align-items: center; gap: 5px;
    backdrop-filter: blur(4px);
    transition: opacity var(--vt);
}
.acm-vcard:hover .acm-yt-pill { opacity: 0; }

/* NEW badge */
.acm-new-pill {
    position: absolute; top: 10px; right: 10px;
    background: var(--vg); color: #fff;
    font-size: .6rem; font-weight: 800; letter-spacing: .08em; text-transform: uppercase;
    padding: 3px 9px; border-radius: 4px;
    box-shadow: 0 2px 8px rgba(201,162,39,.4);
}

/* Play overlay */
.acm-vplay {
    position: absolute; inset: 0;
    display: flex; flex-direction: column;
    align-items: center; justify-content: center; gap: 10px;
    transition: background var(--vt);
}
.acm-vthumb:hover .acm-vplay { background: rgba(4,107,210,.12); }

.acm-play-ring {
    position: absolute;
    width: 72px; height: 72px; border-radius: 50%;
    border: 2px solid rgba(255,255,255,.3);
    opacity: 0; transform: scale(.7);
    transition: opacity .35s ease, transform .35s ease;
    pointer-events: none;
}
.acm-vthumb:hover .acm-play-ring { opacity: 1; transform: scale(1.45); }

.acm-play-circle {
    position: relative; z-index: 1;
    width: 58px; height: 58px; border-radius: 50%;
    background: rgba(255,255,255,.95);
    display: flex; align-items: center; justify-content: center;
    color: var(--vp);
    box-shadow: 0 4px 24px rgba(0,0,0,.28);
    transition: transform var(--vt), background var(--vt), color var(--vt), box-shadow var(--vt);
}
.acm-vcard--feat .acm-play-circle { width: 72px; height: 72px; }
.acm-vthumb:hover .acm-play-circle {
    transform: scale(1.1);
    background: var(--vp); color: #fff;
    box-shadow: 0 8px 32px rgba(4,107,210,.50);
}

.acm-play-label {
    position: relative; z-index: 1;
    font-size: .76rem; font-weight: 600; color: rgba(255,255,255,.9);
    background: rgba(0,0,0,.48); padding: 4px 14px; border-radius: 100px;
    opacity: 0; transform: translateY(8px);
    transition: opacity var(--vt), transform var(--vt);
    backdrop-filter: blur(4px);
}
.acm-vthumb:hover .acm-play-label { opacity: 1; transform: translateY(0); }

/* ── Embed ─────────────────────────────────────────── */
.acm-vembed { display: none; flex-shrink: 0; }
.acm-vcard--feat .acm-vembed { width: 54%; }
@media (max-width: 991px) { .acm-vcard--feat .acm-vembed { width: 100%; } }

.acm-vembed-wrap { position: relative; aspect-ratio: 16/9; background: #000; }
.acm-vcard--feat .acm-vembed-wrap { aspect-ratio: unset; height: 100%; min-height: 300px; }
@media (max-width: 991px) { .acm-vcard--feat .acm-vembed-wrap { min-height: unset; aspect-ratio: 16/9; } }

.acm-vembed-wrap iframe { width: 100%; height: 100%; border: 0; display: block; }
.acm-vclose {
    position: absolute; top: 10px; right: 10px;
    width: 32px; height: 32px; border-radius: 50%;
    background: rgba(0,0,0,.72); border: none; color: #fff; cursor: pointer;
    display: flex; align-items: center; justify-content: center;
    transition: background var(--vt), transform var(--vt); backdrop-filter: blur(4px);
}
.acm-vclose:hover { background: rgba(220,38,38,.85); transform: scale(1.1); }

/* ── Meta ──────────────────────────────────────────── */
.acm-vmeta { padding: 18px 20px 20px; display: flex; flex-direction: column; flex: 1; }
.acm-vcard--feat .acm-vmeta { flex: 1; padding: 28px 36px; justify-content: center; }

.acm-vmeta-header { display: flex; align-items: center; gap: 7px; margin-bottom: 10px; flex-wrap: wrap; }

.acm-vcat {
    display: inline-block; font-family: var(--vc-copy-font);
    font-size: .68rem; font-weight: 700;
    text-transform: uppercase; letter-spacing: .07em;
    color: #fff; background: var(--vp);
    padding: 3px 11px; border-radius: 4px; text-decoration: none;
    transition: background var(--vt), transform var(--vt);
}
.acm-vcat:hover { background: var(--vp-h); transform: translateY(-1px); text-decoration: none; color: #fff; }

.acm-vnew-chip {
    display: inline-block; font-family: var(--vc-copy-font);
    font-size: .65rem; font-weight: 800;
    text-transform: uppercase; letter-spacing: .07em;
    color: var(--vg); background: var(--vg-light);
    border: 1px solid rgba(201,162,39,.3);
    padding: 2px 8px; border-radius: 4px;
}

.acm-vtitle {
    font-family: var(--vc-title-font);
    font-size: clamp(1.18rem, 1.1vw + .95rem, 1.38rem);
    font-weight: 700; line-height: 1.32;
    letter-spacing: -.018em;
    color: var(--vc-heading); margin: 0 0 11px;
}
.acm-vcard--feat .acm-vtitle {
    font-family: var(--vc-title-font);
    font-size: clamp(1.35rem, 2.2vw, 1.75rem); font-weight: 700; line-height: 1.26;
    letter-spacing: -.015em; margin-bottom: 14px;
}
.acm-vtitle a {
    color: inherit; text-decoration: none;
    display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;
    transition: color var(--vt);
}
.acm-vcard--feat .acm-vtitle a { -webkit-line-clamp: 3; }
.acm-vtitle a:hover { color: var(--vp); }

.acm-vdesc {
    font-family: var(--vc-copy-font);
    font-size: .93rem; font-weight: 400; line-height: 1.72;
    letter-spacing: .004em; color: var(--vc-body);
    margin: 0 0 16px; flex: 1;
    display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;
}
.acm-vcard--feat .acm-vdesc {
    font-size: 1rem; line-height: 1.8;
    -webkit-line-clamp: 4;
}

.acm-vfooter {
    display: flex; align-items: center; justify-content: space-between;
    flex-wrap: wrap; gap: 6px; margin-top: auto;
    padding-top: 11px; border-top: 1px solid var(--vc-border);
}
.acm-vstats { display: flex; align-items: center; gap: 10px; flex-wrap: wrap; }
.acm-views, .acm-date {
    display: inline-flex; align-items: center; gap: 5px;
    font-family: var(--vc-copy-font);
    font-size: .78rem; font-weight: 600;
    letter-spacing: .02em; color: var(--vc-muted);
}
.acm-vtags { display: flex; gap: 5px; flex-wrap: wrap; }
.acm-vtag {
    font-family: var(--vc-copy-font);
    font-size: .74rem; font-weight: 600;
    color: var(--vp); text-decoration: none;
    padding: 2px 8px; border-radius: 4px;
    background: var(--vp-light); border: 1px solid rgba(4,107,210,.18);
    transition: all var(--vt); white-space: nowrap;
}
.acm-vtag:hover { background: var(--vp); color: #fff; border-color: var(--vp); text-decoration: none; }
html[data-theme='dark'] .acm-vtag { background: rgba(96,165,250,.1); border-color: rgba(96,165,250,.2); color: #60a5fa; }
html[data-theme='dark'] .acm-vtag:hover { background: #60a5fa; color: #0f172a; }

.acm-vcta {
    display: inline-flex; align-items: center; gap: 8px;
    margin-top: 22px;
    background: var(--vp); color: #fff; text-decoration: none;
    padding: 11px 24px; border-radius: 100px;
    font-size: .875rem; font-weight: 600;
    box-shadow: 0 3px 14px rgba(4,107,210,.28);
    transition: background var(--vt), transform var(--vt), box-shadow var(--vt);
}
.acm-vcta:hover { background: var(--vp-h); transform: translateY(-2px); box-shadow: 0 7px 22px rgba(4,107,210,.38); color: #fff; text-decoration: none; }

/* ── Empty state ───────────────────────────────────── */
.acm-empty { text-align: center; padding: 100px 20px; color: var(--vc-body); }
.acm-empty-ico { width: 80px; height: 80px; border-radius: 50%; background: var(--vc-page); margin: 0 auto 20px; display: flex; align-items: center; justify-content: center; color: var(--vc-muted); }
.acm-empty h3 { font-size: 1.2rem; font-weight: 700; color: var(--vc-heading); margin-bottom: 8px; }
.acm-empty p  { margin-bottom: 24px; }
.acm-empty-btn {
    display: inline-flex; align-items: center; gap: 8px;
    padding: 10px 24px; border: 2px solid var(--vp); color: var(--vp);
    text-decoration: none; border-radius: 100px; font-size: .875rem; font-weight: 600;
    transition: all var(--vt);
}
.acm-empty-btn:hover { background: var(--vp); color: #fff; text-decoration: none; }

/* ── Row gaps ──────────────────────────────────────── */
.acm-vgrid { --bs-gutter-x: 22px; --bs-gutter-y: 26px; }

/* ── Pagination ────────────────────────────────────── */
.acm-vpager { margin-top: 52px; display: flex; justify-content: center; }

/* ── Responsive ────────────────────────────────────── */
@media (max-width: 767px) {
    .acm-vhero { padding: 56px 0 44px; }
    .acm-vhero-stats { flex-direction: column; border-radius: 14px; }
    .acm-vhero-stat { border-right: none; border-bottom: 1px solid rgba(201,162,39,.12); }
    .acm-vhero-stat:last-child { border-bottom: none; }
    .acm-filter-bar { position: static; }
    .acm-filter-inner { gap: 10px; }
    .acm-videos-section { padding: 24px 0 60px; }
    .acm-vgrid { --bs-gutter-y: 18px; }
}
</style>

{{-- ══════════════════════════════════════════════════════
     HERO
══════════════════════════════════════════════════════ --}}
<section class="acm-vhero">
    <div class="acm-vhero-tex" aria-hidden="true"></div>
    <div class="acm-vhero-inner container">

        <div>
            <span class="acm-vhero-eyebrow">
                <span class="acm-vhero-dot"></span>
                {{ __('Video Library') }}
            </span>
        </div>

        <h1 class="acm-vhero-title">{{ __('Catholic Video Library') }}</h1>

        <p class="acm-vhero-sub">{{ __('Mass · Rosary · Adoration · Divine Mercy · Homilies — all in one place, free to watch anytime.') }}</p>

        <div class="acm-vhero-stats">
            <div class="acm-vhero-stat">
                <strong>{{ number_format($totalVideos) }}</strong>
                {{ __('Videos') }}
            </div>
            <div class="acm-vhero-stat">
                <strong>{{ $videoTags->count() ?: '10+' }}</strong>
                {{ __('Topics') }}
            </div>
            <div class="acm-vhero-stat">
                <strong>{{ __('Free') }}</strong>
                {{ __('To Watch') }}
            </div>
        </div>

    </div>
</section>

{{-- ══════════════════════════════════════════════════════
     FILTER BAR
══════════════════════════════════════════════════════ --}}
<div class="acm-filter-bar" id="acmFBar">
    <div class="container">
        <form method="GET" action="{{ route('public.videos') }}">
            <div class="acm-filter-inner">
                <div class="acm-filter-group">
                    <span class="acm-filter-label">
                        <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
                        {{ __('Topic') }}
                    </span>
                    <div class="acm-filter-chips">
                        <a href="{{ route('public.videos', ['sort' => $sort]) }}" class="acm-chip @if(!$tagId) acm-chip--active @endif">{{ __('All') }}</a>
                        @foreach($videoTags as $tag)
                            <a href="{{ route('public.videos', ['tag' => $tag->id, 'sort' => $sort]) }}" class="acm-chip @if($tagId == $tag->id) acm-chip--active @endif">{{ $tag->name }}</a>
                        @endforeach
                    </div>
                </div>
                <div class="acm-filter-sort">
                    <span class="acm-filter-label">
                        <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="8" y1="6" x2="21" y2="6"/><line x1="8" y1="12" x2="21" y2="12"/><line x1="8" y1="18" x2="21" y2="18"/><line x1="3" y1="6" x2="3.01" y2="6"/><line x1="3" y1="12" x2="3.01" y2="12"/><line x1="3" y1="18" x2="3.01" y2="18"/></svg>
                        {{ __('Sort') }}
                    </span>
                    <div class="acm-sort-wrap">
                        <select name="sort" class="acm-sort-select" onchange="this.form.submit()">
                            <option value="latest"  @selected($sort==='latest')>{{ __('Latest') }}</option>
                            <option value="popular" @selected($sort==='popular')>{{ __('Most Viewed') }}</option>
                        </select>
                        <svg class="acm-sort-caret" width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg>
                    </div>
                    @if($tagId)<input type="hidden" name="tag" value="{{ $tagId }}">@endif
                </div>
            </div>
        </form>
    </div>
</div>

{{-- ══════════════════════════════════════════════════════
     VIDEO GRID
══════════════════════════════════════════════════════ --}}
<section class="acm-videos-section">
    <div class="container">

    @if($videos->isEmpty())
        <div class="acm-empty">
            <div class="acm-empty-ico">
                <svg width="38" height="38" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4"><polygon points="23 7 16 12 23 17 23 7"/><rect x="1" y="5" width="15" height="14" rx="2"/><line x1="1" y1="1" x2="23" y2="23"/></svg>
            </div>
            <h3>{{ __('No videos found') }}</h3>
            <p>{{ __('Try a different topic or clear the filter.') }}</p>
            <a href="{{ route('public.videos') }}" class="acm-empty-btn">
                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><polyline points="1 4 1 10 7 10"/><path d="M3.51 15a9 9 0 1 0 .49-3.35"/></svg>
                {{ __('Show all videos') }}
            </a>
        </div>
    @else

        <div class="row acm-vgrid">
            @foreach($videos as $idx => $post)
                @php
                    $videoUrl = echo_get_post_video_url($post);
                    $videoId = $embedUrl = null; $thumbUrl = $thumbFallback = null; $isYt = false;
                    if ($videoUrl && str_contains($videoUrl, 'youtube.com')) {
                        $videoId  = \Botble\Theme\Supports\Youtube::getYoutubeVideoID($videoUrl);
                        $embedUrl    = 'https://www.youtube.com/embed/' . $videoId;
                        $thumbUrl    = 'https://img.youtube.com/vi/' . $videoId . '/hqdefault.jpg';
                        $thumbFallback = 'https://img.youtube.com/vi/' . $videoId . '/maxresdefault.jpg';
                        $isYt = true;
                    } elseif ($videoUrl && str_contains($videoUrl, 'vimeo.com')) {
                        preg_match('/vimeo\.com\/(\d+)/', $videoUrl, $m);
                        $embedUrl = isset($m[1]) ? 'https://player.vimeo.com/video/'.$m[1] : null;
                    }
                    $thumbUrl  ??= ($post->image ? RvMedia::getImageUrl($post->image, 'large') : null);
                    $category   = $post->firstCategory;
                    $isNew      = $post->created_at && $post->created_at->diffInDays($now) <= 14;
                    $isFeat     = $idx === 0 && !$tagId;
                @endphp

                <div class="{{ $isFeat ? 'col-12' : 'col-xl-4 col-lg-4 col-md-6' }} col-12">
                    <div class="acm-vcard {{ $isFeat ? 'acm-vcard--feat' : '' }}">

                        {{-- Thumbnail --}}
                        <div class="acm-vthumb {{ $isFeat ? 'acm-vthumb--feat' : '' }}"
                             data-embed="{{ $embedUrl }}"
                             role="button" tabindex="0"
                             aria-label="{{ __('Play :title', ['title' => $post->name]) }}">
                            @if($thumbUrl)
                                <img src="{{ $thumbUrl }}"
                                     alt="{{ $post->name }}"
                                     loading="{{ $isFeat ? 'eager' : 'lazy' }}"
                                     onerror="this.onerror=null;this.src='{{ $thumbFallback ?? $thumbUrl }}';">
                            @else
                                <div class="acm-vthumb-ph"></div>
                            @endif

                            <div class="acm-vthumb-grad" aria-hidden="true"></div>

                            @if($isYt)
                                <span class="acm-yt-pill" aria-hidden="true">
                                    <svg width="11" height="8" viewBox="0 0 22 15" fill="#ff0000"><path d="M21.5 2.3S21.3.7 20.6.1C19.7-.8 18.7-.8 18.2-.7 15.2 0 11 0 11 0S6.8 0 3.8.2c-.5.1-1.5 0-2.4.9C.7.7.5 2.3.5 2.3S.3 4.2.3 6v1.7c0 1.8.2 3.7.2 3.7s.2 1.6.9 2.2c.9.9 2.2.9 2.7.9C5.6 14.8 11 15 11 15s5.2 0 7.8-.2c.5-.1 1.5 0 2.4-.9.7-.6.9-2.2.9-2.2s.2-1.9.2-3.7V6c0-1.8-.2-3.7-.2-3.7zM8.9 10V4.4l6 2.9L8.9 10z"/></svg>
                                    YouTube
                                </span>
                            @endif

                            @if($isNew)
                                <span class="acm-new-pill">{{ __('New') }}</span>
                            @endif

                            <div class="acm-vplay" aria-hidden="true">
                                <div class="acm-play-ring"></div>
                                <span class="acm-play-circle">
                                    <svg width="{{ $isFeat ? 26 : 20 }}" height="{{ $isFeat ? 26 : 20 }}" viewBox="0 0 24 24" fill="currentColor"><polygon points="5 3 19 12 5 21 5 3"/></svg>
                                </span>
                                @if($isFeat)
                                    <span class="acm-play-label">{{ __('Watch Now') }}</span>
                                @endif
                            </div>
                        </div>

                        {{-- Embed --}}
                        @if($embedUrl)
                            <div class="acm-vembed">
                                <div class="acm-vembed-wrap">
                                    <iframe src="" data-src="{{ $embedUrl }}?autoplay=1&rel=0&modestbranding=1"
                                            frameborder="0"
                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                            allowfullscreen title="{{ $post->name }}"></iframe>
                                    <button class="acm-vclose" aria-label="{{ __('Close video') }}">
                                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
                                    </button>
                                </div>
                            </div>
                        @endif

                        {{-- Meta --}}
                        <div class="acm-vmeta {{ $isFeat ? 'acm-vcard--feat acm-vmeta' : '' }}">
                            <div class="acm-vmeta-header">
                                @if($category)
                                    <a href="{{ $category->url }}" class="acm-vcat">{{ $category->name }}</a>
                                @endif
                                @if($isNew && !$isFeat)
                                    <span class="acm-vnew-chip">{{ __('New') }}</span>
                                @endif
                            </div>

                            <h3 class="acm-vtitle {{ $isFeat ? 'acm-vcard--feat acm-vtitle' : '' }}">
                                <a href="{{ $post->url }}" title="{{ $post->name }}">{{ $post->name }}</a>
                            </h3>

                            @if($post->description)
                                <p class="acm-vdesc {{ $isFeat ? 'acm-vcard--feat acm-vdesc' : '' }}">
                                    {{ Str::limit($post->description, $isFeat ? 160 : 90) }}
                                </p>
                            @endif

                            <div class="acm-vfooter">
                                <div class="acm-vstats">
                                    <span class="acm-views">
                                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                                        {{ number_format($post->views) }}
                                    </span>
                                    @if($post->created_at)
                                        <span class="acm-date">
                                            <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                                            {{ $post->created_at->format('M j, Y') }}
                                        </span>
                                    @endif
                                </div>
                                @if($post->tags->isNotEmpty())
                                    <div class="acm-vtags">
                                        @foreach($post->tags->take(2) as $tag)
                                            <a href="{{ route('public.videos', ['tag' => $tag->id]) }}" class="acm-vtag">#{{ $tag->name }}</a>
                                        @endforeach
                                    </div>
                                @endif
                            </div>

                            @if($isFeat)
                                <a href="{{ $post->url }}" class="acm-vcta">
                                    {{ __('Read More') }}
                                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                                </a>
                            @endif
                        </div>

                    </div>
                </div>

            @endforeach
        </div>

        @if($videos->hasPages())
            <div class="acm-vpager">
                {!! $videos->withQueryString()->links(Theme::getThemeNamespace('partials.pagination')) !!}
            </div>
        @endif

    @endif
    </div>
</section>

{{-- ══ Inline JS ══ --}}
<script>
(function () {
    'use strict';

    // Play video
    document.querySelectorAll('.acm-vthumb').forEach(function (thumb) {
        function play() {
            var card   = thumb.closest('.acm-vcard');
            var embed  = card.querySelector('.acm-vembed');
            if (!embed) return;
            var iframe = embed.querySelector('iframe');
            if (iframe && !iframe.getAttribute('src')) iframe.src = iframe.dataset.src;
            thumb.style.display = 'none';
            embed.style.display = 'block';
            if (window.innerWidth < 768) card.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
        thumb.addEventListener('click', play);
        thumb.addEventListener('keydown', function (e) { if (e.key === 'Enter' || e.key === ' ') { e.preventDefault(); play(); } });
    });

    // Close embed
    document.querySelectorAll('.acm-vclose').forEach(function (btn) {
        btn.addEventListener('click', function () {
            var card  = btn.closest('.acm-vcard');
            var embed = card.querySelector('.acm-vembed');
            var thumb = card.querySelector('.acm-vthumb');
            var iframe = embed.querySelector('iframe');
            if (iframe) iframe.src = '';
            embed.style.display = 'none';
            thumb.style.display = '';
        });
    });

    // Filter bar scroll shadow
    var fbar = document.getElementById('acmFBar');
    if (fbar) {
        window.addEventListener('scroll', function () {
            fbar.classList.toggle('is-scrolled', window.scrollY > 60);
        }, { passive: true });
    }
}());
</script>
