<x-dropdown align="top">
    <x-slot name="trigger">
        <x-form.primary-button class="mt-1 hover:bg-green-600 hover:text-white focus:bg-green-600 focus:text-white active:text-white shadow-sm">
            {{  isset($currentLanguage) ?  __('Languages')['types'][ucwords(\App\Enums\Language::from($currentLanguage)->name)] : __('Languages')['name'] }}
            <i class="fa-solid fa-chevron-down ps-2"></i>
        </x-form.primary-button>
    </x-slot>

    <x-slot name="content">
        <x-dropdown-item href="/products/?{{ http_build_query(request()->except('page','language')) }}"
                         :active="request()->routeIs('products')">{{  __('All') }}
        </x-dropdown-item>
        @foreach($languages as $language)
            <x-dropdown-item
                href="/products/?language={{ $language->value }}&{{ http_build_query(request()->except('page','language')) }}">
                {{ __('Languages')['types'][ucwords($language->name)] }}
            </x-dropdown-item>
        @endforeach
    </x-slot>
</x-dropdown>
