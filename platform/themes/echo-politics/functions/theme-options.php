<?php

use Botble\Theme\Events\RenderingThemeOptionSettings;

app('events')->listen(RenderingThemeOptionSettings::class, function (): void {
    theme_option()
        // ── Hero Intro Banner ──────────────────────────────────────────────────
        ->setField([
            'id'         => 'hero_intro_background_image',
            'section_id' => 'opt-text-subsection-general',
            'type'       => 'mediaImage',
            'label'      => __('Hero Intro: Background Image'),
            'attributes' => [
                'name'  => 'hero_intro_background_image',
                'value' => null,
            ],
        ])
        ->setField([
            'id'         => 'hero_intro_title',
            'section_id' => 'opt-text-subsection-general',
            'type'       => 'text',
            'label'      => __('Hero Intro: Title Text'),
            'attributes' => [
                'name'  => 'hero_intro_title',
                'value' => 'Watch, Learn, Pray.',
                'options' => ['class' => 'form-control'],
            ],
        ])
        ->setField([
            'id'         => 'hero_intro_link',
            'section_id' => 'opt-text-subsection-general',
            'type'       => 'text',
            'label'      => __('Hero Intro: Play Button Link (optional)'),
            'attributes' => [
                'name'    => 'hero_intro_link',
                'value'   => '',
                'options' => ['class' => 'form-control', 'placeholder' => 'https://...'],
            ],
        ])

        // ── Hero Intro Cards ───────────────────────────────────────────────────
        ->setField([
            'id'         => 'hero_intro_card_1_image',
            'section_id' => 'opt-text-subsection-general',
            'type'       => 'mediaImage',
            'label'      => __('Hero Intro: Card 1 Image'),
            'attributes' => ['name' => 'hero_intro_card_1_image', 'value' => null],
        ])
        ->setField([
            'id'         => 'hero_intro_card_1_text',
            'section_id' => 'opt-text-subsection-general',
            'type'       => 'text',
            'label'      => __('Hero Intro: Card 1 Label'),
            'attributes' => ['name' => 'hero_intro_card_1_text', 'value' => '', 'options' => ['class' => 'form-control']],
        ])
        ->setField([
            'id'         => 'hero_intro_card_1_link',
            'section_id' => 'opt-text-subsection-general',
            'type'       => 'text',
            'label'      => __('Hero Intro: Card 1 Link (optional)'),
            'attributes' => ['name' => 'hero_intro_card_1_link', 'value' => '', 'options' => ['class' => 'form-control', 'placeholder' => 'https://...']],
        ])
        ->setField([
            'id'         => 'hero_intro_card_2_image',
            'section_id' => 'opt-text-subsection-general',
            'type'       => 'mediaImage',
            'label'      => __('Hero Intro: Card 2 Image'),
            'attributes' => ['name' => 'hero_intro_card_2_image', 'value' => null],
        ])
        ->setField([
            'id'         => 'hero_intro_card_2_text',
            'section_id' => 'opt-text-subsection-general',
            'type'       => 'text',
            'label'      => __('Hero Intro: Card 2 Label'),
            'attributes' => ['name' => 'hero_intro_card_2_text', 'value' => '', 'options' => ['class' => 'form-control']],
        ])
        ->setField([
            'id'         => 'hero_intro_card_2_link',
            'section_id' => 'opt-text-subsection-general',
            'type'       => 'text',
            'label'      => __('Hero Intro: Card 2 Link (optional)'),
            'attributes' => ['name' => 'hero_intro_card_2_link', 'value' => '', 'options' => ['class' => 'form-control', 'placeholder' => 'https://...']],
        ])
        ->setField([
            'id'         => 'hero_intro_card_3_image',
            'section_id' => 'opt-text-subsection-general',
            'type'       => 'mediaImage',
            'label'      => __('Hero Intro: Card 3 Image'),
            'attributes' => ['name' => 'hero_intro_card_3_image', 'value' => null],
        ])
        ->setField([
            'id'         => 'hero_intro_card_3_text',
            'section_id' => 'opt-text-subsection-general',
            'type'       => 'text',
            'label'      => __('Hero Intro: Card 3 Label'),
            'attributes' => ['name' => 'hero_intro_card_3_text', 'value' => '', 'options' => ['class' => 'form-control']],
        ])
        ->setField([
            'id'         => 'hero_intro_card_3_link',
            'section_id' => 'opt-text-subsection-general',
            'type'       => 'text',
            'label'      => __('Hero Intro: Card 3 Link (optional)'),
            'attributes' => ['name' => 'hero_intro_card_3_link', 'value' => '', 'options' => ['class' => 'form-control', 'placeholder' => 'https://...']],
        ])
        ->setField([
            'id'         => 'hero_intro_card_4_image',
            'section_id' => 'opt-text-subsection-general',
            'type'       => 'mediaImage',
            'label'      => __('Hero Intro: Card 4 Image'),
            'attributes' => ['name' => 'hero_intro_card_4_image', 'value' => null],
        ])
        ->setField([
            'id'         => 'hero_intro_card_4_text',
            'section_id' => 'opt-text-subsection-general',
            'type'       => 'text',
            'label'      => __('Hero Intro: Card 4 Label'),
            'attributes' => ['name' => 'hero_intro_card_4_text', 'value' => '', 'options' => ['class' => 'form-control']],
        ])
        ->setField([
            'id'         => 'hero_intro_card_4_link',
            'section_id' => 'opt-text-subsection-general',
            'type'       => 'text',
            'label'      => __('Hero Intro: Card 4 Link (optional)'),
            'attributes' => ['name' => 'hero_intro_card_4_link', 'value' => '', 'options' => ['class' => 'form-control', 'placeholder' => 'https://...']],
        ])

        // ── Watch Listen Read ──────────────────────────────────────────────────
        ->setField([
            'id' => 'wlr_background_image', 'section_id' => 'opt-text-subsection-general',
            'type' => 'mediaImage', 'label' => __('Watch/Listen/Read: Background Image'),
            'attributes' => ['name' => 'wlr_background_image', 'value' => null],
        ])
        ->setField([
            'id' => 'wlr_card_1_title', 'section_id' => 'opt-text-subsection-general',
            'type' => 'text', 'label' => __('Watch/Listen/Read: Card 1 Title'),
            'attributes' => ['name' => 'wlr_card_1_title', 'value' => 'Watch', 'options' => ['class' => 'form-control']],
        ])
        ->setField([
            'id' => 'wlr_card_1_desc', 'section_id' => 'opt-text-subsection-general',
            'type' => 'textarea', 'label' => __('Watch/Listen/Read: Card 1 Description'),
            'attributes' => ['name' => 'wlr_card_1_desc', 'value' => 'Experience your faith come alive. Watch powerful reflections, Mass celebrations, and inspiring stories that bring you closer to God—anytime, anywhere.', 'options' => ['class' => 'form-control', 'rows' => 3]],
        ])
        ->setField([
            'id' => 'wlr_card_1_color', 'section_id' => 'opt-text-subsection-general',
            'type' => 'customColor', 'label' => __('Watch/Listen/Read: Card 1 Color'),
            'attributes' => ['name' => 'wlr_card_1_color', 'value' => '#1e3a8a'],
        ])
        ->setField([
            'id' => 'wlr_card_2_title', 'section_id' => 'opt-text-subsection-general',
            'type' => 'text', 'label' => __('Watch/Listen/Read: Card 2 Title'),
            'attributes' => ['name' => 'wlr_card_2_title', 'value' => 'Listen', 'options' => ['class' => 'form-control']],
        ])
        ->setField([
            'id' => 'wlr_card_2_desc', 'section_id' => 'opt-text-subsection-general',
            'type' => 'textarea', 'label' => __('Watch/Listen/Read: Card 2 Description'),
            'attributes' => ['name' => 'wlr_card_2_desc', 'value' => 'Let the Word of God speak to you. Tune into prayers, sermons, and audio reflections that uplift your spirit—even in the busiest moments of your day.', 'options' => ['class' => 'form-control', 'rows' => 3]],
        ])
        ->setField([
            'id' => 'wlr_card_2_color', 'section_id' => 'opt-text-subsection-general',
            'type' => 'customColor', 'label' => __('Watch/Listen/Read: Card 2 Color'),
            'attributes' => ['name' => 'wlr_card_2_color', 'value' => '#7f1d1d'],
        ])
        ->setField([
            'id' => 'wlr_card_3_title', 'section_id' => 'opt-text-subsection-general',
            'type' => 'text', 'label' => __('Watch/Listen/Read: Card 3 Title'),
            'attributes' => ['name' => 'wlr_card_3_title', 'value' => 'Read', 'options' => ['class' => 'form-control']],
        ])
        ->setField([
            'id' => 'wlr_card_3_desc', 'section_id' => 'opt-text-subsection-general',
            'type' => 'textarea', 'label' => __('Watch/Listen/Read: Card 3 Description'),
            'attributes' => ['name' => 'wlr_card_3_desc', 'value' => "Dive deeper into God's Word. Explore scripture, devotionals, and faith-filled articles designed to guide, inspire, and strengthen your journey.", 'options' => ['class' => 'form-control', 'rows' => 3]],
        ])
        ->setField([
            'id' => 'wlr_card_3_color', 'section_id' => 'opt-text-subsection-general',
            'type' => 'customColor', 'label' => __('Watch/Listen/Read: Card 3 Color'),
            'attributes' => ['name' => 'wlr_card_3_color', 'value' => '#c9a227'],
        ])

        // ── Watch Learn Pray ───────────────────────────────────────────────────
        ->setField([
            'id'         => 'watch_learn_pray_background_image',
            'section_id' => 'opt-text-subsection-general',
            'type'       => 'mediaImage',
            'label'      => __('Watch Learn Pray: Background Image'),
            'attributes' => [
                'name'  => 'watch_learn_pray_background_image',
                'value' => null,
            ],
        ])
        ->setField([
            'id'         => 'watch_learn_pray_heading',
            'section_id' => 'opt-text-subsection-general',
            'type'       => 'text',
            'label'      => __('Watch Learn Pray: Heading'),
            'attributes' => [
                'name'  => 'watch_learn_pray_heading',
                'value' => 'Watch, Learn, Pray.',
                'options' => ['class' => 'form-control'],
            ],
        ])
        ->setField([
            'id'         => 'watch_learn_pray_subtext',
            'section_id' => 'opt-text-subsection-general',
            'type'       => 'textarea',
            'label'      => __('Watch Learn Pray: Subtitle Text'),
            'attributes' => [
                'name'  => 'watch_learn_pray_subtext',
                'value' => 'OnlyCatholic.org is your digital home for everything Catholic. From live Mass and news to videos, podcasts, and prayer resources — we unite faithful voices in one trusted space. Join us in celebrating our one faith, one family, one place',
                'options' => ['class' => 'form-control', 'rows' => 4],
            ],
        ])
        ->setField([
            'id'         => 'watch_learn_pray_motto_prefix',
            'section_id' => 'opt-text-subsection-general',
            'type'       => 'text',
            'label'      => __('Watch Learn Pray: Motto Prefix (e.g. One)'),
            'attributes' => [
                'name'  => 'watch_learn_pray_motto_prefix',
                'value' => 'One',
                'options' => ['class' => 'form-control'],
            ],
        ])
        ->setField([
            'id'         => 'watch_learn_pray_motto_word_1',
            'section_id' => 'opt-text-subsection-general',
            'type'       => 'text',
            'label'      => __('Watch Learn Pray: Motto Word 1 (e.g. faith)'),
            'attributes' => [
                'name'  => 'watch_learn_pray_motto_word_1',
                'value' => 'faith',
                'options' => ['class' => 'form-control'],
            ],
        ])
        ->setField([
            'id'         => 'watch_learn_pray_motto_color_1',
            'section_id' => 'opt-text-subsection-general',
            'type'       => 'customColor',
            'label'      => __('Watch Learn Pray: Motto Word 1 Color'),
            'attributes' => [
                'name'  => 'watch_learn_pray_motto_color_1',
                'value' => '#0a417a',
            ],
        ])
        ->setField([
            'id'         => 'watch_learn_pray_motto_word_2',
            'section_id' => 'opt-text-subsection-general',
            'type'       => 'text',
            'label'      => __('Watch Learn Pray: Motto Word 2 (e.g. family)'),
            'attributes' => [
                'name'  => 'watch_learn_pray_motto_word_2',
                'value' => 'family',
                'options' => ['class' => 'form-control'],
            ],
        ])
        ->setField([
            'id'         => 'watch_learn_pray_motto_color_2',
            'section_id' => 'opt-text-subsection-general',
            'type'       => 'customColor',
            'label'      => __('Watch Learn Pray: Motto Word 2 Color'),
            'attributes' => [
                'name'  => 'watch_learn_pray_motto_color_2',
                'value' => '#b22222',
            ],
        ])
        ->setField([
            'id'         => 'watch_learn_pray_motto_word_3',
            'section_id' => 'opt-text-subsection-general',
            'type'       => 'text',
            'label'      => __('Watch Learn Pray: Motto Word 3 (e.g. place)'),
            'attributes' => [
                'name'  => 'watch_learn_pray_motto_word_3',
                'value' => 'place',
                'options' => ['class' => 'form-control'],
            ],
        ])
        ->setField([
            'id'         => 'watch_learn_pray_motto_color_3',
            'section_id' => 'opt-text-subsection-general',
            'type'       => 'customColor',
            'label'      => __('Watch Learn Pray: Motto Word 3 Color'),
            'attributes' => [
                'name'  => 'watch_learn_pray_motto_color_3',
                'value' => '#c9a227',
            ],
        ])
        ->setField([
            'id'         => 'watch_learn_pray_signature',
            'section_id' => 'opt-text-subsection-general',
            'type'       => 'text',
            'label'      => __('Watch Learn Pray: Signature / Attribution'),
            'attributes' => [
                'name'  => 'watch_learn_pray_signature',
                'value' => 'Fr. Morson Livingston',
                'options' => ['class' => 'form-control'],
            ],
        ]);
});
