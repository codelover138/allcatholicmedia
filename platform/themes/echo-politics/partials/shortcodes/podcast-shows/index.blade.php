@php
    $localFallbackImages = [
        'catholic-answers-live' => asset('uploads/podcast-shows/podcast-thumb-20260329160538-aYR6Tn.png'),
        'word-on-fire-show' => asset('uploads/podcast-shows/podcast-thumb-20260329163000-Sm1cyL.png'),
        'vatican-podcast' => asset('uploads/podcast-shows/podcast-thumb-20260329162556-6ZnGQS.png'),
        'ascension-presents' => asset('uploads/podcast-shows/podcast-thumb-20260329162647-jLT6aI.png'),
        'ascension-presents-podcast' => asset('uploads/podcast-shows/podcast-thumb-20260329162647-jLT6aI.png'),
        'catholic-man-show' => asset('uploads/podcast-shows/podcast-thumb-20260329163234-FrL05R.png'),
        'ewtn-catholicism-in-focus' => asset('uploads/podcast-shows/podcast-thumb-20260329163324-JEsuBc.png'),
    ];
@endphp

<section class="catholic-grid-section catholic-listen-page-section">
    <div class="container">
        <div class="catholic-section-header catholic-listen-grid-header">
            <h2 class="catholic-section-title">{{ $title }}</h2>
            <a href="{{ route('public.listen') }}" class="catholic-view-all">
                {{ __('View All') }}
                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
            </a>
        </div>

        <div class="row g-4 mt-1">
            @foreach ($shows as $show)
                @php
                    $fallbackImage = $localFallbackImages[$show->slug] ?? asset('uploads/podcast-shows/podcast-thumb-20260329160538-aYR6Tn.png');
                    $image = $show->thumbnail ?: $show->banner ?: $fallbackImage;
                @endphp
                <div class="col-xl-3 col-lg-6 col-md-6 col-12">
                    <a href="{{ route('public.listen.show', $show->slug) }}" class="catholic-listen-grid-card">
                        <div class="catholic-listen-grid-media" style="position:relative;overflow:hidden;background:#0e0e0e;">
                            <img
                                src="{{ $image }}"
                                alt="{{ $show->name }}"
                                class="catholic-listen-grid-image"
                                loading="lazy"
                                style="display:block;width:100%;aspect-ratio:1.18 / 1;object-fit:cover;background:linear-gradient(135deg,#0d1b0e,#1a3320);"
                                onerror="if(this.dataset.fallbackApplied==='true'){this.style.display='none';this.nextElementSibling.style.display='flex';this.onerror=null;return;}this.dataset.fallbackApplied='true';this.src='{{ $fallbackImage }}';"
                            >
                            <div class="catholic-listen-grid-placeholder" style="position:absolute;inset:0;background:linear-gradient(135deg,#1a1a1a 0%,#313131 100%);display:none;align-items:center;justify-content:center;color:rgba(255,255,255,.18);font-size:2.5rem;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1"><path d="M9 18V5l12-2v13"/><circle cx="6" cy="18" r="3"/><circle cx="18" cy="16" r="3"/></svg>
                            </div>
                            <span class="catholic-listen-grid-play" aria-hidden="true" style="position:absolute;right:12px;bottom:12px;width:58px;height:58px;border-radius:50%;background:rgba(255,255,255,.96);color:#000;display:inline-flex;align-items:center;justify-content:center;box-shadow:0 10px 24px rgba(0,0,0,.32);">
                                <svg viewBox="0 0 24 24" fill="currentColor" width="28" height="28" style="display:block;margin-left:2px;"><path d="M8 6.75v10.5L17 12 8 6.75Z"/></svg>
                            </span>
                        </div>
                        <div class="catholic-listen-grid-body">
                            <h3 class="catholic-listen-grid-title">{{ $show->name }}</h3>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>
