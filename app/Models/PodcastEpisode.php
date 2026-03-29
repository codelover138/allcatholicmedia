<?php

namespace App\Models;

use Botble\Base\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PodcastEpisode extends BaseModel
{
    protected $table = 'podcast_episodes';

    protected $fillable = [
        'podcast_show_id',
        'title',
        'slug',
        'description',
        'thumbnail',
        'audio_url',
        'embed_url',
        'embed_type',
        'duration',
        'episode_number',
        'is_featured',
        'published_at',
    ];

    protected $casts = [
        'is_featured' => 'bool',
        'published_at' => 'datetime',
        'episode_number' => 'int',
    ];

    public function show(): BelongsTo
    {
        return $this->belongsTo(PodcastShow::class, 'podcast_show_id');
    }
}
