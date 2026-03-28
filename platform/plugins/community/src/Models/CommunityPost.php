<?php

namespace Acm\Community\Models;

use Botble\Base\Models\BaseModel;
use Botble\Member\Models\Member;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CommunityPost extends BaseModel
{
    protected $table = 'community_posts';

    protected $fillable = [
        'member_id', 'type', 'content',
        'media_url', 'link_url', 'link_title', 'link_image',
        'likes_count', 'comments_count', 'status',
    ];

    protected $casts = [
        'likes_count'    => 'integer',
        'comments_count' => 'integer',
    ];

    public function member(): BelongsTo
    {
        return $this->belongsTo(Member::class);
    }

    public function likes(): HasMany
    {
        return $this->hasMany(CommunityPostLike::class, 'post_id');
    }

    public function scopePublished(Builder $query): Builder
    {
        return $query->where('status', 'published');
    }

    public function isLikedBy(?Member $member): bool
    {
        if (! $member) {
            return false;
        }

        return $this->likes()->where('member_id', $member->id)->exists();
    }
}
