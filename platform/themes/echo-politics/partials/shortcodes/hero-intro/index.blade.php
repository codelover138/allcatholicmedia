@php
    $title    = $shortcode->title    ?: theme_option('hero_intro_title', 'Watch, Learn, Pray.');
    $link     = $shortcode->link     ?: theme_option('hero_intro_link', '');
    $bgImage  = $shortcode->background_image
        ? RvMedia::getImageUrl($shortcode->background_image)
        : (theme_option('hero_intro_background_image')
            ? RvMedia::getImageUrl(theme_option('hero_intro_background_image'))
            : null);

    $defaultTexts = [
        1 => 'Sunday Mass — Live & On Demand',
        2 => 'Catholic Teaching & Formation',
        3 => 'Adoration, Rosary & Prayer',
        4 => 'Saints, Feasts & Sacred Music',
    ];

    $cards = [];
    for ($i = 1; $i <= 4; $i++) {
        $imgKey  = "card_{$i}_image";
        $textKey = "card_{$i}_text";
        $linkKey = "card_{$i}_link";

        $cardImg = $shortcode->$imgKey
            ? RvMedia::getImageUrl($shortcode->$imgKey)
            : (theme_option("hero_intro_card_{$i}_image")
                ? RvMedia::getImageUrl(theme_option("hero_intro_card_{$i}_image"))
                : null);

        $cards[] = [
            'image' => $cardImg,
            'text'  => $shortcode->$textKey ?: theme_option("hero_intro_card_{$i}_text", $defaultTexts[$i]),
            'link'  => $shortcode->$linkKey ?: theme_option("hero_intro_card_{$i}_link", ''),
        ];
    }
@endphp

@if($bgImage)
<section style="display: block; width: 100%; margin: 0 !important; padding: 0; font-family: 'Inter', sans-serif;">

    {{-- ── Main Hero Area ── --}}
    <div style="position: relative; width: 100%; min-height: 520px; background-image: url('{{ $bgImage }}'); background-size: cover; background-position: center; background-repeat: no-repeat; display: flex; align-items: flex-end; overflow: hidden;">

        {{-- Gradient overlay --}}
        <div style="position: absolute; inset: 0; background: linear-gradient(180deg, rgba(0,0,0,0.05) 0%, rgba(0,0,0,0.15) 50%, rgba(0,0,0,0.70) 100%); pointer-events: none;"></div>

        {{-- Title + Play --}}
        <div style="position: relative; z-index: 2; width: 100%; padding: 0 48px 52px;">
            <div style="display: flex; align-items: center; gap: 22px; max-width: 1600px; margin: 0 auto;">

                {{-- Play icon --}}
                @if($link)
                    <a href="{{ $link }}" style="display:flex;align-items:center;justify-content:center;width:62px;height:62px;border:2.5px solid rgba(255,255,255,0.85);border-radius:50%;flex-shrink:0;text-decoration:none;" onmouseover="this.style.background='rgba(255,255,255,0.15)'" onmouseout="this.style.background='transparent'">
                        <svg width="22" height="24" viewBox="0 0 20 22" fill="none"><path d="M2 2L18 11L2 20V2Z" fill="white" stroke="white" stroke-width="1.5" stroke-linejoin="round"/></svg>
                    </a>
                @else
                    <div style="display:flex;align-items:center;justify-content:center;width:62px;height:62px;border:2.5px solid rgba(255,255,255,0.85);border-radius:50%;flex-shrink:0;">
                        <svg width="22" height="24" viewBox="0 0 20 22" fill="none"><path d="M2 2L18 11L2 20V2Z" fill="white" stroke="white" stroke-width="1.5" stroke-linejoin="round"/></svg>
                    </div>
                @endif

                {{-- Title --}}
                <h2 style="font-family:'Inter',sans-serif!important;font-size:clamp(2.4rem,3.8vw,4.8rem)!important;font-weight:600!important;color:#ffffff!important;margin:0!important;padding:0!important;line-height:1.06!important;letter-spacing:-0.025em!important;border:none!important;background:transparent!important;text-shadow:0 2px 20px rgba(0,0,0,0.4);">{{ $title }}</h2>
            </div>
        </div>
    </div>

    {{-- ── Four Image Cards ── --}}
    <div style="display: grid; grid-template-columns: repeat(4, 1fr); width: 100%; margin: 0; padding: 0; gap: 0;">
        @foreach($cards as $card)
        <div style="position: relative; overflow: hidden; aspect-ratio: 16/10; background: #1c1c1c;">
            @if(!empty($card['image']))
                <img src="{{ $card['image'] }}" alt="{{ $card['text'] }}" style="width:100%;height:100%;object-fit:cover;display:block;">
            @endif

            {{-- Dark gradient overlay --}}
            <div style="position:absolute;inset:0;background:linear-gradient(180deg,rgba(0,0,0,0) 35%,rgba(0,0,0,0.72) 100%);pointer-events:none;"></div>

            {{-- Card bottom content --}}
            @if(!empty($card['text']))
            <div style="position:absolute;bottom:0;left:0;right:0;padding:14px 16px;z-index:2;">
                @if(!empty($card['link']))
                    <a href="{{ $card['link'] }}" style="display:flex;align-items:center;gap:10px;text-decoration:none;">
                        <svg width="14" height="15" viewBox="0 0 14 15" fill="none" style="flex-shrink:0;"><path d="M1.5 1.5L12.5 7.5L1.5 13.5V1.5Z" fill="white" stroke="white" stroke-width="1.2" stroke-linejoin="round"/></svg>
                        <span style="font-family:'Inter',sans-serif;font-size:clamp(1.2rem,1.6vw,1.5rem);font-weight:500;color:#ffffff;line-height:1.3;text-shadow:0 1px 6px rgba(0,0,0,0.5);">{!! html_entity_decode($card['text']) !!}</span>
                    </a>
                @else
                    <div style="display:flex;align-items:center;gap:10px;">
                        <svg width="14" height="15" viewBox="0 0 14 15" fill="none" style="flex-shrink:0;"><path d="M1.5 1.5L12.5 7.5L1.5 13.5V1.5Z" fill="white" stroke="white" stroke-width="1.2" stroke-linejoin="round"/></svg>
                        <span style="font-family:'Inter',sans-serif;font-size:clamp(1.2rem,1.6vw,1.5rem);font-weight:500;color:#ffffff;line-height:1.3;text-shadow:0 1px 6px rgba(0,0,0,0.5);">{!! html_entity_decode($card['text']) !!}</span>
                    </div>
                @endif
            </div>
            @endif
        </div>
        @endforeach
    </div>

</section>
@endif
