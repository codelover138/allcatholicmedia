<?php

return [
    'api_key' => env('YOUTUBE_API_KEY'),

    'sync' => [
        'videos_per_channel' => (int) env('YOUTUBE_SYNC_LIMIT', 24),
    ],

    'channels' => [
        [
            'name' => 'CatholicTV',
            'slug' => 'catholictv',
            'youtube_channel_id' => '',
            'youtube_handle' => '@CatholicTV',
            'description' => 'Daily Catholic Mass, Rosary, prayers, and faith programming from CatholicTV.',
            'is_active' => true,
            'sort_order' => 1,
        ],
        [
            'name' => 'EWTN',
            'slug' => 'ewtn',
            'youtube_channel_id' => '',
            'youtube_handle' => '@EWTN',
            'description' => 'Global Catholic Television Network — news, daily Mass, Rosary, and devotional programming.',
            'is_active' => true,
            'sort_order' => 2,
        ],
        [
            'name' => 'Catholic Answers',
            'slug' => 'catholic-answers',
            'youtube_channel_id' => 'UCvwbLBTkuIwqNm9kHUqWRnw',
            'youtube_handle' => '',
            'description' => 'Defending and explaining the Catholic Faith through apologetics, talks, and Q&A.',
            'is_active' => true,
            'sort_order' => 3,
        ],
        [
            'name' => 'Bishop Robert Barron',
            'slug' => 'bishop-barron',
            'youtube_channel_id' => 'UCcMjLgeWNwqL2LBGS-iPb1A',
            'youtube_handle' => '',
            'description' => 'Bishop Robert Barron\'s ministry — homilies, book studies, and Catholic evangelization.',
            'is_active' => true,
            'sort_order' => 4,
        ],
        [
            'name' => 'Ascension Presents',
            'slug' => 'ascension-presents',
            'youtube_channel_id' => 'UCVdGX3N-WIJ5nUvklBTNhAw',
            'youtube_handle' => '',
            'description' => 'Catholic teaching, Bible studies, and faith formation videos from Ascension.',
            'is_active' => true,
            'sort_order' => 5,
        ],
        [
            'name' => 'The Coming Home Network',
            'slug' => 'coming-home-network',
            'youtube_channel_id' => 'UCIDebJFlV5aIsFs2jzxASrQ',
            'youtube_handle' => '',
            'description' => 'Conversion stories, faith journeys, and Catholic testimony.',
            'is_active' => true,
            'sort_order' => 6,
        ],
    ],
];
