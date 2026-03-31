<section class="echo-latest-news-area home-eight" @style($variableStyles)>
    <div class="hm-7-container">
        <div class="echo-full-hero-content inner-category-1">
            <div class="row gx-5 sticky-coloum-wrap">
                <div @class([
                    'col-xl-8 col-lg-7 col-md-12' => $sidebar,
                    'col-12' => ! $sidebar,
                ])>
                    <div class="top-area">
                        @if ($title = $shortcode->title)
                            <div class="hm5-feature-title">
                                <div class="hm-5-title-btn">
                                    <div class="hm-5-main-title gap-2 justify-content-{{ $shortcode->title_align ?: 'start' }}">
                                        <img src="{{ Theme::asset()->url('images/shape-title.svg') }}" alt="title shape">
                                        <h2>{!! BaseHelper::clean($title) !!}</h2>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <div class="row">
                            <div class="col-xl-12">
                                @foreach($posts as $post)
                                    @php
                                        $normalizeText = static function (?string $value): string {
                                            if ($value === null || $value === '') {
                                                return '';
                                            }

                                            return strtr($value, [
                                                'â€™' => '’',
                                                'â€œ' => '“',
                                                'â€' => '”',
                                                'â€“' => '–',
                                                'â€”' => '—',
                                                'â€¦' => '…',
                                                'Ã¡' => 'á',
                                                'Ã ' => 'à',
                                                'Ã¢' => 'â',
                                                'Ã¤' => 'ä',
                                                'Ã§' => 'ç',
                                                'Ã¨' => 'è',
                                                'Ã©' => 'é',
                                                'Ãª' => 'ê',
                                                'Ã«' => 'ë',
                                                'Ã­' => 'í',
                                                'Ã¬' => 'ì',
                                                'Ã®' => 'î',
                                                'Ã¯' => 'ï',
                                                'Ã±' => 'ñ',
                                                'Ã³' => 'ó',
                                                'Ã²' => 'ò',
                                                'Ã´' => 'ô',
                                                'Ã¶' => 'ö',
                                                'Ãº' => 'ú',
                                                'Ã¹' => 'ù',
                                                'Ã»' => 'û',
                                                'Ã¼' => 'ü',
                                                'Å“' => 'œ',
                                                'Â' => '',
                                            ]);
                                        };

                                        $postTitle = $normalizeText($post->name);
                                        $defaultImageUrl = RvMedia::getDefaultImage(false, 'small');
                                        $hasImageFile = $post->image
                                            && \Illuminate\Support\Facades\Storage::disk('public')->exists($post->image);
                                        $imageUrl = $hasImageFile
                                            ? RvMedia::getImageUrl($post->image, null, false, $defaultImageUrl)
                                            : null;
                                    @endphp
                                    <div class="echo-hero-baner">
                                        <div class="echo-hero-banner-main-img img-transition-scale position-relative">
                                            <a href="{{ $post->url }}" class="d-block w-100">
                                                @if ($imageUrl)
                                                    <img
                                                        src="{{ $imageUrl }}"
                                                        alt="{{ $postTitle }}"
                                                        class="banner-image-one img-hover w-100"
                                                        loading="lazy"
                                                    >
                                                @else
                                                    <div class="catholic-latest-placeholder" aria-hidden="true">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none">
                                                            <path d="M4 18 9.2 12.8a2 2 0 0 1 2.8 0l1 1 3.2-3.2a2 2 0 0 1 2.8 0L20 12v6H4Z" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round"/>
                                                            <path d="M8.5 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3Z" stroke="currentColor" stroke-width="1.5"/>
                                                            <path d="M4 5.5A1.5 1.5 0 0 1 5.5 4h13A1.5 1.5 0 0 1 20 5.5v13A1.5 1.5 0 0 1 18.5 20h-13A1.5 1.5 0 0 1 4 18.5v-13Z" stroke="currentColor" stroke-width="1.5"/>
                                                        </svg>
                                                    </div>
                                                @endif
                                            </a>

                                            {!! Theme::partial('blog.post.partials.action-post', compact('post')) !!}
                                        </div>
                                        <div class="content">
                                            {!! Theme::partial('category-badge', compact('post')) !!}
                                            <div class="echo-hero-title font-weight-bold">
                                                <a href="{{ $post->url }}" title="{{ $postTitle }}" class="title-hover truncate-2-custom truncate-custom">{{ $postTitle }}</a>
                                            </div>

                                            {!! Theme::partial('post-meta', ['post' => $post, 'wrapperClass' => 'echo-hero-area-titlepost-post-like-comment-share']) !!}
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                @if ($sidebar)
                    <div class="col-xl-4 col-lg-5 col-md-12 sticky-coloum-item">
                        {!! dynamic_sidebar($sidebar) !!}
                    </div>
                @endif
            </div>
            <div class="button-area">
                <a href="{{ get_blog_page_url() }}" class="learn-more-btn">{{ __('View More') }}</a>
            </div>
        </div>
    </div>
</section>
