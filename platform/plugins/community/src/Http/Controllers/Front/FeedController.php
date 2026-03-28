<?php

namespace Acm\Community\Http\Controllers\Front;

use Acm\Community\Models\CommunityPost;
use Acm\Community\Models\CommunityPostLike;
use Botble\Base\Http\Controllers\BaseController;
use Botble\Theme\Facades\Theme;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeedController extends BaseController
{
    private function guard()
    {
        return Auth::guard('member');
    }

    public function index()
    {
        $posts = CommunityPost::with(['member'])
            ->published()
            ->latest()
            ->paginate(20);

        $member = $this->guard()->user();

        return Theme::scope('community.feed', compact('posts', 'member'))->render();
    }

    public function store(Request $request): JsonResponse
    {
        $member = $this->guard()->user();

        if (! $member) {
            return response()->json(['error' => 'Unauthenticated'], 401);
        }

        $request->validate([
            'content' => ['required', 'string', 'max:2000'],
        ]);

        $post = CommunityPost::create([
            'member_id' => $member->id,
            'type'      => 'text',
            'content'   => $request->input('content'),
            'status'    => 'published',
        ]);

        $post->load('member');

        return response()->json([
            'success' => true,
            'post'    => [
                'id'           => $post->id,
                'content'      => e($post->content),
                'member_name'  => e($post->member->name),
                'avatar_url'   => $post->member->avatar_url,
                'created_ago'  => $post->created_at->diffForHumans(),
                'likes_count'  => 0,
                'liked'        => false,
            ],
        ]);
    }

    public function like(int $postId): JsonResponse
    {
        $member = $this->guard()->user();

        if (! $member) {
            return response()->json(['error' => 'Unauthenticated'], 401);
        }

        $post = CommunityPost::published()->findOrFail($postId);

        $existing = CommunityPostLike::where('post_id', $post->id)
            ->where('member_id', $member->id)
            ->first();

        if ($existing) {
            $existing->delete();
            $post->decrement('likes_count');
            $liked = false;
        } else {
            CommunityPostLike::create(['post_id' => $post->id, 'member_id' => $member->id]);
            $post->increment('likes_count');
            $liked = true;
        }

        return response()->json([
            'success'     => true,
            'liked'       => $liked,
            'likes_count' => $post->fresh()->likes_count,
        ]);
    }

    public function destroy(int $postId): JsonResponse
    {
        $member = $this->guard()->user();
        $post   = CommunityPost::findOrFail($postId);

        if (! $member || ($member->id !== $post->member_id)) {
            return response()->json(['error' => 'Forbidden'], 403);
        }

        $post->delete();

        return response()->json(['success' => true]);
    }
}
