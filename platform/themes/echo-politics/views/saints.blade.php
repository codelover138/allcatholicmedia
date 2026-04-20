@php
Theme::layout('full-width');
SeoHelper::setTitle('Saints Directory | AllCatholicMedia');
SeoHelper::setDescription('Explore the lives and feast days of Catholic saints. Discover patrons, martyrs, doctors of
the Church, and holy men and women throughout history.');
@endphp

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link
    href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400;1,700&family=Cinzel:wght@400;600;700&family=IM+Fell+English:ital@0;1&family=Inter:wght@300;400;500;600;700&display=swap"
    rel="stylesheet">

<style>
/* ═══════════════════════════════════════════════════════════
   SAINTS DIRECTORY  ·  AllCatholicMedia  (v3 — 2026)
   Gold #c9a227  ·  Navy #0d1f3c  ·  Crimson #9b1c1c
═══════════════════════════════════════════════════════════ */
:root {
    --sg: #c9a227;
    --sg-h: #a88520;
    --sg-lt: #e5c76b;
    --sg-soft: rgba(201, 162, 39, .13);
    --sg-glow: rgba(201, 162, 39, .22);
    --sn: #0d1f3c;
    --sn-deep: #060e1d;
    --sn-mid: #172b49;
    --sb: #1a56db;
    --sc: #9b1c1c;
    --s-card: #ffffff;
    --s-bg: #f0f4fb;
    --s-border: #dce4f0;
    --s-head: #0d1f3c;
    --s-body: #4a5568;
    --s-muted: #8898aa;
    --tf: 'Cinzel', 'Playfair Display', Georgia, serif;
    --hf: 'Playfair Display', Georgia, serif;
    --ff: 'IM Fell English', Georgia, serif;
    --bf: 'Inter', system-ui, sans-serif;
    --rad: 18px;
    --rad-sm: 10px;
    --tr: .22s ease;
    --shadow-card: 0 1px 4px rgba(13, 31, 60, .05), 0 6px 24px rgba(13, 31, 60, .08);
    --shadow-hover: 0 20px 56px rgba(13, 31, 60, .18), 0 6px 20px rgba(201, 162, 39, .14);
}

html[data-theme='dark'] {
    --s-card: #131b2e;
    --s-bg: #080d18;
    --s-border: rgba(255, 255, 255, .08);
    --s-head: #eef2f9;
    --s-body: rgba(218, 228, 244, .68);
    --s-muted: #56687c;
}

/* ── Keyframes ──────────────────────────────────────────── */
@keyframes sReveal {
    from {
        opacity: 0;
        transform: translateY(24px)
    }

    to {
        opacity: 1;
        transform: translateY(0)
    }
}

@keyframes ewDot {

    0%,
    100% {
        opacity: 1;
        transform: scale(1)
    }

    50% {
        opacity: .28;
        transform: scale(.46)
    }
}

@keyframes phRing {

    0%,
    100% {
        transform: translate(-50%, -50%) scale(1);
        opacity: .18
    }

    50% {
        transform: translate(-50%, -50%) scale(1.12);
        opacity: .06
    }
}

@keyframes haloGlow {

    0%,
    100% {
        box-shadow: 0 0 28px rgba(201, 162, 39, .22), 0 0 60px rgba(201, 162, 39, .08)
    }

    50% {
        box-shadow: 0 0 50px rgba(201, 162, 39, .42), 0 0 100px rgba(201, 162, 39, .16)
    }
}

@keyframes shimmer {
    0% {
        opacity: 0;
        transform: translateX(-100%) skewX(-18deg)
    }

    60% {
        opacity: .5
    }

    100% {
        opacity: 0;
        transform: translateX(220%) skewX(-18deg)
    }
}

@keyframes floatOrb {

    0%,
    100% {
        transform: translateY(0) scale(1)
    }

    50% {
        transform: translateY(-22px) scale(1.06)
    }
}

@keyframes statPulse {

    0%,
    100% {
        box-shadow: 0 0 30px rgba(201, 162, 39, .08), inset 0 1px 0 rgba(255, 255, 255, .04)
    }

    50% {
        box-shadow: 0 0 60px rgba(201, 162, 39, .18), inset 0 1px 0 rgba(255, 255, 255, .04)
    }
}

@keyframes accentGrow {
    from {
        transform: scaleY(0)
    }

    to {
        transform: scaleY(1)
    }
}

@keyframes burnGlow {

    0%,
    100% {
        opacity: .40;
        transform: scale(1)
    }

    40% {
        opacity: .62;
        transform: scale(1.08)
    }

    70% {
        opacity: .34;
        transform: scale(.96)
    }
}

@keyframes scriptureSlide {
    from {
        opacity: 0;
        transform: translateY(8px)
    }

    to {
        opacity: 1;
        transform: translateY(0)
    }
}

/* ══════════════════════════════════════════════════════════
   HERO
══════════════════════════════════════════════════════════ */
.sdir-hero {
    position: relative;
    background: linear-gradient(158deg, #060e1d 0%, #0d1f3c 42%, #0b1a35 72%, #050c18 100%);
    padding: 52px 0 44px;
    text-align: center;
    overflow: hidden;
}

/* Radial gold glow */
.sdir-hero::before {
    content: '';
    position: absolute;
    top: -130px;
    left: 50%;
    transform: translateX(-50%);
    width: 1100px;
    height: 760px;
    background: radial-gradient(ellipse at 50% 32%,
            rgba(201, 162, 39, .26) 0%, rgba(155, 28, 28, .07) 36%,
            rgba(4, 107, 210, .05) 56%, transparent 70%);
    pointer-events: none;
}

/* Bottom gold line */
.sdir-hero::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    height: 1px;
    background: linear-gradient(90deg, transparent 5%, rgba(201, 162, 39, .60) 50%, transparent 95%);
}

/* Dot-grid texture */
.sdir-hero-tex {
    position: absolute;
    inset: 0;
    background-image: radial-gradient(circle, rgba(201, 162, 39, .055) 1px, transparent 1px);
    background-size: 34px 34px;
    pointer-events: none;
}

/* Cross watermarks */
.sdir-cross {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    width: 190px;
    height: 190px;
    opacity: .042;
    pointer-events: none;
}

.sdir-cross.left {
    left: 5%;
}

.sdir-cross.right {
    right: 5%;
}

/* Floating light orbs */
.sdir-orb {
    position: absolute;
    border-radius: 50%;
    filter: blur(72px);
    pointer-events: none;
}

.sdir-orb-1 {
    width: 260px;
    height: 260px;
    top: 4%;
    left: 6%;
    background: rgba(201, 162, 39, .072);
    animation: floatOrb 9s ease-in-out infinite;
}

.sdir-orb-2 {
    width: 190px;
    height: 190px;
    top: 18%;
    right: 8%;
    background: rgba(26, 86, 219, .055);
    animation: floatOrb 13s ease-in-out infinite 3.5s;
}

.sdir-orb-3 {
    width: 340px;
    height: 340px;
    bottom: -90px;
    left: 28%;
    background: rgba(201, 162, 39, .042);
    animation: floatOrb 18s ease-in-out infinite 7s;
}

.sdir-hi {
    position: relative;
    z-index: 2;
}

/* ── Ornament row ────────────────────────────────────────── */
.sdir-orn {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 22px;
    margin-bottom: 18px;
}

.sdir-orn-l {
    flex: 1;
    max-width: 160px;
    height: 1px;
    background: linear-gradient(90deg, transparent, rgba(201, 162, 39, .52));
}

.sdir-orn-l.r {
    background: linear-gradient(270deg, transparent, rgba(201, 162, 39, .52));
}

.sdir-orn-ico {
    width: 64px;
    height: 64px;
    border: 1.5px solid rgba(201, 162, 39, .44);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.7rem;
    color: var(--sg);
    background: radial-gradient(ellipse at center, rgba(201, 162, 39, .16) 0%, transparent 70%);
    animation: haloGlow 3.5s ease-in-out infinite;
    flex-shrink: 0;
}

/* ── Eyebrow ─────────────────────────────────────────────── */
.sdir-ew {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    background: rgba(201, 162, 39, .13);
    border: 1px solid rgba(201, 162, 39, .52);
    color: #fde68a;
    font-family: var(--bf);
    font-size: 1.5rem;
    font-weight: 700;
    letter-spacing: .16em;
    text-transform: uppercase;
    padding: 6px 20px;
    border-radius: 100px;
    margin-bottom: 12px;
    backdrop-filter: blur(6px);
}

.sdir-ew-dot {
    width: 6px;
    height: 6px;
    border-radius: 50%;
    background: var(--sg);
    animation: ewDot 2.2s ease-in-out infinite;
}

/* ── Label & Title ──────────────────────────────────────── */
.sdir-lbl {
    font-family: var(--tf);
    font-size: clamp(.82rem, 1.5vw, 1rem);
    letter-spacing: .30em;
    text-transform: uppercase;
    color: rgba(229, 199, 107, .72);
    margin: 0 0 8px;
}

.sdir-ttl {
    font-family: var(--hf);
    font-size: clamp(3.4rem, 6vw, 5.6rem);
    font-weight: 700;
    color: #f8fafc;
    margin: 0 0 4px;
    letter-spacing: -.030em;
    line-height: 1.02;
    text-shadow: 0 6px 32px rgba(0, 0, 0, .34);
}

.sdir-ttl em {
    font-style: italic;
    background: linear-gradient(135deg, #fde68a 0%, #c9a227 40%, #f0d060 70%, #e5c76b 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.sdir-dsc {
    font-family: var(--ff);
    font-size: clamp(1.45rem, 2.6vw, 1.75rem);
    font-style: italic;
    font-weight: 400;
    color: rgba(226, 232, 240, .80);
    max-width: 590px;
    margin: 10px auto 26px;
    line-height: 1.80;
    letter-spacing: .01em;
}

/* ── Stats pill ──────────────────────────────────────────── */
.sdir-stats {
    display: inline-flex;
    border: 1px solid rgba(201, 162, 39, .44);
    border-radius: 100px;
    background: rgba(255, 255, 255, .05);
    backdrop-filter: blur(14px);
    overflow: hidden;
    animation: statPulse 5s ease-in-out infinite;
}

.sdir-stat {
    padding: 12px 30px;
    font-family: var(--bf);
    font-size: .90rem;
    color: rgba(220, 232, 255, .62);
    border-right: 1px solid rgba(201, 162, 39, .18);
    text-align: center;
    line-height: 1.3;
}

.sdir-stat:last-child {
    border-right: none;
}

.sdir-stat strong {
    display: block;
    font-size: 1.60rem;
    font-weight: 700;
    color: var(--sg-lt);
    font-family: var(--hf);
    margin-bottom: 3px;
}

/* ── Scroll cue ─────────────────────────────────────────── */
.sdir-scroll-cue {
    position: absolute;
    bottom: 18px;
    left: 50%;
    transform: translateX(-50%);
    z-index: 2;
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 4px;
}

.sdir-scroll-cue span {
    display: block;
    width: 1px;
    height: 28px;
    background: linear-gradient(to bottom, rgba(201, 162, 39, .60), transparent);
    animation: floatOrb 2s ease-in-out infinite;
}

.sdir-scroll-cue small {
    font-family: var(--bf);
    font-size: .58rem;
    letter-spacing: .14em;
    text-transform: uppercase;
    color: rgba(201, 162, 39, .38);
}

/* ══════════════════════════════════════════════════════════
   SCRIPTURE STRIP
══════════════════════════════════════════════════════════ */
.sdir-scripture {
    background: linear-gradient(90deg, #060e1d 0%, #0d1a38 50%, #060e1d 100%);
    border-top: 1px solid rgba(201, 162, 39, .12);
    border-bottom: 1px solid rgba(201, 162, 39, .22);
    padding: 20px 0;
    text-align: center;
    position: relative;
    overflow: hidden;
}

.sdir-scripture::before {
    content: '';
    position: absolute;
    inset: 0;
    background: radial-gradient(ellipse at 50% 50%, rgba(201, 162, 39, .09) 0%, transparent 62%);
    pointer-events: none;
}

/* Decorative corner diamonds */
.sdir-scripture::after {
    content: '◆';
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    font-size: .42rem;
    color: rgba(201, 162, 39, .18);
    pointer-events: none;
    letter-spacing: 2rem;
}

.sdir-scripture-inner {
    position: relative;
    z-index: 1;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 20px;
    flex-wrap: wrap;
}

.sdir-scripture-line {
    flex: 1;
    max-width: 160px;
    height: 1px;
    background: linear-gradient(90deg, transparent, rgba(201, 162, 39, .40));
    position: relative;
}

.sdir-scripture-line::after {
    content: '';
    position: absolute;
    right: -4px;
    top: 50%;
    transform: translateY(-50%);
    width: 5px;
    height: 5px;
    border-radius: 50%;
    background: rgba(201, 162, 39, .38);
}

.sdir-scripture-line.r {
    background: linear-gradient(270deg, transparent, rgba(201, 162, 39, .40));
}

.sdir-scripture-line.r::after {
    left: -4px;
    right: auto;
}

.sdir-scripture-text {
    font-family: var(--ff);
    font-size: clamp(1.15rem, 2vw, 1.45rem);
    font-style: italic;
    color: rgba(229, 199, 107, .84);
    letter-spacing: .02em;
    line-height: 1.6;
    animation: scriptureSlide .8s ease both;
}

.sdir-scripture-text cite {
    font-family: var(--bf);
    font-style: normal;
    font-size: .88rem;
    font-weight: 600;
    color: rgba(201, 162, 39, .52);
    letter-spacing: .08em;
    text-transform: uppercase;
    margin-left: 12px;
}

/* ══════════════════════════════════════════════════════════
   A–Z BAR  (redesigned)
══════════════════════════════════════════════════════════ */
.sdir-az {
    position: sticky;
    top: 0;
    z-index: 300;
    background: linear-gradient(180deg, #0c1a31 0%, #0a1628 100%);
    border-bottom: 2px solid rgba(201, 162, 39, .24);
    box-shadow: 0 6px 44px rgba(4, 10, 22, .50);
    overflow: hidden;
}

/* Gold accent line at top */
.sdir-az-line {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 2px;
    background: linear-gradient(90deg, transparent 5%, rgba(201, 162, 39, .55) 50%, transparent 95%);
}

/* Nav row */
.sdir-az-nav {
    display: flex;
    align-items: stretch;
    min-height: 62px;
    overflow-x: auto;
    scrollbar-width: none;
}

.sdir-az-nav::-webkit-scrollbar {
    display: none;
}

/* "All" button */
.sdir-az-all {
    flex-shrink: 0;
    display: flex;
    align-items: center;
    gap: 7px;
    padding: 0 26px;
    font-family: var(--bf);
    font-size: .76rem;
    font-weight: 700;
    letter-spacing: .14em;
    text-transform: uppercase;
    color: rgba(201, 162, 39, .58);
    text-decoration: none;
    border-right: 1px solid rgba(201, 162, 39, .14);
    transition: color .18s ease, background .18s ease;
    position: relative;
    white-space: nowrap;
}

.sdir-az-all::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 50%;
    transform: translateX(-50%);
    width: 0;
    height: 2px;
    background: linear-gradient(90deg, var(--sc), var(--sg));
    transition: width .22s ease;
    border-radius: 1px;
}

.sdir-az-all:hover {
    color: #fde68a;
    background: rgba(201, 162, 39, .06);
    text-decoration: none;
}

.sdir-az-all:hover::after {
    width: 70%;
}

.sdir-az-all.active {
    color: #fde68a;
    background: rgba(201, 162, 39, .08);
}

.sdir-az-all.active::after {
    width: 80%;
}

/* Separator */
.sdir-az-div {
    width: 1px;
    background: rgba(201, 162, 39, .12);
    flex-shrink: 0;
    margin: 10px 0;
}

/* Letters container */
.sdir-az-letters {
    flex: 1;
    display: flex;
    align-items: stretch;
}

/* Individual letter */
.sdir-az-letter {
    flex: 1;
    min-width: 32px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    gap: 4px;
    font-family: var(--tf);
    font-size: 1.55rem;
    font-weight: 600;
    color: rgba(201, 162, 39, .50);
    text-decoration: none;
    transition: color .16s ease, background .16s ease;
    border-bottom: 2px solid transparent;
    position: relative;
}

/* Hover background pill */
.sdir-az-letter::before {
    content: '';
    position: absolute;
    inset: 8px 2px;
    border-radius: 8px;
    background: rgba(201, 162, 39, .0);
    transition: background .16s ease;
    pointer-events: none;
}

.sdir-az-letter:hover {
    color: #fde68a;
    border-bottom-color: rgba(201, 162, 39, .36);
    text-decoration: none;
}

.sdir-az-letter:hover::before {
    background: rgba(201, 162, 39, .09);
}

.sdir-az-letter.active {
    color: #fde68a;
    font-weight: 700;
    border-bottom-color: var(--sg);
}

.sdir-az-letter.active::before {
    background: rgba(201, 162, 39, .16);
}

/* Small availability dot */
.sdir-az-dot {
    width: 3px;
    height: 3px;
    border-radius: 50%;
    background: rgba(201, 162, 39, .38);
    flex-shrink: 0;
}

.sdir-az-letter.active .sdir-az-dot {
    background: var(--sg);
    box-shadow: 0 0 4px var(--sg);
}

/* Unavailable */
.sdir-az-letter.off {
    color: rgba(255, 255, 255, .10);
    pointer-events: none;
    cursor: not-allowed;
    border-bottom-color: transparent;
}

.sdir-az-letter.off .sdir-az-dot {
    opacity: 0;
}

/* ══════════════════════════════════════════════════════════
   CONTENT AREA
══════════════════════════════════════════════════════════ */
.sdir-body {
    background: var(--s-bg);
    padding: 52px 0 100px;
    min-height: 60vh;
    position: relative;
}

.sdir-body::before {
    content: '';
    position: absolute;
    inset: 0;
    background-image: radial-gradient(circle, rgba(13, 31, 60, .028) 1px, transparent 1px);
    background-size: 48px 48px;
    pointer-events: none;
}

/* ── Result bar ─────────────────────────────────────────── */
.sdir-result-bar {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 12px;
    margin-bottom: 32px;
    position: relative;
    z-index: 1;
}

.sdir-result-count {
    font-family: var(--bf);
    font-size: .82rem;
    color: var(--s-muted);
    display: flex;
    align-items: center;
    gap: 6px;
}

.sdir-result-count strong {
    color: var(--sg);
    font-weight: 700;
    font-size: .88rem;
}

.sdir-clear-link {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    font-family: var(--bf);
    font-size: .78rem;
    font-weight: 600;
    color: var(--s-muted);
    text-decoration: none;
    padding: 5px 12px;
    border-radius: 100px;
    border: 1px solid var(--s-border);
    background: var(--s-card);
    transition: all var(--tr);
}

.sdir-clear-link:hover {
    color: var(--sc);
    border-color: rgba(155, 28, 28, .30);
    background: rgba(155, 28, 28, .04);
    text-decoration: none;
}

/* ── Section heading ────────────────────────────────────── */
.sdir-sh {
    display: flex;
    align-items: center;
    gap: 18px;
    margin-bottom: 34px;
    position: relative;
    z-index: 1;
}

.sdir-shl {
    flex: 1;
    height: 1px;
    background: linear-gradient(to right, rgba(201, 162, 39, .22), transparent);
}

.sdir-shl.r {
    background: linear-gradient(to left, rgba(201, 162, 39, .22), transparent);
}

.sdir-sht {
    font-family: var(--tf);
    font-size: .98rem;
    font-weight: 600;
    color: var(--s-head);
    white-space: nowrap;
    display: flex;
    align-items: center;
    gap: 10px;
    letter-spacing: .06em;
}

.sdir-sht-cross {
    width: 30px;
    height: 30px;
    border-radius: 50%;
    background: linear-gradient(135deg, var(--sg-soft), rgba(201, 162, 39, .06));
    border: 1px solid rgba(201, 162, 39, .26);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: .72rem;
    color: var(--sg);
    flex-shrink: 0;
    box-shadow: 0 2px 8px rgba(201, 162, 39, .14);
}

/* ══════════════════════════════════════════════════════════
   CARDS GRID
══════════════════════════════════════════════════════════ */
.sdir-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(288px, 1fr));
    gap: 28px;
    margin-bottom: 52px;
    position: relative;
    z-index: 1;
}

/* Featured first card spans 2 columns on XL */
@media(min-width:1200px) {
    .sdir-featured {
        grid-column: span 2;
    }

    .sdir-featured .sdir-ciw,
    .sdir-featured .sdir-cph {
        height: 310px;
    }

    .sdir-featured .sdir-img-name-text {
        font-size: 1.62rem;
        line-height: 1.2;
    }

    .sdir-featured .sdir-ttl-body {
        font-size: 1.62rem;
    }

    .sdir-featured .sdir-cb {
        padding: 24px 26px 22px;
    }

    .sdir-featured .sdir-cd {
        -webkit-line-clamp: 4;
        font-size: .92rem;
    }
}

/* ── CARD ───────────────────────────────────────────────── */
.sdir-card {
    background: var(--s-card);
    border: 1px solid var(--s-border);
    border-radius: var(--rad);
    overflow: hidden;
    display: flex;
    flex-direction: column;
    position: relative;
    box-shadow: var(--shadow-card);
    transition: transform .34s cubic-bezier(.22, 1, .36, 1),
        box-shadow .34s ease, border-color .22s ease;
    will-change: transform;
    animation: sReveal .55s cubic-bezier(.22, 1, .36, 1) both;
    text-decoration: none;
}

/* Gold top shimmer bar */
.sdir-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 3px;
    background: linear-gradient(90deg, #9b1c1c, #c9a227 35%, #e5c76b 50%, #c9a227 65%, #9b1c1c);
    opacity: 0;
    transition: opacity .28s ease;
    z-index: 5;
}

/* Shimmer sweep */
.sdir-card::after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 60px;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, .07), transparent);
    transform: translateX(-100%) skewX(-18deg);
    opacity: 0;
    z-index: 4;
    pointer-events: none;
}

.sdir-card:hover {
    transform: translateY(-8px);
    box-shadow: var(--shadow-hover), 0 0 0 1px rgba(201, 162, 39, .18);
    border-color: rgba(201, 162, 39, .30);
    text-decoration: none;
}

.sdir-card:hover::before {
    opacity: 1;
}

.sdir-card:hover::after {
    animation: shimmer .70s ease forwards;
}

/* Left gold accent bar — slides in on hover */
.sdir-cl {
    position: absolute;
    left: 0;
    top: 0;
    bottom: 0;
    width: 3px;
    background: linear-gradient(180deg, var(--sc) 0%, var(--sg) 50%, var(--sc) 100%);
    transform: scaleY(0);
    transform-origin: center;
    transition: transform .36s cubic-bezier(.22, 1, .36, 1);
    z-index: 6;
    border-radius: 0 2px 2px 0;
}

.sdir-card:hover .sdir-cl {
    transform: scaleY(1);
}

/* ── Card image ─────────────────────────────────────────── */
.sdir-ciw {
    position: relative;
    height: 252px;
    background: linear-gradient(145deg, #0a1a2e, #162a4a 50%, #08111e);
    overflow: hidden;
    flex-shrink: 0;
}

.sdir-cimg {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
    transition: transform .54s cubic-bezier(.22, 1, .36, 1), filter .50s ease;
    filter: brightness(.94) saturate(1.06);
}

.sdir-card:hover .sdir-cimg {
    transform: scale(1.08);
    filter: brightness(1.10) saturate(1.14);
}

/* Rich gradient overlay */
.sdir-cov {
    position: absolute;
    inset: 0;
    background: linear-gradient(to top,
            rgba(4, 10, 22, .90) 0%,
            rgba(4, 10, 22, .32) 38%,
            rgba(4, 10, 22, .08) 62%,
            transparent 84%);
    pointer-events: none;
}

/* Corner vignette */
.sdir-cov-corner {
    position: absolute;
    inset: 0;
    box-shadow: inset 0 0 60px rgba(4, 10, 22, .22);
    pointer-events: none;
    z-index: 1;
}

/* Hover warm wash */
.sdir-cov-warm {
    position: absolute;
    inset: 0;
    background: rgba(201, 162, 39, .0);
    transition: background .42s ease;
    pointer-events: none;
    z-index: 2;
}

.sdir-card:hover .sdir-cov-warm {
    background: rgba(201, 162, 39, .046);
}

/* Name overlay at bottom */
.sdir-img-name {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    z-index: 3;
    padding: 16px 18px 13px;
}

.sdir-img-name-text {
    font-family: var(--hf);
    font-size: 1.22rem;
    font-weight: 700;
    color: #f8fafc;
    line-height: 1.24;
    text-shadow: 0 2px 14px rgba(0, 0, 0, .64);
}

/* ── Category tag (on image) ────────────────────────────── */
.sdir-cat {
    position: absolute;
    top: 13px;
    left: 13px;
    z-index: 4;
    background: rgba(201, 162, 39, .90);
    color: #0d1f3c;
    font-family: var(--bf);
    font-size: .60rem;
    font-weight: 800;
    letter-spacing: .08em;
    text-transform: uppercase;
    padding: 4px 10px;
    border-radius: 100px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, .28);
    backdrop-filter: blur(4px);
}

/* ── Placeholder (no image) ─────────────────────────────── */
.sdir-cph {
    height: 252px;
    background: linear-gradient(145deg, #0d1f3c 0%, #142540 38%, #1a2f52 60%, #0a1628 100%);
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    gap: 11px;
    flex-shrink: 0;
    position: relative;
    overflow: hidden;
}

.sdir-cph::before {
    content: '';
    position: absolute;
    inset: 0;
    background:
        radial-gradient(circle at 35% 40%, rgba(201, 162, 39, .09) 0%, transparent 50%),
        radial-gradient(circle at 65% 60%, rgba(155, 28, 28, .06) 0%, transparent 50%);
}

/* Central glow orb */
.sdir-cph-glow {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 120px;
    height: 120px;
    border-radius: 50%;
    background: radial-gradient(circle, rgba(201, 162, 39, .20) 0%, rgba(201, 162, 39, .06) 50%, transparent 80%);
    animation: haloGlow 4.5s ease-in-out infinite;
    pointer-events: none;
}

/* Halo rings */
.sdir-ring {
    position: absolute;
    top: 50%;
    left: 50%;
    border-radius: 50%;
    border: 1px solid rgba(201, 162, 39, .14);
    animation: phRing 4s ease-in-out infinite;
}

.sdir-r1 {
    width: 72px;
    height: 72px;
    margin: -36px 0 0 -36px;
    animation-delay: 0s;
}

.sdir-r2 {
    width: 112px;
    height: 112px;
    margin: -56px 0 0 -56px;
    border-color: rgba(201, 162, 39, .08);
    animation-delay: .8s;
}

.sdir-r3 {
    width: 160px;
    height: 160px;
    margin: -80px 0 0 -80px;
    border-color: rgba(201, 162, 39, .05);
    animation-delay: 1.6s;
}

.sdir-r4 {
    width: 214px;
    height: 214px;
    margin: -107px 0 0 -107px;
    border-color: rgba(201, 162, 39, .025);
    animation-delay: 2.4s;
}

.sdir-phx {
    position: relative;
    z-index: 1;
    font-size: 3.2rem;
    color: rgba(201, 162, 39, .42);
    line-height: 1;
    transition: color .30s ease, transform .30s ease;
}

.sdir-card:hover .sdir-phx {
    color: rgba(201, 162, 39, .80);
    transform: scale(1.14);
}

.sdir-phl {
    position: relative;
    z-index: 1;
    font-family: var(--tf);
    font-size: .52rem;
    letter-spacing: .24em;
    text-transform: uppercase;
    color: rgba(201, 162, 39, .28);
}

/* ── Card body ──────────────────────────────────────────── */
.sdir-cb {
    padding: 20px 22px 19px;
    display: flex;
    flex-direction: column;
    flex: 1;
}

/* Saint name in card body (no-image cards) */
.sdir-ttl-body {
    font-family: var(--hf);
    font-size: 1.36rem;
    font-weight: 700;
    color: var(--s-head);
    text-decoration: none;
    display: block;
    margin-bottom: 10px;
    line-height: 1.25;
    transition: color var(--tr);
}

.sdir-ttl-body:hover {
    color: var(--sg);
    text-decoration: none;
}

/* Category chip in body */
.sdir-cm {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    background: var(--sg-soft);
    border: 1px solid rgba(201, 162, 39, .18);
    color: var(--sg-h);
    font-family: var(--bf);
    font-size: .62rem;
    font-weight: 700;
    letter-spacing: .04em;
    text-transform: uppercase;
    padding: 4px 10px;
    border-radius: 100px;
    margin-bottom: 12px;
    width: fit-content;
}

/* Description */
.sdir-cd {
    font-family: var(--bf);
    font-size: .88rem;
    color: var(--s-body);
    line-height: 1.74;
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
    flex: 1;
    margin-bottom: 18px;
}

/* Footer */
.sdir-cf {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding-top: 14px;
    border-top: 1px solid var(--s-border);
    margin-top: auto;
    gap: 10px;
}

/* CTA button */
.sdir-rl {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: linear-gradient(135deg, var(--sn), var(--sn-mid));
    color: #e5c76b;
    font-family: var(--bf);
    font-size: .79rem;
    font-weight: 700;
    padding: 9px 18px;
    border-radius: 100px;
    text-decoration: none;
    border: 1px solid rgba(201, 162, 39, .26);
    transition: all var(--tr);
    box-shadow: 0 2px 8px rgba(13, 31, 60, .14);
    flex-shrink: 0;
}

.sdir-rl:hover {
    background: linear-gradient(135deg, var(--sg), #b8921e);
    color: var(--sn);
    border-color: var(--sg);
    transform: translateY(-1px);
    box-shadow: 0 6px 20px rgba(201, 162, 39, .34);
    text-decoration: none;
    gap: 11px;
}

/* Feast day badge */
.sdir-feast {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    font-family: var(--bf);
    font-size: .68rem;
    color: var(--s-muted);
    flex-shrink: 0;
}

/* Candle icon flicker */
.sdir-feast-icon {
    animation: burnGlow 3.2s ease-in-out infinite;
    display: inline-block;
}

/* ══════════════════════════════════════════════════════════
   EMPTY STATE
══════════════════════════════════════════════════════════ */
.sdir-empty {
    grid-column: 1/-1;
    text-align: center;
    padding: 100px 40px;
    background: var(--s-card);
    border: 1.5px dashed rgba(201, 162, 39, .22);
    border-radius: var(--rad);
    position: relative;
    overflow: hidden;
}

.sdir-empty::before {
    content: '';
    position: absolute;
    inset: 0;
    background: radial-gradient(ellipse at 50% 30%, rgba(201, 162, 39, .05) 0%, transparent 60%);
    pointer-events: none;
}

.sdir-empty-ico {
    width: 82px;
    height: 82px;
    border-radius: 50%;
    background: linear-gradient(145deg, #0d1f3c, #1e3456);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 2.2rem;
    color: rgba(201, 162, 39, .55);
    margin: 0 auto 22px;
    box-shadow: 0 0 48px rgba(201, 162, 39, .18);
    animation: haloGlow 3s ease-in-out infinite;
    position: relative;
    z-index: 1;
}

.sdir-empty h3 {
    font-family: var(--hf);
    font-size: 1.55rem;
    color: var(--s-head);
    margin-bottom: 10px;
    position: relative;
    z-index: 1;
}

.sdir-empty p {
    font-family: var(--bf);
    font-size: .90rem;
    color: var(--s-muted);
    max-width: 380px;
    margin: 0 auto 24px;
    line-height: 1.70;
    position: relative;
    z-index: 1;
}

.sdir-empty-cta {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: linear-gradient(135deg, var(--sg), #b8921e);
    color: var(--sn);
    font-family: var(--bf);
    font-size: .84rem;
    font-weight: 700;
    padding: 13px 30px;
    border-radius: 100px;
    text-decoration: none;
    transition: all var(--tr);
    box-shadow: 0 4px 18px rgba(201, 162, 39, .32);
    position: relative;
    z-index: 1;
}

.sdir-empty-cta:hover {
    opacity: .90;
    transform: translateY(-2px);
    box-shadow: 0 8px 28px rgba(201, 162, 39, .42);
    text-decoration: none;
}

/* ══════════════════════════════════════════════════════════
   PAGINATION
══════════════════════════════════════════════════════════ */
.sdir-pag {
    display: flex;
    justify-content: center;
    margin-top: 16px;
    position: relative;
    z-index: 1;
}

/* ══════════════════════════════════════════════════════════
   RESPONSIVE
══════════════════════════════════════════════════════════ */
@media(max-width:768px) {
    .sdir-hero {
        padding: 36px 0 28px;
    }

    .sdir-cross,
    .sdir-orb {
        display: none;
    }

    .sdir-stats {
        flex-direction: column;
        border-radius: 16px;
        animation: none;
    }

    .sdir-stat {
        border-right: none;
        border-bottom: 1px solid rgba(201, 162, 39, .12);
    }

    .sdir-stat:last-child {
        border-bottom: none;
    }

    .sdir-grid {
        grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
        gap: 18px;
    }

    .sdir-scripture {
        padding: 16px 0;
    }

    .sdir-scroll-cue {
        display: none;
    }

    .sdir-az-nav {
        min-height: 54px;
    }

    .sdir-az-letter {
        font-size: .92rem;
        min-width: 28px;
    }

    .sdir-az-all {
        padding: 0 18px;
        font-size: .70rem;
    }
}

@media(max-width:480px) {
    .sdir-ttl {
        font-size: 2.6rem;
    }

    .sdir-grid {
        grid-template-columns: 1fr 1fr;
        gap: 14px;
    }

    .sdir-ciw,
    .sdir-cph {
        height: 188px;
    }

    .sdir-img-name-text {
        font-size: 1rem;
    }

    .sdir-cb {
        padding: 14px 14px 12px;
    }

    .sdir-cd {
        -webkit-line-clamp: 2;
        font-size: .82rem;
    }

    .sdir-rl {
        padding: 7px 13px;
        font-size: .74rem;
    }

    .sdir-featured .sdir-ciw,
    .sdir-featured .sdir-cph {
        height: 188px;
    }
}

@media(max-width:360px) {
    .sdir-grid {
        grid-template-columns: 1fr;
    }
}
</style>

{{-- ══════════════════════════════════════════════════════════
     HERO
══════════════════════════════════════════════════════════ --}}
<section class="sdir-hero">
    <div class="sdir-hero-tex" aria-hidden="true"></div>

    {{-- Floating light orbs --}}
    <div class="sdir-orb sdir-orb-1" aria-hidden="true"></div>
    <div class="sdir-orb sdir-orb-2" aria-hidden="true"></div>
    <div class="sdir-orb sdir-orb-3" aria-hidden="true"></div>

    {{-- Cross watermarks --}}
    <svg class="sdir-cross left" viewBox="0 0 100 160" fill="none" aria-hidden="true">
        <rect x="38" y="0" width="24" height="160" rx="6" fill="white" />
        <rect x="0" y="42" width="100" height="24" rx="6" fill="white" />
    </svg>
    <svg class="sdir-cross right" viewBox="0 0 100 160" fill="none" aria-hidden="true">
        <rect x="38" y="0" width="24" height="160" rx="6" fill="white" />
        <rect x="0" y="42" width="100" height="24" rx="6" fill="white" />
    </svg>

    <div class="container">
        <div class="sdir-hi">

            {{-- Ornament --}}
            <div class="sdir-orn" aria-hidden="true">
                <span class="sdir-orn-l"></span>
                <span class="sdir-orn-ico">✝</span>
                <span class="sdir-orn-l r"></span>
            </div>

            <div><span class="sdir-ew"><span class="sdir-ew-dot"></span>{{ __('AllCatholicMedia') }}</span></div>

            <p class="sdir-lbl">{{ __('Communion of Saints') }}</p>

            <h1 class="sdir-ttl">{{ __('Saints') }} <em>{{ __('Directory') }}</em></h1>

            <p class="sdir-dsc">
                {{ __('The great cloud of witnesses — explore the lives, feast days, and patronages of holy men and women who shaped the Church throughout history.') }}
            </p>

            <div class="sdir-stats">
                <div class="sdir-stat"><strong id="sd-cnt">{{ $saints->total() }}+</strong>{{ __('Saints') }}</div>
                <div class="sdir-stat"><strong>{{ count($availableLetters) }}</strong>{{ __('Letters') }}</div>
                <div class="sdir-stat"><strong>A–Z</strong>{{ __('Browse') }}</div>
            </div>

        </div>
    </div>

    {{-- Scroll cue --}}
    <div class="sdir-scroll-cue" aria-hidden="true">
        <span></span>
        <small>{{ __('Scroll') }}</small>
    </div>
</section>

{{-- ══════════════════════════════════════════════════════════
     SCRIPTURE STRIP
══════════════════════════════════════════════════════════ --}}
<div class="sdir-scripture">
    <div class="container">
        <div class="sdir-scripture-inner">
            <span class="sdir-scripture-line"></span>
            <p class="sdir-scripture-text">
                "Therefore, since we are surrounded by so great a cloud of witnesses…"
                <cite>Hebrews 12:1</cite>
            </p>
            <span class="sdir-scripture-line r"></span>
        </div>
    </div>
</div>

{{-- ══════════════════════════════════════════════════════════
     A–Z BAR
══════════════════════════════════════════════════════════ --}}
<div class="sdir-az" role="navigation" aria-label="{{ __('Browse saints by letter') }}">
    <div class="sdir-az-line" aria-hidden="true"></div>
    <nav class="sdir-az-nav">

        <a href="{{ route('public.saints') }}" class="sdir-az-all @if(!$letter) active @endif"
            aria-label="{{ __('Show all saints') }}">
            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                aria-hidden="true">
                <rect x="3" y="3" width="7" height="7" />
                <rect x="14" y="3" width="7" height="7" />
                <rect x="14" y="14" width="7" height="7" />
                <rect x="3" y="14" width="7" height="7" />
            </svg>
            {{ __('All') }}
        </a>

        <div class="sdir-az-div" aria-hidden="true"></div>

        <div class="sdir-az-letters">
            @foreach(range('A','Z') as $l)
            @if(in_array($l, $availableLetters))
            <a href="{{ route('public.saints', ['letter' => $l]) }}"
                class="sdir-az-letter @if($letter === $l) active @endif"
                aria-label="{{ __('Saints starting with') }} {{ $l }}"
                aria-current="{{ $letter === $l ? 'page' : 'false' }}">
                {{ $l }}
                <span class="sdir-az-dot" aria-hidden="true"></span>
            </a>
            @else
            <span class="sdir-az-letter off" aria-hidden="true">{{ $l }}</span>
            @endif
            @endforeach
        </div>

    </nav>
</div>

{{-- ══════════════════════════════════════════════════════════
     MAIN CONTENT
══════════════════════════════════════════════════════════ --}}
<div class="sdir-body">
    <div class="container">

        {{-- Result bar --}}
        <div class="sdir-result-bar">
            <div class="sdir-result-count">
                <strong>{{ $saints->total() }}</strong>
                @if($letter)
                {{ __('saints under letter') }} <strong
                    style="color:var(--s-head);font-family:var(--tf);">{{ $letter }}</strong>
                @else
                {{ __('saints in the directory') }}
                @endif
            </div>
            @if($letter)
            <a href="{{ route('public.saints') }}" class="sdir-clear-link">
                <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                    <line x1="18" y1="6" x2="6" y2="18" />
                    <line x1="6" y1="6" x2="18" y2="18" />
                </svg>
                {{ __('Show all') }}
            </a>
            @endif
        </div>

        {{-- Section heading --}}
        <div class="sdir-sh">
            <span class="sdir-shl"></span>
            <h2 class="sdir-sht">
                <span class="sdir-sht-cross">✝</span>
                @if($letter){{ __('Saints') }} — {{ $letter }}
                @else{{ __('All Saints') }}@endif
            </h2>
            <span class="sdir-shl r"></span>
        </div>

        {{-- Grid --}}
        <div class="sdir-grid">
            @forelse($saints as $index => $saint)
            @php $cat = $saint->categories->where('id','!=',3)->first(); @endphp
            @php $isFeatured = ($index === 0 && !$letter); @endphp

            <article class="sdir-card @if($isFeatured) sdir-featured @endif"
                style="animation-delay:{{ min($index % 12, 11) * 55 }}ms">

                {{-- Left gold accent bar --}}
                <div class="sdir-cl" aria-hidden="true"></div>

                @if($saint->image)
                <div class="sdir-ciw">
                    <img class="sdir-cimg" src="{{ RvMedia::getImageUrl($saint->image,'medium') }}"
                        alt="{{ $saint->name }}" loading="lazy" decoding="async">
                    <div class="sdir-cov"></div>
                    <div class="sdir-cov-corner"></div>
                    <div class="sdir-cov-warm"></div>
                    @if($cat)<span class="sdir-cat">{{ $cat->name }}</span>@endif
                    <div class="sdir-img-name">
                        <div class="sdir-img-name-text">{{ $saint->name }}</div>
                    </div>
                </div>
                @else
                <div class="sdir-cph">
                    <div class="sdir-cph-glow" aria-hidden="true"></div>
                    <div class="sdir-ring sdir-r1" aria-hidden="true"></div>
                    <div class="sdir-ring sdir-r2" aria-hidden="true"></div>
                    <div class="sdir-ring sdir-r3" aria-hidden="true"></div>
                    <div class="sdir-ring sdir-r4" aria-hidden="true"></div>
                    <span class="sdir-phx">✝</span>
                    <span class="sdir-phl">{{ __('Sanctus') }}</span>
                    @if($cat)<span class="sdir-cat">{{ $cat->name }}</span>@endif
                </div>
                @endif

                <div class="sdir-cb">

                    @if(!$saint->image)
                    <a href="{{ $saint->url }}" class="sdir-ttl-body @if($isFeatured) sdir-ttl-body @endif">
                        {{ $saint->name }}
                    </a>
                    @endif

                    @if($cat)
                    <span class="sdir-cm">
                        <svg width="8" height="8" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 2l1.5 5h5l-4 3 1.5 5-4-3-4 3 1.5-5-4-3h5z" />
                        </svg>
                        {{ $cat->name }}
                    </span>
                    @endif

                    @if($saint->description)
                    <p class="sdir-cd">{{ $saint->description }}</p>
                    @endif

                    <div class="sdir-cf">
                        <a href="{{ $saint->url }}" class="sdir-rl">
                            {{ __('Read story') }}
                            <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2.5">
                                <line x1="5" y1="12" x2="19" y2="12" />
                                <polyline points="12 5 19 12 12 19" />
                            </svg>
                        </a>
                        <span class="sdir-feast" aria-hidden="true">
                            <span class="sdir-feast-icon">🕯</span>
                            {{ __('Feast Day') }}
                        </span>
                    </div>

                </div>

            </article>

            @empty
            <div class="sdir-empty">
                <div class="sdir-empty-ico" aria-hidden="true">✝</div>
                <h3>{{ __('No saints found') }}</h3>
                <p>{{ __('Saints articles are being added regularly. Check back soon or browse all saints.') }}</p>
                <a href="{{ route('public.saints') }}" class="sdir-empty-cta">
                    {{ __('Browse all saints') }}
                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2.2">
                        <line x1="5" y1="12" x2="19" y2="12" />
                        <polyline points="12 5 19 12 12 19" />
                    </svg>
                </a>
            </div>
            @endforelse
        </div>

        @if($saints->hasPages())
        <div class="sdir-pag">
            {!!
            $saints->appends(['q'=>$query,'letter'=>$letter])->links(Theme::getThemeNamespace('partials.pagination'))
            !!}
        </div>
        @endif

    </div>
</div>

<script>
(function() {
    /* Stat counter animation */
    var el = document.getElementById('sd-cnt');
    if (el) {
        var raw = el.textContent.trim().replace(/\+$/, '');
        var num = parseInt(raw, 10);
        if (!isNaN(num) && num >= 3) {
            var cur = 0,
                step = Math.ceil(num / 38);
            var t = setInterval(function() {
                cur = Math.min(cur + step, num);
                el.textContent = cur + '+';
                if (cur >= num) clearInterval(t);
            }, 26);
        }
    }

    /* Staggered card entrance via IntersectionObserver */
    if ('IntersectionObserver' in window) {
        document.querySelectorAll('.sdir-card').forEach(function(c) {
            c.style.animationPlayState = 'paused';
        });
        var io = new IntersectionObserver(function(entries) {
            entries.forEach(function(e) {
                if (e.isIntersecting) {
                    e.target.style.animationPlayState = 'running';
                    io.unobserve(e.target);
                }
            });
        }, {
            threshold: 0.06,
            rootMargin: '0px 0px -14px 0px'
        });
        document.querySelectorAll('.sdir-card').forEach(function(c) {
            io.observe(c);
        });
    }

    /* Smooth scroll body into view when a letter is selected */
    document.querySelectorAll('.sdir-az-letter:not(.off), .sdir-az-all').forEach(function(link) {
        link.addEventListener('click', function() {
            setTimeout(function() {
                var body = document.querySelector('.sdir-body');
                if (body) body.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }, 80);
        });
    });
}());
</script>