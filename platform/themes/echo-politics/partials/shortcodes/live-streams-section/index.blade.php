<section class="catholic-live-section">
    <div class="container">
        <div class="catholic-section-header catholic-section-header-dark">
            <h2 class="catholic-section-title">
                {{ $title }}
                @if ($liveNow->isNotEmpty())
                    <span class="live-indicator ms-2">LIVE</span>
                @endif
            </h2>
            <a href="{{ route('public.live') }}" class="catholic-view-all catholic-view-all-light">
                {{ __('View All') }}
                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
            </a>
        </div>

        @if ($liveNow->isNotEmpty())
            <div class="row g-3 mt-1">
                @foreach ($liveNow as $stream)
                    <div class="col-xl-4 col-lg-4 col-md-6 col-12">
                        <div class="catholic-live-card">
                            <div class="catholic-live-thumb">
                                @if ($stream->thumbnail)
                                    <img src="{{ RvMedia::url($stream->thumbnail) }}" alt="{{ $stream->title }}" loading="lazy">
                                @else
                                    <div class="catholic-live-thumb-placeholder">
                                        <svg width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="2" y="7" width="20" height="15" rx="2"/><polyline points="17 2 12 7 7 2"/></svg>
                                    </div>
                                @endif
                                <span class="badge-live">LIVE</span>
                            </div>
                            <div class="catholic-live-body">
                                <h3 class="catholic-live-title">{{ Str::limit($stream->title, 70) }}</h3>
                                @if ($stream->source_name)
                                    <p class="catholic-live-source">{{ $stream->source_name }}</p>
                                @endif
                                <a href="{{ route('public.live') }}" class="catholic-live-btn">
                                    <svg width="12" height="12" viewBox="0 0 24 24" fill="currentColor"><polygon points="5,3 19,12 5,21"/></svg>
                                    {{ __('Watch Live') }}
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

        @if ($upcoming->isNotEmpty())
            <div class="catholic-upcoming-row mt-4">
                <p class="catholic-upcoming-label">{{ __('Coming Up') }}</p>
                <div class="d-flex flex-wrap gap-2">
                    @foreach ($upcoming as $stream)
                        <a href="{{ route('public.live') }}" class="catholic-upcoming-chip">
                            {{ $stream->title }}
                            @if ($stream->scheduled_at)
                                <span>· {{ \Carbon\Carbon::parse($stream->scheduled_at)->format('g:i A') }}</span>
                            @endif
                        </a>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
</section>
