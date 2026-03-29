@extends(BaseHelper::getAdminMasterLayoutTemplate())

@section('content')
    <div class="row">
        <div class="{{ $show->exists ? 'col-xl-7' : 'col-xl-8 mx-auto' }}">
            <x-core::card>
                <x-core::card.header>
                    <x-core::card.title>{{ $title }}</x-core::card.title>
                </x-core::card.header>
                <x-core::card.body>
                    <form method="POST"
                          action="{{ $show->exists ? route('admin.podcast-shows.update', $show) : route('admin.podcast-shows.store') }}">
                        @csrf
                        @if ($show->exists) @method('PUT') @endif

                        <div class="mb-3">
                            <label class="form-label">{{ __('Show Name') }} <span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                   value="{{ old('name', $show->name) }}" required>
                            @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">{{ __('Slug') }} <span class="text-danger">*</span></label>
                            <input type="text" name="slug" class="form-control @error('slug') is-invalid @enderror"
                                   value="{{ old('slug', $show->slug) }}" required>
                            @error('slug')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">{{ __('Category') }}</label>
                                <input type="text" name="category" class="form-control"
                                       value="{{ old('category', $show->category) }}"
                                       placeholder="{{ __('e.g. Homilies, Devotional, News') }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">{{ __('Website URL') }}</label>
                                <input type="text" name="website_url" class="form-control"
                                       value="{{ old('website_url', $show->website_url) }}"
                                       placeholder="https://...">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">{{ __('Thumbnail URL') }}</label>
                            <input type="text" name="thumbnail" class="form-control"
                                   value="{{ old('thumbnail', $show->thumbnail) }}"
                                   placeholder="https://...">
                            <div class="form-text">{{ __('Square image (400×400 recommended)') }}</div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">{{ __('Banner URL') }}</label>
                            <input type="text" name="banner" class="form-control"
                                   value="{{ old('banner', $show->banner) }}"
                                   placeholder="https://...">
                            <div class="form-text">{{ __('Wide banner image (1200×300 recommended)') }}</div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">{{ __('Description') }}</label>
                            <textarea name="description" rows="4" class="form-control">{{ old('description', $show->description) }}</textarea>
                        </div>

                        <div class="row align-items-end mb-4">
                            <div class="col-md-4">
                                <label class="form-label">{{ __('Sort Order') }}</label>
                                <input type="number" name="sort_order" min="0" class="form-control"
                                       value="{{ old('sort_order', $show->sort_order ?? 0) }}">
                            </div>
                            <div class="col-md-8 d-flex align-items-end pb-1">
                                <label class="form-check mb-0">
                                    <input type="checkbox" name="is_active" value="1" class="form-check-input"
                                           @checked(old('is_active', $show->is_active ?? true))>
                                    <span class="form-check-label">{{ __('Active (visible on site)') }}</span>
                                </label>
                            </div>
                        </div>

                        <div class="d-flex gap-2">
                            <x-core::button type="submit" color="primary">
                                {{ $show->exists ? __('Update Show') : __('Create Show') }}
                            </x-core::button>
                            <a href="{{ route('admin.podcast-shows.index') }}" class="btn btn-secondary">
                                {{ __('Back') }}
                            </a>
                        </div>
                    </form>
                </x-core::card.body>
            </x-core::card>
        </div>

        @if ($show->exists)
            <div class="col-xl-5">
                <x-core::card>
                    <x-core::card.header>
                        <x-core::card.title>{{ __('Episodes') }} ({{ $episodes->count() }})</x-core::card.title>
                        <x-core::card.actions>
                            <a href="{{ route('admin.podcast-shows.episodes.create', $show) }}" class="btn btn-sm btn-primary">
                                {{ __('+ Add Episode') }}
                            </a>
                        </x-core::card.actions>
                    </x-core::card.header>
                    <div class="table-responsive" style="max-height:520px;overflow-y:auto;">
                        <table class="table table-sm table-hover card-table align-middle mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ __('Title') }}</th>
                                    <th>{{ __('Type') }}</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($episodes as $ep)
                                    <tr>
                                        <td class="text-secondary small">{{ $ep->episode_number ?: '—' }}</td>
                                        <td>
                                            <div class="fw-semibold small">{{ Str::limit($ep->title, 40) }}</div>
                                            @if ($ep->published_at)
                                                <div class="text-secondary" style="font-size:.75rem;">{{ $ep->published_at->format('M j, Y') }}</div>
                                            @endif
                                        </td>
                                        <td><span class="badge bg-secondary">{{ $ep->embed_type }}</span></td>
                                        <td class="text-end">
                                            <div class="d-inline-flex gap-1">
                                                <a href="{{ route('admin.podcast-shows.episodes.edit', [$show, $ep]) }}"
                                                   class="btn btn-xs btn-secondary">{{ __('Edit') }}</a>
                                                <form action="{{ route('admin.podcast-shows.episodes.destroy', [$show, $ep]) }}"
                                                      method="POST"
                                                      onsubmit="return confirm('{{ __('Delete episode?') }}');">
                                                    @csrf @method('DELETE')
                                                    <button type="submit" class="btn btn-xs btn-danger">{{ __('Del') }}</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center text-secondary py-4 small">
                                            {{ __('No episodes yet.') }}
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </x-core::card>
            </div>
        @endif
    </div>
@endsection
