<?php

namespace App\Providers;

use Botble\Base\Facades\DashboardMenu;
use Botble\Theme\Events\RenderingThemeOptionSettings;
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
        app('events')->listen(RenderingThemeOptionSettings::class, function (): void {
            theme_option()
                ->setField([
                    'id' => 'watch_learn_pray_background_image',
                    'section_id' => 'opt-text-subsection-general',
                    'type' => 'mediaImage',
                    'label' => __('Watch Learn Pray: Background Image'),
                    'attributes' => [
                        'name' => 'watch_learn_pray_background_image',
                        'value' => null,
                    ],
                ])
                ->setField([
                    'id' => 'watch_learn_pray_heading',
                    'section_id' => 'opt-text-subsection-general',
                    'type' => 'text',
                    'label' => __('Watch Learn Pray: Heading'),
                    'attributes' => [
                        'name' => 'watch_learn_pray_heading',
                        'value' => 'Watch, Learn, Pray.',
                        'options' => [
                            'class' => 'form-control',
                        ],
                    ],
                ])
                ->setField([
                    'id' => 'watch_learn_pray_subtext',
                    'section_id' => 'opt-text-subsection-general',
                    'type' => 'textarea',
                    'label' => __('Watch Learn Pray: Subtitle Text'),
                    'attributes' => [
                        'name' => 'watch_learn_pray_subtext',
                        'value' => 'OnlyCatholic.org is your digital home for everything Catholic. From live Mass and news to videos, podcasts, and prayer resources — we unite faithful voices in one trusted space. Join us in celebrating our one faith, one family, one place',
                        'options' => [
                            'class' => 'form-control',
                            'rows' => 4,
                        ],
                    ],
                ])
                ->setField([
                    'id' => 'watch_learn_pray_motto_prefix',
                    'section_id' => 'opt-text-subsection-general',
                    'type' => 'text',
                    'label' => __('Watch Learn Pray: Motto Prefix'),
                    'attributes' => [
                        'name' => 'watch_learn_pray_motto_prefix',
                        'value' => 'One',
                        'options' => [
                            'class' => 'form-control',
                        ],
                    ],
                ])
                ->setField([
                    'id' => 'watch_learn_pray_motto_word_1',
                    'section_id' => 'opt-text-subsection-general',
                    'type' => 'text',
                    'label' => __('Watch Learn Pray: Motto Word 1'),
                    'attributes' => [
                        'name' => 'watch_learn_pray_motto_word_1',
                        'value' => 'faith',
                        'options' => [
                            'class' => 'form-control',
                        ],
                    ],
                ])
                ->setField([
                    'id' => 'watch_learn_pray_motto_color_1',
                    'section_id' => 'opt-text-subsection-general',
                    'type' => 'customColor',
                    'label' => __('Watch Learn Pray: Motto Word 1 Color'),
                    'attributes' => [
                        'name' => 'watch_learn_pray_motto_color_1',
                        'value' => '#0a417a',
                    ],
                ])
                ->setField([
                    'id' => 'watch_learn_pray_motto_word_2',
                    'section_id' => 'opt-text-subsection-general',
                    'type' => 'text',
                    'label' => __('Watch Learn Pray: Motto Word 2'),
                    'attributes' => [
                        'name' => 'watch_learn_pray_motto_word_2',
                        'value' => 'family',
                        'options' => [
                            'class' => 'form-control',
                        ],
                    ],
                ])
                ->setField([
                    'id' => 'watch_learn_pray_motto_color_2',
                    'section_id' => 'opt-text-subsection-general',
                    'type' => 'customColor',
                    'label' => __('Watch Learn Pray: Motto Word 2 Color'),
                    'attributes' => [
                        'name' => 'watch_learn_pray_motto_color_2',
                        'value' => '#b22222',
                    ],
                ])
                ->setField([
                    'id' => 'watch_learn_pray_motto_word_3',
                    'section_id' => 'opt-text-subsection-general',
                    'type' => 'text',
                    'label' => __('Watch Learn Pray: Motto Word 3'),
                    'attributes' => [
                        'name' => 'watch_learn_pray_motto_word_3',
                        'value' => 'place',
                        'options' => [
                            'class' => 'form-control',
                        ],
                    ],
                ])
                ->setField([
                    'id' => 'watch_learn_pray_motto_color_3',
                    'section_id' => 'opt-text-subsection-general',
                    'type' => 'customColor',
                    'label' => __('Watch Learn Pray: Motto Word 3 Color'),
                    'attributes' => [
                        'name' => 'watch_learn_pray_motto_color_3',
                        'value' => '#c9a227',
                    ],
                ])
                ->setField([
                    'id' => 'watch_learn_pray_signature',
                    'section_id' => 'opt-text-subsection-general',
                    'type' => 'text',
                    'label' => __('Watch Learn Pray: Signature / Attribution'),
                    'attributes' => [
                        'name' => 'watch_learn_pray_signature',
                        'value' => 'Fr. Morson Livingston',
                        'options' => [
                            'class' => 'form-control',
                        ],
                    ],
                ]);
        });

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
