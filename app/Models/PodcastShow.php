<?php

namespace App\Models;

use Botble\Base\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PodcastShow extends BaseModel
{
    protected $table = 'podcast_shows';

    protected $fillable = [
        'name',
        'slug',
        'thumbnail',
        'banner',
        'description',
        'category',
        'website_url',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'is_active' => 'bool',
    ];

    public function episodes(): HasMany
    {
        return $this->hasMany(PodcastEpisode::class, 'podcast_show_id');
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
