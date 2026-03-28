<?php

use Acm\LiveStream\Http\Controllers\Admin\LiveStreamController;
use Botble\Base\Facades\AdminHelper;
use Illuminate\Support\Facades\Route;

AdminHelper::registerRoutes(function (): void {
    Route::prefix('live-streams')
        ->name('live-streams.')
        ->group(function (): void {
            Route::resource('/', LiveStreamController::class)
                ->parameters(['' => 'liveStream']);
        });
});
