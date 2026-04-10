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
use Botble\Base\Forms\Fields\SelectField;
use Botble\Base\Forms\FieldOptions\SelectFieldOption;
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

    /*
     * Inject breadcrumb hero styles — must run late (priority 99) so it
     * outputs after all theme CSS files and wins over their !important rules.
     */
    add_filter(THEME_FRONT_HEADER, function (?string $html): string {
        $html = (string) $html;
        $html .= '<style>
/* ── Inner-page breadcrumb hero — Saints Directory style ── */
.echo-breadcrumb-area{
    position:relative!important;
    background:linear-gradient(158deg,#060e1d 0%,#0d1f3c 42%,#0b1a35 72%,#050c18 100%)!important;
    background-image:none!important;
    padding:48px 0 40px!important;
    text-align:center!important;
    overflow:hidden!important;
}
.echo-breadcrumb-area::before{
    content:""!important;
    position:absolute!important;
    top:-100px;left:50%;transform:translateX(-50%)!important;
    width:800px;height:500px!important;
    background:radial-gradient(ellipse at 50% 30%,rgba(201,162,39,.20) 0%,rgba(4,107,210,.06) 48%,transparent 68%)!important;
    pointer-events:none!important;
    z-index:0!important;
}
.echo-breadcrumb-area::after{
    content:""!important;
    position:absolute!important;
    bottom:0;left:0;right:0;height:1px!important;
    background:linear-gradient(90deg,transparent 5%,rgba(201,162,39,.45) 50%,transparent 95%)!important;
}
.echo-breadcrumb-area .breadcrumb-inner{position:relative!important;z-index:2!important;}
.echo-breadcrumb-area .breadcrumb-inner .meta{
    display:flex!important;align-items:center!important;
    justify-content:center!important;gap:8px!important;margin-bottom:14px!important;
}
.echo-breadcrumb-area .breadcrumb-inner .meta .next,
.echo-breadcrumb-area .breadcrumb-inner a.next{
    font-family:"Inter",sans-serif!important;
    font-size:.72rem!important;font-weight:700!important;
    letter-spacing:.18em!important;text-transform:uppercase!important;
    color:rgba(201,162,39,.85)!important;text-decoration:none!important;
}
.echo-breadcrumb-area .breadcrumb-inner a.next:hover{color:#e5c76b!important;}
.echo-breadcrumb-area .breadcrumb-inner .meta span{color:rgba(201,162,39,.40)!important;font-size:.70rem!important;}
.echo-breadcrumb-area .breadcrumb-inner .title{
    font-family:"Playfair Display",Georgia,serif!important;
    font-size:clamp(2.2rem,5vw,3.8rem)!important;
    font-weight:700!important;line-height:1.10!important;
    color:#f8fafc!important;letter-spacing:-.02em!important;
    margin:0!important;text-shadow:0 2px 24px rgba(0,0,0,.30)!important;
}
@media(max-width:768px){
    .echo-breadcrumb-area{padding:30px 0 26px!important;}
    .echo-breadcrumb-area .breadcrumb-inner .title{font-size:2rem!important;}
}
</style>' . PHP_EOL;
        return $html;
    }, 99, 1);

    // ── Hero Intro Banner ──────────────────────────────────────────────────────
    Shortcode::register('hero-intro', __('Hero Intro Banner'), __('Full-width hero banner with background image, play icon and title'), function (ShortcodeCompiler $shortcode): ?string {
        return Theme::partial('shortcodes.hero-intro.index', compact('shortcode'));
    });

    Shortcode::setAdminConfig('hero-intro', function (array $attributes) {
        $form = ShortcodeForm::createFromArray($attributes)
            ->add('background_image', MediaImageField::class,
                MediaImageFieldOption::make()
                    ->label(__('Background Image'))
                    ->defaultValue(theme_option('hero_intro_background_image'))
                    ->toArray()
            )
            ->add('title', TextField::class,
                TextFieldOption::make()
                    ->label(__('Title Text'))
                    ->placeholder(__('Watch, Learn, Pray.'))
                    ->defaultValue(theme_option('hero_intro_title', 'Watch, Learn, Pray.'))
                    ->toArray()
            )
            ->add('link', TextField::class,
                TextFieldOption::make()
                    ->label(__('Play Button Link (optional)'))
                    ->placeholder(__('https://...'))
                    ->defaultValue(theme_option('hero_intro_link', ''))
                    ->toArray()
            );

        for ($i = 1; $i <= 4; $i++) {
            $form
                ->add("card_{$i}_image", MediaImageField::class,
                    MediaImageFieldOption::make()
                        ->label(__("Card {$i}: Image"))
                        ->defaultValue(theme_option("hero_intro_card_{$i}_image"))
                        ->toArray()
                )
                ->add("card_{$i}_text", TextField::class,
                    TextFieldOption::make()
                        ->label(__("Card {$i}: Label Text"))
                        ->placeholder(__('Enter label...'))
                        ->defaultValue(theme_option("hero_intro_card_{$i}_text", ''))
                        ->toArray()
                )
                ->add("card_{$i}_link", TextField::class,
                    TextFieldOption::make()
                        ->label(__("Card {$i}: Link (optional)"))
                        ->placeholder(__('https://...'))
                        ->defaultValue(theme_option("hero_intro_card_{$i}_link", ''))
                        ->toArray()
                );
        }

        return $form;
    });

    // ── Watch Listen Read ─────────────────────────────────────────────────────
    Shortcode::register('watch-listen-read', __('Watch Listen Read'), __('Three feature cards (Watch / Listen / Read) over a background image'), function (ShortcodeCompiler $shortcode): ?string {
        return Theme::partial('shortcodes.watch-listen-read.index', compact('shortcode'));
    });

    Shortcode::setAdminConfig('watch-listen-read', function (array $attributes) {
        $icons = ['watch' => 'Watch (Play)', 'listen' => 'Listen (Headphones)', 'read' => 'Read (Book)', 'pray' => 'Pray (Cross)'];

        $form = ShortcodeForm::createFromArray($attributes)
            ->add('background_image', MediaImageField::class,
                MediaImageFieldOption::make()
                    ->label(__('Background Image'))
                    ->defaultValue(theme_option('wlr_background_image'))
                    ->toArray()
            );

        $defaults = [
            1 => ['title' => 'Watch',  'icon' => 'watch',  'color' => '#1e3a8a', 'desc' => 'Experience your faith come alive. Watch powerful reflections, Mass celebrations, and inspiring stories that bring you closer to God—anytime, anywhere.'],
            2 => ['title' => 'Listen', 'icon' => 'listen', 'color' => '#7f1d1d', 'desc' => 'Let the Word of God speak to you. Tune into prayers, sermons, and audio reflections that uplift your spirit—even in the busiest moments of your day.'],
            3 => ['title' => 'Read',   'icon' => 'read',   'color' => '#c9a227', 'desc' => "Dive deeper into God's Word. Explore scripture, devotionals, and faith-filled articles designed to guide, inspire, and strengthen your journey."],
        ];

        for ($i = 1; $i <= 3; $i++) {
            $d = $defaults[$i];
            $form
                ->add("card_{$i}_title", TextField::class,
                    TextFieldOption::make()->label(__("Card {$i}: Title"))->defaultValue(theme_option("wlr_card_{$i}_title", $d['title']))->toArray()
                )
                ->add("card_{$i}_desc", TextareaField::class,
                    TextareaFieldOption::make()->label(__("Card {$i}: Description"))->defaultValue(theme_option("wlr_card_{$i}_desc", $d['desc']))->toArray()
                )
                ->add("card_{$i}_color", ColorField::class,
                    FormFieldOptions::make()->label(__("Card {$i}: Background Color"))->defaultValue(theme_option("wlr_card_{$i}_color", $d['color']))->toArray()
                )
                ->add("card_{$i}_icon", SelectField::class,
                    SelectFieldOption::make()->label(__("Card {$i}: Icon"))->choices($icons)->defaultValue(theme_option("wlr_card_{$i}_icon", $d['icon']))->toArray()
                )
                ->add("card_{$i}_link", TextField::class,
                    TextFieldOption::make()->label(__("Card {$i}: Link (optional)"))->placeholder('https://...')->defaultValue(theme_option("wlr_card_{$i}_link", ''))->toArray()
                );
        }

        return $form;
    });

    // ── Watch Learn Pray ───────────────────────────────────────────────────────
    Shortcode::register('watch-learn-pray', __('Watch Learn Pray'), __('Display building faith section'), function (ShortcodeCompiler $shortcode): ?string {
        Theme::asset()->add('watch-learn-pray-css', 'css/watch-learn-pray.css');
        add_filter(THEME_FRONT_HEADER, function (?string $html): string {
            $html = (string) $html;
            if (strpos($html, 'Great+Vibes') === false) {
                $html .= '<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Inter:wght@400;500;600;700&display=swap">' . PHP_EOL;
            }
            return $html;
        }, 25, 1);

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
