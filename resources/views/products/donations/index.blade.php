<x-app-layout :filters="$filters">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Donations') }}
        </h2>
    </x-slot>
    <a href="{{ route('products') }}" class="transition-colors duration-300 relative inline-flex items-center text-lg hover:text-green-600">
        <i class="fa-solid fa-angle-left mr-2"></i>
        {{ __('Go Catalogue') }}
    </a>

    @if ($products->count())
        <x-products-table :products="$products" :campaigns="$campaigns"/>
        {{ $products->links() }}
    @else
        <div class="mt-28">
            <div class="alert alert-warning w-50 text-center m-auto" role="alert">
                {{ __('No products yet') }}
            </div>
        </div>
    @endif
</x-app-layout>
