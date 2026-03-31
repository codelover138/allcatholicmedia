<section class="catholic-grid-section catholic-watch-section">
    <div class="container">
        <div class="catholic-section-header">
            <h2 class="catholic-section-title">{{ $title }}</h2>
            <a href="{{ route('public.watch') }}" class="catholic-view-all">
                {{ __('View All') }}
                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
            </a>
        </div>

        <div class="row g-4 mt-1">
            @foreach ($channels as $channel)
                <div class="col-xl-4 col-lg-4 col-md-6 col-12">
                    <a href="{{ route('public.watch.channel', $channel->slug) }}" class="catholic-channel-card">
                        <div class="catholic-channel-thumb">
                            @if ($channel->thumbnail)
                                <img src="{{ RvMedia::url($channel->thumbnail) }}" alt="{{ $channel->name }}" loading="lazy">
                            @else
                                <div class="catholic-channel-thumb-placeholder">
                                    <svg width="36" height="36" viewBox="0 0 24 24" fill="currentColor"><path d="M10 15l5.19-3L10 9v6m11.56-7.83c.13.47.22 1.1.28 1.9.07.8.1 1.49.1 2.09L22 12c0 2.19-.16 3.8-.44 4.83-.25.9-.83 1.48-1.73 1.73-.47.13-1.33.22-2.65.28-1.3.07-2.49.1-3.59.1L12 19c-4.19 0-6.8-.16-7.83-.44-.9-.25-1.48-.83-1.73-1.73-.13-.47-.22-1.1-.28-1.9-.07-.8-.1-1.49-.1-2.09L2 12c0-2.19.16-3.8.44-4.83.25-.9.83-1.48 1.73-1.73.47-.13 1.33-.22 2.65-.28 1.3-.07 2.49-.1 3.59-.1L12 5c4.19 0 6.8.16 7.83.44.9.25 1.48.83 1.73 1.73z"/></svg>
                                </div>
                            @endif
                        </div>
                        <div class="catholic-channel-body">
                            <h3 class="catholic-channel-name">{{ $channel->name }}</h3>
                            @if ($channel->description)
                                <p class="catholic-channel-desc">{{ Str::limit($channel->description, 80) }}</p>
                            @endif
                            <span class="catholic-channel-meta">
                                {{ number_format($channel->videos_count) }} {{ Str::plural('video', $channel->videos_count) }}
                            </span>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>
