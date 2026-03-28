<?php

namespace Acm\Community\Models;

use Botble\Base\Models\BaseModel;
use Botble\Member\Models\Member;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class CommunityGroup extends BaseModel
{
    protected $table = 'community_groups';

    protected $fillable = [
        'name', 'slug', 'description', 'cover_image',
        'privacy', 'creator_id', 'members_count', 'status',
    ];

    protected $casts = [
        'members_count' => 'integer',
    ];

    public function creator(): BelongsTo
    {
        return $this->belongsTo(Member::class, 'creator_id');
    }

    public function members(): BelongsToMany
    {
        return $this->belongsToMany(Member::class, 'community_group_members', 'group_id', 'member_id')
            ->withPivot(['role', 'joined_at']);
    }

    public function scopePublished(Builder $query): Builder
    {
        return $query->where('status', 'published');
    }

    public function isMember(Member $member): bool
    {
        return $this->members()->where('members.id', $member->id)->exists();
    }

    public function isAdmin(Member $member): bool
    {
        return $this->members()
            ->wherePivot('role', 'admin')
            ->where('members.id', $member->id)
            ->exists();
    }
}
