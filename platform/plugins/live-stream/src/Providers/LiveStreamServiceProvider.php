<?php

namespace Acm\LiveStream\Providers;

use Botble\Base\Facades\DashboardMenu;
use Botble\Base\Supports\ServiceProvider;
use Botble\Base\Traits\LoadAndPublishDataTrait;
use Illuminate\Foundation\Application;

class LiveStreamServiceProvider extends ServiceProvider
{
    use LoadAndPublishDataTrait;

    public function boot(): void
    {
        $this
            ->setNamespace('plugins/live-stream')
            ->loadRoutes()
            ->loadAndPublishConfigurations('permissions')
            ->loadAndPublishViews()
            ->loadAndPublishTranslations()
            ->loadMigrations();

        DashboardMenu::beforeRetrieving(function (): void {
            DashboardMenu::make()
                ->registerItem([
                    'id'          => 'cms-plugins-live-stream',
                    'priority'    => 9,
                    'parent_id'   => null,
                    'name'        => 'plugins/live-stream::live-streams.name',
                    'url'         => route('live-streams.index'),
                    'icon'        => 'ti ti-video',
                    'permissions' => ['live-streams.index'],
                ]);
        });
    }
}
