<?php

namespace Acm\Community\Providers;

use Botble\Base\Facades\DashboardMenu;
use Botble\Base\Supports\ServiceProvider;
use Botble\Base\Traits\LoadAndPublishDataTrait;

class CommunityServiceProvider extends ServiceProvider
{
    use LoadAndPublishDataTrait;

    public function boot(): void
    {
        $this
            ->setNamespace('plugins/community')
            ->loadRoutes()
            ->loadAndPublishConfigurations('permissions')
            ->loadAndPublishTranslations()
            ->loadMigrations();

        DashboardMenu::beforeRetrieving(function (): void {
            DashboardMenu::make()
                ->registerItem([
                    'id'        => 'cms-plugins-community',
                    'priority'  => 8,
                    'parent_id' => null,
                    'name'      => 'plugins/community::community.name',
                    'icon'      => 'ti ti-users',
                    'url'       => '#',
                ])
                ->registerItem([
                    'id'          => 'cms-plugins-community-forums',
                    'priority'    => 1,
                    'parent_id'   => 'cms-plugins-community',
                    'name'        => 'plugins/community::community.forum_categories',
                    'url'         => route('community-forums.index'),
                    'permissions' => ['community-forums.index'],
                ]);
        });
    }
}
