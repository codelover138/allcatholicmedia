<section class="catholic-grid-section" @style($variableStyles)>
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
            @foreach ($posts as $post)
                @php $cat = $post->categories->first(); @endphp
                <div class="col-xl-4 col-lg-4 col-md-6 col-12">
                    <article class="catholic-card">
                        <div class="catholic-card-img img-transition-scale position-relative">
                            <a href="{{ $post->url }}">
                                {{ RvMedia::image($post->image, $post->name, 'medium', attributes: ['class' => 'img-hover catholic-card-image']) }}
                            </a>
                            @if ($cat)
                                <a href="{{ $cat->url }}" class="catholic-card-badge">{{ $cat->name }}</a>
                            @endif
                            {!! Theme::partial('blog.post.partials.action-post', compact('post')) !!}
                        </div>
                        <div class="catholic-card-body">
                            <h3 class="catholic-card-title">
                                <a href="{{ $post->url }}" class="title-hover" title="{{ $post->name }}">{{ Str::limit($post->name, 80) }}</a>
                            </h3>
                            {!! Theme::partial('post-meta', ['post' => $post, 'wrapperClass' => 'catholic-card-meta']) !!}
                        </div>
                    </article>
                </div>
            @endforeach
        </div>

    </div>
</section>
