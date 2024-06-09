@props(['products'])

@foreach ($products as $product)
    <div class="flex items-center m-4 justify-center gap-3">
        <div class="max-w-md mx-auto bg-white rounded-xl shadow-md overflow-hidden md:max-w-xl">
            <div class="md:flex md:min-h-64">
                <div class="md:shrink-0">
                    <x-image :product="$product" :image="$product->images()->first()" class="h-48 w-full object-cover md:h-full md:w-48" />
                </div>
                <a href="/products/{{ $product->id }}" title="{{ $product->name }}">
                    <div class="p-8">
                        <div class="uppercase tracking-wide text-sm text-blue-950 font-semibold flex justify-content-between ">{{ $product->name }}
                            <span class="mb-2 capitalize gap-1 rounded-full bg-green-50 px-3 py-1 text-xs font-semibold text-green-700">
                                {{ __('State')['types'][ucwords(\App\Enums\State::tryFrom($product->state)->name)] }}
                            </span>
                        </div>
                        <p class="m-2">{!! substr($product->description,0,100) !!}...</p>
                        <hr class="mt-3 w-50 m-auto text-blue-950">
                    </div>
                    <div class="justify-center gap-8 mb-20 flex flex-col items-center md:pb-4 md:mb-2 md:flex-row" >
                        @if ($product->state == '1' && $product->agreement->state == '1')
                        <form method="post" action="/my/product/agreement/{{ $product->id }}">
                            @csrf
                            @method('DELETE')
                            <x-form.danger-button>{{__("Remove")}}</x-form.danger-button>
                        </form>
                        @endif
                        <form method="post" action="/my/product/agreement/{{ $product->id }}">
                            @csrf
                            @method('PATCH')
                            @php
                                switch ($product->state) {
                                    case 1:
                                        $nextstate = 2;
                                        break;
                                    case 2:
                                        $nextstate = 3;
                                        break;
                                }
                            @endphp
                            @if($product->state!=3)
                                <x-form.default-button>{{ __('Change to') }} {{ __('State')['types'][ucwords(\App\Enums\State::tryFrom($nextstate)->name)] }}</x-form.default-button>
                            @elseif ($product->isAgreementCompleted($product))
                                <div class="text-xl">{{  __('Agreement') .' '.__('Completed') }}</div>
                            @else
                                <div class="text-lg text-blue-950">{{  __('Waiting to be completed') }}</div>
                            @endif
                        </form>
                    </div>
                </a>
            </div>
        </div>
        <div class="absolute">
            <a href="/chatify/{{ $product->agreement->owner->id }}" class="text-gray-400-950 hover:text-blue-950 " title="{{__('Contact')}}">
                <i class="fa-solid fa-people-arrows fa-3x"></i>
            </a>
        </div>
        <div class="max-w-md mx-auto bg-white rounded-xl shadow-md overflow-hidden md:max-w-xl">
            <div class="md:flex">
                <a href="/products/{{ $product->agreement->id }}" title="{{ $product->agreement->name }}">
                    <div class="p-8">
                        <div class="uppercase tracking-wide text-sm text-blue-950 font-semibold flex justify-content-between ">{{ $product->agreement->name }}
                            <span class="mb-2 capitalize gap-1 rounded-full bg-green-50 px-3 py-1 text-xs font-semibold text-green-700">
                                {{ __('State')['types'][ucwords(\App\Enums\State::tryFrom($product->agreement->state)->name)] }}
                            </span>
                        </div>
                        <p class="m-2">{!! substr($product->agreement->description,0,100) !!}...</p>
                        <hr class="mt-3 w-50 p-2 m-auto text-blue-950">
                        <x-icon-list :product="$product->agreement"/>
                    </div>
                </a>
                <div class="md:shrink-0">
                    <x-image :product="$product->agreement" :image="$product->agreement->images()->first()" class="h-48 w-full object-cover md:h-full md:w-48" />
                </div>
            </div>
        </div>
    </div>
@endforeach

