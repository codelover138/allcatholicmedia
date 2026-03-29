@extends(BaseHelper::getAdminMasterLayoutTemplate())

@php
    $activeChannels = $channels->where('is_active', true)->count();
    $totalVideos = $channels->sum('videos_count');
@endphp

@section('content')
    <style>
        .yt-admin-shell .hero-card {
            overflow: hidden;
            border: 0;
            border-radius: 20px;
            box-shadow: 0 18px 48px rgba(15, 23, 42, 0.08);
        }

        .yt-admin-shell .hero-card .card-header {
            border-bottom: 0;
            background: linear-gradient(135deg, rgba(4, 107, 210, 0.94) 0%, rgba(15, 23, 42, 0.96) 100%);
            color: #fff;
            padding: 1.5rem 1.75rem 1rem;
        }

        .yt-admin-shell .hero-card .card-body,
        .yt-admin-shell .table-card .card-body {
            padding: 1.5rem 1.75rem 1.75rem;
        }

        .yt-stat-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 1rem;
            margin-bottom: 1.25rem;
        }

        .yt-stat {
            border: 1px solid rgba(148, 163, 184, 0.18);
            border-radius: 16px;
            padding: 1rem 1.1rem;
            background: linear-gradient(180deg, rgba(248, 250, 252, 0.96), rgba(241, 245, 249, 0.96));
        }

        .yt-stat-label {
            font-size: 0.78rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            color: #64748b;
            margin-bottom: 0.35rem;
        }

        .yt-stat-value {
            font-size: 1.7rem;
            font-weight: 700;
            color: #0f172a;
            line-height: 1;
        }

        .yt-hero-grid {
            display: grid;
            grid-template-columns: minmax(0, 1.3fr) minmax(300px, 0.9fr);
            gap: 1.25rem;
            align-items: start;
        }

        .yt-upload-box {
            border: 1px dashed #cbd5e1;
            border-radius: 16px;
            padding: 1rem;
            background: #f8fafc;
        }

        .yt-preview {
            position: relative;
            border-radius: 18px;
            overflow: hidden;
            min-height: 260px;
            border: 1px solid #dbe3ee;
            background: #0f172a;
        }

        .yt-preview img {
            width: 100%;
            height: 260px;
            object-fit: cover;
            display: block;
        }

        .yt-preview-copy {
            position: absolute;
            inset: auto 0 0 0;
            padding: 1rem 1.1rem;
            background: linear-gradient(180deg, rgba(15, 23, 42, 0) 0%, rgba(15, 23, 42, 0.84) 100%);
            color: #fff;
        }

        .yt-preview-copy strong {
            display: block;
            font-size: 1.1rem;
            margin-bottom: 0.2rem;
        }

        .yt-preview-copy span {
            font-size: 0.88rem;
            color: rgba(255, 255, 255, 0.82);
        }

        .yt-table-card {
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 18px 48px rgba(15, 23, 42, 0.08);
        }

        .yt-channel-cell {
            display: flex;
            align-items: center;
            gap: 0.9rem;
        }

        .yt-channel-logo {
            width: 48px;
            height: 48px;
            border-radius: 14px;
            object-fit: cover;
            background: #f1f5f9;
            border: 1px solid #e2e8f0;
        }

        .yt-actions {
            display: inline-flex;
            gap: 0.45rem;
            flex-wrap: wrap;
            justify-content: flex-end;
        }

        .yt-header-actions {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            flex-wrap: nowrap;
        }

        .yt-header-actions form {
            margin: 0;
        }

        @media (max-width: 991px) {
            .yt-stat-grid,
            .yt-hero-grid {
                grid-template-columns: 1fr;
            }

            .yt-header-actions {
                width: 100%;
                flex-wrap: wrap;
                justify-content: flex-start;
            }
        }
    </style>

    <div class="row yt-admin-shell">
        <div class="col-12 mb-3">
            <x-core::card class="hero-card">
                <x-core::card.header>
                    <x-core::card.title class="text-white">{{ __('plugins/watch-manager::watch.admin.hero_title') }}</x-core::card.title>
                </x-core::card.header>
                <x-core::card.body>
                    <div class="yt-stat-grid">
                        <div class="yt-stat">
                            <div class="yt-stat-label">{{ __('plugins/watch-manager::watch.admin.stats.total_channels') }}</div>
                            <div class="yt-stat-value">{{ number_format($channels->count()) }}</div>
                        </div>
                        <div class="yt-stat">
                            <div class="yt-stat-label">{{ __('plugins/watch-manager::watch.admin.stats.active_channels') }}</div>
                            <div class="yt-stat-value">{{ number_format($activeChannels) }}</div>
                        </div>
                        <div class="yt-stat">
                            <div class="yt-stat-label">{{ __('plugins/watch-manager::watch.admin.stats.synced_videos') }}</div>
                            <div class="yt-stat-value">{{ number_format($totalVideos) }}</div>
                        </div>
                    </div>

                    <form action="{{ route('admin.youtube-channels.hero-image') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="yt-hero-grid">
                            <div>
                                <div class="mb-3">
                                    <label class="form-label">{{ __('plugins/watch-manager::watch.admin.image_url') }}</label>
                                    <input
                                        type="text"
                                        name="watch_page_hero_image"
                                        class="form-control @error('watch_page_hero_image') is-invalid @enderror"
                                        value="{{ old('watch_page_hero_image', $heroImage) }}"
                                        placeholder="https://..."
                                    >
                                    @error('watch_page_hero_image')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                    <div class="form-hint">{{ __('plugins/watch-manager::watch.admin.image_url_hint') }}</div>
                                </div>

                                <div class="yt-upload-box mb-3">
                                    <label class="form-label">{{ __('plugins/watch-manager::watch.admin.upload_title') }}</label>
                                    <input
                                        type="file"
                                        name="watch_page_hero_image_file"
                                        class="form-control @error('watch_page_hero_image_file') is-invalid @enderror"
                                        accept="image/*"
                                    >
                                    @error('watch_page_hero_image_file')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                                    <div class="form-hint">{{ __('plugins/watch-manager::watch.admin.upload_hint') }}</div>
                                </div>

                                <x-core::button type="submit" color="primary">
                                    {{ __('plugins/watch-manager::watch.admin.update_background') }}
                                </x-core::button>
                            </div>

                            <div>
                                <div class="small text-secondary mb-2">{{ __('plugins/watch-manager::watch.admin.preview') }}</div>
                                <div class="yt-preview">
                                    @if ($heroImage)
                                        <img src="{{ $heroImage }}" alt="{{ __('plugins/watch-manager::watch.admin.hero_title') }}">
                                    @endif
                                    <div class="yt-preview-copy">
                                        <strong>{{ __('plugins/watch-manager::watch.frontend.title') }}</strong>
                                        <span>{{ __('plugins/watch-manager::watch.admin.preview_note') }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </x-core::card.body>
            </x-core::card>
        </div>

        <div class="col-12">
            <x-core::card class="yt-table-card">
                <x-core::card.header>
                    <x-core::card.title>{{ __('plugins/watch-manager::watch.admin.channels_title') }}</x-core::card.title>
                    <x-core::card.actions class="yt-header-actions">
                        <form action="{{ route('admin.youtube-channels.sync-all') }}" method="POST">
                            @csrf
                            <x-core::button type="submit" color="warning">
                                {{ __('plugins/watch-manager::watch.admin.sync_all') }}
                            </x-core::button>
                        </form>
                        <a href="{{ route('admin.youtube-channels.create') }}" class="btn btn-primary">
                            {{ __('plugins/watch-manager::watch.admin.add_channel') }}
                        </a>
                    </x-core::card.actions>
                </x-core::card.header>

                <div class="table-responsive">
                    <table class="table table-hover card-table align-middle">
                        <thead>
                            <tr>
                                <th>{{ __('plugins/watch-manager::watch.admin.table.channel') }}</th>
                                <th>{{ __('plugins/watch-manager::watch.admin.table.handle_or_id') }}</th>
                                <th>{{ __('plugins/watch-manager::watch.admin.table.videos') }}</th>
                                <th>{{ __('plugins/watch-manager::watch.admin.table.status') }}</th>
                                <th>{{ __('plugins/watch-manager::watch.admin.table.last_sync') }}</th>
                                <th class="text-end">{{ __('plugins/watch-manager::watch.admin.table.actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($channels as $channel)
                                <tr>
                                    <td>
                                        <div class="yt-channel-cell">
                                            @if ($channel->thumbnail)
                                                <img src="{{ $channel->thumbnail }}" alt="{{ $channel->name }}" class="yt-channel-logo">
                                            @else
                                                <div class="d-flex align-items-center justify-content-center yt-channel-logo">YT</div>
                                            @endif
                                            <div>
                                                <div class="fw-semibold">{{ $channel->name }}</div>
                                                <div class="text-secondary small">{{ $channel->slug }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div>{{ $channel->youtube_handle ?: __('plugins/watch-manager::watch.admin.table.not_available') }}</div>
                                        <div class="text-secondary small">{{ $channel->youtube_channel_id ?: __('plugins/watch-manager::watch.admin.table.not_available') }}</div>
                                    </td>
                                    <td>{{ number_format($channel->videos_count) }}</td>
                                    <td>
                                        <x-core::badge :color="$channel->is_active ? 'success' : 'secondary'">
                                            {{ $channel->is_active ? __('plugins/watch-manager::watch.admin.table.active') : __('plugins/watch-manager::watch.admin.table.inactive') }}
                                        </x-core::badge>
                                    </td>
                                    <td>{{ $channel->last_synced_at?->format('M j, Y H:i') ?: __('plugins/watch-manager::watch.admin.table.not_available') }}</td>
                                    <td class="text-end">
                                        <div class="yt-actions">
                                            <form action="{{ route('admin.youtube-channels.sync', $channel) }}" method="POST">
                                                @csrf
                                                <x-core::button type="submit" size="sm" color="warning">
                                                    {{ __('plugins/watch-manager::watch.admin.actions.sync') }}
                                                </x-core::button>
                                            </form>
                                            <a href="{{ route('admin.youtube-channels.edit', $channel) }}" class="btn btn-sm btn-secondary">
                                                {{ __('plugins/watch-manager::watch.admin.actions.edit') }}
                                            </a>
                                            <form action="{{ route('admin.youtube-channels.destroy', $channel) }}" method="POST" onsubmit="return confirm('{{ __('plugins/watch-manager::watch.admin.actions.delete_confirm') }}');">
                                                @csrf
                                                @method('DELETE')
                                                <x-core::button type="submit" size="sm" color="danger">
                                                    {{ __('plugins/watch-manager::watch.admin.actions.delete') }}
                                                </x-core::button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center text-secondary py-5">
                                        {{ __('plugins/watch-manager::watch.admin.table.empty') }}
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
