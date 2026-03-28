<?php

return [
    [
        'name' => 'Live Streams',
        'flag' => 'live-streams.index',
    ],
    [
        'name' => 'Create',
        'flag' => 'live-streams.create',
        'parent_flag' => 'live-streams.index',
    ],
    [
        'name' => 'Edit',
        'flag' => 'live-streams.edit',
        'parent_flag' => 'live-streams.index',
    ],
    [
        'name' => 'Delete',
        'flag' => 'live-streams.destroy',
        'parent_flag' => 'live-streams.index',
    ],
];
