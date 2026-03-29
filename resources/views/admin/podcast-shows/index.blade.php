@extends(BaseHelper::getAdminMasterLayoutTemplate())

@php
    $activeShows = $shows->where('is_active', true)->count();
    $totalEpisodes = $shows->sum('episodes_count');
@endphp

@section('content')
    <style>
        .pod-admin-shell .hero-card {
            overflow: hidden;
            border: 0;
            border-radius: 20px;
            box-shadow: 0 18px 48px rgba(15, 23, 42, 0.08);
        }

        .pod-admin-shell .hero-card .card-header {
            border-bottom: 0;
            background: linear-gradient(135deg, rgba(28, 98, 43, 0.96) 0%, rgba(15, 23, 42, 0.96) 100%);
            color: #fff;
            padding: 1.5rem 1.75rem 1rem;
        }

        .pod-admin-shell .hero-card .card-body,
        .pod-admin-shell .table-card .card-body {
            padding: 1.5rem 1.75rem 1.75rem;
        }

        .pod-stat-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 1rem;
            margin-bottom: 1.25rem;
        }

        .pod-stat {
            border: 1px solid rgba(148, 163, 184, 0.18);
            border-radius: 16px;
            padding: 1rem 1.1rem;
            background: linear-gradient(180deg, rgba(248, 250, 252, 0.96), rgba(241, 245, 249, 0.96));
        }

        .pod-stat-label {
            font-size: 0.78rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            color: #64748b;
            margin-bottom: 0.35rem;
        }

        .pod-stat-value {
            font-size: 1.7rem;
            font-weight: 700;
            color: #0f172a;
            line-height: 1;
        }

        .pod-hero-grid {
            display: grid;
            grid-template-columns: minmax(0, 1.3fr) minmax(300px, 0.9fr);
            gap: 1.25rem;
            align-items: start;
        }

        .pod-upload-box {
            border: 1px dashed #cbd5e1;
            border-radius: 16px;
            padding: 1rem;
            background: #f8fafc;
        }

        .pod-preview {
            position: relative;
            border-radius: 18px;
            overflow: hidden;
            min-height: 260px;
            border: 1px solid #dbe3ee;
            background: #0f172a;
        }

        .pod-preview img {
            width: 100%;
            height: 260px;
            object-fit: cover;
            display: block;
        }

        .pod-preview-copy {
            position: absolute;
            inset: auto 0 0 0;
            padding: 1rem 1.1rem;
            background: linear-gradient(180deg, rgba(15, 23, 42, 0) 0%, rgba(15, 23, 42, 0.84) 100%);
            color: #fff;
        }

        .pod-preview-copy strong {
            display: block;
            font-size: 1.1rem;
            margin-bottom: 0.2rem;
        }

        .pod-preview-copy span {
            font-size: 0.88rem;
            color: rgba(255, 255, 255, 0.82);
        }

        .pod-table-card {
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 18px 48px rgba(15, 23, 42, 0.08);
        }

        .pod-show-cell {
            display: flex;
            align-items: center;
            gap: 0.9rem;
        }

        .pod-show-logo {
            width: 48px;
            height: 48px;
            border-radius: 14px;
            object-fit: cover;
            background: #f1f5f9;
            border: 1px solid #e2e8f0;
        }

        .pod-show-logo-placeholder {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 48px;
            height: 48px;
            border-radius: 14px;
            background: linear-gradient(135deg, #1a3320, #2d5a3d);
            color: #f6d365;
            font-size: 1.15rem;
            border: 1px solid #e2e8f0;
        }

        .pod-actions {
            display: inline-flex;
            gap: 0.45rem;
            flex-wrap: wrap;
            justify-content: flex-end;
        }

        .pod-header-actions {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            flex-wrap: nowrap;
        }

        @media (max-width: 991px) {
            .pod-stat-grid,
            .pod-hero-grid {
                grid-template-columns: 1fr;
            }

            .pod-header-actions {
                width: 100%;
                flex-wrap: wrap;
                justify-content: flex-start;
            }
        }
    </style>

    <div class="row pod-admin-shell">
        <div class="col-12 mb-3">
            <x-core::card class="hero-card">
                <x-core::card.header>
                    <x-core::card.title class="text-white">{{ __('Listen Page Hero Background') }}</x-core::card.title>
                </x-core::card.header>
                <x-core::card.body>
                    <div class="pod-stat-grid">
                        <div class="pod-stat">
                            <div class="pod-stat-label">{{ __('Total Shows') }}</div>
                            <div class="pod-stat-value">{{ number_format($shows->count()) }}</div>
                        </div>
                        <div class="pod-stat">
                            <div class="pod-stat-label">{{ __('Active Shows') }}</div>
                            <div class="pod-stat-value">{{ number_format($activeShows) }}</div>
                        </div>
                        <div class="pod-stat">
                            <div class="pod-stat-label">{{ __('Total Episodes') }}</div>
                            <div class="pod-stat-value">{{ number_format($totalEpisodes) }}</div>
                        </div>
                    </div>

                    <form action="{{ route('admin.podcast-shows.hero-image') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="pod-hero-grid">
                            <div>
                                <div class="mb-3">
                                    <label class="form-label">{{ __('Image URL') }}</label>
                                    <input
                                        type="text"
                                        name="listen_page_hero_image"
                                        class="form-control @error('listen_page_hero_image') is-invalid @enderror"
                                        value="{{ old('listen_page_hero_image', $heroImage) }}"
                                        placeholder="https://..."
                                    >
                                    @error('listen_page_hero_image')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                    <div class="form-hint">{{ __('Paste a direct image URL if you already have one.') }}</div>
                                </div>

                                <div class="pod-upload-box mb-3">
                                    <label class="form-label">{{ __('Or Upload New Background Image') }}</label>
                                    <input
                                        type="file"
                                        name="listen_page_hero_image_file"
                                        class="form-control @error('listen_page_hero_image_file') is-invalid @enderror"
                                        accept="image/*"
                                    >
                                    @error('listen_page_hero_image_file')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                                    <div class="form-hint">{{ __('Recommended: wide image, JPG/PNG, max 5MB.') }}</div>
                                </div>

                                <x-core::button type="submit" color="primary">
                                    {{ __('Update Background') }}
                                </x-core::button>
                            </div>

                            <div>
                                <div class="small text-secondary mb-2">{{ __('Current preview') }}</div>
                                <div class="pod-preview">
                                    @if ($heroImage)
                                        <img src="{{ $heroImage }}" alt="{{ __('Listen Page Hero Background') }}">
                                    @endif
                                    <div class="pod-preview-copy">
                                        <strong>{{ __('Listen By Show') }}</strong>
                                        <span>{{ __('This image appears on the /listen hero section.') }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </x-core::card.body>
            </x-core::card>
        </div>

        <div class="col-12">
            <x-core::card class="pod-table-card">
                <x-core::card.header>
                    <x-core::card.title>{{ __('Podcast Shows') }}</x-core::card.title>
                    <x-core::card.actions class="pod-header-actions">
                        <a href="{{ route('admin.podcast-shows.create') }}" class="btn btn-primary">
                            {{ __('Add Show') }}
                        </a>
                    </x-core::card.actions>
                </x-core::card.header>

                <div class="table-responsive">
                    <table class="table table-hover card-table align-middle">
                        <thead>
                            <tr>
                                <th>{{ __('Show') }}</th>
                                <th>{{ __('Category') }}</th>
                                <th>{{ __('Episodes') }}</th>
                                <th>{{ __('Status') }}</th>
                                <th class="text-end">{{ __('Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($shows as $show)
                                <tr>
                                    <td>
                                        <div class="pod-show-cell">
                                            @if ($show->thumbnail)
                                                <img src="{{ $show->thumbnail }}" alt="{{ $show->name }}" class="pod-show-logo">
                                            @else
                                                <div class="pod-show-logo-placeholder">P</div>
                                            @endif
                                            <div>
                                                <div class="fw-semibold">{{ $show->name }}</div>
                                                <div class="text-secondary small">{{ $show->slug }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $show->category ?: 'N/A' }}</td>
                                    <td>{{ number_format($show->episodes_count) }}</td>
                                    <td>
                                        <x-core::badge :color="$show->is_active ? 'success' : 'secondary'">
                                            {{ $show->is_active ? __('Active') : __('Inactive') }}
                                        </x-core::badge>
                                    </td>
                                    <td class="text-end">
                                        <div class="pod-actions">
                                            <a href="{{ route('admin.podcast-shows.episodes.create', $show) }}" class="btn btn-sm btn-info">
                                                {{ __('+ Episode') }}
                                            </a>
                                            <a href="{{ route('admin.podcast-shows.edit', $show) }}" class="btn btn-sm btn-secondary">
                                                {{ __('Edit') }}
                                            </a>
                                            <form action="{{ route('admin.podcast-shows.destroy', $show) }}" method="POST" onsubmit="return confirm('{{ __('Delete this show and all its episodes?') }}');">
                                                @csrf
                                                @method('DELETE')
                                                <x-core::button type="submit" size="sm" color="danger">
                                                    {{ __('Delete') }}
                                                </x-core::button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center text-secondary py-5">
                                        {{ __('No podcast shows yet. Add one to get started.') }}
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </x-core::card>
        </div>
    </div>
@endsection
