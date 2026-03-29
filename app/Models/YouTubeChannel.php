<?php

namespace App\Models;

use Botble\Base\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\HasMany;

class YouTubeChannel extends BaseModel
{
    protected $table = 'youtube_channels';

    protected $fillable = [
        'name',
        'slug',
        'youtube_channel_id',
        'youtube_handle',
        'uploads_playlist_id',
        'thumbnail',
        'banner',
        'description',
        'custom_url',
        'is_active',
        'sort_order',
        'last_synced_at',
    ];

    protected $casts = [
        'is_active' => 'bool',
        'last_synced_at' => 'datetime',
    ];

    public function videos(): HasMany
    {
        return $this->hasMany(YouTubeChannelVideo::class, 'youtube_channel_id');
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
