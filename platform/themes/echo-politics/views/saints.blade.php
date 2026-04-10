@php
    Theme::layout('full-width');
    SeoHelper::setTitle('Saints Directory | AllCatholicMedia');
    SeoHelper::setDescription('Explore the lives and feast days of Catholic saints. Discover patrons, martyrs, doctors of the Church, and holy men and women throughout history.');
@endphp

{{-- ── Fonts ─────────────────────────────────────────────────── --}}
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400;1,700&family=Cinzel:wght@400;600;700&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

{{-- ── Styles (direct output — @push/header stack not supported) ── --}}
<style>
/* ═══════════════════════════════════════
   SAINTS DIRECTORY  ·  AllCatholicMedia
   Gold #c9a227  Navy #0d1f3c
═══════════════════════════════════════ */
:root {
    --sg:        #c9a227;
    --sg-h:      #a88520;
    --sg-lt:     #e5c76b;
    --sg-soft:   rgba(201,162,39,.12);
    --sn:        #0d1f3c;
    --sn-deep:   #060e1d;
    --sb:        #1a56db;
    --s-card:    #ffffff;
    --s-bg:      #f0f4fb;
    --s-border:  #dce4f0;
    --s-muted:   #8898aa;
    --s-head:    #0d1f3c;
    --s-body:    #4a5568;
    --tf: 'Cinzel','Playfair Display',Georgia,serif;
    --hf: 'Playfair Display',Georgia,serif;
    --bf: 'Inter',system-ui,sans-serif;
    --rad:    14px;
    --rad-sm: 8px;
    --tr:     .22s ease;
}
html[data-theme='dark'] {
    --s-card:   #131b2e;
    --s-bg:     #0a0f1e;
    --s-border: rgba(255,255,255,.08);
    --s-muted:  #56687c;
    --s-head:   #eef2f9;
    --s-body:   rgba(218,228,244,.68);
}

/* ── card reveal: CSS animation (no JS needed) ── */
@keyframes sReveal {
    from { opacity:0; transform:translateY(18px); }
    to   { opacity:1; transform:translateY(0); }
}
.sdir-card {
    animation: sReveal .5s cubic-bezier(.22,1,.36,1) both;
}

/* ══════════════════════════════════════════
   HERO
══════════════════════════════════════════ */
.sdir-hero {
    position: relative;
    background: linear-gradient(158deg,#060e1d 0%,#0d1f3c 42%,#0b1a35 72%,#050c18 100%);
    padding: 22px 0 20px;
    text-align: center;
    overflow: hidden;
}
.sdir-hero::before {          /* radial gold glow */
    content:'';
    position:absolute;
    top:-130px; left:50%; transform:translateX(-50%);
    width:900px; height:620px;
    background:radial-gradient(ellipse at 50% 32%,
        rgba(201,162,39,.22) 0%,rgba(4,107,210,.07) 48%,transparent 68%);
    pointer-events:none;
}
.sdir-hero::after {           /* bottom gold line */
    content:'';
    position:absolute;
    bottom:0; left:0; right:0; height:1px;
    background:linear-gradient(90deg,transparent 5%,rgba(201,162,39,.45) 50%,transparent 95%);
}
.sdir-hero-tex {              /* dot-grid texture */
    position:absolute; inset:0;
    background-image:radial-gradient(circle,rgba(201,162,39,.045) 1px,transparent 1px);
    background-size:34px 34px;
    pointer-events:none;
}
.sdir-hi { position:relative; z-index:2; }

/* ornament */
.sdir-orn {
    display:flex; align-items:center; justify-content:center;
    gap:18px; margin-bottom:32px;
}
.sdir-orn-l {
    flex:1; max-width:110px; height:1px;
    background:linear-gradient(90deg,transparent,rgba(201,162,39,.42));
}
.sdir-orn-l.r { background:linear-gradient(270deg,transparent,rgba(201,162,39,.42)); }
.sdir-orn-ico {
    width:54px; height:54px;
    border:1.5px solid rgba(201,162,39,.38);
    border-radius:50%;
    display:flex; align-items:center; justify-content:center;
    font-size:1.55rem; color:var(--sg);
    background:rgba(201,162,39,.07);
    box-shadow:0 0 34px rgba(201,162,39,.18);
    flex-shrink:0;
}

/* eyebrow */
.sdir-ew {
    display:inline-flex; align-items:center; gap:8px;
    background:rgba(201,162,39,.15);
    border:1px solid rgba(201,162,39,.50);
    color:#fde68a;
    font-family:var(--bf); font-size:.90rem; font-weight:700;
    letter-spacing:.16em; text-transform:uppercase;
    padding:8px 24px; border-radius:100px;
    margin-bottom:20px;
}
.sdir-ew-dot {
    width:5px; height:5px; border-radius:50%;
    background:var(--sg);
    animation:ewDot 2.2s ease-in-out infinite;
}
@keyframes ewDot {
    0%,100%{opacity:1;transform:scale(1)}
    50%{opacity:.3;transform:scale(.5)}
}

.sdir-lbl {
    font-family:var(--tf);
    font-size:clamp(.68rem,1.3vw,.82rem);
    letter-spacing:.28em; text-transform:uppercase;
    color:#e5c76b; margin:0 0 10px;
}
.sdir-ttl {
    font-family:var(--hf);
    font-size:clamp(2.6rem,5.5vw,4.4rem);
    font-weight:700; color:#f8fafc;
    margin:0 0 6px; letter-spacing:-.025em; line-height:1.06;
}
.sdir-ttl em {
    font-style:italic;
    background:linear-gradient(135deg,#f0d878 0%,#c9a227 45%,#e5c76b 100%);
    -webkit-background-clip:text; -webkit-text-fill-color:transparent; background-clip:text;
}
.sdir-dsc {
    font-family:var(--bf);
    font-size:clamp(.95rem,1.6vw,1.08rem); font-weight:400;
    color:#e2e8f4;
    max-width:560px; margin:18px auto 38px;
    line-height:1.80; letter-spacing:.01em;
}

/* stats pill */
.sdir-stats {
    display:inline-flex;
    border:1px solid rgba(201,162,39,.40); border-radius:100px;
    background:rgba(255,255,255,.06); backdrop-filter:blur(10px);
    overflow:hidden;
}
.sdir-stat {
    padding:14px 32px;
    font-family:var(--bf); font-size:1rem;
    color:#dce8f8;
    border-right:1px solid rgba(201,162,39,.28);
    text-align:center; line-height:1.25;
}
.sdir-stat:last-child { border-right:none; }
.sdir-stat strong {
    display:block; font-size:1.35rem; font-weight:700;
    color:var(--sg-lt); font-family:var(--hf); margin-bottom:3px;
}

/* ══════════════════════════════════════════
   A–Z BAR
══════════════════════════════════════════ */
.sdir-az {
    position:sticky; top:0; z-index:200;
    background:var(--s-card);
    border-bottom:1px solid var(--s-border);
    box-shadow:0 2px 16px rgba(0,0,0,.07);
    padding:9px 0; backdrop-filter:blur(14px);
}
html[data-theme='dark'] .sdir-az { background:rgba(9,14,26,.96); }
.sdir-az-inner {
    display:flex; align-items:center; justify-content:center;
    flex-wrap:wrap; gap:3px;
    overflow-x:auto; scrollbar-width:none; padding:1px 0;
}
.sdir-az-inner::-webkit-scrollbar { display:none; }
.sdir-chip {
    display:inline-flex; align-items:center; justify-content:center;
    min-width:46px; height:46px; padding:0 14px;
    border-radius:10px;
    font-family:var(--tf); font-size:1.22rem; font-weight:700; letter-spacing:.04em;
    border:1.5px solid rgba(201,162,39,.35);
    color:var(--sg-lt);
    background:rgba(201,162,39,.07);
    text-decoration:none;
    transition:all var(--tr);
    cursor:pointer;
}
.sdir-chip:hover {
    background:rgba(201,162,39,.18);
    border-color:rgba(201,162,39,.65);
    color:#fff;
    transform:translateY(-1px);
    box-shadow:0 4px 12px rgba(201,162,39,.20);
}
.sdir-chip.active {
    background:var(--sg);
    border-color:var(--sg);
    color:var(--sn);
    font-weight:700;
    box-shadow:0 3px 12px rgba(201,162,39,.40);
    transform:translateY(-1px);
}
.sdir-chip.off {
    opacity:.18;
    pointer-events:none;
    cursor:not-allowed;
    background:transparent;
    border-color:rgba(255,255,255,.10);
    color:rgba(255,255,255,.30);
}
.sdir-chip.all-btn {
    padding:0 22px;
    font-family:var(--bf); font-size:1.15rem; font-weight:700; letter-spacing:.05em;
    background:var(--sn); border-color:var(--sn); color:#fff;
}
html[data-theme='dark'] .sdir-chip.all-btn:not(.active) { background:#1e2d44; border-color:#1e2d44; }
.sdir-chip.all-btn:hover,
.sdir-chip.all-btn.active,
html[data-theme='dark'] .sdir-chip.all-btn.active { background:var(--sg) !important; border-color:var(--sg) !important; color:var(--sn) !important; }

/* ══════════════════════════════════════════
   CONTENT AREA
══════════════════════════════════════════ */
.sdir-body {
    background:var(--s-bg);
    padding:44px 0 88px; min-height:60vh;
}

/* Toolbar */
.sdir-toolbar {
    display:flex; align-items:center; gap:14px;
    margin-bottom:34px; flex-wrap:wrap;
    justify-content:space-between;
}
.sdir-sw { flex:1; max-width:400px; }
.sdir-sf {
    display:flex; align-items:center;
    background:var(--s-card);
    border:1.5px solid var(--s-border); border-radius:100px;
    overflow:hidden;
    box-shadow:0 2px 8px rgba(0,0,0,.05);
    transition:border-color var(--tr), box-shadow var(--tr);
}
.sdir-sf:focus-within {
    border-color:rgba(201,162,39,.48);
    box-shadow:0 0 0 4px rgba(201,162,39,.09);
}
.sdir-sf input {
    flex:1; border:none; outline:none;
    padding:12px 20px; font-size:.87rem;
    font-family:var(--bf); background:transparent;
    color:var(--s-head); min-width:0;
}
.sdir-sf input::placeholder { color:var(--s-muted); }
.sdir-sf button {
    background:var(--sg); border:none;
    padding:12px 20px; color:#fff; cursor:pointer;
    display:flex; align-items:center; justify-content:center;
    flex-shrink:0; transition:background var(--tr);
}
.sdir-sf button:hover { background:var(--sg-h); }
.sdir-info {
    display:flex; align-items:center; gap:8px;
    font-family:var(--bf); font-size:.80rem; color:var(--s-muted);
    flex-shrink:0;
}
.sdir-info strong { color:var(--sg); font-weight:700; }
.sdir-isep { width:1px; height:13px; background:var(--s-border); }

/* Section heading */
.sdir-sh {
    display:flex; align-items:center;
    gap:14px; margin-bottom:28px;
}
.sdir-shl { flex:1; height:1px; background:var(--s-border); }
.sdir-shl::before {
    content:''; display:block; height:1px; width:46px;
    background:linear-gradient(90deg,var(--sg),transparent);
}
.sdir-shl.r::before {
    margin-left:auto;
    background:linear-gradient(270deg,var(--sg),transparent);
}
.sdir-sht {
    font-family:var(--hf); font-size:1.08rem; font-weight:600;
    color:var(--s-head); white-space:nowrap;
    display:flex; align-items:center; gap:9px;
}
.sdir-sht::before { content:'✝'; font-size:.70rem; color:var(--sg); opacity:.72; }

/* ══════════════════════════════════════════
   GRID
══════════════════════════════════════════ */
.sdir-grid {
    display:grid;
    grid-template-columns:repeat(auto-fill,minmax(275px,1fr));
    gap:24px; margin-bottom:44px;
}

/* ── CARD ──────────────────────────────── */
.sdir-card {
    background:var(--s-card);
    border:1px solid var(--s-border);
    border-radius:var(--rad);
    overflow:hidden; display:flex; flex-direction:column;
    position:relative;
    box-shadow:0 1px 3px rgba(0,0,0,.05),0 4px 16px rgba(0,0,0,.05);
    transition:transform .28s cubic-bezier(.22,1,.36,1),
               box-shadow .28s ease, border-color var(--tr);
    will-change:transform;
}
.sdir-card::before {           /* gold top accent */
    content:''; position:absolute;
    top:0; left:0; right:0; height:3px;
    background:linear-gradient(90deg,#c9a227,#e5c76b 50%,#c9a227);
    opacity:0; transition:opacity .2s ease; z-index:3;
}
.sdir-card:hover {
    transform:translateY(-6px);
    box-shadow:0 20px 48px rgba(0,0,0,.13),0 8px 20px rgba(201,162,39,.10);
    border-color:rgba(201,162,39,.30);
}
.sdir-card:hover::before { opacity:1; }

/* image */
.sdir-ciw {
    position:relative; height:218px;
    background:linear-gradient(145deg,#0d1f3c,#162a4a 50%,#0a1628);
    overflow:hidden; flex-shrink:0;
}
.sdir-cimg {
    width:100%; height:100%; object-fit:cover; display:block;
    transition:transform .45s cubic-bezier(.22,1,.36,1);
}
.sdir-card:hover .sdir-cimg { transform:scale(1.055); }
.sdir-cov {
    position:absolute; inset:0;
    background:linear-gradient(to top,rgba(6,14,29,.80) 0%,rgba(6,14,29,.18) 45%,transparent 68%);
    pointer-events:none;
}

/* placeholder */
.sdir-cph {
    height:218px;
    background:linear-gradient(145deg,#0d1f3c,#172b49 50%,#0a1628);
    display:flex; flex-direction:column;
    align-items:center; justify-content:center; gap:9px;
    flex-shrink:0; position:relative; overflow:hidden;
}
.sdir-cph::before {
    content:''; position:absolute; inset:0;
    background:
        radial-gradient(circle at 33% 42%,rgba(201,162,39,.065) 0%,transparent 55%),
        radial-gradient(circle at 66% 58%,rgba(4,107,210,.05) 0%,transparent 50%);
}
.sdir-ring {
    position:absolute; top:50%; left:50%;
    border-radius:50%;
    border:1px solid rgba(201,162,39,.10);
    animation:phRing 3.8s ease-in-out infinite;
}
@keyframes phRing {
    0%,100%{transform:translate(-50%,-50%) scale(1);  opacity:.18}
    50%{transform:translate(-50%,-50%) scale(1.1); opacity:.06}
}
.sdir-r1{width:68px;height:68px;margin:-34px 0 0 -34px;animation-delay:0s}
.sdir-r2{width:98px;height:98px;margin:-49px 0 0 -49px;border-color:rgba(201,162,39,.06);animation-delay:.65s}
.sdir-r3{width:132px;height:132px;margin:-66px 0 0 -66px;border-color:rgba(201,162,39,.035);animation-delay:1.3s}
.sdir-phx {
    position:relative; z-index:1;
    font-size:2.7rem; color:rgba(201,162,39,.45); line-height:1;
    transition:color .25s ease,transform .25s ease;
}
.sdir-card:hover .sdir-phx { color:rgba(201,162,39,.82); transform:scale(1.10); }
.sdir-phl {
    position:relative; z-index:1;
    font-family:var(--tf); font-size:.54rem;
    letter-spacing:.20em; text-transform:uppercase;
    color:rgba(201,162,39,.28);
}

/* category tag */
.sdir-cat {
    position:absolute; top:10px; left:10px; z-index:4;
    background:rgba(201,162,39,.90); color:#0d1f3c;
    font-family:var(--bf); font-size:.60rem; font-weight:700;
    letter-spacing:.06em; text-transform:uppercase;
    padding:3px 9px; border-radius:100px;
    box-shadow:0 2px 6px rgba(0,0,0,.18);
}

/* body */
.sdir-cb {
    padding:18px 18px 16px;
    display:flex; flex-direction:column; flex:1;
}
.sdir-cn {
    font-family:var(--hf); font-size:1.38rem; font-weight:700;
    color:var(--s-head); text-decoration:none; display:block;
    margin-bottom:8px; line-height:1.26;
    transition:color var(--tr);
}
.sdir-card:hover .sdir-cn { color:var(--sg); }
.sdir-cm {
    display:inline-flex; align-items:center; gap:5px;
    background:var(--sg-soft); border:1px solid rgba(201,162,39,.16);
    color:var(--sg-h); font-family:var(--bf); font-size:.64rem; font-weight:600;
    padding:3px 9px; border-radius:100px; margin-bottom:10px; width:fit-content;
}
.sdir-cd {
    font-family:var(--bf); font-size:1.05rem; color:var(--s-body); line-height:1.72;
    display:-webkit-box; -webkit-line-clamp:3; -webkit-box-orient:vertical;
    overflow:hidden; flex:1; margin-bottom:14px;
}
.sdir-cf {
    display:flex; align-items:center; justify-content:space-between;
    padding-top:12px; border-top:1px solid var(--s-border); margin-top:auto;
}
.sdir-rl {
    display:inline-flex; align-items:center; gap:6px;
    font-family:var(--bf); font-size:1rem; font-weight:600;
    color:var(--sb); text-decoration:none;
    transition:color var(--tr),gap var(--tr);
}
.sdir-rl:hover { color:var(--sg); gap:9px; }
.sdir-ra {
    width:20px; height:20px; border-radius:50%;
    background:rgba(26,86,219,.09);
    display:flex; align-items:center; justify-content:center; font-size:.70rem;
    transition:background var(--tr);
}
.sdir-rl:hover .sdir-ra { background:rgba(201,162,39,.14); }

/* ══════════════════════════════════════════
   EMPTY STATE
══════════════════════════════════════════ */
.sdir-empty {
    grid-column:1/-1; text-align:center;
    padding:90px 40px;
    background:var(--s-card);
    border:1.5px dashed var(--s-border); border-radius:var(--rad);
}
.sdir-empty-ico {
    width:72px; height:72px; border-radius:50%;
    background:linear-gradient(145deg,#0d1f3c,#1a2e50);
    display:flex; align-items:center; justify-content:center;
    font-size:2.1rem; color:rgba(201,162,39,.55);
    margin:0 auto 18px; box-shadow:0 0 30px rgba(201,162,39,.14);
}
.sdir-empty h3 { font-family:var(--hf); font-size:1.4rem; color:var(--s-head); margin-bottom:8px; }
.sdir-empty p  { font-family:var(--bf); font-size:.88rem; color:var(--s-muted); max-width:380px; margin:0 auto 20px; line-height:1.65; }
.sdir-empty-cta {
    display:inline-flex; align-items:center; gap:7px;
    background:var(--sg); color:var(--sn);
    font-family:var(--bf); font-size:.82rem; font-weight:700;
    padding:11px 26px; border-radius:100px; text-decoration:none;
    transition:background var(--tr),transform var(--tr);
    box-shadow:0 4px 14px rgba(201,162,39,.28);
}
.sdir-empty-cta:hover { background:var(--sg-h); color:#fff; transform:translateY(-2px); }

/* ══════════════════════════════════════════
   PAGINATION
══════════════════════════════════════════ */
.sdir-pag { display:flex; justify-content:center; margin-top:10px; }

/* ══════════════════════════════════════════
   RESPONSIVE
══════════════════════════════════════════ */
@media(max-width:768px){
    .sdir-hero { padding:16px 0 14px; }
    .sdir-stats { flex-direction:column; border-radius:12px; }
    .sdir-stat { border-right:none; border-bottom:1px solid rgba(201,162,39,.12); }
    .sdir-stat:last-child { border-bottom:none; }
    .sdir-toolbar { flex-direction:column; align-items:stretch; gap:10px; }
    .sdir-sw { max-width:100%; }
    .sdir-grid { grid-template-columns:repeat(auto-fill,minmax(228px,1fr)); gap:16px; }
}
@media(max-width:480px){
    .sdir-ttl { font-size:2.1rem; }
    .sdir-grid { grid-template-columns:1fr 1fr; gap:12px; }
    .sdir-ciw,.sdir-cph { height:165px; }
    .sdir-cb { padding:13px 13px 11px; }
    .sdir-cn { font-size:1.18rem; }
    .sdir-cd { -webkit-line-clamp:2; }
}
@media(max-width:360px){ .sdir-grid { grid-template-columns:1fr; } }
</style>

{{-- ══════════════════════════════════════════
     HERO
══════════════════════════════════════════ --}}
<section class="sdir-hero">
    <div class="sdir-hero-tex" aria-hidden="true"></div>
    <div class="container">
        <div class="sdir-hi">

            <div class="sdir-orn" aria-hidden="true">
                <span class="sdir-orn-l"></span>
                <span class="sdir-orn-ico">✝</span>
                <span class="sdir-orn-l r"></span>
            </div>

            <div><span class="sdir-ew"><span class="sdir-ew-dot"></span>{{ __('AllCatholicMedia') }}</span></div>

            <p class="sdir-lbl">{{ __('Communion of Saints') }}</p>

            <h1 class="sdir-ttl">{{ __('Saints') }} <em>{{ __('Directory') }}</em></h1>

            <p class="sdir-dsc">{{ __('The great cloud of witnesses — explore the lives, feast days, and patronages of holy men and women who shaped the Church throughout history.') }}</p>

            <div class="sdir-stats">
                <div class="sdir-stat"><strong id="sd-cnt">{{ $saints->total() }}+</strong>{{ __('Saints') }}</div>
                <div class="sdir-stat"><strong>{{ count($availableLetters) }}</strong>{{ __('Letters') }}</div>
                <div class="sdir-stat"><strong>A – Z</strong>{{ __('Browse') }}</div>
            </div>

        </div>
    </div>
</section>

{{-- ══════════════════════════════════════════
     A–Z BAR
══════════════════════════════════════════ --}}
<div class="sdir-az">
    <div class="container">
        <div class="sdir-az-inner">
            <a href="{{ route('public.saints') }}"
               class="sdir-chip all-btn @if(!$letter && !$query) active @endif">{{ __('All') }}</a>
            @foreach(range('A','Z') as $l)
                @if(in_array($l, $availableLetters))
                    <a href="{{ route('public.saints', ['letter' => $l]) }}"
                       class="sdir-chip @if($letter === $l) active @endif">{{ $l }}</a>
                @else
                    <span class="sdir-chip off">{{ $l }}</span>
                @endif
            @endforeach
        </div>
    </div>
</div>

{{-- ══════════════════════════════════════════
     MAIN CONTENT
══════════════════════════════════════════ --}}
<div class="sdir-body">
<div class="container">

    {{-- Section heading --}}
    <div class="sdir-sh">
        <span class="sdir-shl"></span>
        <h2 class="sdir-sht">
            @if($letter){{ __('Saints') }} — {{ $letter }}
            @elseif($query){{ __('Search Results') }}
            @else{{ __('All Saints') }}@endif
        </h2>
        <span class="sdir-shl r"></span>
    </div>

    {{-- Grid --}}
    <div class="sdir-grid">
        @forelse($saints as $index => $saint)
            @php $cat = $saint->categories->where('id','!=',3)->first(); @endphp
            <article class="sdir-card" style="animation-delay:{{ min($index % 12, 11) * 50 }}ms">

                @if($saint->image)
                    <div class="sdir-ciw">
                        <img class="sdir-cimg"
                             src="{{ RvMedia::getImageUrl($saint->image,'medium') }}"
                             alt="{{ $saint->name }}" loading="lazy" decoding="async">
                        <div class="sdir-cov"></div>
                        @if($cat)<span class="sdir-cat">{{ $cat->name }}</span>@endif
                    </div>
                @else
                    <div class="sdir-cph">
                        <div class="sdir-ring sdir-r1" aria-hidden="true"></div>
                        <div class="sdir-ring sdir-r2" aria-hidden="true"></div>
                        <div class="sdir-ring sdir-r3" aria-hidden="true"></div>
                        <span class="sdir-phx">✝</span>
                        <span class="sdir-phl">{{ __('Sanctus') }}</span>
                        @if($cat)<span class="sdir-cat">{{ $cat->name }}</span>@endif
                    </div>
                @endif

                <div class="sdir-cb">
                    <a href="{{ $saint->url }}" class="sdir-cn">{{ $saint->name }}</a>
                    @if($cat)
                        <span class="sdir-cm">
                            <svg width="9" height="9" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                                <path d="M12 2l1.5 5h5l-4 3 1.5 5-4-3-4 3 1.5-5-4-3h5z"/>
                            </svg>
                            {{ $cat->name }}
                        </span>
                    @endif
                    @if($saint->description)
                        <p class="sdir-cd">{{ $saint->description }}</p>
                    @endif
                    <div class="sdir-cf">
                        <a href="{{ $saint->url }}" class="sdir-rl">
                            {{ __('Read more') }}<span class="sdir-ra">›</span>
                        </a>
                    </div>
                </div>

            </article>
        @empty
            <div class="sdir-empty">
                <div class="sdir-empty-ico" aria-hidden="true">✝</div>
                <h3>{{ __('No saints found') }}</h3>
                <p>{{ __('Saints articles are being added regularly. Check back soon or browse all saints.') }}</p>
                <a href="{{ route('public.saints') }}" class="sdir-empty-cta">{{ __('Browse all saints') }} <span>→</span></a>
            </div>
        @endforelse
    </div>

    @if($saints->hasPages())
        <div class="sdir-pag">
            {!! $saints->appends(['q'=>$query,'letter'=>$letter])->links(Theme::getThemeNamespace('partials.pagination')) !!}
        </div>
    @endif

</div>
</div>

{{-- ── Inline JS (no @push — footer stack not supported) ── --}}
<script>
(function(){
    /* Animate stat counter */
    var el = document.getElementById('sd-cnt');
    if(el){
        var raw = el.textContent.trim().replace(/\+$/,'');
        var num = parseInt(raw,10);
        if(!isNaN(num) && num>=5){
            var cur=0, step=Math.ceil(num/40);
            var t=setInterval(function(){
                cur=Math.min(cur+step,num);
                el.textContent=cur+'+';
                if(cur>=num) clearInterval(t);
            },28);
        }
    }
    /* Staggered card entrance via IntersectionObserver */
    if('IntersectionObserver' in window){
        document.querySelectorAll('.sdir-card').forEach(function(c,i){
            c.style.animationPlayState='paused';
        });
        var io=new IntersectionObserver(function(entries){
            entries.forEach(function(e){
                if(e.isIntersecting){
                    e.target.style.animationPlayState='running';
                    io.unobserve(e.target);
                }
            });
        },{threshold:0.06,rootMargin:'0px 0px -20px 0px'});
        document.querySelectorAll('.sdir-card').forEach(function(c){ io.observe(c); });
    }
}());
</script>
