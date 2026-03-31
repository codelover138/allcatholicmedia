<section class="catholic-grid-section catholic-latest-content-section" @style($variableStyles)>
    <div class="container">
        <div class="catholic-section-header catholic-latest-content-header">
            <h2 class="catholic-section-title">{{ $title }}</h2>
            <a href="{{ route('public.videos') }}" class="catholic-view-all catholic-latest-content-view-all">
                {{ __('View All') }}
                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
            </a>
        </div>

        <div class="row g-4 mt-1">
            @foreach ($posts as $post)
                @php
                    $cat = $post->categories->first();
                    $excerpt = Str::limit(trim(strip_tags((string) ($post->description ?: $post->content))), 110);
                @endphp
                <div class="col-xl-4 col-lg-4 col-md-6 col-12">
                    <article class="catholic-latest-card">
                        <div class="catholic-latest-media">
                            <a href="{{ $post->url }}">
                                @if ($post->image)
                                    {{ RvMedia::image($post->image, $post->name, 'medium', attributes: ['class' => 'catholic-latest-image']) }}
                                @else
                                    <span class="catholic-latest-placeholder" aria-hidden="true">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4">
                                            <rect x="3" y="4" width="18" height="16" rx="1.5"></rect>
                                            <circle cx="9" cy="10" r="1.8"></circle>
                                            <path d="M21 16l-5.2-5.2a1 1 0 0 0-1.4 0L8 17"></path>
                                        </svg>
                                    </span>
                                @endif
                            </a>
                        </div>
                        <div class="catholic-latest-body">
                            <h3 class="catholic-latest-title">
                                <a href="{{ $post->url }}" title="{{ $post->name }}">{{ Str::limit($post->name, 80) }}</a>
                            </h3>
                            @if ($excerpt !== '')
                                <p class="catholic-latest-excerpt">{{ $excerpt }}</p>
                            @endif
                        </div>
                    </article>
                </div>
            @endforeach
        </div>
    </div>
</section>
