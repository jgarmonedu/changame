
{{ $slot }}

<x-modal name="confirm-product-deletion" :show="$errors->isNotEmpty()" focusable>
    <form method="post" action="/my/product/{{ $product->id }}" class="p-6">
        @csrf
        @method('DELETE')

        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Are you sure you want to delete this product?') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Once your product is removed, it will no longer be available' ) }}
        </p>

        <div class="mt-6 flex justify-end">
            <x-form.default-button type="button" class="mx-4" @click="$dispatch('close')">
                {{ __('Cancel') }}
            </x-form.default-button>

            <x-form.danger-button>
                {{ __('Delete') }}
            </x-form.danger-button>
        </div>
    </form>
</x-modal>
