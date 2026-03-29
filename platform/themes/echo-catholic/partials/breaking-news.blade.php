@php
    $breakingPosts = \Botble\Blog\Models\Post::where('status', 'published')
        ->latest('created_at')
        ->take(8)
        ->get(['id', 'name']);
@endphp

@if ($breakingPosts->isNotEmpty())
<div class="catholic-breaking-bar" role="marquee" aria-label="{{ __('Latest news headlines') }}">
    <div class="container">
        <div class="catholic-breaking-inner">
            <span class="catholic-breaking-label" aria-hidden="true">
                <span class="breaking-dot"></span>{{ __('LATEST') }}
            </span>
            <div class="catholic-ticker-wrap">
                <div class="catholic-ticker-track">
                    @foreach ($breakingPosts as $post)
                        <a href="{{ $post->url }}" class="catholic-ticker-item">
                            {{ $post->name }}
                        </a>
                        <span class="catholic-ticker-sep" aria-hidden="true">&#8212;</span>
                    @endforeach
                    {{-- Duplicate for seamless loop --}}
                    @foreach ($breakingPosts as $post)
                        <a href="{{ $post->url }}" class="catholic-ticker-item" aria-hidden="true" tabindex="-1">
                            {{ $post->name }}
                        </a>
                        <span class="catholic-ticker-sep" aria-hidden="true">&#8212;</span>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endif
