@php
    $heading     = $shortcode->heading ?: theme_option('watch_learn_pray_heading', 'Watch, Learn, Pray.');
    $subtext     = $shortcode->subtext ?: theme_option('watch_learn_pray_subtext', 'OnlyCatholic.org is your digital home for everything Catholic. From live Mass and news to videos, podcasts, and prayer resources — we unite faithful voices in one trusted space. Join us in celebrating our one faith, one family, one place');
    $prefix      = $shortcode->motto_prefix ?: theme_option('watch_learn_pray_motto_prefix', 'One');
    $word1       = $shortcode->motto_word_1 ?: theme_option('watch_learn_pray_motto_word_1', 'faith');
    $color1      = $shortcode->motto_color_1 ?: theme_option('watch_learn_pray_motto_color_1', '#0a417a');
    $word2       = $shortcode->motto_word_2 ?: theme_option('watch_learn_pray_motto_word_2', 'family');
    $color2      = $shortcode->motto_color_2 ?: theme_option('watch_learn_pray_motto_color_2', '#b22222');
    $word3       = $shortcode->motto_word_3 ?: theme_option('watch_learn_pray_motto_word_3', 'place');
    $color3      = $shortcode->motto_color_3 ?: theme_option('watch_learn_pray_motto_color_3', '#c9a227');
    $signature   = $shortcode->signature ?: theme_option('watch_learn_pray_signature', 'Fr. Morson Livingston');
    $bgImage     = $shortcode->background_image
        ? RvMedia::getImageUrl($shortcode->background_image)
        : (theme_option('watch_learn_pray_background_image')
            ? RvMedia::getImageUrl(theme_option('watch_learn_pray_background_image'))
            : 'https://images.unsplash.com/photo-1548625149-fc4a29cf7092?q=80&w=2000&auto=format&fit=crop');
@endphp

<section class="watch-learn-pray-section" style="background-image: url('{{ $bgImage }}'); padding: 58px 0 54px; background-size: cover; background-position: center 18%; background-repeat: no-repeat; position: relative; overflow: hidden; background-color: #080808;">
    <div style="content: ''; position: absolute; inset: 0; background: linear-gradient(180deg, rgba(0,0,0,0.72) 0%, rgba(0,0,0,0.34) 22%, rgba(0,0,0,0.28) 78%, rgba(0,0,0,0.68) 100%); pointer-events: none; z-index: 1;"></div>
    <div class="container" style="position: relative; z-index: 2; max-width: 1600px;">
        <div class="watch-learn-pray-card" style="background: #ffffff !important; border: 5px solid #cba11d !important; border-radius: 31px; padding: 82px 92px 96px; max-width: 1510px; margin: 0 auto; text-align: center; box-shadow: 0 30px 80px rgba(0,0,0,0.22); position: relative; z-index: 3;">
            <h2 style="font-family: 'Inter', sans-serif !important; font-size: clamp(3.1rem, 3.55vw, 4.6rem) !important; font-weight: 400 !important; line-height: 1.02 !important; letter-spacing: -0.035em !important; color: #32343a !important; margin-bottom: 24px !important; border-bottom: none !important; padding-bottom: 0 !important; text-transform: none !important; background: transparent !important;">{{ $heading }}</h2>
            <p class="watch-learn-pray-subtext" style="font-family: 'Inter', sans-serif !important; font-size: clamp(1.02rem, 1.18vw, 1.34rem) !important; line-height: 1.55 !important; font-weight: 400 !important; color: #0e0f12 !important; max-width: 1080px; margin: 0 auto 34px !important; padding: 0 !important; background: transparent !important;">{{ $subtext }}</p>

            <div class="watch-learn-pray-decorative-box" style="border: 1.5px dashed rgba(59,59,59,0.45) !important; border-radius: 20px; padding: 54px 36px 30px; margin: 0 auto; max-width: 1180px; display: flex !important; flex-direction: column; align-items: center; gap: 18px; background: rgba(255,255,255,0.88) !important;">
                <div class="watch-learn-pray-motto" style="font-size: clamp(2.9rem, 3.5vw, 4.85rem); display: flex; align-items: center; justify-content: center; gap: 18px; flex-wrap: wrap; line-height: .92;">
                    <span class="watch-learn-pray-motto-part" style="color: {{ $color1 }}; display: inline-flex; align-items: baseline; gap: 0.16em;">
                        <span class="word" style="font-family: 'Inter', sans-serif; font-weight: 500; color: #4d535d;">{{ $prefix }}</span> <span class="cursive" style="font-family: 'Great Vibes', cursive; font-size: 1.42em; font-weight: 400; line-height: 1; color: {{ $color1 }};">{{ $word1 }}</span>
                    </span>
                    <span class="dot" style="font-size: 0.58em; color: #1f232a;">·</span>
                    <span class="watch-learn-pray-motto-part" style="color: {{ $color2 }}; display: inline-flex; align-items: baseline; gap: 0.16em;">
                        <span class="word" style="font-family: 'Inter', sans-serif; font-weight: 500; color: #4d535d;">{{ $prefix }}</span> <span class="cursive" style="font-family: 'Great Vibes', cursive; font-size: 1.42em; font-weight: 400; line-height: 1; color: {{ $color2 }};">{{ $word2 }}</span>
                    </span>
                    <span class="dot" style="font-size: 0.58em; color: #1f232a;">·</span>
                    <span class="watch-learn-pray-motto-part" style="color: {{ $color3 }}; display: inline-flex; align-items: baseline; gap: 0.16em;">
                        <span class="word" style="font-family: 'Inter', sans-serif; font-weight: 500; color: #4d535d;">{{ $prefix }}</span> <span class="cursive" style="font-family: 'Great Vibes', cursive; font-size: 1.42em; font-weight: 400; line-height: 1; color: {{ $color3 }};">{{ $word3 }}</span>
                    </span>
                </div>
                @if($signature)
                    <div class="watch-learn-pray-signature" style="font-family: 'Inter', sans-serif; font-size: 1rem; font-weight: 500; color: #2d3035;">{{ $signature }}</div>
                @endif
            </div>
        </div>
    </div>
</section>
