@props(['products'])

@foreach ($products as $product)
    <div class="flex items-center m-4 justify-center">
        <div class="text-sm font-medium text-gray-900">
            <div class="max-w-md mx-auto bg-white rounded-xl shadow-md overflow-hidden md:max-w-4xl">
                <div class="md:flex">
                    <div class="md:shrink-0">
                        <x-image :product="$product" :image="$product->images()->first()" class="h-48 w-full object-cover md:h-full md:w-48" />
                    </div>
                    <a href="/products/{{ $product->id }}" title="{{ $product->name }}">
                        <div class="p-8">
                            <div class="uppercase tracking-wide text-sm text-blue-950 font-semibold">{{ $product->name }}</div>
                            <p class="m-2">{!! substr($product->description,0,100) !!}...</p>
                            <hr class="my-3">
                            <x-icon-list :product="$product"/>
                        </div>
                    </a>
                    <div class="md:shrink-0 p-8 max-w-48">
                        <span class="mb-2 inline-flex items-center gap-1 rounded-full bg-green-50 px-2 py-1 text-xs font-semibold text-green-700">
                                 {{ $product->category->name}}
                        </span>
                        @isset($product->change_with)
                            <span class="inline-flex items-center gap-1 rounded-full bg-blue-50 px-2 py-1 text-xs font-semibold text-blue-700">
                                     {{ __('Agreement') }}
                            </span>
                        @endisset
                        @isset($product->campaign)
                            <span class="inline-flex items-center gap-1 rounded-full bg-red-50 px-2 py-1 text-xs font-semibold text-red-700">
                                     {{ __('Donation') }}
                            </span>
                        @endisset
                    </div>
                    @empty($product->change_with || $product->campaign)
                    <div class="md:shrink-0 px-8 py-4 w-1/10" >
                        <div class="flex sm:flex-row lg:flex-col justify-center gap-10">
                            <x-product-delete :product="$product" >
                                <button class="text-red-500" title="{{__('Remove')}}"
                                        x-data=""
                                        x-on:click.prevent="$dispatch('open-modal', 'confirm-product-deletion')">
                                    <i class="fa-regular fa-xl fa-trash-can"></i>
                                </button>
                            </x-product-delete>
                            <a href="/my/product/{{ $product->id }}/edit" class="text-blue-950 hover:text-navy-900"
                               title="{{__('Edit')}}"><i class="fa-regular fa-xl fa-pen-to-square"></i>
                            </a>
                            @if($product->favorites()->count()>0)
                            <a href="{{ route('my.products.interested',['product' => $product]) }}" class="text-blue-950 hover:text-navy-900"
                               title="{{__('Interested')}}"><i class="fa-brands fa-xl fa-gratipay"></i>
                            </a>
                            @endif
                        </div>
                    </div>
                    @endempty
                </div>
            </div>

        </div>
    </div>
@endforeach

