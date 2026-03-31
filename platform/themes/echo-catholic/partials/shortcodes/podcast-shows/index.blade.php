@php
    $title = $shortcode->title ?? $title ?? 'Podcasts';
    $limit = $shortcode->limit ?? 6;
@endphp

<section class="catholic-grid-section catholic-listen-section">
    <div class="container">
        <div class="catholic-section-header catholic-listen-header">
            @if ($title)
                <h2 class="catholic-section-title">{!! BaseHelper::clean($title) !!}</h2>
            @endif
        </div>

        @if ($shows->isNotEmpty())
            <div class="row g-4 mt-1">
                @foreach ($shows as $show)
                    <div class="col-xl-3 col-lg-6 col-md-6 col-12">
                        <a href="{{ route('public.index') }}?show={{ $show->slug }}" class="catholic-listen-card">
                            <div class="catholic-listen-media">
                                <div class="catholic-listen-image-wrap">
                                    @if ($show->thumbnail)
                                        {{ RvMedia::image($show->thumbnail, $show->name, 'medium', attributes: ['class' => 'catholic-listen-image']) }}
                                    @else
                                        <div class="catholic-listen-placeholder">
                                            <span>{{ Str::limit($show->name, 2, '') }}</span>
                                        </div>
                                    @endif
                                </div>
                                <span class="catholic-listen-play" aria-hidden="true">
                                    <svg viewBox="0 0 24 24" fill="currentColor" role="presentation">
                                        <path d="M8 6.75v10.5L17 12 8 6.75Z" />
                                    </svg>
                                </span>
                            </div>
                            <div class="catholic-listen-body">
                                <h3 class="catholic-listen-title" title="{{ $show->name }}">
                                    {{ Str::limit($show->name, 82) }}
                                </h3>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-5">
                <p class="text-muted">No podcast shows available at the moment.</p>
            </div>
        @endif

    </div>
</section>
