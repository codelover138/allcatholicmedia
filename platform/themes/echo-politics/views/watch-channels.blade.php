@php
    Theme::layout('full-width');
    SeoHelper::setTitle(__('plugins/watch-manager::watch.seo.channels_title'));
    SeoHelper::setDescription(__('plugins/watch-manager::watch.seo.channels_description'));
    $heroImage = setting('watch_page_hero_image', url('ref_image/header.png'));
@endphp

<style>
:root{--wc-primary:#046bd2;--wc-gold:#c9a227;--wc-gold-light:rgba(201,162,39,.12);--wc-page:#f4f7fb;--wc-card:#fff;--wc-border:#e2e8f0;--wc-heading:#0f172a;--wc-body:#475569;--wc-muted:#94a3b8}
html[data-theme='dark']{--wc-page:#0d1117;--wc-card:#141a27;--wc-border:rgba(255,255,255,.08);--wc-heading:#e8f0fe;--wc-body:rgba(226,232,240,.78);--wc-muted:#64748b}
.acm-watch-page{background:var(--wc-page);padding-bottom:80px}.acm-watch-hero{position:relative;overflow:hidden;background:url('{{ $heroImage }}') center center/cover no-repeat;padding:124px 0 118px;text-align:center}.acm-watch-hero::before{content:'';position:absolute;inset:0;background:rgba(0,0,0,.18);pointer-events:none}.acm-watch-hero::after{display:none}.acm-watch-hero-inner{position:relative;z-index:1}.acm-watch-eyebrow{display:inline-flex;align-items:center;gap:8px;margin-bottom:18px;padding:8px 18px;border-radius:999px;background:rgba(15,23,42,.34);border:1px solid rgba(201,162,39,.5);color:#f6d365;font-size:.76rem;font-weight:700;letter-spacing:.08em;text-transform:uppercase;backdrop-filter:blur(4px)}.acm-watch-title{margin:0 0 12px;color:#f8fbff;font-family:'Playfair Display',Georgia,serif;font-size:clamp(2.4rem,4.8vw,4rem);font-weight:700;letter-spacing:-.03em;text-shadow:0 6px 18px rgba(0,0,0,.18)}.acm-watch-sub{max-width:820px;margin:0 auto;color:rgba(255,255,255,.96);font-size:1.08rem;line-height:1.8;text-shadow:0 4px 14px rgba(0,0,0,.18)}.acm-channel-grid{margin-top:34px;--bs-gutter-x:24px;--bs-gutter-y:24px}.acm-channel-card{display:block;height:100%;background:var(--wc-card);border:1px solid var(--wc-border);border-radius:18px;overflow:hidden;text-decoration:none;box-shadow:0 10px 26px rgba(15,23,42,.06);transition:transform .25s ease,box-shadow .25s ease,border-color .25s ease}.acm-channel-card:hover{transform:translateY(-5px);box-shadow:0 18px 40px rgba(15,23,42,.12);border-color:rgba(4,107,210,.22);text-decoration:none}.acm-channel-banner{position:relative;aspect-ratio:16/7;background:linear-gradient(135deg,#10213b,#173c6b)}.acm-channel-banner img{width:100%;height:100%;object-fit:cover;display:block}.acm-channel-logo{width:84px;height:84px;border-radius:20px;overflow:hidden;border:4px solid var(--wc-card);background:#fff;margin:-42px 0 0 22px;position:relative;z-index:1;box-shadow:0 12px 28px rgba(15,23,42,.14)}.acm-channel-logo img{width:100%;height:100%;object-fit:cover}.acm-channel-body{padding:18px 22px 22px}.acm-channel-name{color:var(--wc-heading);font-size:1.3rem;font-weight:700;margin:0 0 10px;line-height:1.3}.acm-channel-desc{color:var(--wc-body);font-size:.95rem;line-height:1.7;margin:0 0 16px;display:-webkit-box;-webkit-line-clamp:3;-webkit-box-orient:vertical;overflow:hidden}.acm-channel-meta{display:flex;align-items:center;justify-content:space-between;gap:12px;flex-wrap:wrap}.acm-channel-count{display:inline-flex;align-items:center;gap:8px;padding:7px 12px;border-radius:999px;background:var(--wc-gold-light);color:var(--wc-gold);font-size:.85rem;font-weight:700}.acm-channel-link{color:var(--wc-primary);font-size:.9rem;font-weight:700}.acm-empty-watch{margin-top:34px;background:var(--wc-card);border:1px solid var(--wc-border);border-radius:18px;padding:42px 28px;text-align:center;color:var(--wc-body)}
@media (max-width:767px){.acm-watch-hero{padding:92px 0 88px;background-position:center center}.acm-watch-title{font-size:clamp(2rem,8vw,2.8rem)}.acm-watch-sub{font-size:.98rem}}
</style>

<div class="acm-watch-page">
    <section class="acm-watch-hero">
        <div class="container acm-watch-hero-inner">
            <div class="acm-watch-eyebrow">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="23 7 16 12 23 17 23 7"/><rect x="1" y="5" width="15" height="14" rx="2"/></svg>
                {{ __('plugins/watch-manager::watch.frontend.eyebrow') }}
            </div>
            <h1 class="acm-watch-title">{{ __('plugins/watch-manager::watch.frontend.title') }}</h1>
            <p class="acm-watch-sub">{{ __('plugins/watch-manager::watch.frontend.subtitle') }}</p>
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
