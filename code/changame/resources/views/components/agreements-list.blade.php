@props(['products'])

@foreach ($products as $product)
    <div class="flex items-center m-4 justify-center gap-3">
        <div class="max-w-md mx-auto bg-white rounded-xl shadow-md overflow-hidden md:max-w-xl">
            <div class="md:flex">
                <div class="md:shrink-0">
                    <x-image :product="$product" class="h-48 w-full object-cover md:h-full md:w-48" />
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
                    <div class="justify-center gap-8 pb-4 flex flex-col md:flex-row items-center">
                        @if ($product->state == '1' && $product->agreement->state == '1')
                        <form method="post" action="/my/products/agreement/{{ $product->id }}">
                            @csrf
                            @method('DELETE')
                            <x-form.danger-button>{{__("Remove")}}</x-form.danger-button>
                        </form>
                        @endif
                        <form method="post" action="/my/products/agreement/{{ $product->id }}">
                            @csrf
                            @method('UPDATE')
                            @php
                                switch ($product->state) {
                                    case 1:
                                        $nextstate = 2;
                                        break;
                                    case 2:
                                        $nextstate = 3;
                                        break;
                                    default:
                                        $nextstate = 1;
                                }
                            @endphp
                            <x-form.default-button>{{ __('Change to') }} {{ __('State')['types'][ucwords(\App\Enums\State::tryFrom($nextstate)->name)] }}</x-form.default-button>
                        </form>
                    </div>
                </a>
            </div>
        </div>
        <div class="absolute">
            <a href="/my/product/{{ $product->id }}/edit" class="text-gray-400-950 hover:text-blue-950 " title="{{__('Contact')}}">
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
                    <x-image :product="$product->agreement" class="h-48 w-full object-cover md:h-full md:w-48" />
                </div>
            </div>
        </div>
    </div>
@endforeach

