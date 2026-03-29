<?php

namespace App;

use App\Models\YouTubeChannel;
use App\Models\YouTubeChannelVideo;
use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use RuntimeException;

class YouTubeChannelService
{
    private const API_BASE = 'https://www.googleapis.com/youtube/v3';

    public function syncConfiguredChannels(): int
    {
        $count = 0;

        foreach (config('youtube.channels', []) as $definition) {
            if (! is_array($definition) || empty($definition['name'])) {
                continue;
            }

            YouTubeChannel::query()->updateOrCreate(
                ['slug' => $definition['slug'] ?: Str::slug($definition['name'])],
                [
                    'name' => $definition['name'],
                    'youtube_channel_id' => $definition['youtube_channel_id'] ?: null,
                    'youtube_handle' => $definition['youtube_handle'] ?: null,
                    'description' => $definition['description'] ?: null,
                    'is_active' => (bool) ($definition['is_active'] ?? true),
                    'sort_order' => (int) ($definition['sort_order'] ?? 0),
                ]
            );

            $count++;
        }

        $this->flushCaches();

        return $count;
    }

    public function syncAllActiveChannels(): int
    {
        $synced = 0;

        foreach (YouTubeChannel::query()->active()->orderBy('sort_order')->get() as $channel) {
            $this->syncChannel($channel);
            $synced++;
        }

        $this->flushCaches();

        return $synced;
    }

    public function syncChannel(YouTubeChannel $channel): void
    {
        $apiKey = config('youtube.api_key');

        if (! $apiKey) {
            throw new RuntimeException('Missing YOUTUBE_API_KEY configuration.');
        }

        $meta = $this->resolveChannelMeta($channel, $apiKey);

        $channel->fill([
            'youtube_channel_id' => $meta['channel_id'],
            'uploads_playlist_id' => $meta['uploads_playlist_id'],
            'thumbnail' => $meta['thumbnail'],
            'banner' => $meta['banner'],
            'description' => $meta['description'] ?: $channel->description,
            'custom_url' => $meta['custom_url'],
            'last_synced_at' => now(),
        ])->save();

        $this->syncVideosForChannel($channel, $apiKey);
    }

    private function resolveChannelMeta(YouTubeChannel $channel, string $apiKey): array
    {
        if ($channel->youtube_channel_id) {
            $response = $this->get('channels', [
                'part' => 'snippet,contentDetails,brandingSettings',
                'id' => $channel->youtube_channel_id,
                'maxResults' => 1,
                'key' => $apiKey,
            ]);
        } elseif ($channel->youtube_handle) {
            $response = $this->get('channels', [
                'part' => 'snippet,contentDetails,brandingSettings',
                'forHandle' => ltrim($channel->youtube_handle, '@'),
                'maxResults' => 1,
                'key' => $apiKey,
            ]);
        } else {
            throw new RuntimeException("Channel [{$channel->name}] is missing youtube_channel_id or youtube_handle.");
        }

        $item = $response['items'][0] ?? null;

        if (! $item) {
            throw new RuntimeException("Unable to resolve YouTube channel metadata for [{$channel->name}].");
        }

        return [
            'channel_id' => data_get($item, 'id'),
            'uploads_playlist_id' => data_get($item, 'contentDetails.relatedPlaylists.uploads'),
            'thumbnail' => data_get($item, 'snippet.thumbnails.high.url')
                ?: data_get($item, 'snippet.thumbnails.medium.url')
                ?: data_get($item, 'snippet.thumbnails.default.url'),
            'banner' => data_get($item, 'brandingSettings.image.bannerExternalUrl'),
            'description' => data_get($item, 'snippet.description'),
            'custom_url' => data_get($item, 'snippet.customUrl'),
        ];
    }

    private function syncVideosForChannel(YouTubeChannel $channel, string $apiKey): void
    {
        $playlistId = $channel->uploads_playlist_id;

        if (! $playlistId) {
            throw new RuntimeException("Uploads playlist not found for channel [{$channel->name}].");
        }

        $limit = max(1, (int) config('youtube.sync.videos_per_channel', 24));
        $fetched = 0;
        $pageToken = null;
        $syncedVideoIds = [];

        do {
            $response = $this->get('playlistItems', [
                'part' => 'snippet,contentDetails',
                'playlistId' => $playlistId,
                'maxResults' => min(50, $limit - $fetched),
                'pageToken' => $pageToken,
                'key' => $apiKey,
            ]);

            $items = collect($response['items'] ?? []);
            $videoIds = $items->pluck('contentDetails.videoId')->filter()->values()->all();
            $videosById = $this->fetchVideoDetails($videoIds, $apiKey);

            foreach ($items as $item) {
                $videoId = data_get($item, 'contentDetails.videoId');

                if (! $videoId || ! isset($videosById[$videoId])) {
                    continue;
                }

                $video = $videosById[$videoId];
                $syncedVideoIds[] = $videoId;

                YouTubeChannelVideo::query()->updateOrCreate(
                    ['youtube_video_id' => $videoId],
                    [
                        'youtube_channel_id' => $channel->id,
                        'title' => data_get($video, 'snippet.title'),
                        'slug' => Str::slug(data_get($video, 'snippet.title', $videoId)),
                        'description' => data_get($video, 'snippet.description'),
                        'thumbnail' => data_get($video, 'snippet.thumbnails.maxres.url')
                            ?: data_get($video, 'snippet.thumbnails.high.url')
                            ?: data_get($video, 'snippet.thumbnails.medium.url')
                            ?: data_get($video, 'snippet.thumbnails.default.url'),
                        'published_at' => data_get($video, 'snippet.publishedAt')
                            ? Carbon::parse(data_get($video, 'snippet.publishedAt'))
                            : null,
                        'video_url' => 'https://www.youtube.com/watch?v=' . $videoId,
                        'embed_url' => 'https://www.youtube.com/embed/' . $videoId,
                        'duration' => data_get($video, 'contentDetails.duration'),
                        'view_count' => (int) data_get($video, 'statistics.viewCount', 0),
                        'is_live' => data_get($video, 'snippet.liveBroadcastContent') === 'live',
                        'position' => (int) data_get($item, 'snippet.position', 0),
                        'raw_payload' => $video,
                    ]
                );

                $fetched++;
            }

            $pageToken = $response['nextPageToken'] ?? null;
        } while ($pageToken && $fetched < $limit);

        if ($syncedVideoIds !== []) {
            YouTubeChannelVideo::query()
                ->where('youtube_channel_id', $channel->id)
                ->whereNotIn('youtube_video_id', array_unique($syncedVideoIds))
                ->delete();
        }
    }

    private function fetchVideoDetails(array $videoIds, string $apiKey): array
    {
        if ($videoIds === []) {
            return [];
        }

        $response = $this->get('videos', [
            'part' => 'snippet,contentDetails,statistics,liveStreamingDetails',
            'id' => implode(',', $videoIds),
            'maxResults' => count($videoIds),
            'key' => $apiKey,
        ]);

        return collect($response['items'] ?? [])->keyBy('id')->all();
    }

    private function get(string $endpoint, array $query): array
    {
        try {
            return Http::withoutVerifying()
                ->acceptJson()
                ->timeout(20)
                ->get(self::API_BASE . '/' . $endpoint, array_filter($query, fn ($value) => $value !== null && $value !== ''))
                ->throw()
                ->json();
        } catch (RequestException $exception) {
            $message = $exception->response?->json('error.message') ?: $exception->getMessage();

            throw new RuntimeException($message, previous: $exception);
        }
    }

    private function flushCaches(): void
    {
        Cache::forget('watch.channels');
    }
}
