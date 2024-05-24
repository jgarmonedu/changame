<x-app-layout :filters="$filters">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Favorites') }}
        </h2>
    </x-slot>
{{--    <div class="space-y-2 lg:space-y-0 lg:space-x-4 my-8 gap-2 flex">--}}
{{--        <!--  Category -->--}}
{{--        <div class="relative ms-2 gap-2 lg:inline-flex items-center rounded-xl">--}}
{{--            <x-category-dropdown/>--}}
{{--            <x-form.input-search name="from_age" type="number" text="Player age" :filters="$filters"/>--}}
{{--            <x-form.input-search name="player_count_from" type="number" text="Player from" :filters="$filters"/>--}}
{{--            <x-form.input-search name="player_count_to" type="number" text="Player to" :filters="$filters"/>--}}
{{--            <x-form.input-search name="play_time" type="number" text="Play time" :filters="$filters"/>--}}
{{--            <x-form.input-search name="release_year" type="number" text="Year" :filters="$filters"/>--}}
{{--            <x-difficulty-dropdown/>--}}
{{--            <x-condition-dropdown/>--}}
{{--            <x-language-dropdown/>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <a href="{{ route('products') }}"><i class="fa-solid fa-xmark"></i> {{ __('Filter delete') }}</a>--}}
    <a href="{{ route('products') }}" class="transition-colors duration-300 relative inline-flex items-center text-lg hover:text-green-600">
        <i class="fa-solid fa-angle-left mr-2"></i>
        {{ __('Go Catalogue') }}
    </a>
    @if ($products->count())
        <x-products-grid :products="$products"/>
        {{ $products->links() }}
    @else
        <div class="alert alert-warning w-50 m-auto text-center" role="alert">
            {{ __('No products yet') }}
        </div>
    @endif
</x-app-layout>
