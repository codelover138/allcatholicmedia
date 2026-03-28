<?php

use Botble\Theme\Theme;

return [

    /*
    |--------------------------------------------------------------------------
    | Inherit from another theme
    |--------------------------------------------------------------------------
    | Inherits all layouts, partials, and views from the echo base theme.
    | Assets (CSS/JS) are not inherited — we load our own below.
    */

    'inherit' => 'echo',

    'events' => [

        'before' => function ($theme): void {
            //
        },

        'beforeRenderTheme' => function (Theme $theme): void {
            // Load Catholic-specific color overrides on top of the echo base CSS
            $theme->asset()->usePath()->add('style-catholic', 'css/style.css');

            // Catholic search + icon helpers (runs after echo's main.js)
            $theme->asset()->container('footer')->usePath()->add('catholic-js', 'js/catholic.js');

            // Body class used for scoping Catholic-specific CSS rules
            $theme->addBodyAttributes(['class' => 'home-catholic']);
        },

        'beforeRenderLayout' => [
            //
        ],
    ],
];
