<style>
    :root {
        /* Catholic brand colors */
        --primary-color:         {{ theme_option('primary_color', '#046bd2') }};
        --secondary-color:       {{ theme_option('secondary_color', '#c9a227') }};
        --tertiary-color:        {{ theme_option('tertiary_color', '#0f172a') }};
        --accent-gold:           #c9a227;
        --accent-gold-hover:     #b08a1e;

        /* Text / headings */
        --header-text-color:     {{ theme_option('header_text_color', '#ffffff') }};
        --color-primary:         {{ theme_option('primary_color', '#046bd2') }};
        --color-heading:         {{ theme_option('heading_color', '#1e293b') }};
        --text-color:            {{ theme_option('text_color', '#475569') }};

        /* Footer */
        --footer-background-color: {{ theme_option('footer_background_color', '#0f172a') }};
        --footer-heading-color:    {{ theme_option('footer_heading_color', '#f8fafc') }};
        --footer-text-color:       {{ theme_option('footer_text_color', '#94a3b8') }};

        /* Fonts */
        --primary-font:          '{{ theme_option('primary_font', 'Inter') }}', sans-serif;
        --heading-font:          '{{ theme_option('heading_font', 'Playfair Display') }}', serif;
        --primary-heading:       '{{ theme_option('heading_font', 'Playfair Display') }}', serif;

        /* Layout */
        --border-radius:         6px;
        --card-shadow:           0 1px 3px rgba(0, 0, 0, 0.08), 0 1px 2px rgba(0, 0, 0, 0.05);
        --transition:            0.2s ease;

        /* Catholic-specific surface colors */
        --bg-light:              #f0f5fa;
        --bg-card:               #ffffff;
        --border-color:          #e2e8f0;
    }
</style>
