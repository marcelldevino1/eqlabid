<ul class="flex flex-col">
    @foreach($menuItems as $moduleSlug => $actions)
        <li>
            <span class="font-semibold">{{ ucfirst($moduleSlug) }}</span>
            <ul class="ml-4">
                @foreach($actions as $action)
                    <li>
                        <a href="{{ route($moduleSlug.'.'.$action) }}" 
                           class="block px-4 py-2 text-gray-700 hover:bg-gray-100 rounded">
                            {{ ucfirst($action) }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </li>
    @endforeach
</ul>
