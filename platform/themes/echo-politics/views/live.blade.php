@php
    Theme::layout('full-width');

    // Admin-configurable content (set from Appearance → Theme Options)
    $heroTitle    = theme_option('live_page_hero_title',    'Live Catholic Streams');
    $heroSubtitle = theme_option('live_page_hero_subtitle', 'Mass, Rosary, Adoration and more — broadcasting live from churches and organisations around the world.');
    $heroBadge    = theme_option('live_page_hero_badge',    'Broadcasting Live');
    $heroImgRaw   = theme_option('live_page_hero_image');
    $heroBg       = $heroImgRaw ? \Botble\Media\Facades\RvMedia::url($heroImgRaw) : null;

    SeoHelper::setTitle($heroTitle . ' | AllCatholicMedia');
    SeoHelper::setDescription($heroSubtitle);
@endphp

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400;1,600&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<style>
/* ═══════════════════════════════════════════════════════════
   LIVE STREAMS PAGE — AllCatholicMedia  (Refined 2026)
   Palette: Navy #0d1f3c · Red #dc2626 · Gold #c9a227
═══════════════════════════════════════════════════════════ */
:root {
    --lr: #dc2626;
    --lr-h: #b91c1c;
    --lr-soft: rgba(220,38,38,.12);
    --lg: #c9a227;
    --lg-lt: rgba(201,162,39,.15);
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
    --rad: 16px;
    --rad-sm: 10px;
    --tr: .22s ease;
    --shadow-card: 0 2px 8px rgba(13,31,60,.06), 0 8px 28px rgba(13,31,60,.07);
    --shadow-hover: 0 20px 52px rgba(13,31,60,.13), 0 8px 20px rgba(220,38,38,.07);
}
html[data-theme='dark'] {
    --l-card: #111827;
    --l-bg: #080d18;
    --l-border: rgba(255,255,255,.07);
    --l-head: #eef2f9;
    --l-body: rgba(218,228,244,.70);
    --l-muted: #4a5a6e;
    --shadow-card: 0 2px 8px rgba(0,0,0,.20), 0 8px 28px rgba(0,0,0,.22);
}

/* ── Animations ─────────────────────────────────────────── */
@keyframes livePulse {
    0%,100%{opacity:1;transform:scale(1)}
    50%{opacity:.25;transform:scale(.5)}
}
@keyframes liveRing {
    0%{transform:scale(1);opacity:.7}
    100%{transform:scale(2.5);opacity:0}
}
@keyframes lCardIn {
    from{opacity:0;transform:translateY(20px)}
    to{opacity:1;transform:translateY(0)}
}
@keyframes shimmer {
    0%{background-position:-200% 0}
    100%{background-position:200% 0}
}

/* ══════════════════════════════════════════════════════════
   HERO
══════════════════════════════════════════════════════════ */
.lv-hero {
    position: relative;
    overflow: hidden;
    padding: 80px 0 68px;
    text-align: center;
    @if($heroBg)
    background: url('{{ $heroBg }}') center center / cover no-repeat;
    @else
    background: linear-gradient(158deg, #040a14 0%, #0b1a35 38%, #0d1f3c 65%, #060d1a 100%);
    @endif
}

/* Dark overlay when using image */
.lv-hero::before {
    content: '';
    position: absolute; inset: 0;
    @if($heroBg)
    background: rgba(4,10,20,.72);
    @else
    background: radial-gradient(ellipse at 50% 10%,
        rgba(220,38,38,.15) 0%,
        rgba(13,31,60,.08) 42%,
        transparent 65%);
    @endif
    pointer-events: none;
}

/* Bottom edge glow line */
.lv-hero::after {
    content: '';
    position: absolute;
    bottom: 0; left: 0; right: 0; height: 1px;
    background: linear-gradient(90deg, transparent 5%, rgba(201,162,39,.40) 50%, transparent 95%);
}

/* Dot-grid texture */
.lv-hero-tex {
    position: absolute; inset: 0;
    background-image: radial-gradient(circle, rgba(201,162,39,.05) 1px, transparent 1px);
    background-size: 32px 32px;
    pointer-events: none;
}

.lv-hero-inner { position: relative; z-index: 2; }

/* Cross watermarks */
.lv-hero-cross {
    position: absolute;
    top: 50%; transform: translateY(-50%);
    width: 160px; height: 160px;
    opacity: .04;
    pointer-events: none;
}
.lv-hero-cross.right { right: 7%; }
.lv-hero-cross.left  { left: 7%; }

/* Live badge pill */
.lv-hero-badge {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    background: rgba(220,38,38,.14);
    border: 1px solid rgba(220,38,38,.40);
    color: #fca5a5;
    font-family: var(--bf);
    font-size: .68rem;
    font-weight: 700;
    letter-spacing: .14em;
    text-transform: uppercase;
    padding: 7px 20px;
    border-radius: 100px;
    margin-bottom: 24px;
    backdrop-filter: blur(6px);
}
.lv-badge-dot {
    position: relative;
    width: 9px; height: 9px;
    flex-shrink: 0;
}
.lv-badge-dot::before {
    content: '';
    position: absolute; inset: 0;
    border-radius: 50%;
    background: #ef4444;
    animation: livePulse 1.5s ease-in-out infinite;
}
.lv-badge-dot::after {
    content: '';
    position: absolute; inset: 0;
    border-radius: 50%;
    background: #ef4444;
    animation: liveRing 1.5s ease-out infinite;
}

/* Page title */
.lv-hero-title {
    font-family: var(--hf);
    font-size: clamp(2.4rem, 5vw, 4.2rem);
    font-weight: 700;
    color: #f8fafc;
    margin: 0 0 14px;
    letter-spacing: -.03em;
    line-height: 1.07;
    text-shadow: 0 4px 20px rgba(0,0,0,.24);
}
.lv-hero-title em {
    font-style: italic;
    background: linear-gradient(135deg, #fbbf24 0%, #ef4444 55%, #fca5a5 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

/* Subtitle */
.lv-hero-desc {
    font-family: var(--bf);
    font-size: clamp(.92rem, 1.6vw, 1.06rem);
    font-weight: 300;
    color: rgba(226,232,240,.82);
    max-width: 540px;
    margin: 0 auto 40px;
    line-height: 1.8;
}

/* Stats strip */
.lv-hero-stats {
    display: inline-flex;
    border: 1px solid rgba(201,162,39,.28);
    border-radius: 100px;
    background: rgba(255,255,255,.04);
    backdrop-filter: blur(12px);
    overflow: hidden;
}
.lv-hero-stat {
    padding: 12px 28px;
    font-family: var(--bf);
    font-size: .72rem;
    color: rgba(226,232,240,.65);
    border-right: 1px solid rgba(201,162,39,.14);
    text-align: center;
    line-height: 1.3;
}
.lv-hero-stat:last-child { border-right: none; }
.lv-hero-stat strong {
    display: block;
    font-size: 1.12rem;
    font-weight: 700;
    color: #fbbf24;
    font-family: var(--hf);
    margin-bottom: 3px;
}

/* ══════════════════════════════════════════════════════════
   PAGE BODY
══════════════════════════════════════════════════════════ */
.lv-body {
    background: var(--l-bg);
    padding: 56px 0 96px;
    min-height: 60vh;
}

/* ── Section heading ───────────────────────────────────── */
.lv-sh {
    display: flex;
    align-items: center;
    gap: 16px;
    margin-bottom: 32px;
}
.lv-sh-line {
    flex: 1; height: 1px;
    background: linear-gradient(to right, var(--l-border), transparent);
}
.lv-sh-line.r {
    background: linear-gradient(to left, var(--l-border), transparent);
}
.lv-sh-title {
    font-family: var(--hf);
    font-size: 1.2rem;
    font-weight: 600;
    color: var(--l-head);
    white-space: nowrap;
    display: flex; align-items: center; gap: 12px;
}

/* ── LIVE badge ────────────────────────────────────────── */
.lv-badge {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    background: var(--lr);
    color: #fff;
    font-family: var(--bf);
    font-size: .60rem;
    font-weight: 800;
    letter-spacing: .10em;
    text-transform: uppercase;
    padding: 4px 11px;
    border-radius: 6px;
    box-shadow: 0 2px 8px rgba(220,38,38,.35);
}
.lv-badge-d {
    width: 6px; height: 6px;
    border-radius: 50%; background: #fff;
    animation: livePulse 1.2s ease-in-out infinite;
    flex-shrink: 0;
}

/* Calendar icon for upcoming */
.lv-cal-ico {
    width: 36px; height: 36px;
    border-radius: 9px;
    background: rgba(201,162,39,.12);
    border: 1px solid rgba(201,162,39,.28);
    display: flex; align-items: center; justify-content: center;
    color: var(--lg);
    flex-shrink: 0;
}

/* ══════════════════════════════════════════════════════════
   FEATURED STREAM (single live stream)
══════════════════════════════════════════════════════════ */
.lv-featured {
    background: var(--l-card);
    border: 1px solid var(--l-border);
    border-radius: var(--rad);
    overflow: hidden;
    box-shadow: var(--shadow-card);
    margin-bottom: 56px;
    display: grid;
    grid-template-columns: 1fr 360px;
}
.lv-featured-media {
    position: relative;
    background: #000;
    aspect-ratio: 16/9;
    min-height: 0;
}
.lv-featured-media iframe,
.lv-featured-media-embed { width: 100%; height: 100%; border: 0; }
.lv-featured-side {
    padding: 32px 28px 28px;
    display: flex; flex-direction: column;
    border-left: 1px solid var(--l-border);
}
.lv-featured-label {
    font-family: var(--bf);
    font-size: .68rem; font-weight: 800;
    letter-spacing: .14em; text-transform: uppercase;
    color: var(--lb);
    margin-bottom: 14px;
    display: flex; align-items: center; gap: 8px;
}
.lv-featured-title {
    font-family: var(--hf);
    font-size: 1.45rem; font-weight: 700;
    color: var(--l-head);
    line-height: 1.3;
    margin-bottom: 12px;
}
.lv-featured-source {
    font-family: var(--bf);
    font-size: .85rem; color: var(--l-body);
    display: flex; align-items: center; gap: 7px;
    margin-bottom: 10px;
}
.lv-featured-desc {
    font-family: var(--bf);
    font-size: .88rem; color: var(--l-body);
    line-height: 1.7; margin-bottom: 22px; flex: 1;
}
.lv-featured-loc {
    font-family: var(--bf);
    font-size: .80rem; color: var(--l-muted);
    display: flex; align-items: center; gap: 6px;
    margin-bottom: 24px;
}
.lv-watch-btn {
    display: inline-flex; align-items: center; gap: 10px;
    background: var(--lr);
    color: #fff;
    font-family: var(--bf);
    font-size: .88rem; font-weight: 700;
    padding: 12px 24px;
    border-radius: var(--rad-sm);
    border: none; cursor: pointer;
    text-decoration: none;
    transition: background var(--tr), transform var(--tr), box-shadow var(--tr);
    box-shadow: 0 4px 14px rgba(220,38,38,.30);
}
.lv-watch-btn:hover {
    background: var(--lr-h);
    transform: translateY(-1px);
    box-shadow: 0 6px 20px rgba(220,38,38,.40);
    color: #fff; text-decoration: none;
}
.lv-watch-btn svg { flex-shrink: 0; }

/* ══════════════════════════════════════════════════════════
   STREAM CARDS GRID
══════════════════════════════════════════════════════════ */
.lv-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    gap: 24px;
    margin-bottom: 56px;
}
.lv-card {
    background: var(--l-card);
    border: 1px solid var(--l-border);
    border-radius: var(--rad);
    overflow: hidden;
    display: flex; flex-direction: column;
    position: relative;
    box-shadow: var(--shadow-card);
    transition: transform .30s cubic-bezier(.22,1,.36,1),
                box-shadow .30s ease, border-color var(--tr);
    animation: lCardIn .5s cubic-bezier(.22,1,.36,1) both;
}
.lv-card::before {
    content: '';
    position: absolute;
    top: 0; left: 0; right: 0; height: 3px;
    background: linear-gradient(90deg, #c9a227, #ef4444 50%, #c9a227);
    opacity: 0; transition: opacity .22s ease; z-index: 3;
}
.lv-card:hover {
    transform: translateY(-7px);
    box-shadow: var(--shadow-hover);
    border-color: rgba(220,38,38,.25);
}
.lv-card:hover::before { opacity: 1; }

/* thumbnail */
.lv-thumb {
    position: relative;
    aspect-ratio: 16/9;
    background: linear-gradient(145deg, #0a1525, #152236 50%, #080f1e);
    overflow: hidden;
    cursor: pointer;
    flex-shrink: 0;
}
.lv-thumb img {
    width: 100%; height: 100%;
    object-fit: cover; display: block;
    transition: transform .50s cubic-bezier(.22,1,.36,1);
}
.lv-card:hover .lv-thumb img { transform: scale(1.06); }
.lv-thumb-overlay {
    position: absolute; inset: 0;
    background: linear-gradient(to top, rgba(4,10,20,.75) 0%, rgba(4,10,20,.10) 50%, transparent 75%);
    pointer-events: none;
}

/* play button */
.lv-play-wrap {
    position: absolute; inset: 0;
    display: flex; align-items: center; justify-content: center;
    background: rgba(0,0,0,.18);
    transition: background var(--tr);
    border: none; cursor: pointer; width: 100%; height: 100%;
}
.lv-play-wrap:hover { background: rgba(0,0,0,.42); }
.lv-play-btn {
    width: 64px; height: 64px;
    background: rgba(255,255,255,.96);
    border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
    box-shadow: 0 4px 24px rgba(0,0,0,.28);
    transition: transform .22s ease, box-shadow .22s ease;
    pointer-events: none;
}
.lv-play-wrap:hover .lv-play-btn {
    transform: scale(1.12);
    box-shadow: 0 8px 32px rgba(0,0,0,.38);
}
.lv-play-btn svg { margin-left: 5px; }

/* LIVE thumb badge */
.lv-thumb-badge {
    position: absolute;
    top: 12px; left: 12px; z-index: 4;
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
    top: 10px; right: 10px; z-index: 10;
    background: rgba(0,0,0,.74);
    color: #fff; border: none;
    border-radius: 50%;
    width: 32px; height: 32px;
    cursor: pointer;
    display: flex; align-items: center; justify-content: center;
    font-size: 14px;
    transition: background var(--tr);
}
.lv-close:hover { background: rgba(220,38,38,.82); }

/* card body */
.lv-card-body { padding: 20px 20px 18px; display: flex; flex-direction: column; flex: 1; }
.lv-card-source {
    display: flex; align-items: center; gap: 7px;
    font-family: var(--bf); font-size: .68rem; font-weight: 700;
    color: var(--lb); letter-spacing: .05em; text-transform: uppercase;
    margin-bottom: 8px;
}
.lv-card-title {
    font-family: var(--hf);
    font-size: 1.10rem; font-weight: 700;
    color: var(--l-head);
    margin-bottom: 8px; line-height: 1.30;
}
.lv-card-desc {
    font-family: var(--bf);
    font-size: .83rem; color: var(--l-body);
    line-height: 1.65; margin-bottom: 12px;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
.lv-card-footer {
    display: flex; align-items: center; justify-content: space-between;
    margin-top: auto; padding-top: 12px;
    border-top: 1px solid var(--l-border);
}
.lv-card-meta {
    display: flex; align-items: center; gap: 6px;
    font-family: var(--bf); font-size: .78rem; color: var(--l-muted);
}
.lv-card-meta svg { flex-shrink: 0; }
.lv-card-watch {
    font-family: var(--bf);
    font-size: .78rem; font-weight: 700;
    color: var(--lr);
    display: flex; align-items: center; gap: 5px;
    cursor: pointer; background: none; border: none; padding: 0;
    transition: color var(--tr);
}
.lv-card-watch:hover { color: var(--lr-h); }

/* no-image placeholder */
.lv-no-thumb {
    width: 100%; height: 100%;
    background: linear-gradient(145deg, #0a1525, #162236);
    display: flex; align-items: center; justify-content: center;
}

/* ══════════════════════════════════════════════════════════
   UPCOMING SCHEDULE
══════════════════════════════════════════════════════════ */
.lv-tz {
    font-family: var(--bf);
    font-size: .80rem; color: var(--l-muted);
    margin-bottom: 20px;
    display: flex; align-items: center; gap: 7px;
    padding: 10px 16px;
    background: var(--l-card);
    border: 1px solid var(--l-border);
    border-radius: var(--rad-sm);
    width: fit-content;
}
.lv-tz strong { color: var(--lb); font-weight: 600; }

.lv-upcoming { display: flex; flex-direction: column; gap: 10px; }

/* Day group label */
.lv-day-label {
    font-family: var(--bf);
    font-size: .68rem; font-weight: 800;
    letter-spacing: .10em; text-transform: uppercase;
    color: var(--l-muted);
    padding: 4px 0 2px 2px;
    margin-top: 8px;
    border-bottom: 1px solid var(--l-border);
    padding-bottom: 6px;
}
.lv-day-label:first-child { margin-top: 0; }

.lv-uitem {
    background: var(--l-card);
    border: 1px solid var(--l-border);
    border-radius: var(--rad);
    padding: 16px 22px;
    display: flex; align-items: center; gap: 20px;
    transition: transform .22s ease, box-shadow .22s ease, border-color var(--tr);
    box-shadow: 0 1px 4px rgba(0,0,0,.04);
    position: relative; overflow: hidden;
    text-decoration: none;
}
.lv-uitem::before {
    content: '';
    position: absolute;
    left: 0; top: 0; bottom: 0; width: 3px;
    background: linear-gradient(to bottom, var(--lg), #f59e0b);
    opacity: 0; transition: opacity var(--tr);
}
.lv-uitem:hover {
    transform: translateX(5px);
    box-shadow: 0 4px 20px rgba(0,0,0,.09);
    border-color: rgba(201,162,39,.28);
    text-decoration: none;
}
.lv-uitem:hover::before { opacity: 1; }

.lv-utime {
    min-width: 90px; text-align: center;
    background: var(--lg-lt);
    border: 1px solid rgba(201,162,39,.22);
    border-radius: var(--rad-sm);
    padding: 10px 8px;
    flex-shrink: 0;
}
.lv-utime-hm {
    font-family: var(--hf);
    font-size: 1.18rem; font-weight: 700;
    color: #92700a; display: block; line-height: 1;
}
html[data-theme='dark'] .lv-utime-hm { color: var(--lg); }
.lv-utime-date {
    font-family: var(--bf);
    font-size: .68rem; color: var(--l-muted);
    margin-top: 4px; display: block;
}
.lv-uinfo { flex: 1; min-width: 0; }
.lv-utitle {
    font-family: var(--hf);
    font-size: 1.02rem; font-weight: 700;
    color: var(--l-head); margin-bottom: 4px;
    white-space: nowrap; overflow: hidden; text-overflow: ellipsis;
}
.lv-usource {
    font-family: var(--bf);
    font-size: .80rem; color: var(--l-body);
    display: flex; align-items: center; gap: 6px;
}
.lv-uloc {
    font-family: var(--bf);
    font-size: .75rem; color: var(--l-muted);
    display: flex; align-items: center; gap: 5px;
    white-space: nowrap; flex-shrink: 0;
}
.lv-countdown {
    font-family: var(--bf);
    font-size: .72rem; font-weight: 600;
    color: var(--lr);
    white-space: nowrap;
    background: var(--lr-soft);
    padding: 4px 10px;
    border-radius: 100px;
    flex-shrink: 0;
}

/* ══════════════════════════════════════════════════════════
   EMPTY STATES
══════════════════════════════════════════════════════════ */
.lv-empty {
    text-align: center;
    padding: 72px 40px;
    background: var(--l-card);
    border: 1.5px dashed var(--l-border);
    border-radius: var(--rad);
}
.lv-empty-ico {
    width: 76px; height: 76px; border-radius: 50%;
    background: linear-gradient(145deg, #0a1525, #162236);
    display: flex; align-items: center; justify-content: center;
    font-size: 2rem; margin: 0 auto 20px;
    box-shadow: 0 0 32px rgba(220,38,38,.12);
    color: rgba(220,38,38,.50);
}
.lv-empty h3 {
    font-family: var(--hf); font-size: 1.35rem;
    color: var(--l-head); margin-bottom: 8px;
}
.lv-empty p {
    font-family: var(--bf); font-size: .90rem;
    color: var(--l-muted); margin: 0; line-height: 1.7;
    max-width: 380px; margin: 0 auto;
}
.lv-empty-quote {
    display: block; margin-top: 20px;
    font-family: var(--hf); font-style: italic;
    font-size: 1rem; color: var(--l-body);
    border-top: 1px solid var(--l-border);
    padding-top: 20px;
}

/* ══════════════════════════════════════════════════════════
   INFO STRIP (bottom CTA)
══════════════════════════════════════════════════════════ */
.lv-info-strip {
    background: linear-gradient(135deg, #0d1f3c 0%, #162a4a 100%);
    border-radius: var(--rad);
    padding: 36px 40px;
    display: flex; align-items: center; gap: 32px;
    margin-top: 60px;
    border: 1px solid rgba(201,162,39,.18);
}
.lv-info-strip-icon {
    width: 56px; height: 56px;
    border-radius: 14px;
    background: rgba(201,162,39,.14);
    border: 1px solid rgba(201,162,39,.24);
    display: flex; align-items: center; justify-content: center;
    color: var(--lg);
    flex-shrink: 0;
}
.lv-info-strip-text { flex: 1; }
.lv-info-strip-text h4 {
    font-family: var(--hf);
    font-size: 1.1rem; font-weight: 700;
    color: #f8fafc; margin-bottom: 6px;
}
.lv-info-strip-text p {
    font-family: var(--bf);
    font-size: .85rem; color: rgba(226,232,240,.65);
    margin: 0; line-height: 1.65;
}
.lv-info-strip-link {
    font-family: var(--bf);
    font-size: .85rem; font-weight: 700;
    color: #fbbf24;
    white-space: nowrap;
    text-decoration: none;
    display: flex; align-items: center; gap: 6px;
    flex-shrink: 0;
    transition: color var(--tr);
}
.lv-info-strip-link:hover { color: #fcd34d; text-decoration: none; }

/* ══════════════════════════════════════════════════════════
   RESPONSIVE
══════════════════════════════════════════════════════════ */
@media(max-width:1024px){
    .lv-featured { grid-template-columns: 1fr; }
    .lv-featured-side { border-left: none; border-top: 1px solid var(--l-border); }
    .lv-featured-media { aspect-ratio: 16/9; }
}
@media(max-width:768px){
    .lv-hero { padding: 56px 0 44px; }
    .lv-hero-stats { flex-direction: column; border-radius: 14px; }
    .lv-hero-stat { border-right: none; border-bottom: 1px solid rgba(201,162,39,.12); }
    .lv-hero-stat:last-child { border-bottom: none; }
    .lv-hero-cross { display: none; }
    .lv-hero-cross.left { display: none; }
    .lv-grid { grid-template-columns: 1fr; gap: 16px; }
    .lv-uloc,.lv-countdown { display: none; }
    .lv-info-strip { flex-direction: column; gap: 20px; text-align: center; padding: 28px 22px; }
    .lv-info-strip-icon { margin: 0 auto; }
}
@media(max-width:480px){
    .lv-hero-title { font-size: 2.1rem; }
    .lv-uitem { padding: 12px 14px; gap: 14px; }
    .lv-utime { min-width: 74px; }
    .lv-featured-side { padding: 22px 18px; }
    .lv-empty { padding: 48px 24px; }
}
</style>

{{-- ══════════════════════════════════════════════════════════
     HERO
══════════════════════════════════════════════════════════ --}}
<section class="lv-hero">
    <div class="lv-hero-tex" aria-hidden="true"></div>

    {{-- Cross watermarks --}}
    <svg class="lv-hero-cross left" viewBox="0 0 100 160" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
        <rect x="38" y="0" width="24" height="160" rx="6" fill="white"/>
        <rect x="0" y="42" width="100" height="24" rx="6" fill="white"/>
    </svg>
    <svg class="lv-hero-cross right" viewBox="0 0 100 160" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
        <rect x="38" y="0" width="24" height="160" rx="6" fill="white"/>
        <rect x="0" y="42" width="100" height="24" rx="6" fill="white"/>
    </svg>

    <div class="container">
        <div class="lv-hero-inner">

            <div>
                <span class="lv-hero-badge">
                    <span class="lv-badge-dot"></span>
                    {{ $heroBadge }}
                </span>
            </div>

            <h1 class="lv-hero-title">
                @php
                    $parts = explode(' ', $heroTitle, -0);
                    $last  = array_pop($parts);
                @endphp
                {{ implode(' ', $parts) }} <em>{{ $last }}</em>
            </h1>

            <p class="lv-hero-desc">{{ $heroSubtitle }}</p>

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

{{-- ══════════════════════════════════════════════════════════
     MAIN CONTENT
══════════════════════════════════════════════════════════ --}}
<div class="lv-body">
<div class="container">

    {{-- ── Live Now ──────────────────────────────────────────── --}}
    <div style="margin-bottom: 60px;">
        <div class="lv-sh">
            <span class="lv-sh-line"></span>
            <h2 class="lv-sh-title">
                <span class="lv-badge"><span class="lv-badge-d"></span>{{ __('LIVE') }}</span>
                {{ __('Streaming Right Now') }}
            </h2>
            <span class="lv-sh-line r"></span>
        </div>

        @if($liveNow->count())

            @if($liveNow->count() === 1)
                {{-- ── Featured single stream ─── --}}
                @php $fs = $liveNow->first(); $fsThumb = $fs->thumbnail ?: $fs->youtube_thumbnail; @endphp
                <div class="lv-featured js-featured-card">
                    <div class="lv-featured-media js-feat-media">
                        {{-- Thumbnail shown first --}}
                        <div class="lv-thumb js-feat-thumb" style="aspect-ratio:16/9; cursor:pointer;">
                            @if($fsThumb)
                                <img src="{{ $fsThumb }}" alt="{{ $fs->title }}" style="width:100%;height:100%;object-fit:cover;display:block;">
                            @else
                                <div class="lv-no-thumb" style="aspect-ratio:16/9;">
                                    <svg width="64" height="64" fill="none" stroke="rgba(148,163,184,.3)" stroke-width="1.2" viewBox="0 0 24 24"><polygon points="23 7 16 12 23 17 23 7"/><rect x="1" y="5" width="15" height="14" rx="2"/></svg>
                                </div>
                            @endif
                            <div class="lv-thumb-overlay"></div>
                            <span class="lv-thumb-badge"><span class="lv-badge"><span class="lv-badge-d"></span>{{ __('LIVE') }}</span></span>
                            <button class="lv-play-wrap js-lv-play" data-embed="{{ $fs->embed_code }}" aria-label="{{ __('Watch Live') }}">
                                <span class="lv-play-btn">
                                    <svg width="26" height="26" viewBox="0 0 24 24" fill="#dc2626"><polygon points="5 3 19 12 5 21 5 3"/></svg>
                                </span>
                            </button>
                        </div>
                        {{-- Embed hidden initially --}}
                        <div class="lv-embed js-lv-embed" style="display:none;aspect-ratio:16/9;">
                            <iframe src="" data-src="{{ $fs->embed_code }}" allowfullscreen allow="autoplay; encrypted-media"></iframe>
                            <button class="lv-close js-lv-close" aria-label="{{ __('Close') }}">&#x2715;</button>
                        </div>
                    </div>
                    <div class="lv-featured-side">
                        <div class="lv-featured-label">
                            <span class="lv-badge"><span class="lv-badge-d"></span>{{ __('LIVE NOW') }}</span>
                        </div>
                        <div class="lv-featured-title">{{ $fs->title }}</div>
                        @if($fs->source_name)
                            <div class="lv-featured-source">
                                <svg width="13" height="13" viewBox="0 0 24 24" fill="currentColor" style="color:var(--lb)"><circle cx="12" cy="12" r="10" opacity=".2"/><circle cx="12" cy="12" r="4"/></svg>
                                {{ $fs->source_name }}
                            </div>
                        @endif
                        @if($fs->description)
                            <div class="lv-featured-desc">{{ $fs->description }}</div>
                        @endif
                        @if($fs->location)
                            <div class="lv-featured-loc">
                                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                                {{ $fs->location }}
                            </div>
                        @endif
                        <button class="lv-watch-btn js-lv-play-featured" data-embed="{{ $fs->embed_code }}" aria-label="{{ __('Watch Live') }}">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><polygon points="5 3 19 12 5 21 5 3"/></svg>
                            {{ __('Watch Live Now') }}
                        </button>
                    </div>
                </div>

            @else
                {{-- ── Multiple streams grid ─── --}}
                <div class="lv-grid">
                    @foreach($liveNow as $i => $stream)
                        @php $thumb = $stream->thumbnail ?: $stream->youtube_thumbnail; @endphp
                        <article class="lv-card" style="animation-delay:{{ $i * 55 }}ms">

                            <div class="lv-thumb js-lv-thumb">
                                @if($thumb)
                                    <img src="{{ $thumb }}" alt="{{ $stream->title }}" loading="lazy">
                                @else
                                    <div class="lv-no-thumb">
                                        <svg width="48" height="48" fill="none" stroke="rgba(148,163,184,.3)" stroke-width="1.3" viewBox="0 0 24 24"><polygon points="23 7 16 12 23 17 23 7"/><rect x="1" y="5" width="15" height="14" rx="2"/></svg>
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
                                @if($stream->source_name)
                                    <div class="lv-card-source">
                                        <svg width="11" height="11" viewBox="0 0 24 24" fill="currentColor"><circle cx="12" cy="12" r="10" opacity=".2"/><circle cx="12" cy="12" r="4"/></svg>
                                        {{ $stream->source_name }}
                                    </div>
                                @endif
                                <div class="lv-card-title">{{ $stream->title }}</div>
                                @if($stream->description)
                                    <div class="lv-card-desc">{{ $stream->description }}</div>
                                @endif
                                <div class="lv-card-footer">
                                    @if($stream->location)
                                        <div class="lv-card-meta">
                                            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                                            {{ $stream->location }}
                                        </div>
                                    @else
                                        <div></div>
                                    @endif
                                    <button class="lv-card-watch js-lv-play" data-embed="{{ $stream->embed_code }}">
                                        <svg width="11" height="11" viewBox="0 0 24 24" fill="currentColor"><polygon points="5 3 19 12 5 21 5 3"/></svg>
                                        {{ __('Watch') }}
                                    </button>
                                </div>
                            </div>

                        </article>
                    @endforeach
                </div>
            @endif

        @else
            <div class="lv-empty">
                <div class="lv-empty-ico">
                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4"><polygon points="23 7 16 12 23 17 23 7"/><rect x="1" y="5" width="15" height="14" rx="2"/></svg>
                </div>
                <h3>{{ __('No Streams Live Right Now') }}</h3>
                <p>{{ __('No streams are broadcasting at this moment. Check the upcoming schedule below or come back soon.') }}</p>
                <em class="lv-empty-quote">"The Mass is the most perfect form of prayer." — Pope Paul VI</em>
            </div>
        @endif
    </div>

    {{-- ── Upcoming Schedule ─────────────────────────────────── --}}
    <div>
        <div class="lv-sh">
            <span class="lv-sh-line"></span>
            <h2 class="lv-sh-title">
                <span class="lv-cal-ico">
                    <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                </span>
                {{ __('Upcoming Streams') }}
            </h2>
            <span class="lv-sh-line r"></span>
        </div>

        <div class="lv-tz">
            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
            {{ __('Times shown in your local timezone:') }}
            <strong id="lv-user-tz">{{ __('loading…') }}</strong>
        </div>

        @if($upcoming->count())
            <div class="lv-upcoming" id="lv-upcoming-list">
                @foreach($upcoming as $stream)
                    <div class="lv-uitem"
                         data-utc="{{ $stream->scheduled_at->utc()->toIso8601String() }}">

                        <div class="lv-utime">
                            <span class="lv-utime-hm">{{ $stream->scheduled_at->format('g:i A') }}</span>
                            <span class="lv-utime-date">{{ $stream->scheduled_at->format('M j') }}</span>
                        </div>

                        <div class="lv-uinfo">
                            <div class="lv-utitle">{{ $stream->title }}</div>
                            @if($stream->source_name)
                                <div class="lv-usource">
                                    <svg width="10" height="10" viewBox="0 0 24 24" fill="currentColor"><circle cx="12" cy="12" r="10" opacity=".2"/><circle cx="12" cy="12" r="4"/></svg>
                                    {{ $stream->source_name }}
                                </div>
                            @endif
                        </div>

                        @if($stream->location)
                            <div class="lv-uloc">
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                                {{ $stream->location }}
                            </div>
                        @endif

                        <span class="lv-countdown js-countdown"
                              data-utc="{{ $stream->scheduled_at->utc()->toIso8601String() }}">
                        </span>

                    </div>
                @endforeach
            </div>
        @else
            <div class="lv-empty">
                <div class="lv-empty-ico">
                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                </div>
                <h3>{{ __('No Upcoming Streams Scheduled') }}</h3>
                <p>{{ __('No streams are currently scheduled. Check back soon — new streams are added regularly.') }}</p>
            </div>
        @endif
    </div>

    {{-- ── Info Strip ──────────────────────────────────────────── --}}
    <div class="lv-info-strip">
        <div class="lv-info-strip-icon">
            <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                <path d="M18.364 5.636a9 9 0 1 1-12.728 0"/>
                <line x1="12" y1="2" x2="12" y2="12"/>
            </svg>
        </div>
        <div class="lv-info-strip-text">
            <h4>{{ __('Want to broadcast on AllCatholicMedia?') }}</h4>
            <p>{{ __('Churches, ministries and Catholic organisations can submit their live streams to be featured here. Reach thousands of faithful viewers worldwide.') }}</p>
        </div>
        <a href="{{ url('/contact') }}" class="lv-info-strip-link">
            {{ __('Get Listed') }}
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
        </a>
    </div>

</div>
</div>

{{-- ══════════════════════════════════════════════════════════
     JavaScript
══════════════════════════════════════════════════════════ --}}
<script>
(function () {
    'use strict';

    /* ── Helper: find ancestor card ─────── */
    function card(el) {
        return el.closest('.lv-card, .lv-featured-card, .lv-featured');
    }

    /* ── Play buttons (grid cards) ──────── */
    document.querySelectorAll('.js-lv-play').forEach(function (btn) {
        btn.addEventListener('click', function () {
            var c     = card(btn);
            var thumb = c ? c.querySelector('.js-lv-thumb, .js-feat-thumb') : null;
            var emb   = c ? c.querySelector('.js-lv-embed') : null;
            if (!emb) return;
            var ifr = emb.querySelector('iframe');
            if (ifr) ifr.src = ifr.dataset.src;
            if (thumb) thumb.style.display = 'none';
            emb.style.display = 'block';
        });
    });

    /* ── Featured "Watch Live Now" button ─ */
    document.querySelectorAll('.js-lv-play-featured').forEach(function (btn) {
        btn.addEventListener('click', function () {
            var wrap  = document.querySelector('.lv-featured');
            if (!wrap) return;
            var thumb = wrap.querySelector('.js-feat-thumb, .js-lv-thumb');
            var emb   = wrap.querySelector('.js-lv-embed');
            if (!emb) return;
            var ifr   = emb.querySelector('iframe');
            if (ifr) ifr.src = btn.dataset.embed || ifr.dataset.src;
            if (thumb) thumb.style.display = 'none';
            emb.style.display = 'block';
            wrap.scrollIntoView({ behavior: 'smooth', block: 'start' });
        });
    });

    /* ── Close buttons ──────────────────── */
    document.querySelectorAll('.js-lv-close').forEach(function (btn) {
        btn.addEventListener('click', function () {
            var c     = card(btn);
            var wrap  = btn.closest('.lv-featured');
            var scope = c || wrap;
            if (!scope) return;
            var thumb = scope.querySelector('.js-lv-thumb, .js-feat-thumb');
            var emb   = scope.querySelector('.js-lv-embed');
            if (!emb) return;
            var ifr   = emb.querySelector('iframe');
            if (ifr) ifr.src = '';
            emb.style.display = 'none';
            if (thumb) thumb.style.display = '';
        });
    });

    /* ── User timezone display ──────────── */
    var tzEl = document.getElementById('lv-user-tz');
    if (tzEl) {
        try { tzEl.textContent = Intl.DateTimeFormat().resolvedOptions().timeZone; }
        catch (e) { tzEl.textContent = 'UTC'; }
    }

    /* ── Convert scheduled times to local ─ */
    document.querySelectorAll('.lv-uitem[data-utc]').forEach(function (item) {
        try {
            var d     = new Date(item.dataset.utc);
            var hmEl  = item.querySelector('.lv-utime-hm');
            var dtEl  = item.querySelector('.lv-utime-date');
            if (hmEl) hmEl.textContent = d.toLocaleTimeString([], { hour: 'numeric', minute: '2-digit' });
            if (dtEl) dtEl.textContent = d.toLocaleDateString([], { month: 'short', day: 'numeric' });
        } catch (e) {}
    });

    /* ── Countdown labels ───────────────── */
    function fmtCountdown(ms) {
        if (ms <= 0) return null;
        var s  = Math.floor(ms / 1000);
        var m  = Math.floor(s / 60);
        var h  = Math.floor(m / 60);
        var d  = Math.floor(h / 24);
        if (d > 0)  return d + 'd ' + (h % 24) + 'h';
        if (h > 0)  return h + 'h ' + (m % 60) + 'm';
        if (m > 0)  return m + 'm';
        return 'Soon';
    }

    function updateCountdowns() {
        var now = Date.now();
        document.querySelectorAll('.js-countdown').forEach(function (el) {
            try {
                var target = new Date(el.dataset.utc).getTime();
                var label  = fmtCountdown(target - now);
                el.textContent = label ? 'In ' + label : '';
                el.style.display = label ? '' : 'none';
            } catch (e) {}
        });
    }

    updateCountdowns();
    setInterval(updateCountdowns, 30000);

}());
</script>
