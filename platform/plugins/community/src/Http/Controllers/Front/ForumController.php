<?php

namespace Acm\Community\Http\Controllers\Front;

use Acm\Community\Models\ForumCategory;
use Acm\Community\Models\ForumReply;
use Acm\Community\Models\ForumTopic;
use Botble\Base\Http\Controllers\BaseController;
use Botble\Theme\Facades\Theme;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ForumController extends BaseController
{
    private function guard()
    {
        return Auth::guard('member');
    }

    public function index()
    {
        $categories = ForumCategory::withCount(['topics' => fn ($q) => $q->published()])
            ->orderBy('order_column')
            ->get();

        $recentTopics = ForumTopic::with(['member', 'category'])
            ->published()
            ->latest()
            ->limit(5)
            ->get();

        return Theme::scope('community.forums', compact('categories', 'recentTopics'))->render();
    }

    public function showCategory(string $slug)
    {
        $category = ForumCategory::where('slug', $slug)->firstOrFail();

        $topics = ForumTopic::with(['member'])
            ->where('category_id', $category->id)
            ->published()
            ->orderByDesc('is_pinned')
            ->latest('last_reply_at')
            ->paginate(20);

        $member = $this->guard()->user();

        return Theme::scope('community.forum-category', compact('category', 'topics', 'member'))->render();
    }

    public function showTopic(string $slug)
    {
        $topic = ForumTopic::with(['member', 'category'])->where('slug', $slug)->published()->firstOrFail();
        $topic->increment('views');

        $replies = ForumReply::with(['member'])
            ->where('topic_id', $topic->id)
            ->published()
            ->oldest()
            ->paginate(20);

        $member = $this->guard()->user();

        return Theme::scope('community.forum-topic', compact('topic', 'replies', 'member'))->render();
    }

    public function storeTopic(Request $request, string $categorySlug): RedirectResponse|JsonResponse
    {
        $member = $this->guard()->user();

        if (! $member) {
            return redirect()->route('public.member.login');
        }

        $data = $request->validate([
            'title'   => ['required', 'string', 'max:255'],
            'content' => ['required', 'string', 'max:10000'],
        ]);

        $category = ForumCategory::where('slug', $categorySlug)->firstOrFail();
        $slug     = Str::slug($data['title']) . '-' . uniqid();

        $topic = ForumTopic::create([
            'category_id'   => $category->id,
            'member_id'     => $member->id,
            'title'         => $data['title'],
            'slug'          => $slug,
            'content'       => $data['content'],
            'last_reply_at' => now(),
            'status'        => 'published',
        ]);

        $category->increment('topics_count');

        return redirect()->route('public.community.forum.topic', $topic->slug)
            ->with('success', __('Topic created successfully.'));
    }

    public function storeReply(Request $request, string $topicSlug): RedirectResponse|JsonResponse
    {
        $member = $this->guard()->user();

        if (! $member) {
            return redirect()->route('public.member.login');
        }

        $data = $request->validate([
            'content' => ['required', 'string', 'max:5000'],
        ]);

        $topic = ForumTopic::where('slug', $topicSlug)->published()->firstOrFail();

        if ($topic->is_locked) {
            return back()->with('error', __('This topic is locked.'));
        }

        ForumReply::create([
            'topic_id'  => $topic->id,
            'member_id' => $member->id,
            'content'   => $data['content'],
            'status'    => 'published',
        ]);

        $topic->increment('replies_count');
        $topic->update(['last_reply_at' => now()]);

        return redirect()->route('public.community.forum.topic', $topic->slug)
            ->with('success', __('Reply posted successfully.'));
    }
}
