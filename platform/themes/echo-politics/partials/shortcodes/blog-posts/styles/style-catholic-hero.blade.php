@php
    $heroPost = $posts->shift();
@endphp

@if ($heroPost)
    @php
        $bgUrl   = $heroPost->image ? RvMedia::url($heroPost->image) : null;
        $cat     = $heroPost->categories->first();
        $excerpt = $heroPost->description ? Str::limit(strip_tags($heroPost->description), 200) : null;
    @endphp

    <section class="catholic-hero-section" @style($variableStyles)>
        <div class="catholic-hero-bg" @style(["background-image:url('$bgUrl')" => $bgUrl])>
            <div class="catholic-hero-overlay" aria-hidden="true"></div>
            <div class="container">
                <div class="catholic-hero-content">

                    @if ($cat)
                        <a href="{{ $cat->url }}" class="catholic-hero-badge">
                            {{ $cat->name }}
                        </a>
                    @endif

                    <h1 class="catholic-hero-title">
                        <a href="{{ $heroPost->url }}">{{ $heroPost->name }}</a>
                    </h1>

                    @if ($excerpt)
                        <p class="catholic-hero-excerpt">{{ $excerpt }}</p>
                    @endif

                    <div class="catholic-hero-footer">
                        {!! Theme::partial('post-meta', ['post' => $heroPost, 'wrapperClass' => 'catholic-hero-meta']) !!}
                        <a href="{{ $heroPost->url }}" class="catholic-hero-cta">
                            {{ __('Read More') }}
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                        </a>
                    </div>

                </div>
            </div>
        </div>

        {{-- Secondary posts row below the hero --}}
        @if ($posts->isNotEmpty())
            <div class="catholic-hero-secondaries">
                <div class="container">
                    <div class="row g-3">
                        @foreach ($posts->take(4) as $post)
                            @php $pCat = $post->categories->first(); @endphp
                            <div class="col-xl-3 col-lg-3 col-md-6 col-6">
                                <article class="catholic-secondary-card">
                                    <div class="catholic-secondary-img img-transition-scale position-relative">
                                        <a href="{{ $post->url }}">
                                            {{ RvMedia::image($post->image, $post->name, 'small', attributes: ['class' => 'img-hover']) }}
                                        </a>
                                        @if ($pCat)
                                            <a href="{{ $pCat->url }}" class="catholic-card-badge">{{ $pCat->name }}</a>
                                        @endif
                                        {!! Theme::partial('blog.post.partials.action-post', compact('post')) !!}
                                    </div>
                                    <div class="catholic-secondary-body">
                                        <h3 class="catholic-secondary-title">
                                            <a href="{{ $post->url }}" title="{{ $post->name }}">{{ Str::limit($post->name, 75) }}</a>
                                        </h3>
                                        {!! Theme::partial('post-meta', ['post' => $post, 'wrapperClass' => 'catholic-card-meta']) !!}
                                    </div>
                                </article>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif
    </section>
@endif
