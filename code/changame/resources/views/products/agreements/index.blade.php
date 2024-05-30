<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Agreements') }}
        </h2>
    </x-slot>

    @if ($products->count())
        <x-agreements-list :products="$products" />
    @else
        <div class="mt-28">
            <div class="alert alert-warning w-50 text-center m-auto" role="alert">
                {{ __('No products yet') }}
            </div>
        </div>
    @endif
</x-app-layout>


