<x-dropdown align="top">
    <x-slot name="trigger">
        <x-form.primary-button class="mt-1 hover:bg-green-600 hover:text-white focus:bg-green-600 focus:text-white active:text-white shadow-sm">
            {{isset($currentCategory) ? ucwords($currentCategory->name) :  __('Categories') }}
            <i class="fa-solid fa-chevron-down ps-2"></i>
        </x-form.primary-button>
    </x-slot>

    <x-slot name="content">
        <x-dropdown-item href="/products/?{{ http_build_query(request()->except('category','page')) }}"
                         :active="request()->routeIs('products')">{{  __('All') }}
        </x-dropdown-item>
        @foreach($categories as $category)
            <x-dropdown-item
                href="/products/?category={{ $category->slug }}&{{ http_build_query(request()->except('category','page')) }}"
                :active="request()->is('categories/'.$category->name)">
                {{ ucwords($category->name) }}
            </x-dropdown-item>
        @endforeach
    </x-slot>
</x-dropdown>
