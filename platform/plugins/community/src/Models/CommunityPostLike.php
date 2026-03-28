<?php

namespace Acm\Community\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CommunityPostLike extends Model
{
    protected $table = 'community_post_likes';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = ['post_id', 'member_id'];

    protected $casts = ['created_at' => 'datetime'];

    public function post(): BelongsTo
    {
        return $this->belongsTo(CommunityPost::class, 'post_id');
    }
}
