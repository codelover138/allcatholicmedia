@extends(BaseHelper::getAdminMasterLayoutTemplate())

@section('content')
    <div class="row justify-content-center">
        <div class="col-xl-8">
            <x-core::card>
                <x-core::card.header>
                    <x-core::card.title>{{ $title }}</x-core::card.title>
                </x-core::card.header>
                <x-core::card.body>
                    <form method="POST"
                          action="{{ $episode->exists
                              ? route('admin.podcast-shows.episodes.update', [$show, $episode])
                              : route('admin.podcast-shows.episodes.store', $show) }}">
                        @csrf
                        @if ($episode->exists) @method('PUT') @endif

                        <div class="mb-3">
                            <label class="form-label">{{ __('Episode Title') }} <span class="text-danger">*</span></label>
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                                   value="{{ old('title', $episode->title) }}" required>
                            @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">{{ __('Audio Type') }} <span class="text-danger">*</span></label>
                            <select name="embed_type" id="embedType" class="form-select" onchange="toggleAudioFields()">
                                @foreach (['html5' => 'Self-hosted MP3/Audio', 'soundcloud' => 'SoundCloud Embed', 'youtube' => 'YouTube Embed', 'external' => 'External Link'] as $val => $label)
                                    <option value="{{ $val }}" @selected(old('embed_type', $episode->embed_type ?? 'html5') === $val)>{{ $label }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div id="fieldAudioUrl" class="mb-3">
                            <label class="form-label">{{ __('Audio File URL') }}</label>
                            <input type="text" name="audio_url" class="form-control"
                                   value="{{ old('audio_url', $episode->audio_url) }}"
                                   placeholder="https://example.com/episode.mp3">
                            <div class="form-text">{{ __('Direct URL to MP3 or WAV file') }}</div>
                        </div>

                        <div id="fieldEmbedUrl" class="mb-3" style="display:none">
                            <label class="form-label" id="embedUrlLabel">{{ __('Embed / Player URL') }}</label>
                            <input type="text" name="embed_url" class="form-control"
                                   value="{{ old('embed_url', $episode->embed_url) }}"
                                   placeholder="https://w.soundcloud.com/player/?url=...">
                            <div class="form-text" id="embedUrlHelp">{{ __('Paste the embed/iframe src URL') }}</div>
                        </div>

                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label class="form-label">{{ __('Episode #') }}</label>
                                <input type="number" name="episode_number" min="0" class="form-control"
                                       value="{{ old('episode_number', $episode->episode_number ?? 0) }}">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">{{ __('Duration') }}</label>
                                <input type="text" name="duration" class="form-control"
                                       value="{{ old('duration', $episode->duration) }}" placeholder="e.g. 45:30">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">{{ __('Published Date') }}</label>
                                <input type="date" name="published_at" class="form-control"
                                       value="{{ old('published_at', $episode->published_at?->format('Y-m-d')) }}">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">{{ __('Thumbnail URL') }}</label>
                            <input type="text" name="thumbnail" class="form-control"
                                   value="{{ old('thumbnail', $episode->thumbnail) }}" placeholder="https://...">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">{{ __('Description') }}</label>
                            <textarea name="description" rows="3" class="form-control">{{ old('description', $episode->description) }}</textarea>
                        </div>

                        <div class="mb-4">
                            <label class="form-check">
                                <input type="checkbox" name="is_featured" value="1" class="form-check-input"
                                       @checked(old('is_featured', $episode->is_featured ?? false))>
                                <span class="form-check-label">{{ __('Featured episode') }}</span>
                            </label>
                        </div>

                        <div class="d-flex gap-2">
                            <x-core::button type="submit" color="primary">
                                {{ $episode->exists ? __('Update Episode') : __('Add Episode') }}
                            </x-core::button>
                            <a href="{{ route('admin.podcast-shows.edit', $show) }}" class="btn btn-secondary">
                                {{ __('Back to Show') }}
                            </a>
                        </div>
                    </form>
                </x-core::card.body>
            </x-core::card>
        </div>
    </div>

    <script>
    function toggleAudioFields() {
        const type = document.getElementById('embedType').value;
        const audioDiv = document.getElementById('fieldAudioUrl');
        const embedDiv = document.getElementById('fieldEmbedUrl');
        const embedLabel = document.getElementById('embedUrlLabel');
        const embedHelp = document.getElementById('embedUrlHelp');

        if (type === 'html5') {
            audioDiv.style.display = '';
            embedDiv.style.display = 'none';
        } else if (type === 'soundcloud') {
            audioDiv.style.display = 'none';
            embedDiv.style.display = '';
            embedLabel.textContent = 'SoundCloud Player URL';
            embedHelp.textContent = 'Paste the SoundCloud widget embed src (starts with https://w.soundcloud.com/player/)';
        } else if (type === 'youtube') {
            audioDiv.style.display = 'none';
            embedDiv.style.display = '';
            embedLabel.textContent = 'YouTube Embed URL';
            embedHelp.textContent = 'Paste the YouTube embed src (https://www.youtube.com/embed/VIDEO_ID)';
        } else {
            audioDiv.style.display = '';
            embedDiv.style.display = 'none';
        }
    }
    document.addEventListener('DOMContentLoaded', toggleAudioFields);
    </script>
@endsection
