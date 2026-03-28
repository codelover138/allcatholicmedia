@php
    Theme::set('pageTitle', __('Live Catholic Streams'));
    Theme::layout('full-width');

    SeoHelper::setTitle('Live Catholic Streams | AllCatholicMedia');
    SeoHelper::setDescription('Watch live Catholic Mass, Rosary, Adoration and more from churches and organizations worldwide.');
@endphp

@push('header')
<style>
/* ── Live Streams Page ───────────────────────────────────────────────── */
.acm-live-hero {
    background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
    padding: 48px 0 36px;
    margin-bottom: 40px;
}
.acm-live-hero-inner { text-align: center; }
.acm-live-title {
    font-family: 'DM Sans', sans-serif;
    font-size: 2rem;
    font-weight: 700;
    color: #f8fafc;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 12px;
    margin-bottom: 8px;
}
.acm-live-icon { color: #ef4444; }
.acm-live-subtitle { color: #94a3b8; font-size: 1rem; }

/* ── Live Now Section ─────────────────────────────────────────────────── */
.acm-section-heading {
    display: flex;
    align-items: center;
    gap: 10px;
    font-size: 1.15rem;
    font-weight: 700;
    color: var(--color-heading-1, #1e293b);
    margin-bottom: 20px;
    padding-bottom: 10px;
    border-bottom: 2px solid var(--border-color, #e2e8f0);
}
.acm-badge-live {
    background: #dc2626;
    color: #fff;
    font-size: 0.68rem;
    font-weight: 700;
    letter-spacing: 0.06em;
    text-transform: uppercase;
    padding: 3px 8px;
    border-radius: 3px;
    display: inline-flex;
    align-items: center;
    gap: 5px;
}
.acm-badge-live::before {
    content: '';
    width: 6px; height: 6px;
    background: #fff;
    border-radius: 50%;
    animation: live-pulse 1.2s infinite;
    flex-shrink: 0;
}
@keyframes live-pulse {
    0%, 100% { opacity: 1; transform: scale(1); }
    50%       { opacity: 0.4; transform: scale(0.7); }
}

/* ── Live Stream Cards ────────────────────────────────────────────────── */
.acm-stream-card {
    background: var(--bg-card, #fff);
    border: 1px solid var(--border-color, #e2e8f0);
    border-radius: 8px;
    overflow: hidden;
    transition: box-shadow 0.2s, transform 0.2s;
    height: 100%;
}
.acm-stream-card:hover { box-shadow: 0 8px 24px rgba(0,0,0,.1); transform: translateY(-2px); }

.acm-stream-thumb {
    position: relative;
    aspect-ratio: 16/9;
    background: #0f172a;
    overflow: hidden;
    cursor: pointer;
}
.acm-stream-thumb img {
    width: 100%; height: 100%;
    object-fit: cover;
    transition: transform 0.3s;
}
.acm-stream-card:hover .acm-stream-thumb img { transform: scale(1.04); }

.acm-stream-play {
    position: absolute;
    inset: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    background: rgba(0,0,0,0.3);
    transition: background 0.2s;
}
.acm-stream-play:hover { background: rgba(0,0,0,0.5); }
.acm-play-btn {
    width: 56px; height: 56px;
    background: rgba(255,255,255,0.95);
    border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
    transition: transform 0.2s;
    border: none; cursor: pointer;
}
.acm-play-btn:hover { transform: scale(1.1); }
.acm-play-btn svg { margin-left: 4px; }

.acm-stream-embed {
    display: none;
    position: relative;
    aspect-ratio: 16/9;
    background: #000;
}
.acm-stream-embed iframe {
    width: 100%; height: 100%;
    border: none;
}
.acm-stream-close {
    position: absolute;
    top: 8px; right: 8px;
    background: rgba(0,0,0,0.7);
    color: #fff;
    border: none;
    border-radius: 50%;
    width: 30px; height: 30px;
    cursor: pointer;
    display: flex; align-items: center; justify-content: center;
    font-size: 14px;
    z-index: 10;
}
.acm-stream-close:hover { background: rgba(0,0,0,0.9); }

.acm-stream-info { padding: 14px 16px; }
.acm-stream-source {
    font-size: 0.78rem;
    font-weight: 600;
    color: #046bd2;
    text-transform: uppercase;
    letter-spacing: 0.04em;
    margin-bottom: 4px;
    display: flex;
    align-items: center;
    gap: 6px;
}
.acm-stream-title {
    font-size: 0.95rem;
    font-weight: 600;
    color: var(--color-heading-1, #1e293b);
    margin-bottom: 6px;
    line-height: 1.4;
}
.acm-stream-meta {
    font-size: 0.8rem;
    color: var(--color-body, #475569);
    display: flex;
    align-items: center;
    gap: 12px;
}
.acm-stream-meta svg { flex-shrink: 0; }

/* ── Upcoming Section ─────────────────────────────────────────────────── */
.acm-upcoming-list { display: flex; flex-direction: column; gap: 12px; }
.acm-upcoming-item {
    background: var(--bg-card, #fff);
    border: 1px solid var(--border-color, #e2e8f0);
    border-radius: 8px;
    padding: 14px 18px;
    display: flex;
    align-items: center;
    gap: 16px;
    transition: box-shadow 0.2s;
}
.acm-upcoming-item:hover { box-shadow: 0 4px 12px rgba(0,0,0,.06); }
.acm-upcoming-time {
    min-width: 90px;
    text-align: center;
    background: var(--bg-light, #f0f5fa);
    border-radius: 6px;
    padding: 8px 6px;
}
.acm-upcoming-time .time-hm {
    font-size: 1.1rem;
    font-weight: 700;
    color: #046bd2;
    display: block;
    line-height: 1;
}
.acm-upcoming-time .time-date {
    font-size: 0.72rem;
    color: var(--color-body, #475569);
    margin-top: 3px;
    display: block;
}
.acm-upcoming-info { flex: 1; min-width: 0; }
.acm-upcoming-title {
    font-size: 0.95rem;
    font-weight: 600;
    color: var(--color-heading-1, #1e293b);
    margin-bottom: 3px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}
.acm-upcoming-source {
    font-size: 0.8rem;
    color: var(--color-body, #475569);
}
.acm-upcoming-location {
    font-size: 0.78rem;
    color: #94a3b8;
    white-space: nowrap;
}

/* ── Empty States ─────────────────────────────────────────────────────── */
.acm-empty {
    text-align: center;
    padding: 48px 24px;
    background: var(--bg-card, #fff);
    border: 1px solid var(--border-color, #e2e8f0);
    border-radius: 8px;
    color: var(--color-body, #475569);
}
.acm-empty-icon { font-size: 2.5rem; margin-bottom: 12px; opacity: 0.4; }
.acm-empty p { margin: 0; }

/* ── Timezone note ────────────────────────────────────────────────────── */
.acm-tz-note {
    font-size: 0.78rem;
    color: #94a3b8;
    margin-bottom: 16px;
}
#acm-user-tz { font-weight: 600; color: #046bd2; }

/* ── Dark Mode ────────────────────────────────────────────────────────── */
html[data-theme='dark'] .acm-live-hero { background: linear-gradient(135deg, #020408 0%, #0f172a 100%); }
html[data-theme='dark'] .acm-stream-card,
html[data-theme='dark'] .acm-upcoming-item,
html[data-theme='dark'] .acm-empty {
    background: #1a1d2e;
    border-color: rgba(255,255,255,0.08);
}
html[data-theme='dark'] .acm-upcoming-time { background: #0f172a; }
html[data-theme='dark'] .acm-section-heading { border-color: rgba(255,255,255,0.08); }
html[data-theme='dark'] .acm-stream-title,
html[data-theme='dark'] .acm-upcoming-title { color: #f1f5f9; }

@media (max-width: 767px) {
    .acm-live-title { font-size: 1.5rem; }
    .acm-upcoming-item { flex-wrap: wrap; }
    .acm-upcoming-location { display: none; }
}
</style>
@endpush

{{-- ── Hero ─────────────────────────────────────────────────────────────── --}}
<section class="acm-live-hero">
    <div class="container">
        <div class="acm-live-hero-inner">
            <h1 class="acm-live-title">
                <svg class="acm-live-icon" width="28" height="28" viewBox="0 0 24 24" fill="currentColor"><circle cx="12" cy="12" r="10" opacity=".2"/><circle cx="12" cy="12" r="4"/></svg>
                {{ __('Live Catholic Streams') }}
            </h1>
            <p class="acm-live-subtitle">{{ __('Mass, Rosary, Adoration and more — broadcasting live from around the world.') }}</p>
        </div>
    </div>
</section>

<div class="container" style="padding-bottom: 60px;">

    {{-- ── Live Now ──────────────────────────────────────────────────────── --}}
    <div class="mb-5">
        <h2 class="acm-section-heading">
            <span class="acm-badge-live">{{ __('LIVE NOW') }}</span>
            {{ __('Streaming Right Now') }}
        </h2>

        @if($liveNow->count())
            <div class="row g-3">
                @foreach($liveNow as $stream)
                    @php
                        $thumb = $stream->thumbnail ?: $stream->youtube_thumbnail;
                    @endphp
                    <div class="col-lg-4 col-md-6">
                        <div class="acm-stream-card" data-stream-id="{{ $stream->id }}">
                            {{-- Thumbnail --}}
                            <div class="acm-stream-thumb js-stream-thumb">
                                @if($thumb)
                                    <img src="{{ $thumb }}" alt="{{ $stream->title }}" loading="lazy">
                                @else
                                    <div style="width:100%;height:100%;background:#0f172a;display:flex;align-items:center;justify-content:center;">
                                        <svg width="48" height="48" fill="none" stroke="#94a3b8" stroke-width="1.5" viewBox="0 0 24 24"><polygon points="23 7 16 12 23 17 23 7"/><rect x="1" y="5" width="15" height="14" rx="2"/></svg>
                                    </div>
                                @endif
                                <button class="acm-stream-play js-play-btn" data-embed="{{ $stream->embed_code }}" aria-label="{{ __('Watch Live') }}">
                                    <span class="acm-play-btn">
                                        <svg width="22" height="22" viewBox="0 0 24 24" fill="#046bd2"><polygon points="5 3 19 12 5 21 5 3"/></svg>
                                    </span>
                                </button>
                            </div>
                            {{-- Inline player (hidden until play clicked) --}}
                            <div class="acm-stream-embed js-stream-embed">
                                <iframe src="" data-src="{{ $stream->embed_code }}" allowfullscreen allow="autoplay; encrypted-media"></iframe>
                                <button class="acm-stream-close js-stream-close" aria-label="{{ __('Close') }}">&#x2715;</button>
                            </div>
                            <div class="acm-stream-info">
                                <div class="acm-stream-source">
                                    <span class="acm-badge-live">{{ __('LIVE') }}</span>
                                    {{ $stream->source_name }}
                                </div>
                                <div class="acm-stream-title">{{ $stream->title }}</div>
                                <div class="acm-stream-meta">
                                    @if($stream->location)
                                        <span>
                                            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                                            {{ $stream->location }}
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="acm-empty">
                <div class="acm-empty-icon">📡</div>
                <p>{{ __('No streams are live right now. Check the upcoming schedule below.') }}</p>
            </div>
        @endif
    </div>

    {{-- ── Upcoming Schedule ─────────────────────────────────────────────── --}}
    <div>
        <h2 class="acm-section-heading">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
            {{ __('Upcoming Streams') }}
        </h2>

        <p class="acm-tz-note">{{ __('Times shown in your local timezone:') }} <span id="acm-user-tz">—</span></p>

        @if($upcoming->count())
            <div class="acm-upcoming-list">
                @foreach($upcoming as $stream)
                    <div class="acm-upcoming-item">
                        <div class="acm-upcoming-time">
                            <span class="time-hm">{{ $stream->scheduled_at->format('g:i A') }}</span>
                            <span class="time-date"
                                  data-utc="{{ $stream->scheduled_at->utc()->toIso8601String() }}"
                                  class="js-local-time">
                                {{ $stream->scheduled_at->format('M j') }}
                            </span>
                        </div>
                        <div class="acm-upcoming-info">
                            <div class="acm-upcoming-title">{{ $stream->title }}</div>
                            <div class="acm-upcoming-source">{{ $stream->source_name }}</div>
                        </div>
                        @if($stream->location)
                            <div class="acm-upcoming-location">
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                                {{ $stream->location }}
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
        @else
            <div class="acm-empty">
                <div class="acm-empty-icon">🗓️</div>
                <p>{{ __('No upcoming streams scheduled yet. Check back soon.') }}</p>
            </div>
        @endif
    </div>

</div>

@push('footer')
<script>
(function () {
    'use strict';

    // ── Inline stream player ────────────────────────────────────────────
    document.querySelectorAll('.js-play-btn').forEach(function (btn) {
        btn.addEventListener('click', function () {
            var card   = btn.closest('.acm-stream-card');
            var thumb  = card.querySelector('.js-stream-thumb');
            var embed  = card.querySelector('.js-stream-embed');
            var iframe = embed.querySelector('iframe');

            iframe.src = iframe.dataset.src;
            thumb.style.display  = 'none';
            embed.style.display  = 'block';
        });
    });

    document.querySelectorAll('.js-stream-close').forEach(function (btn) {
        btn.addEventListener('click', function () {
            var card   = btn.closest('.acm-stream-card');
            var thumb  = card.querySelector('.js-stream-thumb');
            var embed  = card.querySelector('.js-stream-embed');
            var iframe = embed.querySelector('iframe');

            iframe.src = '';
            embed.style.display  = 'none';
            thumb.style.display  = 'block';
        });
    });

    // ── Show user timezone ──────────────────────────────────────────────
    var tzEl = document.getElementById('acm-user-tz');
    if (tzEl) {
        try {
            tzEl.textContent = Intl.DateTimeFormat().resolvedOptions().timeZone;
        } catch (e) {}
    }

    // ── Convert scheduled times to local ───────────────────────────────
    document.querySelectorAll('[data-utc]').forEach(function (el) {
        try {
            var d = new Date(el.dataset.utc);
            el.closest('.acm-upcoming-time').querySelector('.time-hm').textContent =
                d.toLocaleTimeString([], { hour: 'numeric', minute: '2-digit' });
            el.textContent = d.toLocaleDateString([], { month: 'short', day: 'numeric' });
        } catch (e) {}
    });
}());
</script>
@endpush
