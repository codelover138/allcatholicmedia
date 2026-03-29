<?php

namespace App\Providers;

use Botble\Base\Facades\DashboardMenu;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->loadTranslationsFrom(lang_path('vendor/plugins/watch-manager'), 'plugins/watch-manager');

        DashboardMenu::default()->registerItem([
            'id' => 'cms-app-watch-manager',
            'priority' => 11,
            'parent_id' => null,
            'name' => fn () => trans('plugins/watch-manager::watch.admin.menu'),
            'icon' => 'ti ti-device-tv',
            'url' => fn () => route('admin.youtube-channels.index'),
            'permissions' => false,
        ]);

        DashboardMenu::default()->registerItem([
            'id' => 'cms-app-podcast-shows',
            'priority' => 12,
            'parent_id' => null,
            'name' => 'Podcast Shows',
            'icon' => 'ti ti-microphone',
            'url' => fn () => route('admin.podcast-shows.index'),
            'permissions' => false,
        ]);

        DashboardMenu::default()->clearCachesForCurrentUser();
    }
}
