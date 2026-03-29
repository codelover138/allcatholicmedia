<?php

use App\YouTubeChannelService;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

Artisan::command('youtube:sync-channels {--seed-config}', function (YouTubeChannelService $service) {
    if ($this->option('seed-config')) {
        $seeded = $service->syncConfiguredChannels();
        $this->info("Seeded/updated {$seeded} configured channels.");
    }

    $synced = $service->syncAllActiveChannels();
    $this->info("Synced {$synced} YouTube channels.");
})->purpose('Sync configured YouTube channels and their latest videos');

Schedule::command('youtube:sync-channels')->hourly();
