@php
    Theme::set('pageTitle', $category->name);
    Theme::layout('full-width');
    SeoHelper::setTitle($category->name . ' — Forums | AllCatholicMedia');
@endphp

@push('header')
<style>
.acm-page-hero{background:linear-gradient(135deg,#0f172a,#1e293b);padding:32px 0 24px;margin-bottom:28px}
.acm-breadcrumb{font-size:.82rem;color:#94a3b8;margin-bottom:8px}
.acm-breadcrumb a{color:#60a5fa;text-decoration:none}
.acm-page-title{font-size:1.6rem;font-weight:700;color:#f8fafc;margin:0}
.acm-topic-table{background:var(--bg-card,#fff);border:1px solid var(--border-color,#e2e8f0);border-radius:10px;overflow:hidden}
.acm-topic-row{padding:14px 20px;border-bottom:1px solid var(--border-color,#e2e8f0);display:flex;align-items:center;gap:12px}
.acm-topic-row:last-child{border-bottom:none}
.acm-topic-icon{width:38px;height:38px;border-radius:8px;background:var(--bg-light,#f0f5fa);display:flex;align-items:center;justify-content:center;flex-shrink:0}
.acm-topic-title{font-size:.92rem;font-weight:600;color:var(--color-heading-1,#1e293b);text-decoration:none;display:block}
.acm-topic-title:hover{color:#046bd2}
.acm-topic-meta{font-size:.75rem;color:#94a3b8;margin-top:2px}
.acm-topic-stats{font-size:.78rem;color:#94a3b8;text-align:right;white-space:nowrap}
.acm-new-topic-btn{background:#046bd2;color:#fff;border:none;border-radius:6px;padding:9px 20px;font-size:.9rem;font-weight:600;cursor:pointer;margin-bottom:16px;display:inline-block;text-decoration:none}
.acm-new-topic-btn:hover{background:#045cb4;color:#fff}
.acm-new-topic-form{background:var(--bg-card,#fff);border:1px solid var(--border-color,#e2e8f0);border-radius:10px;padding:20px;margin-bottom:20px;display:none}
.acm-new-topic-form.open{display:block}
.acm-field{margin-bottom:14px}
.acm-field label{display:block;font-size:.85rem;font-weight:600;color:var(--color-heading-1,#1e293b);margin-bottom:5px}
.acm-field input,.acm-field textarea{width:100%;border:1px solid var(--border-color,#e2e8f0);border-radius:6px;padding:9px 12px;font-size:.9rem;background:var(--bg-card,#fff);color:var(--color-heading-1,#1e293b)}
.acm-field textarea{resize:vertical;min-height:100px}
.acm-submit-btn{background:#046bd2;color:#fff;border:none;border-radius:6px;padding:9px 22px;font-size:.9rem;font-weight:600;cursor:pointer}
html[data-theme='dark'] .acm-topic-table,.acm-new-topic-form{background:#1a1d2e;border-color:rgba(255,255,255,.08)}
html[data-theme='dark'] .acm-topic-row{border-color:rgba(255,255,255,.06)}
html[data-theme='dark'] .acm-topic-title{color:#f1f5f9}
html[data-theme='dark'] .acm-topic-icon{background:#0f172a}
html[data-theme='dark'] .acm-field input,.acm-field textarea{background:#0f172a;border-color:rgba(255,255,255,.12);color:#f1f5f9}
</style>
@endpush

<section class="acm-page-hero">
    <div class="container">
        <div class="acm-breadcrumb">
            <a href="{{ route('public.community.forums') }}">{{ __('Forums') }}</a> / {{ $category->name }}
        </div>
        <h1 class="acm-page-title">{{ $category->name }}</h1>
        @if($category->description)
            <p style="color:#94a3b8;font-size:.88rem;margin:6px 0 0">{{ $category->description }}</p>
        @endif
    </div>
</section>

<div class="container" style="padding-bottom:60px">

    @if($member)
        <button class="acm-new-topic-btn" id="acm-new-topic-toggle">+ {{ __('New Topic') }}</button>

        <div class="acm-new-topic-form" id="acm-new-topic-form">
            <h3 style="font-size:1rem;font-weight:700;margin:0 0 14px;color:var(--color-heading-1,#1e293b)">{{ __('Start a New Topic') }}</h3>
            <form method="POST" action="{{ route('public.community.forum.topic.store', $category->slug) }}">
                @csrf
                <div class="acm-field">
                    <label>{{ __('Title') }} *</label>
                    <input type="text" name="title" maxlength="255" required placeholder="{{ __('Topic title...') }}">
                </div>
                <div class="acm-field">
                    <label>{{ __('Content') }} *</label>
                    <textarea name="content" required placeholder="{{ __('Write your post here...') }}"></textarea>
                </div>
                @if($errors->any())
                    <div style="color:#dc2626;font-size:.85rem;margin-bottom:10px">{{ $errors->first() }}</div>
                @endif
                <button type="submit" class="acm-submit-btn">{{ __('Post Topic') }}</button>
            </form>
        </div>
    @else
        <p style="margin-bottom:16px;font-size:.9rem;color:var(--color-body,#475569)">
            <a href="{{ route('public.member.login') }}" style="color:#046bd2;font-weight:600">{{ __('Sign in') }}</a>
            {{ __('to start a topic.') }}
        </p>
    @endif

    <div class="acm-topic-table">
        @forelse($topics as $topic)
        <div class="acm-topic-row">
            <div class="acm-topic-icon">
                @if($topic->is_pinned)
                    <span style="font-size:.9rem">📌</span>
                @elseif($topic->is_locked)
                    <span style="font-size:.9rem">🔒</span>
                @else
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#94a3b8" stroke-width="2"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
                @endif
            </div>
            <div style="flex:1;min-width:0">
                <a href="{{ route('public.community.forum.topic', $topic->slug) }}" class="acm-topic-title">
                    {{ $topic->title }}
                </a>
                <div class="acm-topic-meta">
                    {{ $topic->member->name ?? __('Unknown') }} · {{ $topic->created_at->diffForHumans() }}
                    @if($topic->last_reply_at && $topic->replies_count > 0)
                        · {{ __('Last reply') }} {{ $topic->last_reply_at->diffForHumans() }}
                    @endif
                </div>
            </div>
            <div class="acm-topic-stats">
                {{ $topic->replies_count }} {{ __('replies') }}<br>
                {{ $topic->views }} {{ __('views') }}
            </div>
        </div>
        @empty
        <div style="padding:40px;text-align:center;color:var(--color-body,#475569)">
            {{ __('No topics yet. Start the first discussion!') }}
        </div>
        @endforelse
    </div>

    @if($topics->hasPages())
        <div style="margin-top:20px">
            {!! $topics->links(Theme::getThemeNamespace('partials.pagination')) !!}
        </div>
    @endif
</div>

@push('footer')
<script>
document.getElementById('acm-new-topic-toggle')?.addEventListener('click', function () {
    var form = document.getElementById('acm-new-topic-form');
    form.classList.toggle('open');
    this.textContent = form.classList.contains('open') ? '{{ __("Cancel") }}' : '+ {{ __("New Topic") }}';
});
</script>
@endpush
