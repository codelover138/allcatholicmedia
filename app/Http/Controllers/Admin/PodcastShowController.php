<?php

namespace App\Http\Controllers\Admin;

use App\Models\PodcastEpisode;
use App\Models\PodcastShow;
use Botble\Base\Http\Controllers\BaseController;
use Botble\Base\Supports\Breadcrumb;
use Botble\Setting\Facades\Setting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class PodcastShowController extends BaseController
{
    protected function breadcrumb(): Breadcrumb
    {
        return parent::breadcrumb()
            ->add('Podcast Shows', route('admin.podcast-shows.index'));
    }

    // ── Shows ────────────────────────────────────────────────────────────────

    public function index()
    {
        $this->pageTitle('Podcast Shows');

        $shows = PodcastShow::query()
            ->withCount('episodes')
            ->orderBy('sort_order')
            ->orderBy('name')
            ->get();

        $heroImage = setting('listen_page_hero_image', url('ref_image/header.png'));

        return view('admin.podcast-shows.index', compact('shows', 'heroImage'));
    }

    public function updateHero(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'listen_page_hero_image' => ['nullable', 'string', 'max:500'],
            'listen_page_hero_image_file' => ['nullable', 'image', 'max:5120'],
        ]);

        if ($request->hasFile('listen_page_hero_image_file')) {
            $file = $request->file('listen_page_hero_image_file');
            $directory = public_path('uploads/listen-hero');

            if (! File::isDirectory($directory)) {
                File::makeDirectory($directory, 0755, true);
            }

            $filename = 'listen-hero-' . now()->format('YmdHis') . '-' . Str::random(6) . '.' . $file->getClientOriginalExtension();
            $file->move($directory, $filename);

            $data['listen_page_hero_image'] = url('uploads/listen-hero/' . $filename);
        }

        Setting::set([
            'listen_page_hero_image' => $data['listen_page_hero_image'] ?? '',
        ]);
        Setting::save();

        return redirect()
            ->route('admin.podcast-shows.index')
            ->with('success_msg', 'Listen page hero background updated successfully.');
    }

    public function create()
    {
        $this->pageTitle('Create Podcast Show');

        return view('admin.podcast-shows.form', [
            'show'  => new PodcastShow(),
            'title' => 'Create Podcast Show',
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validatedShow($request);
        PodcastShow::query()->create($data);

        return redirect()->route('admin.podcast-shows.index')
            ->with('success_msg', 'Podcast show created successfully.');
    }

    public function edit(PodcastShow $podcastShow)
    {
        $this->pageTitle('Edit Podcast Show');

        $episodes = $podcastShow->episodes()
            ->orderByDesc('episode_number')
            ->orderByDesc('published_at')
            ->get();

        return view('admin.podcast-shows.form', [
            'show'     => $podcastShow,
            'episodes' => $episodes,
            'title'    => 'Edit: ' . $podcastShow->name,
        ]);
    }

    public function update(Request $request, PodcastShow $podcastShow): RedirectResponse
    {
        $podcastShow->update($this->validatedShow($request, $podcastShow));

        return redirect()->route('admin.podcast-shows.index')
            ->with('success_msg', 'Podcast show updated successfully.');
    }

    public function destroy(PodcastShow $podcastShow): RedirectResponse
    {
        $podcastShow->delete();

        return redirect()->route('admin.podcast-shows.index')
            ->with('success_msg', 'Podcast show deleted.');
    }

    // ── Episodes ─────────────────────────────────────────────────────────────

    public function createEpisode(PodcastShow $podcastShow)
    {
        $this->pageTitle('Add Episode');

        return view('admin.podcast-shows.episode-form', [
            'show'    => $podcastShow,
            'episode' => new PodcastEpisode(),
            'title'   => 'Add Episode to: ' . $podcastShow->name,
        ]);
    }

    public function storeEpisode(Request $request, PodcastShow $podcastShow): RedirectResponse
    {
        $data = $this->validatedEpisode($request);
        $data['podcast_show_id'] = $podcastShow->id;
        PodcastEpisode::query()->create($data);

        return redirect()->route('admin.podcast-shows.edit', $podcastShow)
            ->with('success_msg', 'Episode added successfully.');
    }

    public function editEpisode(PodcastShow $podcastShow, PodcastEpisode $episode)
    {
        $this->pageTitle('Edit Episode');

        return view('admin.podcast-shows.episode-form', [
            'show'    => $podcastShow,
            'episode' => $episode,
            'title'   => 'Edit Episode',
        ]);
    }

    public function updateEpisode(Request $request, PodcastShow $podcastShow, PodcastEpisode $episode): RedirectResponse
    {
        $episode->update($this->validatedEpisode($request, $episode));

        return redirect()->route('admin.podcast-shows.edit', $podcastShow)
            ->with('success_msg', 'Episode updated successfully.');
    }

    public function destroyEpisode(PodcastShow $podcastShow, PodcastEpisode $episode): RedirectResponse
    {
        $episode->delete();

        return redirect()->route('admin.podcast-shows.edit', $podcastShow)
            ->with('success_msg', 'Episode deleted.');
    }

    // ── Validation helpers ────────────────────────────────────────────────────

    protected function validatedShow(Request $request, ?PodcastShow $show = null): array
    {
        $data = $request->validate([
            'name'        => ['required', 'string', 'max:255'],
            'slug'        => ['required', 'string', 'max:255', Rule::unique('podcast_shows', 'slug')->ignore($show?->id)],
            'thumbnail'   => ['nullable', 'string', 'max:500'],
            'banner'      => ['nullable', 'string', 'max:500'],
            'description' => ['nullable', 'string'],
            'category'    => ['nullable', 'string', 'max:120'],
            'website_url' => ['nullable', 'string', 'max:500'],
            'sort_order'  => ['nullable', 'integer', 'min:0'],
            'is_active'   => ['nullable', 'boolean'],
        ]);

        $data['is_active']  = $request->boolean('is_active');
        $data['sort_order'] = (int) $request->input('sort_order', 0);

        return $data;
    }

    protected function validatedEpisode(Request $request, ?PodcastEpisode $episode = null): array
    {
        return $request->validate([
            'title'          => ['required', 'string', 'max:255'],
            'slug'           => ['nullable', 'string', 'max:255'],
            'description'    => ['nullable', 'string'],
            'thumbnail'      => ['nullable', 'string', 'max:500'],
            'audio_url'      => ['nullable', 'string', 'max:500'],
            'embed_url'      => ['nullable', 'string', 'max:500'],
            'embed_type'     => ['required', 'string', Rule::in(['html5', 'soundcloud', 'youtube', 'external'])],
            'duration'       => ['nullable', 'string', 'max:30'],
            'episode_number' => ['nullable', 'integer', 'min:0'],
            'is_featured'    => ['nullable', 'boolean'],
            'published_at'   => ['nullable', 'date'],
        ]) + [
            'slug'           => $request->input('slug') ?: Str::slug($request->input('title', '')),
            'is_featured'    => $request->boolean('is_featured'),
            'episode_number' => (int) $request->input('episode_number', 0),
        ];
    }
}
