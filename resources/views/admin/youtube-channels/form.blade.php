@extends(BaseHelper::getAdminMasterLayoutTemplate())

@section('content')
    <div class="row justify-content-center">
        <div class="col-xl-8">
            <x-core::card>
                <x-core::card.header>
                    <x-core::card.title>{{ $title }}</x-core::card.title>
                </x-core::card.header>
                <x-core::card.body>
                    <form method="POST" action="{{ $channel->exists ? route('admin.youtube-channels.update', $channel) : route('admin.youtube-channels.store') }}">
                        @csrf
                        @if ($channel->exists)
                            @method('PUT')
                        @endif

                        <div class="mb-3">
                            <label class="form-label">{{ __('plugins/watch-manager::watch.admin.form.channel_name') }}</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $channel->name) }}" required>
                            @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">{{ __('plugins/watch-manager::watch.admin.form.slug') }}</label>
                            <input type="text" name="slug" class="form-control @error('slug') is-invalid @enderror" value="{{ old('slug', $channel->slug) }}" required>
                            @error('slug')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">{{ __('plugins/watch-manager::watch.admin.form.youtube_handle') }}</label>
                                <input type="text" name="youtube_handle" class="form-control @error('youtube_handle') is-invalid @enderror" value="{{ old('youtube_handle', $channel->youtube_handle) }}" placeholder="@CatholicTV">
                                @error('youtube_handle')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">{{ __('plugins/watch-manager::watch.admin.form.youtube_channel_id') }}</label>
                                <input type="text" name="youtube_channel_id" class="form-control @error('youtube_channel_id') is-invalid @enderror" value="{{ old('youtube_channel_id', $channel->youtube_channel_id) }}" placeholder="UC...">
                                @error('youtube_channel_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">{{ __('plugins/watch-manager::watch.admin.form.description') }}</label>
                            <textarea name="description" rows="4" class="form-control @error('description') is-invalid @enderror">{{ old('description', $channel->description) }}</textarea>
                            @error('description')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label class="form-label">{{ __('plugins/watch-manager::watch.admin.form.sort_order') }}</label>
                                <input type="number" name="sort_order" min="0" class="form-control @error('sort_order') is-invalid @enderror" value="{{ old('sort_order', $channel->sort_order ?? 0) }}">
                                @error('sort_order')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-8 mb-3 d-flex align-items-end">
                                <label class="form-check">
                                    <input type="checkbox" name="is_active" value="1" class="form-check-input" @checked(old('is_active', $channel->is_active ?? true))>
                                    <span class="form-check-label">{{ __('plugins/watch-manager::watch.admin.form.active_channel') }}</span>
                                </label>
                            </div>
                        </div>

                        <div class="d-flex gap-2">
                            <x-core::button type="submit" color="primary">
                                {{ $channel->exists ? __('plugins/watch-manager::watch.admin.form.update_channel') : __('plugins/watch-manager::watch.admin.form.create_channel') }}
                            </x-core::button>
                            <a href="{{ route('admin.youtube-channels.index') }}" class="btn btn-secondary">
                                {{ __('plugins/watch-manager::watch.admin.actions.back') }}
                            </a>
                        </div>
                    </form>
                </x-core::card.body>
            </x-core::card>
        </div>
    </div>
@endsection
