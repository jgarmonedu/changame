<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Contributions') }}
        </h2>
    </x-slot>
    <div class="text-end">
        <a href="{{ route('my.product.create') }}">
        <x-form.default-button class="my-4">
            {{ __('Contribute') }} <i class="fa-solid fa-plus ps-2"></i>
        </x-form.default-button>
        </a>
    </div>

    @if ($products->count())
        <x-products-list :products="$products" />
        {{ $products->links() }}
    @else
        <div class="mt-28">
            <div class="alert alert-warning w-50 text-center m-auto" role="alert">
                {{ __('No products yet') }}
            </div>
        </div>
    @endif
</x-app-layout>


