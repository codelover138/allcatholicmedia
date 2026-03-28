@php
    Theme::set('pageTitle', __('Catholic Groups'));
    Theme::layout('full-width');
    SeoHelper::setTitle('Catholic Groups | AllCatholicMedia');
@endphp

@push('header')
<style>
.acm-page-hero{background:linear-gradient(135deg,#0f172a,#1e293b);padding:36px 0 28px;margin-bottom:32px;text-align:center}
.acm-page-title{font-size:1.8rem;font-weight:700;color:#f8fafc;margin:0 0 6px}
.acm-page-sub{color:#94a3b8;font-size:.95rem}
.acm-groups-toolbar{display:flex;align-items:center;gap:12px;margin-bottom:24px;flex-wrap:wrap}
.acm-search-input{flex:1;min-width:200px;border:1px solid var(--border-color,#e2e8f0);border-radius:6px;padding:8px 14px;font-size:.9rem;background:var(--bg-card,#fff);color:var(--color-heading-1,#1e293b);outline:none}
.acm-search-input:focus{border-color:#046bd2}
.acm-sort-select{border:1px solid var(--border-color,#e2e8f0);border-radius:6px;padding:8px 12px;font-size:.9rem;background:var(--bg-card,#fff);color:var(--color-heading-1,#1e293b)}
.acm-create-group-btn{background:#046bd2;color:#fff;border:none;border-radius:6px;padding:8px 18px;font-size:.9rem;font-weight:600;cursor:pointer;white-space:nowrap}
.acm-create-group-btn:hover{background:#045cb4}
.acm-group-card{background:var(--bg-card,#fff);border:1px solid var(--border-color,#e2e8f0);border-radius:10px;overflow:hidden;height:100%;transition:box-shadow .2s,transform .2s;display:flex;flex-direction:column}
.acm-group-card:hover{box-shadow:0 6px 20px rgba(0,0,0,.1);transform:translateY(-2px)}
.acm-group-cover{height:100px;background:linear-gradient(135deg,#046bd2,#0ea5e9);overflow:hidden;position:relative}
.acm-group-cover img{width:100%;height:100%;object-fit:cover}
.acm-group-privacy{position:absolute;top:8px;right:8px;background:rgba(0,0,0,.5);color:#fff;font-size:.68rem;font-weight:600;padding:2px 7px;border-radius:10px;text-transform:uppercase;letter-spacing:.04em}
.acm-group-body{padding:14px 16px;flex:1;display:flex;flex-direction:column}
.acm-group-name{font-size:1rem;font-weight:700;color:var(--color-heading-1,#1e293b);margin-bottom:6px}
.acm-group-name a{color:inherit;text-decoration:none}
.acm-group-name a:hover{color:#046bd2}
.acm-group-desc{font-size:.82rem;color:var(--color-body,#475569);flex:1;display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden;margin-bottom:10px}
.acm-group-meta{font-size:.78rem;color:#94a3b8;display:flex;align-items:center;gap:8px}
.acm-group-join-btn{margin-top:10px;border:1px solid #046bd2;color:#046bd2;background:none;border-radius:5px;padding:5px 14px;font-size:.82rem;font-weight:600;cursor:pointer;transition:background .2s,color .2s;width:100%}
.acm-group-join-btn:hover,.acm-group-join-btn.joined{background:#046bd2;color:#fff}
.acm-empty{text-align:center;padding:48px;background:var(--bg-card,#fff);border:1px solid var(--border-color,#e2e8f0);border-radius:10px;color:var(--color-body,#475569)}

/* Create Group Modal */
.acm-modal-backdrop{display:none;position:fixed;inset:0;background:rgba(0,0,0,.5);z-index:1000;align-items:center;justify-content:center}
.acm-modal-backdrop.open{display:flex}
.acm-modal{background:var(--bg-card,#fff);border-radius:12px;padding:24px;width:100%;max-width:480px;margin:16px}
.acm-modal h3{font-size:1.1rem;font-weight:700;margin:0 0 16px}
.acm-modal-field{margin-bottom:14px}
.acm-modal-field label{display:block;font-size:.85rem;font-weight:600;color:var(--color-heading-1,#1e293b);margin-bottom:5px}
.acm-modal-field input,.acm-modal-field textarea,.acm-modal-field select{width:100%;border:1px solid var(--border-color,#e2e8f0);border-radius:6px;padding:8px 12px;font-size:.9rem;background:var(--bg-card,#fff);color:var(--color-heading-1,#1e293b)}
.acm-modal-field textarea{rows:3;resize:vertical}
.acm-modal-actions{display:flex;gap:10px;justify-content:flex-end;margin-top:16px}
.acm-modal-cancel{background:none;border:1px solid var(--border-color,#e2e8f0);border-radius:6px;padding:8px 18px;cursor:pointer;font-size:.9rem}
.acm-modal-submit{background:#046bd2;color:#fff;border:none;border-radius:6px;padding:8px 18px;cursor:pointer;font-size:.9rem;font-weight:600}

html[data-theme='dark'] .acm-group-card,.acm-empty{background:#1a1d2e;border-color:rgba(255,255,255,.08)}
html[data-theme='dark'] .acm-group-name{color:#f1f5f9}
html[data-theme='dark'] .acm-modal,.acm-modal-field input,.acm-modal-field textarea,.acm-modal-field select{background:#1a1d2e}
</style>
@endpush

<section class="acm-page-hero">
    <div class="container">
        <h1 class="acm-page-title">{{ __('Catholic Groups') }}</h1>
        <p class="acm-page-sub">{{ __('Join prayer groups, parish communities, and faith-based fellowships.') }}</p>
    </div>
</section>

<div class="container" style="padding-bottom:60px">

    <form method="GET" action="{{ route('public.community.groups') }}" class="acm-groups-toolbar">
        <input type="text" name="q" class="acm-search-input" value="{{ $search }}" placeholder="{{ __('Search groups...') }}">
        <select name="sort" class="acm-sort-select" onchange="this.form.submit()">
            <option value="newest"  @selected($sort==='newest')>{{ __('Newest') }}</option>
            <option value="members" @selected($sort==='members')>{{ __('Most Members') }}</option>
        </select>
        @if($member)
            <button type="button" class="acm-create-group-btn" id="acm-create-group-open">
                + {{ __('Create Group') }}
            </button>
        @endif
    </form>

    @if($groups->count())
        <div class="row g-3">
            @foreach($groups as $group)
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="acm-group-card">
                        <div class="acm-group-cover">
                            @if($group->cover_image)
                                <img src="{{ RvMedia::url($group->cover_image) }}" alt="{{ $group->name }}">
                            @endif
                            <span class="acm-group-privacy">{{ $group->privacy }}</span>
                        </div>
                        <div class="acm-group-body">
                            <div class="acm-group-name">
                                <a href="{{ route('public.community.groups.show', $group->slug) }}">{{ $group->name }}</a>
                            </div>
                            <div class="acm-group-desc">{{ $group->description }}</div>
                            <div class="acm-group-meta">
                                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                                {{ $group->members_count }} {{ __('members') }}
                            </div>
                            @if($member)
                                @php $joined = $group->isMember($member); @endphp
                                <button class="acm-group-join-btn js-join-btn {{ $joined ? 'joined' : '' }}"
                                        data-slug="{{ $group->slug }}"
                                        data-joined="{{ $joined ? '1' : '0' }}">
                                    {{ $joined ? __('Joined') : __('Join Group') }}
                                </button>
                            @else
                                <a href="{{ route('public.member.login') }}" class="acm-group-join-btn" style="display:block;text-align:center;text-decoration:none">
                                    {{ __('Join Group') }}
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        @if($groups->hasPages())
            <div style="margin-top:28px">
                {!! $groups->links(Theme::getThemeNamespace('partials.pagination')) !!}
            </div>
        @endif
    @else
        <div class="acm-empty"><p>{{ __('No groups found. Be the first to create one!') }}</p></div>
    @endif
</div>

{{-- Create Group Modal --}}
@if($member)
<div class="acm-modal-backdrop" id="acm-group-modal">
    <div class="acm-modal">
        <h3>{{ __('Create a Group') }}</h3>
        <div class="acm-modal-field">
            <label>{{ __('Group Name') }} *</label>
            <input type="text" id="acm-group-name" maxlength="255" placeholder="{{ __('e.g. Daily Rosary Circle') }}">
        </div>
        <div class="acm-modal-field">
            <label>{{ __('Description') }}</label>
            <textarea id="acm-group-desc" rows="3" placeholder="{{ __('What is this group about?') }}"></textarea>
        </div>
        <div class="acm-modal-field">
            <label>{{ __('Privacy') }}</label>
            <select id="acm-group-privacy">
                <option value="public">{{ __('Public — anyone can join') }}</option>
                <option value="private">{{ __('Private — invite only') }}</option>
            </select>
        </div>
        <div class="acm-modal-actions">
            <button class="acm-modal-cancel" id="acm-group-modal-close">{{ __('Cancel') }}</button>
            <button class="acm-modal-submit" id="acm-group-modal-submit">{{ __('Create Group') }}</button>
        </div>
    </div>
</div>
@endif

@push('footer')
<script>
(function () {
    'use strict';
    var CSRF = document.querySelector('meta[name="csrf-token"]')?.content || '';

    // ── Join / Leave ────────────────────────────────────────────────────
    document.querySelectorAll('.js-join-btn').forEach(function (btn) {
        btn.addEventListener('click', function () {
            var slug   = btn.dataset.slug;
            var joined = btn.dataset.joined === '1';
            var url    = '{{ url("ajax/groups") }}/' + slug + '/' + (joined ? 'leave' : 'join');

            fetch(url, { method: 'POST', headers: { 'X-CSRF-TOKEN': CSRF, 'Accept': 'application/json' } })
            .then(function (r) { return r.json(); })
            .then(function (d) {
                if (d.success) {
                    joined = !joined;
                    btn.dataset.joined = joined ? '1' : '0';
                    btn.textContent = joined ? '{{ __("Joined") }}' : '{{ __("Join Group") }}';
                    btn.classList.toggle('joined', joined);
                    var meta = btn.closest('.acm-group-body').querySelector('.acm-group-meta');
                    if (meta) meta.querySelector('span') && (meta.innerHTML = meta.innerHTML.replace(/\d+ {{ __("members") }}/, d.members_count + ' {{ __("members") }}'));
                }
            });
        });
    });

    // ── Create Group Modal ──────────────────────────────────────────────
    var modal = document.getElementById('acm-group-modal');
    document.getElementById('acm-create-group-open')?.addEventListener('click', function () {
        modal.classList.add('open');
    });
    document.getElementById('acm-group-modal-close')?.addEventListener('click', function () {
        modal.classList.remove('open');
    });
    modal?.addEventListener('click', function (e) { if (e.target === modal) modal.classList.remove('open'); });

    document.getElementById('acm-group-modal-submit')?.addEventListener('click', function () {
        var name    = document.getElementById('acm-group-name').value.trim();
        var desc    = document.getElementById('acm-group-desc').value.trim();
        var privacy = document.getElementById('acm-group-privacy').value;
        if (!name) { alert('{{ __("Group name is required.") }}'); return; }

        fetch('{{ route("public.community.groups.store") }}', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': CSRF, 'Accept': 'application/json' },
            body: JSON.stringify({ name: name, description: desc, privacy: privacy }),
        })
        .then(function (r) { return r.json(); })
        .then(function (d) {
            if (d.success && d.redirect) window.location = d.redirect;
        });
    });
}());
</script>
@endpush
