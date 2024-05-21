<x-dropdown align="top">
    <x-slot name="trigger">
        <x-form.primary-button class="mt-1 hover:bg-green-600 hover:text-white focus:bg-green-600 focus:text-white active:text-white shadow-sm">
            {{  isset($currentCondition) ?  __('Conditions')['types'][ucwords(\App\Enums\Condition::from($currentCondition)->name)] : __('Conditions')['name'] }}
            <i class="fa-solid fa-chevron-down ps-2"></i>
        </x-form.primary-button>
    </x-slot>

    <x-slot name="content">
        <x-dropdown-item href="/products/?{{ http_build_query(request()->except('page','condition')) }}"
                         :active="request()->routeIs('products')">{{  __('All') }}
        </x-dropdown-item>
        @foreach($conditions as $condition)
            <x-dropdown-item
                href="/products/?condition={{ $condition->value }}&{{ http_build_query(request()->except('page','condition')) }}">
                {{ __('Conditions')['types'][ucwords($condition->name)] }}
            </x-dropdown-item>
        @endforeach
    </x-slot>
</x-dropdown>
