<?php

namespace Acm\Community\Models;

use Botble\Base\Models\BaseModel;
use Botble\Member\Models\Member;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ForumTopic extends BaseModel
{
    protected $table = 'forum_topics';

    protected $fillable = [
        'category_id', 'member_id', 'title', 'slug', 'content',
        'views', 'replies_count', 'is_pinned', 'is_locked',
        'status', 'last_reply_at',
    ];

    protected $casts = [
        'views'         => 'integer',
        'replies_count' => 'integer',
        'is_pinned'     => 'bool',
        'is_locked'     => 'bool',
        'last_reply_at' => 'datetime',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(ForumCategory::class, 'category_id');
    }

    public function member(): BelongsTo
    {
        return $this->belongsTo(Member::class, 'member_id');
    }

    public function replies(): HasMany
    {
        return $this->hasMany(ForumReply::class, 'topic_id');
    }

    public function scopePublished(Builder $query): Builder
    {
        return $query->where('status', 'published');
    }
}
