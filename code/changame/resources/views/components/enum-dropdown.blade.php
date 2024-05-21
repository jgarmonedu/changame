@props(['item','itemText','values','currentValue','enum'])

<x-dropdown align="top">
    <x-slot name="trigger">
        <x-form.primary-button class="mt-1 hover:bg-green-600 hover:text-white focus:bg-green-600 focus:text-white active:text-white shadow-sm">
            {{  isset($currentValue) ?  __('itemText')['types'][ucwords(\App\Enums\Difficulty::from($currentValue)->name)] : __('itemText)['name'] }}
            <i class="fa-solid fa-chevron-down ps-2"></i>
        </x-form.primary-button>
    </x-slot>

    <x-slot name="content">
        <x-dropdown-item href="/products/?{{ http_build_query(request()->except('page',$item)) }}"
                         :active="request()->routeIs('products')">{{  __('All') }}
        </x-dropdown-item>
        @foreach($values as $value)
            <x-dropdown-item
                href="/products/?condition={{ $value->value }}&{{ http_build_query(request()->except('page',$item)) }}">
                {{ __($itemText)['types'][ucwords($value->name)] }}
            </x-dropdown-item>
        @endforeach
    </x-slot>
</x-dropdown>

