@php
    Theme::layout('full-width');
    SeoHelper::setTitle('Catholic Articles & Reflections | AllCatholicMedia');
    SeoHelper::setDescription('Read Catholic articles, reflections, homilies, and news — thoughtful content for the faithful, published daily.');
    $now = now();
@endphp

<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400;1,600&family=Cinzel:wght@400;600&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<style>
/* ═══════════════════════════════════════════════════════════
   READ (Articles) PAGE  ·  AllCatholicMedia  (v2 — 2026)
   Navy #0d1f3c  ·  Gold #c9a227  ·  Blue #046bd2
═══════════════════════════════════════════════════════════ */
:root {
    --rd-gold:     #c9a227;
    --rd-gold-h:   #a88520;
    --rd-gold-lt:  rgba(201,162,39,.12);
    --rd-navy:     #0d1f3c;
    --rd-navy-d:   #060e1d;
    --rd-navy-m:   #0c1a31;
    --rd-blue:     #046bd2;
    --rd-blue-h:   #0358b0;
    --rd-blue-lt:  rgba(4,107,210,.08);
    --rd-card:     #ffffff;
    --rd-bg:       #f0f4fb;
    --rd-border:   #dde4f0;
    --rd-head:     #0d1f3c;
    --rd-body:     #475569;
    --rd-muted:    #8898aa;
    --hf: 'Playfair Display', Georgia, serif;
    --cf: 'Cinzel', Georgia, serif;
    --bf: 'Inter', system-ui, sans-serif;
    --rad: 16px;
    --rad-sm: 9px;
    --tr: .22s ease;
    --shadow-card: 0 1px 4px rgba(13,31,60,.05), 0 6px 24px rgba(13,31,60,.08);
    --shadow-hover: 0 20px 52px rgba(13,31,60,.15), 0 6px 18px rgba(4,107,210,.10);
    --shadow-feat:  0 24px 64px rgba(13,31,60,.18), 0 8px 24px rgba(4,107,210,.12);
}
html[data-theme='dark'] {
    --rd-card:   #111827;
    --rd-bg:     #080d18;
    --rd-border: rgba(255,255,255,.07);
    --rd-head:   #eef2f9;
    --rd-body:   rgba(218,228,244,.70);
    --rd-muted:  #4a5a6e;
}

/* ── Keyframes ───────────────────────────────────────────── */
@keyframes rdDot     { 0%,100%{opacity:1;transform:scale(1)} 50%{opacity:.25;transform:scale(.48)} }
@keyframes rdCardIn  { from{opacity:0;transform:translateY(20px)} to{opacity:1;transform:translateY(0)} }
@keyframes rdFloat   { 0%,100%{transform:translateY(0) scale(1)} 50%{transform:translateY(-20px) scale(1.05)} }
@keyframes rdShimmer { 0%{opacity:0;transform:translateX(-100%) skewX(-16deg)} 60%{opacity:.4} 100%{opacity:0;transform:translateX(230%) skewX(-16deg)} }
@keyframes rdStatPulse { 0%,100%{box-shadow:0 0 28px rgba(201,162,39,.07)} 50%{box-shadow:0 0 52px rgba(201,162,39,.16)} }
@keyframes rdFeatBadge { 0%,100%{box-shadow:0 0 0 0 rgba(201,162,39,.0)} 50%{box-shadow:0 0 0 5px rgba(201,162,39,.10)} }

/* ══════════════════════════════════════════════════════════
   HERO
══════════════════════════════════════════════════════════ */
.rd-hero {
    position:relative; overflow:hidden;
    background:linear-gradient(158deg,#060e1d 0%,#0d1f3c 42%,#0b1a35 72%,#050c18 100%);
    padding:56px 0 48px; text-align:center;
}
/* Radial gold+blue glow */
.rd-hero::before {
    content:''; position:absolute;
    top:-130px; left:50%; transform:translateX(-50%);
    width:1000px; height:680px;
    background:radial-gradient(ellipse at 50% 32%,
        rgba(201,162,39,.20) 0%,rgba(4,107,210,.08) 46%,transparent 68%);
    pointer-events:none;
}
/* Bottom gold accent line */
.rd-hero::after {
    content:''; position:absolute;
    bottom:0; left:0; right:0; height:1px;
    background:linear-gradient(90deg,transparent 5%,rgba(201,162,39,.50) 50%,transparent 95%);
}
/* Dot-grid texture */
.rd-hero-tex {
    position:absolute; inset:0;
    background-image:radial-gradient(circle,rgba(201,162,39,.048) 1px,transparent 1px);
    background-size:32px 32px; pointer-events:none;
}
/* Cross watermarks — left & right */
.rd-hero-cross {
    position:absolute; top:50%; transform:translateY(-50%);
    width:150px; height:150px; opacity:.036; pointer-events:none;
}
.rd-hero-cross.left  { left:7%; }
.rd-hero-cross.right { right:7%; }
/* Floating orbs */
.rd-orb {
    position:absolute; border-radius:50%;
    filter:blur(68px); pointer-events:none;
}
.rd-orb-1 { width:240px;height:240px; top:4%; left:6%;  background:rgba(201,162,39,.068); animation:rdFloat 10s ease-in-out infinite; }
.rd-orb-2 { width:180px;height:180px; top:16%; right:8%; background:rgba(4,107,210,.06);  animation:rdFloat 14s ease-in-out infinite 4s; }
.rd-orb-3 { width:300px;height:300px; bottom:-70px; left:30%; background:rgba(201,162,39,.038); animation:rdFloat 18s ease-in-out infinite 8s; }

.rd-hero-inner { position:relative; z-index:2; }

/* Eyebrow badge */
.rd-hero-badge {
    display:inline-flex; align-items:center; gap:10px;
    background:rgba(4,107,210,.14); border:1px solid rgba(4,107,210,.44);
    color:#93c5fd;
    font-family:var(--bf); font-size:.68rem; font-weight:700;
    letter-spacing:.16em; text-transform:uppercase;
    padding:7px 22px; border-radius:100px; margin-bottom:16px;
    backdrop-filter:blur(6px);
}
.rd-badge-dot {
    width:6px; height:6px; border-radius:50%;
    background:#60a5fa; animation:rdDot 2s ease-in-out infinite; flex-shrink:0;
}

/* Ornament row */
.rd-hero-orn {
    display:flex; align-items:center; justify-content:center;
    gap:18px; margin-bottom:18px;
}
.rd-hero-orn-l {
    flex:1; max-width:140px; height:1px;
    background:linear-gradient(90deg,transparent,rgba(201,162,39,.44));
}
.rd-hero-orn-l.r { background:linear-gradient(270deg,transparent,rgba(201,162,39,.44)); }
.rd-hero-orn-ico {
    width:52px; height:52px; border:1.5px solid rgba(201,162,39,.38); border-radius:50%;
    display:flex; align-items:center; justify-content:center;
    font-size:1.4rem; color:var(--rd-gold);
    background:radial-gradient(ellipse at center,rgba(201,162,39,.14) 0%,transparent 70%);
    flex-shrink:0;
}

/* Title */
.rd-hero-title {
    font-family:var(--hf);
    font-size:clamp(3.0rem,5.8vw,4.8rem);
    font-weight:700; color:#f8fafc;
    margin:0 0 4px; letter-spacing:-.030em; line-height:1.03;
    text-shadow:0 6px 28px rgba(0,0,0,.28);
}
.rd-hero-title em {
    font-style:italic;
    background:linear-gradient(135deg,#fbbf24 0%,#60a5fa 55%,#a5f3fc 100%);
    -webkit-background-clip:text; -webkit-text-fill-color:transparent; background-clip:text;
}

/* Subtitle */
.rd-hero-sub {
    font-family:var(--bf);
    font-size:clamp(.94rem,1.6vw,1.08rem); font-weight:300;
    color:rgba(226,232,240,.80);
    max-width:540px; margin:10px auto 30px; line-height:1.82;
}

/* Stats pill */
.rd-hero-stats {
    display:inline-flex;
    border:1px solid rgba(201,162,39,.36); border-radius:100px;
    background:rgba(255,255,255,.05); backdrop-filter:blur(14px);
    overflow:hidden; animation:rdStatPulse 5s ease-in-out infinite;
}
.rd-hero-stat {
    padding:12px 30px;
    font-family:var(--bf); font-size:.72rem;
    color:rgba(226,232,240,.65);
    border-right:1px solid rgba(201,162,39,.16);
    text-align:center; line-height:1.3;
}
.rd-hero-stat:last-child { border-right:none; }
.rd-hero-stat strong {
    display:block; font-size:1.18rem; font-weight:700;
    color:#fbbf24; font-family:var(--hf); margin-bottom:3px;
}

/* ══════════════════════════════════════════════════════════
   FILTER BAR  (dark navy — editorial)
══════════════════════════════════════════════════════════ */
.rd-filter-bar {
    position:sticky; top:0; z-index:500;
    background:linear-gradient(180deg,#0c1a31 0%,#0a1628 100%);
    border-bottom:2px solid rgba(201,162,39,.22);
    box-shadow:0 6px 40px rgba(4,10,22,.46);
    overflow:hidden;
}
.rd-filter-top-line {
    position:absolute; top:0; left:0; right:0; height:2px;
    background:linear-gradient(90deg,transparent 5%,rgba(201,162,39,.50) 50%,transparent 95%);
}
.rd-filter-inner {
    display:flex; align-items:center; gap:0;
    min-height:56px; overflow-x:auto; scrollbar-width:none;
}
.rd-filter-inner::-webkit-scrollbar { display:none; }

/* "All" button */
.rd-filter-all {
    flex-shrink:0; display:flex; align-items:center; gap:7px;
    padding:0 22px; min-height:56px;
    font-family:var(--bf); font-size:.74rem; font-weight:700;
    letter-spacing:.12em; text-transform:uppercase;
    color:rgba(201,162,39,.58);
    text-decoration:none;
    border-right:1px solid rgba(201,162,39,.14);
    transition:color .18s ease, background .18s ease;
    position:relative; white-space:nowrap;
}
.rd-filter-all::after {
    content:''; position:absolute;
    bottom:0; left:50%; transform:translateX(-50%);
    width:0; height:2px;
    background:linear-gradient(90deg,var(--rd-blue),rgba(201,162,39,.80));
    transition:width .22s ease; border-radius:1px;
}
.rd-filter-all:hover { color:#fde68a; background:rgba(201,162,39,.06); text-decoration:none; }
.rd-filter-all:hover::after { width:70%; }
.rd-filter-all.active { color:#fde68a; background:rgba(201,162,39,.08); }
.rd-filter-all.active::after { width:84%; }

/* Category list */
.rd-filter-cats {
    flex:1; display:flex; align-items:stretch;
    border-right:1px solid rgba(201,162,39,.12);
    overflow-x:auto; scrollbar-width:none;
}
.rd-filter-cats::-webkit-scrollbar { display:none; }
.rd-filter-cat {
    flex-shrink:0; display:flex; align-items:center;
    padding:0 20px; min-height:56px;
    font-family:var(--bf); font-size:.80rem; font-weight:500;
    color:rgba(201,162,39,.48);
    text-decoration:none; white-space:nowrap;
    transition:color .16s ease, background .16s ease;
    border-bottom:2px solid transparent;
    position:relative;
}
.rd-filter-cat:hover {
    color:#93c5fd; background:rgba(4,107,210,.06);
    border-bottom-color:rgba(4,107,210,.40); text-decoration:none;
}
.rd-filter-cat.active {
    color:#93c5fd; background:rgba(4,107,210,.10);
    border-bottom-color:var(--rd-blue); font-weight:600;
}

/* Sort controls */
.rd-filter-sort {
    flex-shrink:0; display:flex; align-items:center; gap:0;
    padding:0 4px 0 16px; min-height:56px;
}
.rd-sort-lbl {
    font-family:var(--bf); font-size:.70rem; font-weight:700;
    letter-spacing:.10em; text-transform:uppercase;
    color:rgba(201,162,39,.38); white-space:nowrap; margin-right:10px;
}
.rd-sort-wrap { position:relative; }
.rd-sort-select {
    appearance:none; -webkit-appearance:none;
    background:rgba(255,255,255,.06); color:#93c5fd;
    border:1px solid rgba(4,107,210,.28); border-radius:8px;
    padding:8px 34px 8px 14px;
    font-family:var(--bf); font-size:.78rem; font-weight:600;
    cursor:pointer; transition:border-color .16s ease;
}
.rd-sort-select:focus { outline:none; border-color:rgba(4,107,210,.60); }
.rd-sort-select option { background:#0c1a31; color:#e2e8f0; }
.rd-sort-caret {
    position:absolute; right:10px; top:50%; transform:translateY(-50%);
    pointer-events:none; color:rgba(147,197,253,.60);
}

/* ══════════════════════════════════════════════════════════
   CONTENT BODY
══════════════════════════════════════════════════════════ */
.rd-body {
    background:var(--rd-bg);
    padding:48px 0 96px; min-height:60vh;
    position:relative;
}
.rd-body::before {
    content:''; position:absolute; inset:0;
    background-image:radial-gradient(circle,rgba(13,31,60,.026) 1px,transparent 1px);
    background-size:48px 48px; pointer-events:none;
}

/* ── Section heading ─────────────────────────────────────── */
.rd-sh {
    display:flex; align-items:center; gap:18px; margin-bottom:36px;
    position:relative; z-index:1;
}
.rd-sh-line {
    flex:1; height:1px;
    background:linear-gradient(to right,rgba(4,107,210,.20),transparent);
}
.rd-sh-line.r { background:linear-gradient(to left,rgba(4,107,210,.20),transparent); }
.rd-sh-title {
    font-family:var(--cf); font-size:.92rem; font-weight:600;
    color:var(--rd-head); white-space:nowrap;
    display:flex; align-items:center; gap:10px; letter-spacing:.06em;
}
.rd-sh-ico {
    width:28px; height:28px; border-radius:50%;
    background:var(--rd-blue-lt); border:1px solid rgba(4,107,210,.22);
    display:flex; align-items:center; justify-content:center;
    color:var(--rd-blue); flex-shrink:0;
    box-shadow:0 2px 8px rgba(4,107,210,.12);
}

/* ══════════════════════════════════════════════════════════
   FEATURED CARD
══════════════════════════════════════════════════════════ */
.rd-featured {
    display:grid; grid-template-columns:1fr 420px;
    background:var(--rd-card);
    border:1px solid var(--rd-border); border-radius:var(--rad);
    overflow:hidden; box-shadow:var(--shadow-card);
    margin-bottom:52px; text-decoration:none;
    position:relative;
    transition:transform .32s cubic-bezier(.22,1,.36,1),
               box-shadow .32s ease, border-color .22s ease;
}
/* Left gold accent bar */
.rd-featured::before {
    content:''; position:absolute;
    left:0; top:0; bottom:0; width:4px;
    background:linear-gradient(180deg,var(--rd-gold) 0%,var(--rd-blue) 50%,var(--rd-gold) 100%);
    z-index:4;
}
/* Shimmer on hover */
.rd-featured::after {
    content:''; position:absolute; top:0; left:0; width:80px; height:100%;
    background:linear-gradient(90deg,transparent,rgba(255,255,255,.04),transparent);
    transform:translateX(-100%) skewX(-16deg); opacity:0; z-index:3; pointer-events:none;
}
.rd-featured:hover {
    transform:translateY(-5px); box-shadow:var(--shadow-feat);
    border-color:rgba(4,107,210,.28); text-decoration:none;
}
.rd-featured:hover::after { animation:rdShimmer .80s ease forwards; }

/* Image side */
.rd-feat-img {
    position:relative; background:linear-gradient(145deg,#0a1525,#152236);
    overflow:hidden; min-height:340px;
}
.rd-feat-img img {
    width:100%; height:100%; object-fit:cover; display:block;
    transition:transform .54s cubic-bezier(.22,1,.36,1), filter .50s ease;
    filter:brightness(.96) saturate(1.05);
}
.rd-featured:hover .rd-feat-img img { transform:scale(1.05); filter:brightness(1.06) saturate(1.10); }
/* Multi-layer overlay */
.rd-feat-overlay {
    position:absolute; inset:0;
    background:linear-gradient(
        135deg,
        rgba(4,10,22,.04) 0%,
        transparent 40%,
        rgba(4,10,22,.18) 100%
    ); pointer-events:none;
}
/* FEATURED stamp */
.rd-feat-stamp {
    position:absolute; top:16px; left:16px; z-index:4;
    background:linear-gradient(135deg,var(--rd-gold),#b8921e);
    color:var(--rd-navy); font-family:var(--bf); font-size:.58rem; font-weight:800;
    letter-spacing:.16em; text-transform:uppercase;
    padding:5px 12px; border-radius:100px;
    box-shadow:0 3px 12px rgba(0,0,0,.28);
    animation:rdFeatBadge 3s ease-in-out infinite;
}

/* Info panel */
.rd-feat-side {
    padding:36px 34px 32px;
    display:flex; flex-direction:column;
    border-left:1px solid var(--rd-border);
}
.rd-feat-eyebrow {
    display:flex; align-items:center; gap:8px; margin-bottom:18px;
    font-family:var(--bf); font-size:.64rem; font-weight:800;
    letter-spacing:.14em; text-transform:uppercase; color:var(--rd-blue);
}
.rd-feat-eyebrow-dot { width:5px; height:5px; border-radius:50%; background:var(--rd-blue); }
.rd-feat-title {
    font-family:var(--hf); font-size:1.62rem; font-weight:700;
    color:var(--rd-head); line-height:1.25; margin-bottom:14px;
    transition:color var(--tr);
    display:-webkit-box; -webkit-line-clamp:3; -webkit-box-orient:vertical; overflow:hidden;
}
.rd-featured:hover .rd-feat-title { color:var(--rd-blue); }
.rd-feat-desc {
    font-family:var(--bf); font-size:.91rem; color:var(--rd-body);
    line-height:1.78; margin-bottom:22px; flex:1;
    display:-webkit-box; -webkit-line-clamp:4; -webkit-box-orient:vertical; overflow:hidden;
}
.rd-feat-meta {
    display:flex; align-items:center; gap:16px; flex-wrap:wrap;
    font-family:var(--bf); font-size:.76rem; color:var(--rd-muted);
    margin-bottom:24px; padding-bottom:20px;
    border-bottom:1px solid var(--rd-border);
}
.rd-feat-meta span { display:flex; align-items:center; gap:5px; }
.rd-feat-cta {
    display:inline-flex; align-items:center; gap:9px;
    background:linear-gradient(135deg,var(--rd-blue),var(--rd-blue-h));
    color:#fff; font-family:var(--bf); font-size:.84rem; font-weight:700;
    padding:12px 24px; border-radius:100px;
    text-decoration:none; width:fit-content;
    transition:all var(--tr);
    box-shadow:0 4px 16px rgba(4,107,210,.30);
}
.rd-feat-cta:hover {
    background:linear-gradient(135deg,var(--rd-gold),var(--rd-gold-h));
    color:var(--rd-navy); box-shadow:0 6px 22px rgba(201,162,39,.36);
    transform:translateY(-1px); gap:12px; text-decoration:none;
}

/* Placeholder for featured (no image) */
.rd-feat-ph {
    width:100%; height:100%;
    background:linear-gradient(145deg,#0a1525,#152236);
    display:flex; align-items:center; justify-content:center;
    font-size:4rem; color:rgba(201,162,39,.16);
}

/* ══════════════════════════════════════════════════════════
   ARTICLE GRID
══════════════════════════════════════════════════════════ */
.rd-grid {
    display:grid;
    grid-template-columns:repeat(auto-fill,minmax(300px,1fr));
    gap:26px;
    position:relative; z-index:1;
}

/* ── CARD ─────────────────────────────────────────────────── */
.rd-card {
    background:var(--rd-card);
    border:1px solid var(--rd-border); border-radius:var(--rad);
    overflow:hidden; display:flex; flex-direction:column;
    position:relative; box-shadow:var(--shadow-card);
    transition:transform .32s cubic-bezier(.22,1,.36,1), box-shadow .32s ease, border-color .22s ease;
    text-decoration:none;
    animation:rdCardIn .50s cubic-bezier(.22,1,.36,1) both;
}
/* Gold-to-blue top bar */
.rd-card::before {
    content:''; position:absolute;
    top:0; left:0; right:0; height:3px;
    background:linear-gradient(90deg,var(--rd-gold),var(--rd-blue) 50%,var(--rd-gold));
    opacity:0; transition:opacity .24s ease; z-index:5;
}
/* Left blue accent bar */
.rd-card-bar {
    position:absolute; left:0; top:0; bottom:0; width:3px;
    background:linear-gradient(180deg,var(--rd-blue) 0%,var(--rd-gold) 50%,var(--rd-blue) 100%);
    transform:scaleY(0); transform-origin:center;
    transition:transform .34s cubic-bezier(.22,1,.36,1);
    z-index:6; border-radius:0 2px 2px 0;
}
.rd-card:hover {
    transform:translateY(-7px);
    box-shadow:var(--shadow-hover), 0 0 0 1px rgba(4,107,210,.14);
    border-color:rgba(4,107,210,.24); text-decoration:none;
}
.rd-card:hover::before { opacity:1; }
.rd-card:hover .rd-card-bar { transform:scaleY(1); }

/* Card image */
.rd-card-img {
    position:relative; aspect-ratio:16/9;
    background:linear-gradient(145deg,#0a1525,#152236);
    overflow:hidden; flex-shrink:0;
}
.rd-card-img img {
    width:100%; height:100%; object-fit:cover; display:block;
    transition:transform .48s cubic-bezier(.22,1,.36,1), filter .44s ease;
    filter:brightness(.96) saturate(1.04);
}
.rd-card:hover .rd-card-img img { transform:scale(1.07); filter:brightness(1.08) saturate(1.10); }
/* Bottom overlay */
.rd-card-img-ov {
    position:absolute; inset:0;
    background:linear-gradient(to top,rgba(4,10,20,.58) 0%,transparent 55%);
    pointer-events:none;
}
/* Warm hover wash */
.rd-card-img-warm {
    position:absolute; inset:0;
    background:rgba(4,107,210,.0); pointer-events:none;
    transition:background .40s ease; z-index:2;
}
.rd-card:hover .rd-card-img-warm { background:rgba(4,107,210,.04); }
/* Category badge */
.rd-card-cat {
    position:absolute; top:10px; left:10px; z-index:4;
    background:rgba(4,107,210,.90); color:#fff;
    font-family:var(--bf); font-size:.58rem; font-weight:700;
    letter-spacing:.07em; text-transform:uppercase;
    padding:3px 10px; border-radius:100px;
    box-shadow:0 2px 8px rgba(0,0,0,.22); backdrop-filter:blur(4px);
}
/* No-image placeholder */
.rd-card-ph {
    width:100%; height:100%;
    background:linear-gradient(145deg,#0d1f3c,#162a4a);
    display:flex; align-items:center; justify-content:center;
    font-size:2.4rem; color:rgba(201,162,39,.18);
}

/* Card body */
.rd-card-body { padding:20px 22px 18px; display:flex; flex-direction:column; flex:1; }

/* Category chip (in body) */
.rd-card-tag {
    display:inline-flex; align-items:center; gap:5px;
    background:var(--rd-blue-lt); border:1px solid rgba(4,107,210,.18);
    color:var(--rd-blue); font-family:var(--bf); font-size:.60rem; font-weight:700;
    letter-spacing:.05em; text-transform:uppercase;
    padding:3px 10px; border-radius:100px; margin-bottom:10px; width:fit-content;
}

/* Title */
.rd-card-title {
    font-family:var(--hf); font-size:1.14rem; font-weight:700;
    color:var(--rd-head); line-height:1.30; margin-bottom:10px;
    display:-webkit-box; -webkit-line-clamp:2; -webkit-box-orient:vertical; overflow:hidden;
    transition:color var(--tr);
}
.rd-card:hover .rd-card-title { color:var(--rd-blue); }

/* Description */
.rd-card-desc {
    font-family:var(--bf); font-size:.85rem; color:var(--rd-body);
    line-height:1.72; margin-bottom:16px; flex:1;
    display:-webkit-box; -webkit-line-clamp:3; -webkit-box-orient:vertical; overflow:hidden;
}

/* Footer */
.rd-card-footer {
    display:flex; align-items:center; justify-content:space-between;
    padding-top:13px; border-top:1px solid var(--rd-border); margin-top:auto; gap:8px;
}
.rd-card-meta {
    display:flex; align-items:center; gap:10px; flex-wrap:wrap;
    font-family:var(--bf); font-size:.72rem; color:var(--rd-muted);
}
.rd-card-meta span { display:flex; align-items:center; gap:4px; }
.rd-card-link {
    display:inline-flex; align-items:center; gap:6px;
    font-family:var(--bf); font-size:.78rem; font-weight:700;
    color:var(--rd-blue); text-decoration:none;
    transition:color var(--tr), gap var(--tr);
    flex-shrink:0;
}
.rd-card-link:hover { color:var(--rd-gold); gap:9px; text-decoration:none; }

/* ══════════════════════════════════════════════════════════
   EMPTY STATE
══════════════════════════════════════════════════════════ */
.rd-empty {
    text-align:center; padding:90px 40px;
    background:var(--rd-card);
    border:1.5px dashed rgba(4,107,210,.18); border-radius:var(--rad);
    position:relative; overflow:hidden;
}
.rd-empty::before {
    content:''; position:absolute; inset:0;
    background:radial-gradient(ellipse at 50% 30%,rgba(4,107,210,.05) 0%,transparent 60%);
    pointer-events:none;
}
.rd-empty-ico {
    width:78px; height:78px; border-radius:50%;
    background:linear-gradient(145deg,#0d1f3c,#1a2e50);
    display:flex; align-items:center; justify-content:center;
    font-size:2rem; color:rgba(201,162,39,.50);
    margin:0 auto 20px; box-shadow:0 0 36px rgba(4,107,210,.16);
    position:relative; z-index:1;
}
.rd-empty h3 { font-family:var(--hf); font-size:1.40rem; color:var(--rd-head); margin-bottom:8px; position:relative;z-index:1; }
.rd-empty p  { font-family:var(--bf); font-size:.90rem; color:var(--rd-muted); max-width:380px; margin:0 auto; line-height:1.72; position:relative;z-index:1; }

/* ── Pagination ─────────────────────────────────────────── */
.rd-pager { margin-top:56px; display:flex; justify-content:center; position:relative; z-index:1; }

/* ══════════════════════════════════════════════════════════
   RESPONSIVE
══════════════════════════════════════════════════════════ */
@media(max-width:1024px){
    .rd-featured { grid-template-columns:1fr; }
    .rd-feat-img { min-height:280px; }
    .rd-feat-side { border-left:none; border-top:1px solid var(--rd-border); }
    .rd-feat-title { font-size:1.40rem; }
}
@media(max-width:768px){
    .rd-hero { padding:40px 0 32px; }
    .rd-hero-cross,.rd-orb { display:none; }
    .rd-hero-stats { flex-direction:column; border-radius:14px; animation:none; }
    .rd-hero-stat { border-right:none; border-bottom:1px solid rgba(201,162,39,.12); }
    .rd-hero-stat:last-child { border-bottom:none; }
    .rd-filter-bar { position:static; }
    .rd-grid { grid-template-columns:1fr; gap:16px; }
    .rd-filter-cats { flex-wrap:nowrap; }
}
@media(max-width:480px){
    .rd-hero-title { font-size:2.4rem; }
    .rd-feat-side { padding:22px 18px; }
    .rd-feat-title { font-size:1.22rem; }
    .rd-grid { grid-template-columns:1fr 1fr; gap:14px; }
    .rd-card-body { padding:14px 14px 12px; }
    .rd-card-title { font-size:1rem; }
    .rd-card-desc { -webkit-line-clamp:2; font-size:.80rem; }
}
@media(max-width:360px){ .rd-grid { grid-template-columns:1fr; } }
</style>

{{-- HERO ──────────────────────────────────────────────────── --}}
<section class="rd-hero">
    <div class="rd-hero-tex" aria-hidden="true"></div>

    {{-- Floating orbs --}}
    <div class="rd-orb rd-orb-1" aria-hidden="true"></div>
    <div class="rd-orb rd-orb-2" aria-hidden="true"></div>
    <div class="rd-orb rd-orb-3" aria-hidden="true"></div>

    {{-- Cross watermarks --}}
    <svg class="rd-hero-cross left" viewBox="0 0 100 160" fill="none" aria-hidden="true">
        <rect x="38" y="0" width="24" height="160" rx="6" fill="white"/>
        <rect x="0" y="42" width="100" height="24" rx="6" fill="white"/>
    </svg>
    <svg class="rd-hero-cross right" viewBox="0 0 100 160" fill="none" aria-hidden="true">
        <rect x="38" y="0" width="24" height="160" rx="6" fill="white"/>
        <rect x="0" y="42" width="100" height="24" rx="6" fill="white"/>
    </svg>

    <div class="container">
        <div class="rd-hero-inner">

            <div><span class="rd-hero-badge"><span class="rd-badge-dot"></span>{{ __('Catholic Articles') }}</span></div>

            <div class="rd-hero-orn" aria-hidden="true">
                <span class="rd-hero-orn-l"></span>
                <span class="rd-hero-orn-ico">✝</span>
                <span class="rd-hero-orn-l r"></span>
            </div>

            <h1 class="rd-hero-title">{{ __('Read') }} <em>{{ __('& Reflect') }}</em></h1>

            <p class="rd-hero-sub">{{ __('Articles, reflections, news, and homilies — thoughtful Catholic content for the faithful, published regularly.') }}</p>

            <div class="rd-hero-stats">
                <div class="rd-hero-stat"><strong>{{ $totalArticles }}+</strong>{{ __('Articles') }}</div>
                <div class="rd-hero-stat"><strong>{{ $categories->count() }}</strong>{{ __('Categories') }}</div>
                <div class="rd-hero-stat"><strong>{{ __('Free') }}</strong>{{ __('To Read') }}</div>
            </div>

        </div>
    </div>
</section>

{{-- FILTER BAR ─────────────────────────────────────────────── --}}
<div class="rd-filter-bar" id="rdFBar">
    <div class="rd-filter-top-line" aria-hidden="true"></div>
    <div class="container">
        <form method="GET" action="{{ route('public.read') }}">
            <div class="rd-filter-inner">

                <a href="{{ route('public.read', ['sort' => $sort !== 'latest' ? $sort : null]) }}"
                   class="rd-filter-all @if(!$catId) active @endif"
                   aria-label="{{ __('Show all categories') }}">
                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg>
                    {{ __('All') }}
                </a>

                <div class="rd-filter-cats">
                    @foreach($categories as $cat)
                        <a href="{{ route('public.read', array_filter(['category' => $cat->id, 'sort' => $sort !== 'latest' ? $sort : null])) }}"
                           class="rd-filter-cat @if($catId == $cat->id) active @endif">
                            {{ $cat->name }}
                        </a>
                    @endforeach
                </div>

                <div class="rd-filter-sort">
                    <span class="rd-sort-lbl" aria-hidden="true">{{ __('Sort') }}</span>
                    <div class="rd-sort-wrap">
                        <select name="sort" class="rd-sort-select" onchange="this.form.submit()" aria-label="{{ __('Sort order') }}">
                            <option value="latest"  @selected($sort === 'latest')>{{ __('Latest') }}</option>
                            <option value="popular" @selected($sort === 'popular')>{{ __('Most Read') }}</option>
                        </select>
                        <svg class="rd-sort-caret" width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" aria-hidden="true"><polyline points="6 9 12 15 18 9"/></svg>
                    </div>
                    @if($catId)<input type="hidden" name="category" value="{{ $catId }}">@endif
                </div>

            </div>
        </form>
    </div>
</div>

{{-- CONTENT BODY ───────────────────────────────────────────── --}}
<div class="rd-body">
<div class="container">

    @if($posts->isEmpty())

        <div class="rd-empty">
            <div class="rd-empty-ico">✝</div>
            <h3>{{ __('No articles found') }}</h3>
            <p>{{ __('Try a different category or check back soon — new articles are added regularly.') }}</p>
        </div>

    @else

        {{-- Section heading --}}
        <div class="rd-sh">
            <span class="rd-sh-line"></span>
            <h2 class="rd-sh-title">
                <span class="rd-sh-ico">
                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/></svg>
                </span>
                @if($catId && ($activeCat = $categories->firstWhere('id', $catId)))
                    {{ $activeCat->name }}
                @else
                    {{ __('Latest Articles') }}
                @endif
            </h2>
            <span class="rd-sh-line r"></span>
        </div>

        @php $first = $posts->first(); @endphp

        {{-- Featured article --}}
        @if(!$catId && $first)
        <a href="{{ $first->url }}" class="rd-featured">
            <div class="rd-feat-img">
                @if($first->image)
                    <img src="{{ RvMedia::getImageUrl($first->image, 'large') }}" alt="{{ $first->name }}" loading="eager">
                @else
                    <div class="rd-feat-ph">✝</div>
                @endif
                <div class="rd-feat-overlay"></div>
                <span class="rd-feat-stamp">{{ __('Featured') }}</span>
            </div>
            <div class="rd-feat-side">
                <div class="rd-feat-eyebrow">
                    <span class="rd-feat-eyebrow-dot"></span>
                    @if($first->categories->first()){{ $first->categories->first()->name }}@else{{ __('Article') }}@endif
                </div>
                <div class="rd-feat-title">{{ $first->name }}</div>
                @if($first->description)
                    <div class="rd-feat-desc">{{ $first->description }}</div>
                @endif
                <div class="rd-feat-meta">
                    <span>
                        <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                        {{ $first->created_at->format('M j, Y') }}
                    </span>
                    <span>
                        <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                        {{ number_format($first->views) }} {{ __('views') }}
                    </span>
                </div>
                <span class="rd-feat-cta">
                    {{ __('Read Article') }}
                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                </span>
            </div>
        </a>
        @endif

        {{-- Article grid --}}
        <div class="rd-grid">
            @foreach($posts as $idx => $post)
                @if($idx === 0 && !$catId) @continue @endif
                @php $cat = $post->categories->first(); @endphp
                <a href="{{ $post->url }}" class="rd-card"
                   style="animation-delay:{{ min(($catId ? $idx : $idx - 1) % 12, 11) * 50 }}ms">

                    {{-- Left accent bar --}}
                    <div class="rd-card-bar" aria-hidden="true"></div>

                    <div class="rd-card-img">
                        @if($post->image)
                            <img src="{{ RvMedia::getImageUrl($post->image, 'medium') }}" alt="{{ $post->name }}" loading="lazy">
                            <div class="rd-card-img-ov"></div>
                            <div class="rd-card-img-warm"></div>
                        @else
                            <div class="rd-card-ph">✝</div>
                        @endif
                        @if($cat)
                            <span class="rd-card-cat">{{ $cat->name }}</span>
                        @endif
                    </div>

                    <div class="rd-card-body">
                        @if($cat)
                            <span class="rd-card-tag">
                                <svg width="7" height="7" viewBox="0 0 24 24" fill="currentColor"><circle cx="12" cy="12" r="10"/></svg>
                                {{ $cat->name }}
                            </span>
                        @endif
                        <div class="rd-card-title">{{ $post->name }}</div>
                        @if($post->description)
                            <p class="rd-card-desc">{{ $post->description }}</p>
                        @endif
                        <div class="rd-card-footer">
                            <div class="rd-card-meta">
                                <span>
                                    <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                                    {{ $post->created_at->format('M j, Y') }}
                                </span>
                                <span>
                                    <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                                    {{ number_format($post->views) }}
                                </span>
                            </div>
                            <span class="rd-card-link">
                                {{ __('Read') }}
                                <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                            </span>
                        </div>
                    </div>

                </a>
            @endforeach
        </div>

        @if($posts->hasPages())
            <div class="rd-pager">
                {!! $posts->withQueryString()->links(Theme::getThemeNamespace('partials.pagination')) !!}
            </div>
        @endif

    @endif

</div>
</div>

<script>
(function(){
    /* Staggered card entrance */
    if('IntersectionObserver' in window){
        document.querySelectorAll('.rd-card').forEach(function(c){ c.style.animationPlayState = 'paused'; });
        var io = new IntersectionObserver(function(entries){
            entries.forEach(function(e){
                if(e.isIntersecting){ e.target.style.animationPlayState = 'running'; io.unobserve(e.target); }
            });
        }, { threshold:0.06, rootMargin:'0px 0px -12px 0px' });
        document.querySelectorAll('.rd-card').forEach(function(c){ io.observe(c); });
    }
}());
</script>
