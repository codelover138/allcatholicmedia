<?php

use Acm\Community\Http\Controllers\Admin\ForumCategoryController;
use Acm\Community\Http\Controllers\Front\FeedController;
use Acm\Community\Http\Controllers\Front\ForumController;
use Acm\Community\Http\Controllers\Front\GroupController;
use Botble\Base\Facades\AdminHelper;
use Botble\Theme\Facades\Theme;
use Illuminate\Support\Facades\Route;

// ── Admin ─────────────────────────────────────────────────────────────────────
AdminHelper::registerRoutes(function (): void {
    Route::prefix('community/forums')
        ->name('community-forums.')
        ->group(function (): void {
            Route::resource('/', ForumCategoryController::class)
                ->parameters(['' => 'forumCategory']);
        });
});

// ── Public front-end ──────────────────────────────────────────────────────────
Theme::registerRoutes(function (): void {
    Route::group(['middleware' => ['web', 'core']], function (): void {

        // Activity Feed
        Route::get('feed', [FeedController::class, 'index'])->name('public.community.feed');
        Route::post('ajax/feed', [FeedController::class, 'store'])->name('public.community.feed.store');
        Route::post('ajax/feed/{post}/like', [FeedController::class, 'like'])->name('public.community.feed.like');
        Route::delete('ajax/feed/{post}', [FeedController::class, 'destroy'])->name('public.community.feed.destroy');

        // Groups
        Route::get('groups', [GroupController::class, 'index'])->name('public.community.groups');
        Route::post('ajax/groups', [GroupController::class, 'store'])->name('public.community.groups.store');
        Route::get('groups/{slug}', [GroupController::class, 'show'])->name('public.community.groups.show');
        Route::post('ajax/groups/{slug}/join', [GroupController::class, 'join'])->name('public.community.groups.join');
        Route::post('ajax/groups/{slug}/leave', [GroupController::class, 'leave'])->name('public.community.groups.leave');

        // Forums
        Route::get('forums', [ForumController::class, 'index'])->name('public.community.forums');
        Route::get('forums/category/{slug}', [ForumController::class, 'showCategory'])->name('public.community.forum.category');
        Route::post('forums/category/{slug}/topic', [ForumController::class, 'storeTopic'])->name('public.community.forum.topic.store');
        Route::get('forums/topic/{slug}', [ForumController::class, 'showTopic'])->name('public.community.forum.topic');
        Route::post('forums/topic/{slug}/reply', [ForumController::class, 'storeReply'])->name('public.community.forum.reply.store');
    });
});
