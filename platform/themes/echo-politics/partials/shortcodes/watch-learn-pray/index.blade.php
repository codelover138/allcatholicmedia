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

<section class="watch-learn-pray-section" style="background-image: url('{{ $bgImage }}');">
    <div class="container">
        <div class="watch-learn-pray-card">
            <h2>{{ $heading }}</h2>
            <p class="watch-learn-pray-subtext">{{ $subtext }}</p>

            <div class="watch-learn-pray-decorative-box">
                <div class="watch-learn-pray-motto">
                    <span class="watch-learn-pray-motto-part" style="color: {{ $color1 }};">
                        <span class="word">{{ $prefix }}</span> <span class="cursive">{{ $word1 }}</span>
                    </span>
                    <span class="dot">·</span>
                    <span class="watch-learn-pray-motto-part" style="color: {{ $color2 }};">
                        <span class="word">{{ $prefix }}</span> <span class="cursive">{{ $word2 }}</span>
                    </span>
                    <span class="dot">·</span>
                    <span class="watch-learn-pray-motto-part" style="color: {{ $color3 }};">
                        <span class="word">{{ $prefix }}</span> <span class="cursive">{{ $word3 }}</span>
                    </span>
                </div>
                @if($signature)
                    <div class="watch-learn-pray-signature">{{ $signature }}</div>
                @endif
            </div>
        </div>
    </div>
</section>
