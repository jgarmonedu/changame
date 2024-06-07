@props(['campaign'])
<hr class="w-50 m-auto text-blue-950 h-1 mx-auto mb-4">
<div class="grid lg:grid-cols-1 lg:gap-8 text-start pb-20 ">
    <div class="text-center">
        <h1 class="text-4xl text-blue-950  py-4"><i class="fa-solid fa-bullhorn"></i> {{ __('Campaign') }}</h1>
        <blockquote class="text-2xl italic font-semibold text-center text-gray-900 dark:text-white">"{{ $campaign->name }}"</blockquote>
        <div class="py-2 w-75 m-auto text-blue-950 text-lg [&>p]:pb-3">{!! $campaign->description !!}</div>
        <h2 class="text-xl text-center text-blue-950 fond-semibold pt-4">{{__('Don\'t miss the opportunity to contribute your grain of sand')}}</h2>
        <div class="py-4"> {{ __('Campaign ends') .' '. \Carbon\Carbon::parse($campaign->date_to)->diffForHumans(['parts' => 2, 'join' => ', ']) }}</div>
        <a href="/my/products">
            <x-form.secondary-button
                class="px-5 text-l text-green-50 hover:text-green-600 uppercase outline outline-offset-2 outline-1 outline-green-600">{{ __('Donate') }}
            </x-form.secondary-button>
        </a>
    </div>
</div>
<hr class="w-50 m-auto text-blue-950 h-1 mx-auto mb-4">
