<?php

return [
    [
        'name' => 'Community Groups',
        'flag' => 'community-groups.index',
    ],
    [
        'name' => 'Edit',
        'flag' => 'community-groups.edit',
        'parent_flag' => 'community-groups.index',
    ],
    [
        'name' => 'Delete',
        'flag' => 'community-groups.destroy',
        'parent_flag' => 'community-groups.index',
    ],
    [
        'name' => 'Community Forums',
        'flag' => 'community-forums.index',
    ],
    [
        'name' => 'Create',
        'flag' => 'community-forums.create',
        'parent_flag' => 'community-forums.index',
    ],
    [
        'name' => 'Edit',
        'flag' => 'community-forums.edit',
        'parent_flag' => 'community-forums.index',
    ],
    [
        'name' => 'Delete',
        'flag' => 'community-forums.destroy',
        'parent_flag' => 'community-forums.index',
    ],
    [
        'name' => 'Community Feed',
        'flag' => 'community-feed.index',
    ],
    [
        'name' => 'Delete',
        'flag' => 'community-feed.destroy',
        'parent_flag' => 'community-feed.index',
    ],
];
