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
