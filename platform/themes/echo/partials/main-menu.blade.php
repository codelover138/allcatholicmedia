<ul {!! $options !!}>
    @foreach ($menu_nodes->loadMissing(['metadata', 'parent']) as $key => $row)
        @php
            $title = trim(strip_tags((string) $row->title));
            $customActive = match ($title) {
                'Home' => request()->routeIs('public.index'),
                'Channels', 'Watch' => request()->routeIs('public.watch*'),
                'Listen' => request()->routeIs('public.listen*'),
                default => false,
            };

            $isActive = $row->active || $customActive;
        @endphp
        <li @class([
            'menu-item',
            'nav-item' => $row->parent,
            'echo-has-dropdown' => $row->has_child,
            'active' => $isActive,
            'current-menu-item' => $isActive,
            'current' => $isActive,
            'current_page_item' => $isActive,
        ])>
            <a
                @class(['echo-dropdown-main-element' => ! $row->parent])
                href="{{ url($row->url) }}"
                title="{{ $row->title }}"
                @if ($row->target !== '_self') target="{{ $row->target }}" @endif
            >
                {!! $row->icon_html !!}

                {{ $row->title }}
            </a>
            @if ($row->has_child)
                {!! Menu::generateMenu([
                    'menu' => $menu,
                    'menu_nodes' => $row->child,
                    'view' => 'main-menu',
                    'options' => ['class' => 'echo-submenu'],
                ]) !!}
            @endif
        </li>
    @endforeach
</ul>
