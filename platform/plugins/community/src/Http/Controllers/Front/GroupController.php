<?php

namespace Acm\Community\Http\Controllers\Front;

use Acm\Community\Models\CommunityGroup;
use Botble\Base\Http\Controllers\BaseController;
use Botble\Theme\Facades\Theme;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class GroupController extends BaseController
{
    private function guard()
    {
        return Auth::guard('member');
    }

    public function index(Request $request)
    {
        $sort   = $request->input('sort', 'newest');
        $search = $request->input('q');

        $query = CommunityGroup::published()
            ->when($search, fn ($q) => $q->where('name', 'like', "%{$search}%"))
            ->when($sort === 'members',  fn ($q) => $q->orderByDesc('members_count'))
            ->when($sort !== 'members',  fn ($q) => $q->latest());

        $groups = $query->paginate(12)->withQueryString();
        $member = $this->guard()->user();

        return Theme::scope('community.groups', compact('groups', 'member', 'sort', 'search'))->render();
    }

    public function show(string $slug)
    {
        $group  = CommunityGroup::published()->where('slug', $slug)->firstOrFail();
        $member = $this->guard()->user();

        $isMember = $member ? $group->isMember($member) : false;
        $isAdmin  = $member ? $group->isAdmin($member) : false;

        $members = $group->members()
            ->orderByPivot('joined_at')
            ->limit(24)
            ->get();

        return Theme::scope('community.group-show', compact('group', 'member', 'isMember', 'isAdmin', 'members'))->render();
    }

    public function store(Request $request): JsonResponse
    {
        $member = $this->guard()->user();

        if (! $member) {
            return response()->json(['error' => 'Unauthenticated'], 401);
        }

        $data = $request->validate([
            'name'        => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:1000'],
            'privacy'     => ['in:public,private'],
        ]);

        $group = CommunityGroup::create([
            'name'        => $data['name'],
            'slug'        => Str::slug($data['name']) . '-' . uniqid(),
            'description' => $data['description'] ?? null,
            'privacy'     => $data['privacy'] ?? 'public',
            'creator_id'  => $member->id,
            'status'      => 'published',
        ]);

        // Add creator as admin member
        $group->members()->attach($member->id, ['role' => 'admin']);

        return response()->json([
            'success'  => true,
            'redirect' => route('public.community.groups.show', $group->slug),
        ]);
    }

    public function join(string $slug): JsonResponse
    {
        $member = $this->guard()->user();

        if (! $member) {
            return response()->json(['error' => 'Unauthenticated'], 401);
        }

        $group = CommunityGroup::published()->where('slug', $slug)->firstOrFail();

        if (! $group->isMember($member)) {
            $group->members()->attach($member->id, ['role' => 'member']);
            $group->increment('members_count');
        }

        return response()->json(['success' => true, 'members_count' => $group->fresh()->members_count]);
    }

    public function leave(string $slug): JsonResponse
    {
        $member = $this->guard()->user();

        if (! $member) {
            return response()->json(['error' => 'Unauthenticated'], 401);
        }

        $group = CommunityGroup::published()->where('slug', $slug)->firstOrFail();

        if ($group->isMember($member) && $group->creator_id !== $member->id) {
            $group->members()->detach($member->id);
            $group->decrement('members_count');
        }

        return response()->json(['success' => true, 'members_count' => $group->fresh()->members_count]);
    }
}
