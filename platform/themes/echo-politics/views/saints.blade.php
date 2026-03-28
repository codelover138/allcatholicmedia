@php
    Theme::set('pageTitle', __('Saints Directory'));
    Theme::layout('full-width');
    SeoHelper::setTitle('Saints Directory | AllCatholicMedia');
    SeoHelper::setDescription('Explore the lives and feast days of Catholic saints. Discover patrons, martyrs, doctors of the Church, and holy men and women throughout history.');
@endphp

@push('header')
<style>
.acm-saints-hero { background: linear-gradient(135deg,#0f172a,#1e293b); padding: 36px 0 28px; margin-bottom: 32px; text-align: center; }
.acm-saints-title { font-size: 1.8rem; font-weight: 700; color: #f8fafc; margin: 0 0 6px; }
.acm-saints-sub { color: #94a3b8; font-size: .95rem; }

.acm-saints-filter { display: flex; gap: 10px; justify-content: center; flex-wrap: wrap; margin-bottom: 28px; }
.acm-saints-chip { padding: 6px 16px; border-radius: 20px; font-size: .83rem; font-weight: 600; border: 1px solid var(--border-color,#e2e8f0); color: var(--color-body,#475569); text-decoration: none; background: var(--bg-card,#fff); transition: all .15s; }
.acm-saints-chip:hover, .acm-saints-chip.active { background: #c9a227; color: #1e293b; border-color: #c9a227; }

.acm-saints-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(260px, 1fr)); gap: 20px; margin-bottom: 36px; }

.acm-saint-card { background: var(--bg-card,#fff); border: 1px solid var(--border-color,#e2e8f0); border-radius: 12px; overflow: hidden; transition: transform .15s, box-shadow .15s; }
.acm-saint-card:hover { transform: translateY(-2px); box-shadow: 0 8px 24px rgba(0,0,0,.1); }
.acm-saint-img { width: 100%; height: 180px; object-fit: cover; display: block; background: linear-gradient(135deg,#1e3a5f,#0f172a); }
.acm-saint-img-placeholder { width: 100%; height: 180px; background: linear-gradient(135deg,#1e3a5f,#0f172a); display: flex; align-items: center; justify-content: center; font-size: 3rem; }
.acm-saint-body { padding: 16px; }
.acm-saint-name { font-size: .97rem; font-weight: 700; color: var(--color-heading-1,#1e293b); text-decoration: none; display: block; margin-bottom: 4px; }
.acm-saint-name:hover { color: #c9a227; }
.acm-saint-feast { font-size: .78rem; color: #c9a227; font-weight: 600; margin-bottom: 8px; }
.acm-saint-desc { font-size: .82rem; color: var(--color-body,#475569); line-height: 1.5; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden; }
.acm-saint-read { display: inline-block; margin-top: 10px; font-size: .8rem; color: #046bd2; font-weight: 600; text-decoration: none; }
.acm-saint-read:hover { text-decoration: underline; }

.acm-saints-empty { text-align: center; padding: 60px 24px; background: var(--bg-card,#fff); border: 1px solid var(--border-color,#e2e8f0); border-radius: 12px; }

html[data-theme='dark'] .acm-saint-card { background: #1a1d2e; border-color: rgba(255,255,255,.08); }
html[data-theme='dark'] .acm-saint-name { color: #f1f5f9; }
html[data-theme='dark'] .acm-saint-desc { color: rgba(255,255,255,.65); }
html[data-theme='dark'] .acm-saints-chip { background: #1a1d2e; border-color: rgba(255,255,255,.1); color: rgba(255,255,255,.7); }
html[data-theme='dark'] .acm-saints-empty { background: #1a1d2e; border-color: rgba(255,255,255,.08); }
</style>
@endpush

<section class="acm-saints-hero">
    <div class="container">
        <h1 class="acm-saints-title">✝ {{ __('Saints Directory') }}</h1>
        <p class="acm-saints-sub">{{ __('The great cloud of witnesses — explore the lives and feast days of Catholic saints.') }}</p>
    </div>
</section>

<div class="container" style="padding-bottom:60px">

    {{-- Letter / All filter --}}
    <div class="acm-saints-filter">
        <a href="{{ route('public.saints') }}" class="acm-saints-chip @if(!$letter) active @endif">{{ __('All Saints') }}</a>
        @foreach(range('A','Z') as $l)
            @if(in_array($l, $availableLetters))
                <a href="{{ route('public.saints', ['letter' => $l]) }}"
                   class="acm-saints-chip @if($letter === $l) active @endif">{{ $l }}</a>
            @endif
        @endforeach
    </div>

    {{-- Search --}}
    <form method="GET" action="{{ route('public.saints') }}" style="max-width:380px;margin:0 auto 28px;display:flex;gap:0;border:1px solid var(--border-color,#e2e8f0);border-radius:8px;overflow:hidden">
        <input type="text" name="q" value="{{ $query }}" placeholder="{{ __('Search for a saint...') }}"
               style="flex:1;border:none;padding:10px 14px;font-size:.9rem;background:var(--bg-card,#fff);color:var(--color-heading-1,#1e293b);outline:none">
        <button type="submit" style="background:#046bd2;color:#fff;border:none;padding:10px 16px;cursor:pointer">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.35-4.35"/></svg>
        </button>
    </form>

    {{-- Saints grid --}}
    <div class="acm-saints-grid">
        @forelse($saints as $saint)
            <div class="acm-saint-card">
                @if($saint->image)
                    <img src="{{ RvMedia::getImageUrl($saint->image, 'medium') }}" alt="{{ $saint->name }}" class="acm-saint-img" loading="lazy">
                @else
                    <div class="acm-saint-img-placeholder">✝</div>
                @endif
                <div class="acm-saint-body">
                    <a href="{{ $saint->url }}" class="acm-saint-name">{{ $saint->name }}</a>
                    @if($saint->created_at)
                        <div class="acm-saint-feast">
                            {{ $saint->categories->where('id','!=',3)->first()?->name ?? __('Saints & Feast Days') }}
                        </div>
                    @endif
                    @if($saint->description)
                        <p class="acm-saint-desc">{{ $saint->description }}</p>
                    @endif
                    <a href="{{ $saint->url }}" class="acm-saint-read">{{ __('Read more') }} →</a>
                </div>
            </div>
        @empty
            <div class="acm-saints-empty" style="grid-column:1/-1">
                <p style="font-size:2rem;margin-bottom:12px">✝</p>
                <h3 style="color:var(--color-heading-1,#1e293b);margin-bottom:8px">{{ __('No saints found') }}</h3>
                <p style="color:var(--color-body,#475569);font-size:.9rem">{{ __('Saints articles are being added. Check back soon or browse all categories.') }}</p>
                <a href="{{ route('public.saints') }}" style="display:inline-block;margin-top:14px;color:#046bd2;font-weight:600;text-decoration:none">{{ __('View all saints') }} →</a>
            </div>
        @endforelse
    </div>

    @if($saints->hasPages())
        {!! $saints->appends(['q' => $query, 'letter' => $letter])->links(Theme::getThemeNamespace('partials.pagination')) !!}
    @endif

</div>
