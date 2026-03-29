<?php

namespace App\Models;

use Botble\Base\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class YouTubeChannelVideo extends BaseModel
{
    protected $table = 'youtube_channel_videos';

    protected $fillable = [
        'youtube_channel_id',
        'youtube_video_id',
        'title',
        'slug',
        'description',
        'thumbnail',
        'published_at',
        'video_url',
        'embed_url',
        'duration',
        'view_count',
        'is_live',
        'position',
        'raw_payload',
    ];

    protected $casts = [
        'published_at' => 'datetime',
        'view_count' => 'int',
        'is_live' => 'bool',
        'position' => 'int',
        'raw_payload' => 'array',
    ];

    public function channel(): BelongsTo
    {
        return $this->belongsTo(YouTubeChannel::class, 'youtube_channel_id');
    }
}
