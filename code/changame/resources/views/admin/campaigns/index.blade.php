<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Campaigns') }}
        </h2>
    </x-slot>
    <div class="text-first">
        <a href="admin/campaigns/create">
            <x-form.default-button class="my-4">
                {{ __('Add') }}  {{ __('Campaigns') }} <i class="fa-solid fa-plus ps-2"></i>
            </x-form.default-button>
    </div>
    <div class="flex text-center items-center">
    @if ($campaigns->count())
        <div>$ </div>
    @else
        <div class="alert alert-warning w-50 m-auto" role="alert">
            Aún no hay campañas
        </div>
    @endif
    </div>
</x-app-layout>
