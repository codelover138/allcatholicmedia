@php
    $post     = $post ?? null;
    $category = $category ?? ($post ? $post->firstCategory : null);
@endphp

@if ($category)
    <a title="{{ $category->name }}" href="{{ $category->url }}" class="catholic-category-badge-link">
        <span class="catholic-category-badge content-catagory-tag">{{ $category->name }}</span>
    </a>
@endif
