@php
    Theme::set('pageTitle', __('Community Feed'));
    Theme::layout('full-width');
    SeoHelper::setTitle('Community Feed | AllCatholicMedia');
    $currentMember = Auth::guard('member')->user();
@endphp

@push('header')
<style>
.acm-feed-wrap { max-width: 680px; margin: 0 auto; padding: 32px 0 60px; }
.acm-page-hero { background: linear-gradient(135deg,#0f172a,#1e293b); padding: 36px 0 28px; margin-bottom: 32px; text-align: center; }
.acm-page-title { font-size: 1.8rem; font-weight: 700; color: #f8fafc; margin: 0 0 6px; }
.acm-page-sub { color: #94a3b8; font-size: .95rem; }

/* Composer */
.acm-composer { background: var(--bg-card,#fff); border: 1px solid var(--border-color,#e2e8f0); border-radius: 10px; padding: 16px; margin-bottom: 20px; }
.acm-composer-row { display: flex; gap: 12px; align-items: flex-start; }
.acm-composer-avatar { width: 40px; height: 40px; border-radius: 50%; object-fit: cover; flex-shrink: 0; background: #e2e8f0; }
.acm-composer-input { flex: 1; border: 1px solid var(--border-color,#e2e8f0); border-radius: 20px; padding: 10px 16px; font-size: .9rem; color: var(--color-heading-1,#1e293b); background: var(--bg-light,#f0f5fa); outline: none; resize: none; min-height: 44px; transition: border-color .2s,min-height .2s; }
.acm-composer-input:focus { border-color: #046bd2; min-height: 80px; background: var(--bg-card,#fff); }
.acm-composer-actions { display: flex; justify-content: flex-end; margin-top: 10px; }
.acm-post-btn { background: #046bd2; color: #fff; border: none; border-radius: 6px; padding: 8px 20px; font-size: .9rem; font-weight: 600; cursor: pointer; transition: background .2s; }
.acm-post-btn:hover { background: #045cb4; }
.acm-post-btn:disabled { opacity: .6; cursor: default; }
.acm-login-prompt { text-align: center; padding: 16px; color: var(--color-body,#475569); font-size: .9rem; }
.acm-login-prompt a { color: #046bd2; font-weight: 600; }

/* Post card */
.acm-post-card { background: var(--bg-card,#fff); border: 1px solid var(--border-color,#e2e8f0); border-radius: 10px; padding: 16px 18px; margin-bottom: 14px; }
.acm-post-header { display: flex; align-items: center; gap: 10px; margin-bottom: 12px; }
.acm-post-avatar { width: 40px; height: 40px; border-radius: 50%; object-fit: cover; }
.acm-post-author { font-weight: 600; color: var(--color-heading-1,#1e293b); font-size: .9rem; }
.acm-post-time { font-size: .78rem; color: #94a3b8; margin-top: 1px; }
.acm-post-content { font-size: .92rem; color: var(--color-body,#475569); line-height: 1.6; white-space: pre-wrap; margin-bottom: 12px; }
.acm-post-actions { display: flex; gap: 16px; border-top: 1px solid var(--border-color,#e2e8f0); padding-top: 10px; }
.acm-like-btn { background: none; border: none; cursor: pointer; display: flex; align-items: center; gap: 6px; font-size: .85rem; color: var(--color-body,#475569); padding: 4px 0; transition: color .15s; }
.acm-like-btn:hover, .acm-like-btn.liked { color: #dc2626; }
.acm-like-btn.liked svg { fill: #dc2626; stroke: #dc2626; }
.acm-delete-btn { background: none; border: none; cursor: pointer; font-size: .8rem; color: #94a3b8; margin-left: auto; padding: 4px; }
.acm-delete-btn:hover { color: #dc2626; }

/* Empty */
.acm-empty { text-align: center; padding: 48px 24px; background: var(--bg-card,#fff); border: 1px solid var(--border-color,#e2e8f0); border-radius: 10px; color: var(--color-body,#475569); }

/* Dark */
html[data-theme='dark'] .acm-composer, html[data-theme='dark'] .acm-post-card, html[data-theme='dark'] .acm-empty { background: #1a1d2e; border-color: rgba(255,255,255,.08); }
html[data-theme='dark'] .acm-composer-input { background: #0f172a; border-color: rgba(255,255,255,.12); color: #f1f5f9; }
html[data-theme='dark'] .acm-post-author { color: #f1f5f9; }
html[data-theme='dark'] .acm-post-content { color: rgba(255,255,255,.75); }
</style>
@endpush

<section class="acm-page-hero">
    <div class="container">
        <h1 class="acm-page-title">{{ __('Community Feed') }}</h1>
        <p class="acm-page-sub">{{ __('Share your faith journey, reflections, and prayers with the community.') }}</p>
    </div>
</section>

<div class="container">
    <div class="acm-feed-wrap">

        {{-- Composer --}}
        <div class="acm-composer" id="acm-composer">
            @if($currentMember)
                <div class="acm-composer-row">
                    <img src="{{ $currentMember->avatar_url }}" alt="{{ $currentMember->name }}" class="acm-composer-avatar">
                    <textarea class="acm-composer-input" id="acm-post-input"
                              placeholder="{{ __('Share a reflection, prayer intention, or Catholic thought...') }}"
                              rows="1"></textarea>
                </div>
                <div class="acm-composer-actions" id="acm-post-actions" style="display:none">
                    <button class="acm-post-btn" id="acm-post-submit">{{ __('Post') }}</button>
                </div>
            @else
                <div class="acm-login-prompt">
                    <a href="{{ route('public.member.login') }}">{{ __('Sign in') }}</a>
                    {{ __('to share with the community.') }}
                </div>
            @endif
        </div>

        {{-- Feed --}}
        <div id="acm-feed-list">
            @forelse($posts as $post)
                @php $isOwner = $currentMember && $currentMember->id === $post->member_id; @endphp
                <div class="acm-post-card" data-post-id="{{ $post->id }}">
                    <div class="acm-post-header">
                        <img src="{{ $post->member->avatar_url }}" alt="{{ $post->member->name }}" class="acm-post-avatar">
                        <div>
                            <div class="acm-post-author">{{ $post->member->name }}</div>
                            <div class="acm-post-time">{{ $post->created_at->diffForHumans() }}</div>
                        </div>
                    </div>
                    <div class="acm-post-content">{{ $post->content }}</div>
                    <div class="acm-post-actions">
                        <button class="acm-like-btn js-like @if($currentMember && $post->isLikedBy($currentMember)) liked @endif"
                                data-post="{{ $post->id }}">
                            <svg width="16" height="16" viewBox="0 0 24 24"
                                 fill="{{ $currentMember && $post->isLikedBy($currentMember) ? '#dc2626' : 'none' }}"
                                 stroke="{{ $currentMember && $post->isLikedBy($currentMember) ? '#dc2626' : 'currentColor' }}"
                                 stroke-width="2">
                                <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/>
                            </svg>
                            <span class="like-count">{{ $post->likes_count }}</span>
                        </button>
                        @if($isOwner)
                            <button class="acm-delete-btn js-delete" data-post="{{ $post->id }}" title="{{ __('Delete') }}">&#x2715;</button>
                        @endif
                    </div>
                </div>
            @empty
                <div class="acm-empty">
                    <p>{{ __('No posts yet. Be the first to share something!') }}</p>
                </div>
            @endforelse
        </div>

        {{-- Pagination --}}
        @if($posts->hasPages())
            <div style="margin-top:24px">
                {!! $posts->links(Theme::getThemeNamespace('partials.pagination')) !!}
            </div>
        @endif

    </div>
</div>

@push('footer')
<script>
(function () {
    'use strict';

    var CSRF = document.querySelector('meta[name="csrf-token"]')?.content || '';

    // ── Composer show/hide actions ──────────────────────────────────────
    var input   = document.getElementById('acm-post-input');
    var actions = document.getElementById('acm-post-actions');
    if (input && actions) {
        input.addEventListener('focus', function () { actions.style.display = 'flex'; });
        input.addEventListener('input', function () {
            this.style.height = 'auto';
            this.style.height = this.scrollHeight + 'px';
        });
    }

    // ── Submit post ─────────────────────────────────────────────────────
    var submitBtn = document.getElementById('acm-post-submit');
    if (submitBtn) {
        submitBtn.addEventListener('click', function () {
            var content = input.value.trim();
            if (!content) return;

            submitBtn.disabled = true;
            submitBtn.textContent = '{{ __("Posting...") }}';

            fetch('{{ route("public.community.feed.store") }}', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': CSRF, 'Accept': 'application/json' },
                body: JSON.stringify({ content: content }),
            })
            .then(function (r) { return r.json(); })
            .then(function (data) {
                if (data.success) {
                    input.value = '';
                    input.style.height = 'auto';
                    actions.style.display = 'none';
                    var list = document.getElementById('acm-feed-list');
                    var p = data.post;
                    var card = document.createElement('div');
                    card.className = 'acm-post-card';
                    card.dataset.postId = p.id;
                    card.innerHTML = '<div class="acm-post-header">' +
                        '<img src="' + p.avatar_url + '" class="acm-post-avatar" alt="">' +
                        '<div><div class="acm-post-author">' + p.member_name + '</div>' +
                        '<div class="acm-post-time">' + p.created_ago + '</div></div>' +
                        '</div><div class="acm-post-content">' + p.content + '</div>' +
                        '<div class="acm-post-actions">' +
                        '<button class="acm-like-btn js-like" data-post="' + p.id + '">' +
                        heartSvg(false) + ' <span class="like-count">0</span></button>' +
                        '<button class="acm-delete-btn js-delete" data-post="' + p.id + '" title="{{ __("Delete") }}">&#x2715;</button>' +
                        '</div>';
                    list.prepend(card);
                    bindCard(card);
                }
            })
            .finally(function () {
                submitBtn.disabled = false;
                submitBtn.textContent = '{{ __("Post") }}';
            });
        });
    }

    function heartSvg(liked) {
        var fill = liked ? '#dc2626' : 'none';
        var stroke = liked ? '#dc2626' : 'currentColor';
        return '<svg width="16" height="16" viewBox="0 0 24 24" fill="' + fill + '" stroke="' + stroke + '" stroke-width="2"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg>';
    }

    function bindCard(card) {
        var likeBtn = card.querySelector('.js-like');
        if (likeBtn) {
            likeBtn.addEventListener('click', function () {
                var postId = likeBtn.dataset.post;
                fetch('{{ url("ajax/feed") }}/' + postId + '/like', {
                    method: 'POST',
                    headers: { 'X-CSRF-TOKEN': CSRF, 'Accept': 'application/json' },
                })
                .then(function (r) { return r.json(); })
                .then(function (d) {
                    if (d.success) {
                        likeBtn.classList.toggle('liked', d.liked);
                        likeBtn.querySelector('.like-count').textContent = d.likes_count;
                        likeBtn.querySelector('svg').outerHTML = heartSvg(d.liked);
                    }
                });
            });
        }

        var delBtn = card.querySelector('.js-delete');
        if (delBtn) {
            delBtn.addEventListener('click', function () {
                if (!confirm('{{ __("Delete this post?") }}')) return;
                var postId = delBtn.dataset.post;
                fetch('{{ url("ajax/feed") }}/' + postId, {
                    method: 'DELETE',
                    headers: { 'X-CSRF-TOKEN': CSRF, 'Accept': 'application/json' },
                })
                .then(function (r) { return r.json(); })
                .then(function (d) { if (d.success) card.remove(); });
            });
        }
    }

    // Bind existing cards
    document.querySelectorAll('.acm-post-card').forEach(bindCard);
}());
</script>
@endpush
