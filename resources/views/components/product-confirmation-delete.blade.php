<form method="post" action="/my/product/{{ $product->id }}">
    @csrf
    @method('DELETE')
    {{ $slot }}
</form>

<x-modal name="confirm-product-deletion" :show="$errors->isNotEmpty()" focusable>
    <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
        @csrf
        @method('DELETE')

        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Are you sure you want to delete this product?') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Once your product is removed, it will no longer be available' ) }}
        </p>

        <div class="mt-6 flex justify-end">
            <x-form.primary-button class="text-green-600 hover:bg-green-600 hover:text-white mx-4" x-on:click="$dispatch('close')">
                {{ __('Cancel') }}
            </x-form.primary-button>

            <x-form.danger-button>
                {{ __('Delete') }}
            </x-form.danger-button>
        </div>
    </form>
</x-modal>
