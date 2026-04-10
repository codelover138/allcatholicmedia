@php
    $bgImage = $shortcode->background_image
        ? RvMedia::getImageUrl($shortcode->background_image)
        : (theme_option('wlr_background_image')
            ? RvMedia::getImageUrl(theme_option('wlr_background_image'))
            : null);

    $cards = [
        1 => [
            'title' => $shortcode->card_1_title ?: theme_option('wlr_card_1_title', 'Watch'),
            'desc'  => $shortcode->card_1_desc  ?: theme_option('wlr_card_1_desc', 'Experience your faith come alive. Watch powerful reflections, Mass celebrations, and inspiring stories that bring you closer to God—anytime, anywhere.'),
            'color' => $shortcode->card_1_color ?: theme_option('wlr_card_1_color', '#1e3a8a'),
            'icon'  => $shortcode->card_1_icon  ?: theme_option('wlr_card_1_icon', 'watch'),
            'link'  => $shortcode->card_1_link  ?: theme_option('wlr_card_1_link', ''),
        ],
        2 => [
            'title' => $shortcode->card_2_title ?: theme_option('wlr_card_2_title', 'Listen'),
            'desc'  => $shortcode->card_2_desc  ?: theme_option('wlr_card_2_desc', 'Let the Word of God speak to you. Tune into prayers, sermons, and audio reflections that uplift your spirit—even in the busiest moments of your day.'),
            'color' => $shortcode->card_2_color ?: theme_option('wlr_card_2_color', '#7f1d1d'),
            'icon'  => $shortcode->card_2_icon  ?: theme_option('wlr_card_2_icon', 'listen'),
            'link'  => $shortcode->card_2_link  ?: theme_option('wlr_card_2_link', ''),
        ],
        3 => [
            'title' => $shortcode->card_3_title ?: theme_option('wlr_card_3_title', 'Read'),
            'desc'  => $shortcode->card_3_desc  ?: theme_option('wlr_card_3_desc', 'Dive deeper into God\'s Word. Explore scripture, devotionals, and faith-filled articles designed to guide, inspire, and strengthen your journey.'),
            'color' => $shortcode->card_3_color ?: theme_option('wlr_card_3_color', '#c9a227'),
            'icon'  => $shortcode->card_3_icon  ?: theme_option('wlr_card_3_icon', 'read'),
            'link'  => $shortcode->card_3_link  ?: theme_option('wlr_card_3_link', ''),
        ],
    ];

    $icons = [
        'watch' => '<svg width="38" height="38" viewBox="0 0 38 38" fill="none" xmlns="http://www.w3.org/2000/svg"><rect x="1.5" y="1.5" width="35" height="35" rx="7.5" stroke="white" stroke-width="2.2"/><path d="M14 12L27 19L14 26V12Z" fill="white" stroke="white" stroke-width="1.5" stroke-linejoin="round"/></svg>',
        'listen' => '<svg width="40" height="38" viewBox="0 0 40 38" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M20 3C11.716 3 5 9.716 5 18v7a4 4 0 0 0 4 4h2a2 2 0 0 0 2-2v-8a2 2 0 0 0-2-2H8.1A12.06 12.06 0 0 1 20 6a12.06 12.06 0 0 1 11.9 11H29a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h2a4 4 0 0 0 4-4v-7C35 9.716 28.284 3 20 3Z" fill="white"/><path d="M6 20h2M32 20h2" stroke="white" stroke-width="2" stroke-linecap="round"/></svg>',
        'read'  => '<svg width="42" height="36" viewBox="0 0 42 36" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M21 6C16 2 5 2 2 4v26c3-2 14-2 19 2 5-4 16-4 19-2V4c-3-2-14-2-19 2Z" stroke="white" stroke-width="2.2" stroke-linejoin="round"/><line x1="21" y1="6" x2="21" y2="32" stroke="white" stroke-width="2.2"/><line x1="8" y1="12" x2="18" y2="12" stroke="white" stroke-width="1.6" stroke-linecap="round"/><line x1="8" y1="18" x2="18" y2="18" stroke="white" stroke-width="1.6" stroke-linecap="round"/><line x1="8" y1="24" x2="18" y2="24" stroke="white" stroke-width="1.6" stroke-linecap="round"/><line x1="24" y1="12" x2="34" y2="12" stroke="white" stroke-width="1.6" stroke-linecap="round"/><line x1="24" y1="18" x2="34" y2="18" stroke="white" stroke-width="1.6" stroke-linecap="round"/><line x1="24" y1="24" x2="34" y2="24" stroke="white" stroke-width="1.6" stroke-linecap="round"/></svg>',
        'pray'  => '<svg width="36" height="38" viewBox="0 0 36 38" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M18 2L18 36M2 18H34" stroke="white" stroke-width="2.5" stroke-linecap="round"/></svg>',
    ];
@endphp

<section class="watch-listen-read-section" style="position: relative; width: 100%; margin: 0 !important; overflow: hidden; {{ $bgImage ? 'background-image: url(\'' . $bgImage . '\');' : 'background-color: #111827;' }} background-size: cover; background-position: center; background-repeat: no-repeat; padding: 90px 0;">

    {{-- Dark overlay --}}
    <div style="position: absolute; inset: 0; background: rgba(0,0,0,0.62); pointer-events: none; z-index: 1;"></div>

    {{-- Cards grid --}}
    <div style="position: relative; z-index: 2; max-width: 1560px; margin: 0 auto; padding: 0 40px; display: grid; grid-template-columns: repeat(3,1fr); gap: 28px;">

        @foreach($cards as $card)
        @php $iconSvg = $icons[$card['icon']] ?? $icons['watch']; @endphp

        <div style="background: {{ $card['color'] }}; border-radius: 18px; padding: 36px 40px 44px; display: flex; flex-direction: column; gap: 0;">

            {{-- Icon + Title row --}}
            <div style="display: flex; align-items: center; gap: 18px; margin-bottom: 22px;">
                <div style="flex-shrink: 0;">{!! $iconSvg !!}</div>
                @if($card['link'])
                    <a href="{{ $card['link'] }}" style="text-decoration: none;">
                        <h3 style="font-family:'Inter',sans-serif!important;font-size:clamp(1.9rem,2.4vw,2.8rem)!important;font-weight:700!important;color:#ffffff!important;margin:0!important;padding:0!important;line-height:1!important;border:none!important;background:transparent!important;">{{ $card['title'] }}</h3>
                    </a>
                @else
                    <h3 style="font-family:'Inter',sans-serif!important;font-size:clamp(1.9rem,2.4vw,2.8rem)!important;font-weight:700!important;color:#ffffff!important;margin:0!important;padding:0!important;line-height:1!important;border:none!important;background:transparent!important;">{{ $card['title'] }}</h3>
                @endif
            </div>

            {{-- Description --}}
            <p style="font-family:'Inter',sans-serif!important;font-size:clamp(1.1rem,1.4vw,1.35rem)!important;font-weight:400!important;color:rgba(255,255,255,0.92)!important;line-height:1.6!important;margin:0!important;padding:0!important;background:transparent!important;">{{ $card['desc'] }}</p>

        </div>
        @endforeach

    </div>
</section>

