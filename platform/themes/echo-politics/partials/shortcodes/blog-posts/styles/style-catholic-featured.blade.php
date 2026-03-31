@php
    $leadPost  = $posts->shift();
    $sidePosts = $posts->take(4);
@endphp

@if ($leadPost)
<section class="catholic-featured-section" @style($variableStyles)>
    <div class="container">

        {{-- Section header --}}
        <div class="catholic-section-header">
            @if ($title = $shortcode->title)
                <h2 class="catholic-section-title">{!! BaseHelper::clean($title) !!}</h2>
            @endif
            <a href="{{ route('public.index') }}" class="catholic-view-all">
                {{ __('View All') }}
                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
            </a>
        </div>

        <div class="row g-4 mt-1">

            {{-- Lead post — large left --}}
            <div class="col-lg-7 col-md-12">
                @php $leadCat = $leadPost->categories->first(); @endphp
                <article class="catholic-card catholic-card-lead">
                    <div class="catholic-card-img img-transition-scale position-relative">
                        <a href="{{ $leadPost->url }}">
                            {{ RvMedia::image($leadPost->image, $leadPost->name, 'large', attributes: ['class' => 'img-hover catholic-card-image']) }}
                        </a>
                        @if ($leadCat)
                            <a href="{{ $leadCat->url }}" class="catholic-card-badge">{{ $leadCat->name }}</a>
                        @endif
                        {!! Theme::partial('blog.post.partials.action-post', ['post' => $leadPost]) !!}
                    </div>
                    <div class="catholic-card-body">
                        <h2 class="catholic-card-title catholic-card-title-lg">
                            <a href="{{ $leadPost->url }}" class="title-hover" title="{{ $leadPost->name }}">{{ Str::limit($leadPost->name, 100) }}</a>
                        </h2>
                        @if ($desc = $leadPost->description)
                            <p class="catholic-card-excerpt">{{ Str::limit(strip_tags($desc), 150) }}</p>
                        @endif
                        {!! Theme::partial('post-meta', ['post' => $leadPost, 'wrapperClass' => 'catholic-card-meta']) !!}
                    </div>
                </article>
            </div>

            {{-- Side posts — stacked right --}}
            @if ($sidePosts->isNotEmpty())
                <div class="col-lg-5 col-md-12">
                    <div class="d-flex flex-column gap-3">
                        @foreach ($sidePosts as $post)
                            @php $pCat = $post->categories->first(); @endphp
                            <article class="catholic-side-card">
                                <div class="catholic-side-img img-transition-scale position-relative">
                                    <a href="{{ $post->url }}">
                                        {{ RvMedia::image($post->image, $post->name, 'small', attributes: ['class' => 'img-hover']) }}
                                    </a>
                                    {!! Theme::partial('blog.post.partials.action-post', compact('post')) !!}
                                </div>
                                <div class="catholic-side-body">
                                    @if ($pCat)
                                        <a href="{{ $pCat->url }}" class="catholic-side-badge">{{ $pCat->name }}</a>
                                    @endif
                                    <h3 class="catholic-side-title">
                                        <a href="{{ $post->url }}" class="title-hover" title="{{ $post->name }}">{{ Str::limit($post->name, 80) }}</a>
                                    </h3>
                                    {!! Theme::partial('post-meta', ['post' => $post, 'wrapperClass' => 'catholic-card-meta']) !!}
                                </div>
                            </article>
                            @if (!$loop->last)
                                <hr class="catholic-side-divider">
                            @endif
                        @endforeach
                    </div>
                </div>
            @endif

        </div>
    </div>
</section>
@endif
