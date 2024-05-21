<x-app-layout >
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Product Information') }}
        </h2>
    </x-slot>
    <article class="max-w-4xl mx-auto lg:grid lg:grid-cols-12 gap-x-10 text-blue-950">
        <div class="col-span-4 lg:text-center lg:pt-14 mb-10">
            <x-image :product="$product"
                 x-data=""
                 x-on:click.prevent="$dispatch('open-modal', 'show-image-zoom')" />
            <x-modal name="show-image-zoom" focusable>
                <div class="modal-content overflow-auto touch-pinch-zoom scroll-smooth w-full">
                    <x-image :product="$product" class="hover:scale-150 hover:translate-x-1/4 hover:translate-y-1/4"/>
                </div>
            </x-modal>
        </div>
        <div class="col-span-8">
            <div class="hidden lg:flex justify-between mb-6">
                <a href="{{ route('products') }}" class="transition-colors duration-300 relative inline-flex items-center text-lg hover:text-green-600">
                    <svg width="22" height="22" viewBox="0 0 22 22" class="mr-2">
                        <g fill="none" fill-rule="evenodd">
                            <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                            </path>
                            <path class="fill-current"
                                  d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z">
                            </path>
                        </g>
                    </svg>
                    {{ __('Go Catalogue') }}
                </a>
            </div>
            @auth()
            <div class="flex justify-between items-center mb-10">
                <h1 class="font-bold text-3xl lg:text-4xl"> {{ $product->name }} </h1>
                @if ( $product->user_id != Auth::user()->id )
                    <x-icon-link href="/">
                        <i class="fa-sharp fa-regular fa-heart fa-2xl text-blue-950"></i>
                    </x-icon-link>
                @endif
            </div>
            @endauth
            <div class="space-y-4 lg:text-lg leading-loose text-justify">{!! $product->description !!}</div>
            <div class="group-icons py-3 lg:inline-flex gap-1">
                <div><i class="fa-solid fa-clock-rotate-left"></i><span class="px-2">{{$product->play_time}}min</span></div>
                <div><i class="fa-solid fa-users"></i><span class="px-2">{{$product->player_count_from}}-{{$product->player_count_to}}</span></div>
                <div><i class="fa-solid fa-person-circle-plus"></i><span class="px-2">{{$product->from_age}}+</span></div>
                <div><i class="fa-solid fa-globe"></i><span class="px-2">{{$product->language}}</span></div>
                <div><i class="fa-solid fa-arrow-up-wide-short"></i><span class="px-2">{{ __('Difficulties')['types'][ucwords(\App\Enums\Difficulty::from($product->difficulty)->name)] }}</span></div>
                <div><i class="fa-solid fa-thumbs-up"></i><span class="px-2">{{ __('Conditions')['types'][ucwords(\App\Enums\Condition::from($product->condition)->name)] }}</span></div>
                <div><i class="fa-solid fa-calendar-check"></i><span class="px-2">{{$product->release_year}}</span></div>
            </div>
            <section class="flex-column col-start-5 col-span-8 mt-6 space-y-6">
                <p class="mt-4 block text-gray-400 text-xs">
                    {{__('Published')}}
                    <time>{{ $product->created_at!=null ? $product->created_at->diffForHumans() : 'Sin determinar' }}</time>
                </p>
                @auth()
                    <div class="flex justify-between items-center mb-10 text-sm mt-4 gap-3">
                        @if( $product->user_id != Auth::user()->id )
                        <div class="inline-flex gap-3 items-center">
                            <img src="/images/avatar.png" alt="Avatar" class="w-12">
                            <div class="text-left">
                                <h5 class="font-bold">
                                    <a href="/products/?owner={{ $product->owner->id }}">{{ $product->owner->name }}</a>
                                </h5>
                            </div>
                        </div>
                        @else
                            <div class="inline-flex felx-fill gap-4">
                                <!-- TODO Si existe campaña -->
                                <x-form.primary-button class="text-green-600 hover:bg-green-600 hover:text-white">{{__("Donate")}}</x-form.primary-button>
                                <x-form.primary-button>{{__("Edit")}}</x-form.primary-button>
                                <!-- TODO Si está donado o acordado -->
                                <x-form.danger-button>{{__("Remove")}}</x-form.danger-button>
                            </div>
                        @endif
                    </div>
                @endauth
            </section>
        </div>
    </article>
</x-app-layout>
