<?php

namespace App\Http\Controllers\Admin;

use App\Models\YouTubeChannel;
use App\YouTubeChannelService;
use Botble\Base\Http\Controllers\BaseController;
use Botble\Base\Supports\Breadcrumb;
use Botble\Setting\Facades\Setting;
use Illuminate\Support\Facades\File;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use RuntimeException;

class YouTubeChannelController extends BaseController
{
    protected function breadcrumb(): Breadcrumb
    {
        return parent::breadcrumb()
            ->add(trans('plugins/watch-manager::watch.admin.breadcrumb'), route('admin.youtube-channels.index'));
    }

    public function index()
    {
        $this->pageTitle(trans('plugins/watch-manager::watch.admin.page_title'));

        $channels = YouTubeChannel::query()
            ->withCount('videos')
            ->orderBy('sort_order')
            ->orderBy('name')
            ->get();

        $heroImage = setting('watch_page_hero_image', url('ref_image/header.png'));

        return view('admin.youtube-channels.index', compact('channels', 'heroImage'));
    }

    public function create()
    {
        $this->pageTitle(trans('plugins/watch-manager::watch.admin.form.create_title'));

        $channel = new YouTubeChannel();

        return view('admin.youtube-channels.form', [
            'channel' => $channel,
            'title' => trans('plugins/watch-manager::watch.admin.form.create_title'),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        YouTubeChannel::query()->create($this->validatedData($request));

        return redirect()
            ->route('admin.youtube-channels.index')
            ->with('success_msg', trans('plugins/watch-manager::watch.admin.messages.created'));
    }

    public function edit(YouTubeChannel $youtubeChannel)
    {
        $this->pageTitle(trans('plugins/watch-manager::watch.admin.form.edit_title'));

        return view('admin.youtube-channels.form', [
            'channel' => $youtubeChannel,
            'title' => trans('plugins/watch-manager::watch.admin.form.edit_title'),
        ]);
    }

    public function update(Request $request, YouTubeChannel $youtubeChannel): RedirectResponse
    {
        $youtubeChannel->update($this->validatedData($request, $youtubeChannel));

        return redirect()
            ->route('admin.youtube-channels.index')
            ->with('success_msg', trans('plugins/watch-manager::watch.admin.messages.updated'));
    }

    public function destroy(YouTubeChannel $youtubeChannel): RedirectResponse
    {
        $youtubeChannel->delete();

        return redirect()
            ->route('admin.youtube-channels.index')
            ->with('success_msg', trans('plugins/watch-manager::watch.admin.messages.deleted'));
    }

    public function sync(YouTubeChannel $youtubeChannel, YouTubeChannelService $service): RedirectResponse
    {
        try {
            $service->syncChannel($youtubeChannel);

            return redirect()
                ->route('admin.youtube-channels.index')
                ->with('success_msg', trans('plugins/watch-manager::watch.admin.messages.synced_channel', ['channel' => $youtubeChannel->name]));
        } catch (RuntimeException $exception) {
            return redirect()
                ->route('admin.youtube-channels.index')
                ->with('error_msg', $exception->getMessage());
        }
    }

    public function syncAll(YouTubeChannelService $service): RedirectResponse
    {
        try {
            $count = $service->syncAllActiveChannels();

            return redirect()
                ->route('admin.youtube-channels.index')
                ->with('success_msg', trans('plugins/watch-manager::watch.admin.messages.synced_all', ['count' => $count]));
        } catch (RuntimeException $exception) {
            return redirect()
                ->route('admin.youtube-channels.index')
                ->with('error_msg', $exception->getMessage());
        }
    }

    public function updateHero(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'watch_page_hero_image' => ['nullable', 'string', 'max:500'],
            'watch_page_hero_image_file' => ['nullable', 'image', 'max:5120'],
        ]);

        if ($request->hasFile('watch_page_hero_image_file')) {
            $file = $request->file('watch_page_hero_image_file');
            $directory = public_path('uploads/watch-hero');

            if (! File::isDirectory($directory)) {
                File::makeDirectory($directory, 0755, true);
            }

            $filename = 'watch-hero-' . now()->format('YmdHis') . '-' . Str::random(6) . '.' . $file->getClientOriginalExtension();
            $file->move($directory, $filename);

            $data['watch_page_hero_image'] = url('uploads/watch-hero/' . $filename);
        }

        Setting::set([
            'watch_page_hero_image' => $data['watch_page_hero_image'] ?? '',
        ]);
        Setting::save();

        return redirect()
            ->route('admin.youtube-channels.index')
            ->with('success_msg', trans('plugins/watch-manager::watch.admin.messages.hero_updated'));
    }

    protected function validatedData(Request $request, ?YouTubeChannel $channel = null): array
    {
        return $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'slug' => [
                'required',
                'string',
                'max:255',
                Rule::unique('youtube_channels', 'slug')->ignore($channel?->id),
            ],
            'youtube_channel_id' => [
                'nullable',
                'string',
                'max:100',
                Rule::unique('youtube_channels', 'youtube_channel_id')->ignore($channel?->id),
            ],
            'youtube_handle' => ['nullable', 'string', 'max:120'],
            'description' => ['nullable', 'string'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'is_active' => ['nullable', 'boolean'],
        ]) + [
            'is_active' => $request->boolean('is_active'),
            'sort_order' => (int) $request->input('sort_order', 0),
        ];
    }
}
