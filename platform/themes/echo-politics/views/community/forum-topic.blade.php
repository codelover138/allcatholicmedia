@php
    Theme::set('pageTitle', $topic->title);
    Theme::layout('full-width');
    SeoHelper::setTitle($topic->title . ' | AllCatholicMedia Forums');
@endphp

@push('header')
<style>
.acm-page-hero{background:linear-gradient(135deg,#0f172a,#1e293b);padding:28px 0 20px;margin-bottom:24px}
.acm-breadcrumb{font-size:.82rem;color:#94a3b8;margin-bottom:8px}
.acm-breadcrumb a{color:#60a5fa;text-decoration:none}
.acm-page-title{font-size:1.4rem;font-weight:700;color:#f8fafc;margin:0}
.acm-post-block{background:var(--bg-card,#fff);border:1px solid var(--border-color,#e2e8f0);border-radius:10px;padding:20px;margin-bottom:14px;display:flex;gap:14px}
.acm-author-aside{width:80px;flex-shrink:0;text-align:center}
.acm-author-aside img{width:56px;height:56px;border-radius:50%;object-fit:cover;margin-bottom:6px}
.acm-author-aside .author-name{font-size:.75rem;font-weight:600;color:var(--color-heading-1,#1e293b);word-break:break-word}
.acm-post-body{flex:1;min-width:0}
.acm-post-time{font-size:.75rem;color:#94a3b8;margin-bottom:10px}
.acm-post-content{font-size:.92rem;color:var(--color-body,#475569);line-height:1.7;white-space:pre-wrap}
.acm-reply-form{background:var(--bg-card,#fff);border:1px solid var(--border-color,#e2e8f0);border-radius:10px;padding:20px;margin-top:24px}
.acm-reply-form h3{font-size:1rem;font-weight:700;color:var(--color-heading-1,#1e293b);margin:0 0 14px}
.acm-field textarea{width:100%;border:1px solid var(--border-color,#e2e8f0);border-radius:6px;padding:10px 12px;font-size:.9rem;background:var(--bg-card,#fff);color:var(--color-heading-1,#1e293b);resize:vertical;min-height:100px}
.acm-submit-btn{background:#046bd2;color:#fff;border:none;border-radius:6px;padding:9px 22px;font-size:.9rem;font-weight:600;cursor:pointer;margin-top:10px}
.acm-locked-notice{background:#fef2f2;border:1px solid #fecaca;border-radius:8px;padding:12px 16px;color:#dc2626;font-size:.88rem;margin-top:16px}

html[data-theme='dark'] .acm-post-block,.acm-reply-form{background:#1a1d2e;border-color:rgba(255,255,255,.08)}
html[data-theme='dark'] .acm-author-aside .author-name,.acm-reply-form h3{color:#f1f5f9}
html[data-theme='dark'] .acm-field textarea{background:#0f172a;border-color:rgba(255,255,255,.12);color:#f1f5f9}
</style>
@endpush

<section class="acm-page-hero">
    <div class="container">
        <div class="acm-breadcrumb">
            <a href="{{ route('public.community.forums') }}">{{ __('Forums') }}</a> /
            <a href="{{ route('public.community.forum.category', $topic->category->slug) }}">{{ $topic->category->name }}</a>
        </div>
        <h1 class="acm-page-title">{{ $topic->title }}</h1>
    </div>
</section>

<div class="container" style="max-width:760px;padding-bottom:60px">

    @if(session('success'))
        <div style="background:#dcfce7;border:1px solid #86efac;border-radius:6px;padding:10px 14px;font-size:.88rem;color:#166534;margin-bottom:14px">
            {{ session('success') }}
        </div>
    @endif

    {{-- Original Post --}}
    <div class="acm-post-block">
        <div class="acm-author-aside">
            <img src="{{ $topic->member->avatar_url }}" alt="{{ $topic->member->name }}">
            <div class="author-name">{{ $topic->member->name }}</div>
        </div>
        <div class="acm-post-body">
            <div class="acm-post-time">{{ $topic->created_at->format('M j, Y g:i A') }}</div>
            <div class="acm-post-content">{{ $topic->content }}</div>
        </div>
    </div>

    {{-- Replies --}}
    @foreach($replies as $reply)
    <div class="acm-post-block">
        <div class="acm-author-aside">
            <img src="{{ $reply->member->avatar_url }}" alt="{{ $reply->member->name }}">
            <div class="author-name">{{ $reply->member->name }}</div>
        </div>
        <div class="acm-post-body">
            <div class="acm-post-time">{{ $reply->created_at->format('M j, Y g:i A') }}</div>
            <div class="acm-post-content">{{ $reply->content }}</div>
        </div>
    </div>
    @endforeach

    @if($replies->hasPages())
        <div style="margin:16px 0">
            {!! $replies->links(Theme::getThemeNamespace('partials.pagination')) !!}
        </div>
    @endif

    {{-- Reply Form --}}
    @if($topic->is_locked)
        <div class="acm-locked-notice">🔒 {{ __('This topic is locked. No new replies can be posted.') }}</div>
    @elseif($member)
        <div class="acm-reply-form">
            <h3>{{ __('Post a Reply') }}</h3>
            <form method="POST" action="{{ route('public.community.forum.reply.store', $topic->slug) }}">
                @csrf
                <div class="acm-field">
                    <textarea name="content" required placeholder="{{ __('Write your reply...') }}"></textarea>
                </div>
                @if($errors->any())
                    <div style="color:#dc2626;font-size:.85rem;margin-bottom:8px">{{ $errors->first() }}</div>
                @endif
                <button type="submit" class="acm-submit-btn">{{ __('Post Reply') }}</button>
            </form>
        </div>
    @else
        <div class="acm-reply-form">
            <p style="text-align:center;color:var(--color-body,#475569);margin:0">
                <a href="{{ route('public.member.login') }}" style="color:#046bd2;font-weight:600">{{ __('Sign in') }}</a>
                {{ __('to post a reply.') }}
            </p>
        </div>
    @endif

</div>
