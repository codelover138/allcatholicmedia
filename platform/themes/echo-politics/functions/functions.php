<?php

use Botble\Shortcode\Compilers\Shortcode as ShortcodeCompiler;
use Botble\Shortcode\Facades\Shortcode;
use Botble\Shortcode\Forms\ShortcodeForm;
use Botble\Base\Forms\FieldOptions\MediaImageFieldOption;
use Botble\Base\Forms\FieldOptions\TextareaFieldOption;
use Botble\Base\Forms\FieldOptions\TextFieldOption;
use Botble\Base\Forms\Fields\ColorField;
use Botble\Base\Forms\Fields\MediaImageField;
use Botble\Base\Forms\Fields\TextareaField;
use Botble\Base\Forms\Fields\TextField;
use Botble\Base\Forms\FormFieldOptions;
use Botble\Theme\Facades\Theme;

app()->booted(function (): void {
    remove_sidebar('header_top_sidebar');

    /*
     * Inject resource hints into <head> for performance.
     * Preconnects to Google Fonts and DNS-prefetch to embed providers.
     */
    add_filter(THEME_FRONT_HEADER, function (?string $html): string {
        $html = (string) $html;
        $html .= '<link rel="preconnect" href="https://fonts.googleapis.com">' . PHP_EOL;
        $html .= '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>' . PHP_EOL;
        $html .= '<link rel="dns-prefetch" href="https://www.youtube.com">' . PHP_EOL;
        $html .= '<link rel="dns-prefetch" href="https://player.vimeo.com">' . PHP_EOL;
        $html .= '<meta name="theme-color" content="#0f172a">' . PHP_EOL;
        return $html;
    }, 20, 1);

    Shortcode::register('watch-learn-pray', __('Watch Learn Pray'), __('Display building faith section'), function (ShortcodeCompiler $shortcode): ?string {
        Theme::asset()->add('watch-learn-pray-css', 'css/watch-learn-pray.css');

        return Theme::partial('shortcodes.watch-learn-pray.index', compact('shortcode'));
    });

    Shortcode::setAdminConfig('watch-learn-pray', function (array $attributes) {
        return ShortcodeForm::createFromArray($attributes)
            ->add('background_image', MediaImageField::class,
                MediaImageFieldOption::make()
                    ->label(__('Background Image'))
                    ->defaultValue(theme_option('watch_learn_pray_background_image'))
                    ->toArray()
            )
            ->add('heading', TextField::class,
                TextFieldOption::make()
                    ->label(__('Heading'))
                    ->placeholder(__('Watch, Learn, Pray.'))
                    ->defaultValue(theme_option('watch_learn_pray_heading', 'Watch, Learn, Pray.'))
                    ->toArray()
            )
            ->add('subtext', TextareaField::class,
                TextareaFieldOption::make()
                    ->label(__('Subtitle Text'))
                    ->defaultValue(theme_option('watch_learn_pray_subtext', 'OnlyCatholic.org is your digital home for everything Catholic. From live Mass and news to videos, podcasts, and prayer resources — we unite faithful voices in one trusted space. Join us in celebrating our one faith, one family, one place'))
                    ->toArray()
            )
            ->add('motto_word_1', TextField::class,
                TextFieldOption::make()
                    ->label(__('Motto Word 1 (e.g. faith)'))
                    ->defaultValue(theme_option('watch_learn_pray_motto_word_1', 'faith'))
                    ->toArray()
            )
            ->add('motto_color_1', ColorField::class,
                FormFieldOptions::make()
                    ->label(__('Motto Word 1 Color'))
                    ->defaultValue(theme_option('watch_learn_pray_motto_color_1', '#0a417a'))
                    ->toArray()
            )
            ->add('motto_word_2', TextField::class,
                TextFieldOption::make()
                    ->label(__('Motto Word 2 (e.g. family)'))
                    ->defaultValue(theme_option('watch_learn_pray_motto_word_2', 'family'))
                    ->toArray()
            )
            ->add('motto_color_2', ColorField::class,
                FormFieldOptions::make()
                    ->label(__('Motto Word 2 Color'))
                    ->defaultValue(theme_option('watch_learn_pray_motto_color_2', '#b22222'))
                    ->toArray()
            )
            ->add('motto_word_3', TextField::class,
                TextFieldOption::make()
                    ->label(__('Motto Word 3 (e.g. place)'))
                    ->defaultValue(theme_option('watch_learn_pray_motto_word_3', 'place'))
                    ->toArray()
            )
            ->add('motto_color_3', ColorField::class,
                FormFieldOptions::make()
                    ->label(__('Motto Word 3 Color'))
                    ->defaultValue(theme_option('watch_learn_pray_motto_color_3', '#c9a227'))
                    ->toArray()
            )
            ->add('motto_prefix', TextField::class,
                TextFieldOption::make()
                    ->label(__('Motto Prefix (e.g. One)'))
                    ->defaultValue(theme_option('watch_learn_pray_motto_prefix', 'One'))
                    ->toArray()
            )
            ->add('signature', TextField::class,
                TextFieldOption::make()
                    ->label(__('Signature / Attribution'))
                    ->defaultValue(theme_option('watch_learn_pray_signature', 'Fr. Morson Livingston'))
                    ->toArray()
            );
    });
});
