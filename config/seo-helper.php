<?php

return [
    /*
     * Title format: "Page Title — AllCatholicMedia"
     * The separator is used between the page title and the site name.
     */
    'title' => [
        'separator' => '—',
        'first'     => true,
        'max'       => 120,
    ],

    'description' => [
        'max' => 386,
    ],

    'misc' => [
        'canonical' => true,
        'robots'    => false,
        'default'   => [
            'author'    => '',
            'publisher' => '',
        ],
    ],

    'webmasters' => [
        'google'    => '',
        'bing'      => '',
        'alexa'     => '',
        'pinterest' => '',
        'yandex'    => '',
    ],

    /*
     * Open Graph: default type is "website"; article pages override to "article"
     * via SeoHelper::openGraph()->setType('article') in the blog plugin.
     */
    'open-graph' => [
        'prefix'     => 'og:',
        'type'       => 'website',
        'properties' => [],
    ],

    /*
     * Twitter cards: summary_large_image shows a big image preview in tweets.
     */
    'twitter' => [
        'prefix' => 'twitter:',
        'card'   => 'summary_large_image',
        'metas'  => [],
    ],

    'analytics' => [
        'google' => '', // UA-XXXXXXXX-X (set via admin settings)
    ],

    'supported' => [
        'Botble\Page\Models\Page',
    ],
];
