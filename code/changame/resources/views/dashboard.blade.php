<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
     </x-slot>
{{--    <div class="hidden space-x-3 sm:-my-px sm:ms-10 sm:flex sm:justify-left" style="width: 100%">--}}
{{--        <x-nav-link  :href="route('my.product.create')" :active="request()->routeIs('my.product.create')">--}}
{{--            {{ __('Contribute') }}--}}
{{--        </x-nav-link>--}}
{{--        <x-nav-link :href="route('products')" :active="request()->routeIs('products')">--}}
{{--            {{ __('Catalogue') }}--}}
{{--        </x-nav-link>--}}
{{--        <x-nav-link :href="route('products')" :active="request()->routeIs('products')">--}}
{{--            {{ __('Campaign') }}--}}
{{--        </x-nav-link>--}}
{{--        <x-nav-link :href="route('products')" :active="request()->routeIs('products')">--}}
{{--            {{ __('Catalogue') }}--}}
{{--        </x-nav-link>--}}
{{--    </div>--}}

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
