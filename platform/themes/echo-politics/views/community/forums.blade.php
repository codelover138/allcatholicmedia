@php
    Theme::set('pageTitle', __('Catholic Forums'));
    Theme::layout('full-width');
    SeoHelper::setTitle('Catholic Forums | AllCatholicMedia');
@endphp

@push('header')
<style>
.acm-page-hero{background:linear-gradient(135deg,#0f172a,#1e293b);padding:36px 0 28px;margin-bottom:32px;text-align:center}
.acm-page-title{font-size:1.8rem;font-weight:700;color:#f8fafc;margin:0 0 6px}
.acm-page-sub{color:#94a3b8;font-size:.95rem}
.acm-forum-section{background:var(--bg-card,#fff);border:1px solid var(--border-color,#e2e8f0);border-radius:10px;overflow:hidden;margin-bottom:16px}
.acm-forum-cat-header{padding:14px 20px;background:var(--bg-light,#f0f5fa);border-bottom:1px solid var(--border-color,#e2e8f0);display:flex;align-items:center;gap:10px}
.acm-forum-cat-icon{font-size:1.2rem}
.acm-forum-cat-title{font-size:1rem;font-weight:700;color:var(--color-heading-1,#1e293b)}
.acm-forum-cat-title a{color:inherit;text-decoration:none}
.acm-forum-cat-title a:hover{color:#046bd2}
.acm-forum-cat-desc{font-size:.82rem;color:var(--color-body,#475569);margin-top:2px}
.acm-forum-cat-count{margin-left:auto;font-size:.82rem;color:#94a3b8;white-space:nowrap}
.acm-topic-row{padding:12px 20px;border-bottom:1px solid var(--border-color,#e2e8f0);display:flex;align-items:center;gap:12px}
.acm-topic-row:last-child{border-bottom:none}
.acm-topic-icon{width:36px;height:36px;border-radius:50%;background:var(--bg-light,#f0f5fa);display:flex;align-items:center;justify-content:center;flex-shrink:0}
.acm-topic-info{flex:1;min-width:0}
.acm-topic-title{font-size:.9rem;font-weight:600;color:var(--color-heading-1,#1e293b);text-decoration:none;display:block;white-space:nowrap;overflow:hidden;text-overflow:ellipsis}
.acm-topic-title:hover{color:#046bd2}
.acm-topic-meta{font-size:.75rem;color:#94a3b8;margin-top:2px}
.acm-topic-stats{font-size:.78rem;color:#94a3b8;white-space:nowrap;text-align:right}

.acm-recent-section{margin-top:32px}
.acm-section-heading{font-size:1.05rem;font-weight:700;color:var(--color-heading-1,#1e293b);margin:0 0 14px;padding-bottom:8px;border-bottom:2px solid var(--border-color,#e2e8f0)}

html[data-theme='dark'] .acm-forum-section{background:#1a1d2e;border-color:rgba(255,255,255,.08)}
html[data-theme='dark'] .acm-forum-cat-header{background:#0f172a;border-color:rgba(255,255,255,.06)}
html[data-theme='dark'] .acm-forum-cat-title{color:#f1f5f9}
html[data-theme='dark'] .acm-topic-row{border-color:rgba(255,255,255,.06)}
html[data-theme='dark'] .acm-topic-icon{background:#0f172a}
html[data-theme='dark'] .acm-topic-title{color:#f1f5f9}
html[data-theme='dark'] .acm-section-heading{color:#f1f5f9;border-color:rgba(255,255,255,.08)}
</style>
@endpush

<section class="acm-page-hero">
    <div class="container">
        <h1 class="acm-page-title">{{ __('Catholic Forums') }}</h1>
        <p class="acm-page-sub">{{ __('Discuss faith, theology, liturgy, and Catholic life with the community.') }}</p>
    </div>
</section>

<div class="container" style="padding-bottom:60px">
    <div class="row g-4">
        <div class="col-lg-8">

            @foreach($categories as $category)
            <div class="acm-forum-section">
                <div class="acm-forum-cat-header">
                    <span class="acm-forum-cat-icon">💬</span>
                    <div>
                        <div class="acm-forum-cat-title">
                            <a href="{{ route('public.community.forum.category', $category->slug) }}">{{ $category->name }}</a>
                        </div>
                        @if($category->description)
                            <div class="acm-forum-cat-desc">{{ $category->description }}</div>
                        @endif
                    </div>
                    <div class="acm-forum-cat-count">{{ $category->topics_count }} {{ __('topics') }}</div>
                </div>
                @foreach($category->topics()->published()->latest('last_reply_at')->limit(3)->get() as $topic)
                <div class="acm-topic-row">
                    <div class="acm-topic-icon">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#94a3b8" stroke-width="2"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
                    </div>
                    <div class="acm-topic-info">
                        <a href="{{ route('public.community.forum.topic', $topic->slug) }}" class="acm-topic-title">
                            @if($topic->is_pinned) 📌 @endif {{ $topic->title }}
                        </a>
                        <div class="acm-topic-meta">
                            {{ $topic->member->name ?? __('Unknown') }} · {{ $topic->created_at->diffForHumans() }}
                        </div>
                    </div>
                    <div class="acm-topic-stats">
                        {{ $topic->replies_count }} {{ __('replies') }}<br>
                        {{ $topic->views }} {{ __('views') }}
                    </div>
                </div>
                @endforeach
            </div>
            @endforeach

        </div>

        <div class="col-lg-4">
            {{-- Recent Topics --}}
            <div style="background:var(--bg-card,#fff);border:1px solid var(--border-color,#e2e8f0);border-radius:10px;padding:18px">
                <h3 class="acm-section-heading">{{ __('Recent Topics') }}</h3>
                @foreach($recentTopics as $topic)
                    <div style="margin-bottom:12px;padding-bottom:12px;border-bottom:1px solid var(--border-color,#e2e8f0)">
                        <a href="{{ route('public.community.forum.topic', $topic->slug) }}"
                           style="font-size:.88rem;font-weight:600;color:var(--color-heading-1,#1e293b);text-decoration:none;display:block">
                            {{ Str::limit($topic->title, 60) }}
                        </a>
                        <div style="font-size:.75rem;color:#94a3b8;margin-top:3px">
                            {{ $topic->category->name }} · {{ $topic->created_at->diffForHumans() }}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
