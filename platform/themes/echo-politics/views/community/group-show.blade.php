@php
    Theme::set('pageTitle', $group->name);
    Theme::layout('full-width');
    SeoHelper::setTitle($group->name . ' | AllCatholicMedia');
@endphp

@push('header')
<style>
.acm-group-hero{position:relative;height:200px;background:linear-gradient(135deg,#046bd2,#0ea5e9);overflow:hidden}
.acm-group-hero img{width:100%;height:100%;object-fit:cover}
.acm-group-hero-overlay{position:absolute;inset:0;background:rgba(0,0,0,.4);display:flex;align-items:flex-end;padding:20px 24px}
.acm-group-info{color:#fff}
.acm-group-h1{font-size:1.6rem;font-weight:700;margin:0 0 4px}
.acm-group-stats{font-size:.85rem;opacity:.85;display:flex;align-items:center;gap:16px}
.acm-group-actions{margin-top:12px;display:flex;gap:10px;align-items:center}
.acm-join-btn{background:#046bd2;color:#fff;border:none;border-radius:6px;padding:8px 20px;font-size:.9rem;font-weight:600;cursor:pointer;transition:background .2s}
.acm-join-btn:hover,.acm-join-btn.joined{background:#045cb4}
.acm-leave-btn{background:none;border:1px solid rgba(255,255,255,.5);color:#fff;border-radius:6px;padding:8px 16px;font-size:.85rem;cursor:pointer}
.acm-members-grid{display:flex;flex-wrap:wrap;gap:12px;margin-top:8px}
.acm-member-chip{display:flex;align-items:center;gap:8px;background:var(--bg-card,#fff);border:1px solid var(--border-color,#e2e8f0);border-radius:8px;padding:8px 12px}
.acm-member-chip img{width:32px;height:32px;border-radius:50%;object-fit:cover}
.acm-member-chip span{font-size:.85rem;font-weight:500;color:var(--color-heading-1,#1e293b)}
.acm-section-card{background:var(--bg-card,#fff);border:1px solid var(--border-color,#e2e8f0);border-radius:10px;padding:20px 24px;margin-bottom:20px}
.acm-section-title{font-size:1rem;font-weight:700;color:var(--color-heading-1,#1e293b);margin:0 0 14px}
html[data-theme='dark'] .acm-section-card,.acm-member-chip{background:#1a1d2e;border-color:rgba(255,255,255,.08)}
html[data-theme='dark'] .acm-member-chip span,.acm-section-title{color:#f1f5f9}
</style>
@endpush

{{-- Hero --}}
<div class="acm-group-hero">
    @if($group->cover_image)
        <img src="{{ RvMedia::url($group->cover_image) }}" alt="{{ $group->name }}">
    @endif
    <div class="acm-group-hero-overlay">
        <div class="acm-group-info">
            <h1 class="acm-group-h1">{{ $group->name }}</h1>
            <div class="acm-group-stats">
                <span>{{ $group->members_count }} {{ __('members') }}</span>
                <span>{{ ucfirst($group->privacy) }}</span>
            </div>
        </div>
    </div>
</div>

<div class="container" style="padding:24px 0 60px">
    <div class="row g-4">
        <div class="col-lg-8">

            {{-- About --}}
            @if($group->description)
            <div class="acm-section-card">
                <h2 class="acm-section-title">{{ __('About') }}</h2>
                <p style="color:var(--color-body,#475569);margin:0">{{ $group->description }}</p>
            </div>
            @endif

            {{-- Join/Leave --}}
            @if($member)
                <div class="acm-group-actions" style="margin-bottom:20px">
                    @if($isMember)
                        @if(!$isAdmin)
                            <button class="acm-leave-btn js-leave-btn" data-slug="{{ $group->slug }}"
                                    style="background:#dc2626;border-color:#dc2626">
                                {{ __('Leave Group') }}
                            </button>
                        @else
                            <span style="font-size:.85rem;color:#046bd2;font-weight:600">
                                ✓ {{ __('You are an admin of this group') }}
                            </span>
                        @endif
                    @else
                        <button class="acm-join-btn js-join-btn" data-slug="{{ $group->slug }}">
                            {{ __('Join Group') }}
                        </button>
                    @endif
                </div>
            @endif

        </div>

        <div class="col-lg-4">
            {{-- Members --}}
            <div class="acm-section-card">
                <h2 class="acm-section-title">
                    {{ __('Members') }} ({{ $group->members_count }})
                </h2>
                <div class="acm-members-grid">
                    @foreach($members as $m)
                        <div class="acm-member-chip">
                            <img src="{{ $m->avatar_url }}" alt="{{ $m->name }}">
                            <span>{{ $m->name }}</span>
                        </div>
                    @endforeach
                </div>
                @if($group->members_count > 24)
                    <p style="font-size:.8rem;color:#94a3b8;margin:10px 0 0">{{ __('and :count more...', ['count' => $group->members_count - 24]) }}</p>
                @endif
            </div>
        </div>
    </div>
</div>

@push('footer')
<script>
(function () {
    var CSRF = document.querySelector('meta[name="csrf-token"]')?.content || '';

    document.querySelector('.js-join-btn')?.addEventListener('click', function () {
        fetch('{{ url("ajax/groups/".$group->slug."/join") }}', {
            method: 'POST', headers: { 'X-CSRF-TOKEN': CSRF, 'Accept': 'application/json' },
        }).then(function () { window.location.reload(); });
    });

    document.querySelector('.js-leave-btn')?.addEventListener('click', function () {
        if (!confirm('{{ __("Leave this group?") }}')) return;
        fetch('{{ url("ajax/groups/".$group->slug."/leave") }}', {
            method: 'POST', headers: { 'X-CSRF-TOKEN': CSRF, 'Accept': 'application/json' },
        }).then(function () { window.location.reload(); });
    });
}());
</script>
@endpush
