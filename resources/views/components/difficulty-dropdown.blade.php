<x-dropdown align="top">
    <x-slot name="trigger">
        <x-form.primary-button class="mt-1 hover:bg-green-600 hover:text-white focus:bg-green-600 focus:text-white active:text-white shadow-sm">
            {{  isset($currentDifficulty) ?  __('Difficulties')['types'][ucwords(\App\Enums\Difficulty::from($currentDifficulty)->name)] : __('Difficulties')['name'] }}
            <i class="fa-solid fa-chevron-down ps-2"></i>
        </x-form.primary-button>
    </x-slot>

    <x-slot name="content">
        <x-dropdown-item href="/products/?{{ http_build_query(request()->except('page','difficulty')) }}"
                         :active="request()->routeIs('products')">{{  __('All') }}
        </x-dropdown-item>
        @foreach($difficulties as $difficulty)
            <x-dropdown-item
                href="/products/?difficulty={{ $difficulty->value }}&{{ http_build_query(request()->except('page','difficulty')) }}">
                {{ __('Difficulties')['types'][ucwords($difficulty->name)] }}
            </x-dropdown-item>
        @endforeach
    </x-slot>
</x-dropdown>
