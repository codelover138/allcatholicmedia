@php
    Theme::set('pageTitle', __('Catholic Audio & Podcasts'));
    Theme::layout('full-width');
    SeoHelper::setTitle('Catholic Audio & Podcasts | AllCatholicMedia');
    SeoHelper::setDescription('Listen to Catholic audio — homilies, talks, rosaries, and podcasts. Stream or download free Catholic audio content.');
@endphp

@push('header')
<style>
.acm-listen-hero { background: linear-gradient(135deg,#0f172a,#1e293b); padding: 36px 0 28px; margin-bottom: 32px; text-align: center; }
.acm-listen-title { font-size: 1.8rem; font-weight: 700; color: #f8fafc; margin: 0 0 6px; display: flex; align-items: center; justify-content: center; gap: 10px; }
.acm-listen-sub { color: #94a3b8; font-size: .95rem; }

.acm-audio-grid { display: grid; grid-template-columns: 1fr; gap: 14px; max-width: 760px; margin: 0 auto 40px; }

.acm-audio-card { background: var(--bg-card,#fff); border: 1px solid var(--border-color,#e2e8f0); border-radius: 12px; padding: 18px 20px; display: flex; gap: 16px; align-items: flex-start; }
.acm-audio-thumb { width: 80px; height: 80px; border-radius: 8px; object-fit: cover; flex-shrink: 0; background: #e2e8f0; }
.acm-audio-body { flex: 1; min-width: 0; }
.acm-audio-category { display: inline-block; background: #fef3c7; color: #92400e; border-radius: 4px; font-size: .72rem; font-weight: 700; padding: 2px 8px; margin-bottom: 6px; }
.acm-audio-title { font-size: .95rem; font-weight: 700; color: var(--color-heading-1,#1e293b); margin-bottom: 4px; text-decoration: none; display: block; }
.acm-audio-title:hover { color: #046bd2; }
.acm-audio-meta { font-size: .78rem; color: #94a3b8; margin-bottom: 10px; }
.acm-audio-player { width: 100%; height: 36px; border-radius: 6px; accent-color: #046bd2; }

.acm-audio-empty { text-align: center; padding: 60px 24px; background: var(--bg-card,#fff); border: 1px solid var(--border-color,#e2e8f0); border-radius: 12px; max-width: 480px; margin: 0 auto; }
.acm-audio-empty svg { color: #94a3b8; margin-bottom: 12px; }
.acm-audio-empty h3 { font-size: 1.05rem; font-weight: 700; color: var(--color-heading-1,#1e293b); margin-bottom: 6px; }
.acm-audio-empty p { font-size: .88rem; color: var(--color-body,#475569); }

html[data-theme='dark'] .acm-audio-card { background: #1a1d2e; border-color: rgba(255,255,255,.08); }
html[data-theme='dark'] .acm-audio-title { color: #f1f5f9; }
html[data-theme='dark'] .acm-audio-empty { background: #1a1d2e; border-color: rgba(255,255,255,.08); }
html[data-theme='dark'] .acm-audio-empty h3 { color: #f1f5f9; }
</style>
@endpush

<section class="acm-listen-hero">
    <div class="container">
        <h1 class="acm-listen-title">
            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 18V5l12-2v13"/><circle cx="6" cy="18" r="3"/><circle cx="18" cy="16" r="3"/></svg>
            {{ __('Catholic Audio & Podcasts') }}
        </h1>
        <p class="acm-listen-sub">{{ __('Homilies, talks, rosaries, and more — all free to stream or download.') }}</p>
    </div>
</section>

<div class="container" style="padding-bottom:60px">

    {{-- Tag filter --}}
    @if($audioTags->isNotEmpty())
    <div style="display:flex;flex-wrap:wrap;gap:8px;justify-content:center;margin-bottom:24px">
        <a href="{{ route('public.listen') }}"
           style="padding:5px 14px;border-radius:20px;font-size:.83rem;font-weight:600;border:1px solid var(--border-color,#e2e8f0);color:var(--color-body,#475569);text-decoration:none;background:{{ !$tagId ? '#046bd2' : 'var(--bg-card,#fff)' }};color:{{ !$tagId ? '#fff' : '' }}">
            {{ __('All') }}
        </a>
        @foreach($audioTags as $tag)
            <a href="{{ route('public.listen', ['tag' => $tag->id]) }}"
               style="padding:5px 14px;border-radius:20px;font-size:.83rem;font-weight:600;border:1px solid var(--border-color,#e2e8f0);text-decoration:none;background:{{ $tagId == $tag->id ? '#046bd2' : 'var(--bg-card,#fff)' }};color:{{ $tagId == $tag->id ? '#fff' : 'var(--color-body,#475569)' }}">
                {{ $tag->name }}
            </a>
        @endforeach
    </div>
    @endif

    {{-- Audio cards --}}
    <div class="acm-audio-grid">
        @forelse($audios as $post)
            @php
                $audioPath = $post->getMetaData('audio', true);
                $audioUrl  = $audioPath ? RvMedia::url($audioPath) : null;
                $category  = $post->categories->first();
            @endphp
            <div class="acm-audio-card">
                @if($post->image)
                    <img src="{{ RvMedia::getImageUrl($post->image, 'thumb') }}" alt="{{ $post->name }}" class="acm-audio-thumb" loading="lazy">
                @else
                    <div class="acm-audio-thumb" style="display:flex;align-items:center;justify-content:center">
                        <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="#94a3b8" stroke-width="1.5"><path d="M9 18V5l12-2v13"/><circle cx="6" cy="18" r="3"/><circle cx="18" cy="16" r="3"/></svg>
                    </div>
                @endif
                <div class="acm-audio-body">
                    @if($category)
                        <span class="acm-audio-category">{{ $category->name }}</span>
                    @endif
                    <a href="{{ $post->url }}" class="acm-audio-title">{{ $post->name }}</a>
                    <div class="acm-audio-meta">{{ $post->created_at->format('M j, Y') }} · {{ $post->views }} {{ __('plays') }}</div>
                    @if($audioUrl)
                        <audio controls class="acm-audio-player" preload="none">
                            <source src="{{ $audioUrl }}" type="audio/mpeg">
                            {{ __('Your browser does not support the audio element.') }}
                        </audio>
                    @else
                        <p style="font-size:.8rem;color:#94a3b8">{{ __('Audio unavailable') }}</p>
                    @endif
                </div>
            </div>
        @empty
            <div class="acm-audio-empty">
                <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M9 18V5l12-2v13"/><circle cx="6" cy="18" r="3"/><circle cx="18" cy="16" r="3"/></svg>
                <h3>{{ __('No audio content yet') }}</h3>
                <p>{{ __('Catholic audio content is being added. Check back soon.') }}</p>
            </div>
        @endforelse
    </div>

    @if($audios->hasPages())
        {!! $audios->withQueryString()->links(Theme::getThemeNamespace('partials.pagination')) !!}
    @endif

</div>
