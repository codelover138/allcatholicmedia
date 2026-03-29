@php
    Theme::layout('full-width');
    SeoHelper::setTitle('Catholic Podcasts & Audio Shows | AllCatholicMedia');
    SeoHelper::setDescription('Browse Catholic podcast shows - homilies, rosaries, Bible studies, news, and devotional audio. Open any show to listen to its episodes.');
    $heroImage = setting('listen_page_hero_image', url('ref_image/header.png'));
    $totalEpisodes = $shows->sum('episodes_count');
@endphp

<style>
/* ── Hero (user-designed, kept as-is) ─────────────────────────────────── */
.acm-listen-hero{position:relative;overflow:hidden;background:url('{{ $heroImage }}') center center/cover no-repeat;padding:118px 0 112px;text-align:center}
.acm-listen-hero::before{content:'';position:absolute;inset:0;background:linear-gradient(180deg,rgba(8,19,10,.55) 0%,rgba(10,23,13,.48) 30%,rgba(8,19,10,.68) 100%);pointer-events:none}
.acm-listen-hero::after{content:'';position:absolute;inset:auto 0 0 0;height:6px;background:linear-gradient(90deg,transparent,rgba(201,162,39,.5),transparent);pointer-events:none}
.acm-listen-hero-inner{position:relative;z-index:1}
.acm-listen-eyebrow{display:inline-flex;align-items:center;gap:9px;margin-bottom:20px;padding:9px 18px;border-radius:999px;background:rgba(15,23,42,.28);border:1px solid rgba(201,162,39,.45);color:#f3d46d;font-size:.76rem;font-weight:700;letter-spacing:.08em;text-transform:uppercase;backdrop-filter:blur(6px)}
.acm-listen-title{margin:0 0 12px;color:#fff;font-family:'Playfair Display',Georgia,serif;font-size:clamp(2.4rem,4.7vw,4rem);font-weight:700;letter-spacing:-.03em;text-shadow:0 10px 28px rgba(0,0,0,.24)}
.acm-listen-sub{max-width:860px;margin:0 auto 26px;color:rgba(255,255,255,.92);font-size:1.04rem;line-height:1.85;text-shadow:0 4px 18px rgba(0,0,0,.2)}
.acm-listen-stats{display:flex;align-items:center;justify-content:center;gap:14px;flex-wrap:wrap}
.acm-listen-stat{min-width:168px;padding:14px 18px;border-radius:18px;background:rgba(255,255,255,.12);border:1px solid rgba(255,255,255,.18);backdrop-filter:blur(8px);box-shadow:0 16px 40px rgba(0,0,0,.12)}
.acm-listen-stat-label{display:block;margin-bottom:4px;color:rgba(255,255,255,.72);font-size:.72rem;font-weight:700;letter-spacing:.08em;text-transform:uppercase}
.acm-listen-stat-value{display:block;color:#fff;font-size:1.45rem;font-weight:700;line-height:1}

/* ── Directory section ────────────────────────────────────────────────── */
.acm-listen-page{background:#111;padding-bottom:80px}
.acm-listen-directory{padding-top:40px}
.acm-listen-filters{display:flex;align-items:center;justify-content:space-between;gap:18px;flex-wrap:wrap;margin-bottom:22px}
.acm-listen-filter-group{display:flex;align-items:center;gap:12px;flex-wrap:wrap}
.acm-listen-filter-label{display:inline-flex;align-items:center;gap:8px;color:rgba(255,255,255,.55);font-size:.76rem;font-weight:700;letter-spacing:.08em;text-transform:uppercase}
.acm-listen-filter-chips{display:flex;align-items:center;gap:12px;flex-wrap:wrap}
.acm-listen-chip{display:inline-flex;align-items:center;justify-content:center;min-width:174px;padding:18px 22px;background:#343332;border:1px solid #4a4a49;color:#fff;text-decoration:none;font-size:1rem;font-weight:500;transition:background .2s ease,border-color .2s ease}
.acm-listen-chip:hover{text-decoration:none;color:#fff;border-color:#777}
.acm-listen-chip.is-active{background:#c9a227;border-color:#c9a227;color:#fff}
.acm-listen-sort{display:flex;align-items:center;gap:12px;flex-wrap:wrap}
.acm-listen-sort select{min-width:180px;padding:12px 14px;background:#1a1a1a;border:1px solid #4a4a49;color:#fff}

/* ── Grid — 4 cols like the WP site ──────────────────────────────────── */
.acm-show-grid{
    display:grid;
    grid-template-columns:repeat(4,1fr);
    gap:10px;
}
@media(max-width:1199px){.acm-show-grid{grid-template-columns:repeat(3,1fr)}}
@media(max-width:767px) {.acm-show-grid{grid-template-columns:repeat(2,1fr)}}
@media(max-width:479px) {.acm-show-grid{grid-template-columns:1fr}}

/* ── Card — exactly matching WP site: black bg, dark border ──────────── */
.acm-show-card{
    display:block;
    background:#000;
    border:1px solid #4A4A49;
    text-decoration:none;
    transition:border-color .2s ease,transform .2s ease;
}
.acm-show-card:hover{
    border-color:#888;
    transform:translateY(-2px);
    text-decoration:none;
}

/* Image: fixed 224px height, full width */
.acm-show-media{
    position:relative;
    width:100%;
    height:224px;
    overflow:hidden;
    background:linear-gradient(135deg,#0d1b0e,#1a3320);
}
.acm-show-img{
    display:block;
    width:100%;
    height:224px;
    object-fit:cover;
    background:linear-gradient(135deg,#0d1b0e,#1a3320);
}
.acm-show-img-placeholder{
    position:absolute;
    inset:0;
    background:linear-gradient(135deg,#0d1b0e,#1a3320);
    display:none;
    align-items:center;
    justify-content:center;
    color:rgba(255,255,255,.15);
    font-size:2.5rem;
}

/* Body: icon + title, minimal padding like WP */
.acm-show-body{
    padding:10px 10px 12px;
}
.acm-show-icon{
    display:block;
    margin-bottom:8px;
    line-height:1;
}
.acm-show-name{
    font-family:'Inter',sans-serif;
    font-size:1.05rem;
    font-weight:400;
    color:#fff;
    margin:0;
    line-height:1.45;
    overflow:hidden;
    display:-webkit-box;
    -webkit-line-clamp:2;
    -webkit-box-orient:vertical;
    text-overflow:ellipsis;
}
.acm-show-card:hover .acm-show-name{color:#e2e8f0}

/* Category tag below title */
.acm-show-cat{
    display:inline-block;
    margin-top:7px;
    font-family:'Inter',sans-serif;
    font-size:.72rem;
    font-weight:600;
    color:rgba(255,255,255,.45);
    letter-spacing:.04em;
    text-transform:uppercase;
}

/* Empty state */
.acm-empty-listen{
    background:#1a1a1a;
    border:1px solid #333;
    border-radius:8px;
    padding:52px 34px;
    text-align:center;
    color:#888;
}

@media(max-width:767px){
    .acm-listen-hero{padding:88px 0 80px}
    .acm-listen-title{font-size:clamp(2rem,8vw,2.6rem)}
    .acm-listen-sub{font-size:.96rem}
    .acm-listen-chip{min-width:130px;padding:14px 16px}
    .acm-listen-sort{width:100%}
    .acm-listen-sort select{width:100%}
    .acm-show-img,.acm-show-img-placeholder{height:180px}
}
@media(max-width:479px){
    .acm-show-img,.acm-show-img-placeholder{height:200px}
}
</style>

{{-- Hero ----------------------------------------------------------------}}
<div class="acm-listen-page">
    <section class="acm-listen-hero">
        <div class="container acm-listen-hero-inner">
            <div class="acm-listen-eyebrow">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 18V5l12-2v13"/><circle cx="6" cy="18" r="3"/><circle cx="18" cy="16" r="3"/></svg>
                {{ __('Catholic Audio Directory') }}
            </div>
            <h1 class="acm-listen-title">{{ __('Listen By Show') }}</h1>
            <p class="acm-listen-sub">{{ __('Browse Catholic podcast shows and audio programs. Open any show to stream its episodes - homilies, rosaries, talks, news, and devotions.') }}</p>
            <div class="acm-listen-stats">
                <div class="acm-listen-stat">
                    <span class="acm-listen-stat-label">{{ __('Shows') }}</span>
                    <span class="acm-listen-stat-value">{{ number_format($shows->count()) }}</span>
                </div>
                <div class="acm-listen-stat">
                    <span class="acm-listen-stat-label">{{ __('Episodes') }}</span>
                    <span class="acm-listen-stat-value">{{ number_format($totalEpisodes) }}</span>
                </div>
                <div class="acm-listen-stat">
                    <span class="acm-listen-stat-label">{{ __('Streaming') }}</span>
                    <span class="acm-listen-stat-value">{{ __('Ready') }}</span>
                </div>
            </div>
        </div>
    </section>

    {{-- Shows grid -------------------------------------------------------}}
    <div class="container acm-listen-directory">
        @if ($shows->isEmpty())
            <div class="acm-empty-listen">
                <h3 style="color:#ccc;margin-bottom:8px">{{ __('No podcast shows yet') }}</h3>
                <p class="mb-0">{{ __('Add podcast shows in the admin panel to populate this page.') }}</p>
            </div>
        @else
            <form method="GET" action="{{ route('public.listen') }}" class="acm-listen-filters">
                <div class="acm-listen-filter-group">
                    <span class="acm-listen-filter-label">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 6h18"/><path d="M7 12h10"/><path d="M10 18h4"/></svg>
                        {{ __('Topic') }}
                    </span>
                    <div class="acm-listen-filter-chips">
                        <a href="{{ route('public.listen', array_filter(['sort' => $sort !== 'name' ? $sort : null])) }}"
                           class="acm-listen-chip {{ $category === '' ? 'is-active' : '' }}">
                            {{ __('All') }}
                        </a>
                        @foreach ($categories as $topic)
                            <a href="{{ route('public.listen', array_filter(['category' => $topic, 'sort' => $sort !== 'name' ? $sort : null])) }}"
                               class="acm-listen-chip {{ $category === $topic ? 'is-active' : '' }}">
                                {{ $topic }}
                            </a>
                        @endforeach
                    </div>
                </div>
                <div class="acm-listen-sort">
                    <span class="acm-listen-filter-label">{{ __('Sort') }}</span>
                    <select name="sort" onchange="this.form.submit()">
                        <option value="name" @selected($sort === 'name')>{{ __('A-Z') }}</option>
                        <option value="episodes" @selected($sort === 'episodes')>{{ __('Most Episodes') }}</option>
                    </select>
                    @if ($category !== '')
                        <input type="hidden" name="category" value="{{ $category }}">
                    @endif
                </div>
            </form>

            <div class="acm-show-grid">
                @foreach ($shows as $show)
                    <a href="{{ route('public.listen.show', $show->slug) }}" class="acm-show-card">

                        {{-- Thumbnail image --}}
                        <div class="acm-show-media">
                            @if ($show->thumbnail)
                                <img src="{{ $show->thumbnail }}"
                                     alt="{{ $show->name }}"
                                     class="acm-show-img"
                                     loading="{{ $loop->first ? 'eager' : 'lazy' }}"
                                     onerror="this.style.display='none';this.nextElementSibling.style.display='flex';">
                                <div class="acm-show-img-placeholder">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1"><path d="M9 18V5l12-2v13"/><circle cx="6" cy="18" r="3"/><circle cx="18" cy="16" r="3"/></svg>
                                </div>
                            @else
                                <div class="acm-show-img-placeholder" style="display:flex;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1"><path d="M9 18V5l12-2v13"/><circle cx="6" cy="18" r="3"/><circle cx="18" cy="16" r="3"/></svg>
                                </div>
                            @endif
                        </div>

                        {{-- Card body: playlist icon + title --}}
                        <div class="acm-show-body">
                            <span class="acm-show-icon">
                                {{-- White grid/playlist icon — same as WP site --}}
                                <svg xmlns="http://www.w3.org/2000/svg" width="23" height="20" viewBox="0 0 23 20" fill="none">
                                    <g clip-path="url(#lp_clip)">
                                        <path d="M4.01 16.03H0V19.01H4.01V16.03Z" fill="white"/>
                                        <path d="M4.01 12.04H0V15.02H4.01V12.04Z" fill="white"/>
                                        <path d="M4.01 8.05H0V11.03H4.01V8.05Z" fill="white"/>
                                        <path d="M4.01 4.06H0V7.04H4.01V4.06Z" fill="white"/>
                                        <path d="M10.03 16.03H6.02V19.01H10.03V16.03Z" fill="white"/>
                                        <path d="M10.03 12.06H6.02V15.04H10.03V12.06Z" fill="white"/>
                                        <path d="M10.03 8.07H6.02V11.05H10.03V8.07Z" fill="white"/>
                                        <path d="M16.09 16.03H12.08V19.01H16.09V16.03Z" fill="white"/>
                                        <path d="M16.09 12.06H12.08V15.04H16.09V12.06Z" fill="white"/>
                                        <path d="M16.09 8.07H12.08V11.05H16.09V8.07Z" fill="white"/>
                                        <path d="M22.03 16.03H18.02V19.01H22.03V16.03Z" fill="white"/>
                                        <path d="M22.03 12.06H18.02V15.04H22.03V12.06Z" fill="white"/>
                                        <path d="M22.03 8.07H18.02V11.05H22.03V8.07Z" fill="white"/>
                                        <path d="M16.09 4.06H12.08V7.04H16.09V4.06Z" fill="white"/>
                                        <path d="M16.09 0H12.08V2.98H16.09V0Z" fill="white"/>
                                    </g>
                                    <defs><clipPath id="lp_clip"><rect width="22.02" height="19.01" fill="white"/></clipPath></defs>
                                </svg>
                            </span>

                            <h2 class="acm-show-name">{{ $show->name }}</h2>

                            @if ($show->category)
                                <span class="acm-show-cat">{{ $show->category }}</span>
                            @endif
                        </div>
                    </a>
                @endforeach
            </div>
        @endif
    </div>
</div>
