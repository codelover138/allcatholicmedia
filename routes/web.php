<?php

use App\Http\Controllers\Admin\PodcastShowController;
use App\Http\Controllers\Admin\YouTubeChannelController;
use Botble\Base\Facades\AdminHelper;
use Illuminate\Support\Facades\Route;

AdminHelper::registerRoutes(function (): void {
    Route::prefix('youtube-channels')->name('admin.youtube-channels.')->group(function (): void {
        Route::get('/', [YouTubeChannelController::class, 'index'])->name('index');
        Route::post('hero-image', [YouTubeChannelController::class, 'updateHero'])->name('hero-image');
        Route::post('sync-all', [YouTubeChannelController::class, 'syncAll'])->name('sync-all');
        Route::get('create', [YouTubeChannelController::class, 'create'])->name('create');
        Route::post('/', [YouTubeChannelController::class, 'store'])->name('store');
        Route::get('{youtubeChannel}/edit', [YouTubeChannelController::class, 'edit'])->name('edit');
        Route::put('{youtubeChannel}', [YouTubeChannelController::class, 'update'])->name('update');
        Route::delete('{youtubeChannel}', [YouTubeChannelController::class, 'destroy'])->name('destroy');
        Route::post('{youtubeChannel}/sync', [YouTubeChannelController::class, 'sync'])->name('sync');
    });
});

AdminHelper::registerRoutes(function (): void {
    Route::prefix('podcast-shows')->name('admin.podcast-shows.')->group(function (): void {
        Route::get('/', [PodcastShowController::class, 'index'])->name('index');
        Route::post('hero-image', [PodcastShowController::class, 'updateHero'])->name('hero-image');
        Route::get('create', [PodcastShowController::class, 'create'])->name('create');
        Route::post('/', [PodcastShowController::class, 'store'])->name('store');
        Route::get('{podcastShow}/edit', [PodcastShowController::class, 'edit'])->name('edit');
        Route::put('{podcastShow}', [PodcastShowController::class, 'update'])->name('update');
        Route::delete('{podcastShow}', [PodcastShowController::class, 'destroy'])->name('destroy');

        Route::get('{podcastShow}/episodes/create', [PodcastShowController::class, 'createEpisode'])->name('episodes.create');
        Route::post('{podcastShow}/episodes', [PodcastShowController::class, 'storeEpisode'])->name('episodes.store');
        Route::get('{podcastShow}/episodes/{episode}/edit', [PodcastShowController::class, 'editEpisode'])->name('episodes.edit');
        Route::put('{podcastShow}/episodes/{episode}', [PodcastShowController::class, 'updateEpisode'])->name('episodes.update');
        Route::delete('{podcastShow}/episodes/{episode}', [PodcastShowController::class, 'destroyEpisode'])->name('episodes.destroy');
    });
});
