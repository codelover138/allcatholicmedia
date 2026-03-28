<?php

namespace Acm\LiveStream\Models;

use Botble\Base\Models\BaseModel;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;

class LiveStream extends BaseModel
{
    protected $table = 'live_streams';

    protected $fillable = [
        'title',
        'description',
        'embed_url',
        'source_name',
        'location',
        'is_live',
        'scheduled_at',
        'thumbnail',
        'order_column',
        'status',
    ];

    protected $casts = [
        'is_live'      => 'bool',
        'scheduled_at' => 'datetime',
    ];

    public function scopePublished(Builder $query): Builder
    {
        return $query->where('status', 'published');
    }

    public function scopeLive(Builder $query): Builder
    {
        return $query->published()->where('is_live', true);
    }

    public function scopeUpcoming(Builder $query): Builder
    {
        return $query->published()
            ->where('is_live', false)
            ->whereNotNull('scheduled_at')
            ->where('scheduled_at', '>', Carbon::now())
            ->orderBy('scheduled_at');
    }

    protected function embedCode(): Attribute
    {
        return Attribute::get(function () {
            $url = $this->embed_url;

            // YouTube watch URL → embed
            if (preg_match('/youtube\.com\/watch\?v=([a-zA-Z0-9_-]+)/', $url, $m)) {
                return 'https://www.youtube.com/embed/' . $m[1] . '?autoplay=1&rel=0';
            }

            // YouTube short URL
            if (preg_match('/youtu\.be\/([a-zA-Z0-9_-]+)/', $url, $m)) {
                return 'https://www.youtube.com/embed/' . $m[1] . '?autoplay=1&rel=0';
            }

            // YouTube live URL
            if (preg_match('/youtube\.com\/live\/([a-zA-Z0-9_-]+)/', $url, $m)) {
                return 'https://www.youtube.com/embed/' . $m[1] . '?autoplay=1&rel=0';
            }

            // Vimeo
            if (preg_match('/vimeo\.com\/(\d+)/', $url, $m)) {
                return 'https://player.vimeo.com/video/' . $m[1] . '?autoplay=1';
            }

            // Already an embed URL or iframe — return as-is
            return $url;
        })->shouldCache();
    }

    protected function youtubeThumbnail(): Attribute
    {
        return Attribute::get(function () {
            $url = $this->embed_url;

            if (preg_match('/(?:youtube\.com\/(?:watch\?v=|live\/)|youtu\.be\/)([a-zA-Z0-9_-]+)/', $url, $m)) {
                return 'https://img.youtube.com/vi/' . $m[1] . '/hqdefault.jpg';
            }

            return null;
        })->shouldCache();
    }
}
