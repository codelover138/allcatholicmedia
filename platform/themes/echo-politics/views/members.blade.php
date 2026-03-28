@php
    Theme::set('pageTitle', __('Community Members'));
    Theme::layout('full-width');
    SeoHelper::setTitle('Community Members | AllCatholicMedia');
    SeoHelper::setDescription('Connect with Catholics from around the world on AllCatholicMedia. Browse member profiles and join the conversation.');
@endphp

@push('header')
<style>
.acm-page-hero { background: linear-gradient(135deg,#0f172a,#1e293b); padding: 36px 0 28px; margin-bottom: 32px; text-align: center; }
.acm-page-title { font-size: 1.8rem; font-weight: 700; color: #f8fafc; margin: 0 0 6px; }
.acm-page-sub { color: #94a3b8; font-size: .95rem; }

.acm-members-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(220px, 1fr)); gap: 20px; margin-bottom: 32px; }

.acm-member-card { background: var(--bg-card,#fff); border: 1px solid var(--border-color,#e2e8f0); border-radius: 12px; padding: 24px 20px; text-align: center; transition: transform .15s, box-shadow .15s; }
.acm-member-card:hover { transform: translateY(-2px); box-shadow: 0 8px 24px rgba(0,0,0,.08); }
.acm-member-avatar { width: 72px; height: 72px; border-radius: 50%; object-fit: cover; margin: 0 auto 12px; display: block; border: 3px solid var(--border-color,#e2e8f0); }
.acm-member-name { font-size: .95rem; font-weight: 700; color: var(--color-heading-1,#1e293b); margin-bottom: 4px; }
.acm-member-name a { color: inherit; text-decoration: none; }
.acm-member-name a:hover { color: #046bd2; }
.acm-member-since { font-size: .75rem; color: #94a3b8; margin-bottom: 8px; }
.acm-member-bio { font-size: .8rem; color: var(--color-body,#475569); line-height: 1.5; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden; }

.acm-stats-bar { display: flex; gap: 24px; justify-content: center; margin-bottom: 28px; flex-wrap: wrap; }
.acm-stat { text-align: center; }
.acm-stat-num { font-size: 1.5rem; font-weight: 700; color: #046bd2; display: block; }
.acm-stat-label { font-size: .8rem; color: #94a3b8; }

html[data-theme='dark'] .acm-member-card { background: #1a1d2e; border-color: rgba(255,255,255,.08); }
html[data-theme='dark'] .acm-member-name { color: #f1f5f9; }
html[data-theme='dark'] .acm-member-bio { color: rgba(255,255,255,.65); }
</style>
@endpush

<section class="acm-page-hero">
    <div class="container">
        <h1 class="acm-page-title">{{ __('Community Members') }}</h1>
        <p class="acm-page-sub">{{ __('Catholics from around the world sharing faith, prayer, and community.') }}</p>
    </div>
</section>

<div class="container" style="padding-bottom:60px">

    {{-- Stats bar --}}
    <div class="acm-stats-bar">
        <div class="acm-stat">
            <span class="acm-stat-num">{{ $totalMembers }}</span>
            <span class="acm-stat-label">{{ __('Members') }}</span>
        </div>
        <div class="acm-stat">
            <span class="acm-stat-num">{{ $totalGroups }}</span>
            <span class="acm-stat-label">{{ __('Groups') }}</span>
        </div>
        <div class="acm-stat">
            <span class="acm-stat-num">{{ $totalTopics }}</span>
            <span class="acm-stat-label">{{ __('Forum Topics') }}</span>
        </div>
    </div>

    {{-- Search --}}
    <form method="GET" action="{{ route('public.members') }}" style="max-width:400px;margin:0 auto 28px;display:flex;gap:0;border:1px solid var(--border-color,#e2e8f0);border-radius:8px;overflow:hidden">
        <input type="text" name="q" value="{{ $query }}" placeholder="{{ __('Search members...') }}"
               style="flex:1;border:none;padding:10px 14px;font-size:.9rem;background:var(--bg-card,#fff);color:var(--color-heading-1,#1e293b);outline:none">
        <button type="submit" style="background:#046bd2;color:#fff;border:none;padding:10px 16px;cursor:pointer">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.35-4.35"/></svg>
        </button>
    </form>

    {{-- Grid --}}
    @if($members->isNotEmpty())
        <div class="acm-members-grid">
            @foreach($members as $member)
                <div class="acm-member-card">
                    <img src="{{ $member->avatar_url }}" alt="{{ $member->name }}" class="acm-member-avatar" loading="lazy">
                    <div class="acm-member-name">
                        @php $memberSlug = \Botble\Slug\Models\Slug::where('reference_type', \Botble\Member\Models\Member::class)->where('reference_id', $member->id)->value('key'); @endphp
                        @if($memberSlug)
                            <a href="{{ route('author.show', $memberSlug) }}">{{ $member->name }}</a>
                        @else
                            {{ $member->name }}
                        @endif
                    </div>
                    <div class="acm-member-since">{{ __('Member since') }} {{ $member->created_at->format('M Y') }}</div>
                    @if($member->description)
                        <p class="acm-member-bio">{{ strip_tags($member->description) }}</p>
                    @endif
                </div>
            @endforeach
        </div>

        @if($members->hasPages())
            {!! $members->appends(['q' => $query])->links(Theme::getThemeNamespace('partials.pagination')) !!}
        @endif
    @else
        <div style="text-align:center;padding:48px;color:var(--color-body,#475569)">
            <p>{{ __('No members found matching your search.') }}</p>
        </div>
    @endif

</div>
