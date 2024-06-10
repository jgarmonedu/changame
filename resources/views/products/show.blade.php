<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Product Information') }}
        </h2>
    </x-slot>
    <article class="max-w-4xl mx-auto lg:grid lg:grid-cols-12 gap-x-10 text-blue-950">
        <div class="col-span-4 lg:text-center lg:pt-14 mb-10">
            <x-image id="mainImage" :product="$product" :image="$images->first()" class="max-w-full h-72 rounded-lg"
                     x-data=""
                     x-on:click.prevent="$dispatch('open-modal', 'show-image-zoom')"/>
            <x-modal name="show-image-zoom" focusable>
                <div class="modal-content overflow-auto touch-pinch-zoom scroll-smooth w-full">
                    <x-image :product="$product" :image="$product->images()->first()" class="hover:scale-150 hover:translate-x-1/4 hover:translate-y-1/4"/>
                </div>
            </x-modal>
            <div class="flex flex-auto gap-3">
            @if ($images->count()>1)
                @foreach($images as $image)
                        <x-image id="mainImage" :product="$product" :image="$image" class="thumbnail max-w-20 border-2 rounded-lg"/>
                @endforeach
            @endif
            </div>
        </div>
        <div class="col-span-8">
            <div class="hidden lg:flex justify-between mb-6">
                <a href="{{ route('products') }}"
                   class="transition-colors duration-300 relative inline-flex items-center text-lg hover:text-green-600">
                    <i class="fa-solid fa-angle-left mr-2"></i>
                    {{ __('Go Catalogue') }}
                </a>
            </div>
            @auth()
                <div class="flex justify-between items-center mb-10">
                    <h1 class="font-bold text-3xl lg:text-4xl"> {{ $product->name }} </h1>
                    @if (is_null($product->change_with) AND ($product->owner->id != Auth::user()->id))
                    <form method="post" action="/my/product/favorite/{{$product->id}}" enctype="multipart/form-data">
                        @csrf
                        @if ($product->favorites()->where('user_id',Auth::user()->id)->exists())
                            <a href="javascript:void(0);" onclick="$(this).closest('form').submit();"
                               class="action-heart text-blue-950" title="{{__('Delete')}}" data-abc="true">
                                <i class="fa fa-solid fa-heart fa-2xl hover:text-amber-400"></i>
                            </a>
                        @else
                            <a href="javascript:void(0);" onclick="$(this).closest('form').submit();"
                               class="action-heart text-blue-950" title="{{__('Add')}}" data-abc="true">
                                <i class="fa fa-sharp fa-regular fa-heart fa-2xl hover:text-amber-400"></i>
                            </a>
                        @endif
                    </form>
                    @endempty
                </div>
            @endauth
            <div class="space-y-4 lg:text-lg leading-loose text-justify mb-4">{!! $product->description !!}</div>
            <x-icon-list :product="$product"/>
            <section class="flex-column col-start-5 col-span-8 mt-6 space-y-6">
                <p class="mt-4 block text-gray-400 text-xs">
                    {{__('Published')}}
                    <time>{{ $product->created_at!=null ? $product->created_at->diffForHumans() : 'Sin determinar' }}</time>
                </p>
                @auth()
                    <div class="flex justify-between items-center mb-10 text-sm mt-4 gap-3">
                        @if( $product->user_id != Auth::user()->id)
                            <div class="inline-flex gap-3 items-center">
                                @if ($product->owner->photo)
                                    <img src="{{ asset('storage/' .  $product->owner->photo) }}" alt="{{  $product->owner->name }}"
                                         class="w-12 rounded-full">
                                @else
{{--                                    <img src="https://i.pravatar.cc/60?u={{ $product->owner->id }}" alt="Avatar"  class="w-12 rounded-full">--}}
                                    <img src="/images/avatar.png" alt="Avatar"  class="w-12 rounded-full">
                                @endif
                                <div class="text-left">
                                    <h5 class="font-bold">
                                        <a href="/products/?owner={{ $product->owner->id }}">{{ $product->owner->name }}</a>
                                    </h5>
                                </div>
                            </div>
                        @else
                            @empty($product->change_with)
                                @if ($campaign)
                                    <form method="POST" action="/my/products/donate/{{$product->id}}">
                                        @csrf
                                        @method('PATCH')
                                        <x-form.default-button class="text-white bg-green-600 hover:bg-emerald-600">
                                            @empty($product->campaign)
                                                {{__("Donate")}}
                                            @else
                                                {{__("Remove")}} {{__("Donation")}}
                                            @endempty
                                        </x-form.default-button>
                                    </form>
                                @endif
                                @if(!$product->campaign)
                                    <a href="/my/product/{{$product->id}}/edit">
                                        <x-form.default-button>{{__("Edit")}}</x-form.default-button>
                                    </a>
                                    <x-product-delete :product="$product">
                                        <x-form.danger-button x-data=""
                                                              x-on:click.prevent="$dispatch('open-modal', 'confirm-product-deletion')">{{__("Remove")}}
                                        </x-form.danger-button>
                                    </x-product-delete>
                                @endif
                    </div>
                @else
                    <span
                        class="inline-flex items-center gap-1 rounded-full bg-red-50 px-2 py-1 text-xs font-semibold text-red-700">
                                {{ __('Agreement') }}
                            </span>
            @endempty
            @endif
        </div>
        @endauth
        </section>
        </div>
    </article>
</x-app-layout>
