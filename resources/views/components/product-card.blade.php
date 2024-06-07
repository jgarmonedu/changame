@props(['product'])
<div class="card product-wrapper shadow-sm mx-8 my-5">
    <form method="post" action="/my/product/favorite/{{$product->id}}" enctype="multipart/form-data">
        @csrf
        <div class="product-action ">
            <div class="product-action-style bg-blue-950 rounded">
                <a class="action-plus text-white" title="{{__('Details')}}" href="/products/{{ $product->id }}"
                   data-abc="true"> <i class="fa fa-plus hover:text-green-600"></i> </a>
                <a class="action-zoom text-white" title="Zoom" href="#imageModal{{ $product->id }}"
                   data-bs-toggle="modal" data-target="#imageModal{{$product->id}}"> <i
                        class="fa fa-search hover:text-green-600"></i> </a>
                <!-- Owner cannot include his/her products into favorites -->
                @if( isset(Auth::user()->id))
                    @if ($product->user_id != Auth::user()->id)
                        @if ($product->favorites()->where('user_id',Auth::user()->id)->exists())
                            <a href="javascript:void(0);" onclick="$(this).closest('form').submit();"
                               class="action-heart text-white" title="{{__('Delete')}}" data-abc="true">
                                <i class="fa fa-solid fa-heart fa-lg   hover:text-green-600"></i>
                            </a>
                        @else
                            <a href="javascript:void(0);" onclick="$(this).closest('form').submit();"
                               class="action-heart text-white" title="{{__('Add')}}" data-abc="true">
                                <i class="fa fa-sharp fa-regular fa-heart fa-lg hover:text-green-600"></i>
                            </a>
                        @endif

                    @endif
                @else
                    <a href="javascript:void(0);" onclick="$(this).closest('form').submit();"
                       class="action-heart text-white" title="{{__('Add')}}" data-abc="true"> <i
                            class="fa fa-sharp fa-regular fa-heart fa-lg  hover:text-green-600"></i> </a>
                @endif
            </div>
        </div>
    </form>
    <small class="rounded text-bg-light absolute shadow-md border border-green-600 inline end-4 top-3 py-2 px-3"><i
            class="fa fa-heart text-green-600"> {{ $product->favorites()->count() }} </i></small>
    <x-image :product="$product" :image="$product->images()->first()" class="h-52 max-w-full rounded-t-lg" />
    <hr>
    <div class="card-body">
        <div class="btn-group pb-2">
            <i class="fa-solid fa-clock-rotate-left"></i><span class="px-2">{{$product->play_time}}min</span>
            <i class="fa-solid fa-users"></i><span
                class="px-2">{{$product->player_count_from}}-{{$product->player_count_to}}</span>
            <i class="fa-solid fa-person-circle-plus"></i><span class="px-2">{{$product->from_age}}+</span>
        </div>

        <div class="card-text h-24 overflow-hidden">
            <h4 class="text-lg">{{$product->name}}</h4>
            <small>{{$product->description}}</small>
        </div>

        <div class="d-flex justify-content-between align-items-center pt-3">
            <div class="btn-group pb-2"></div>
            <small class="px-2 text-xs text-stone-400">{{ $product->update_at ?? ''  }}</small>
        </div>

    </div>
</div><!--[end of card]-->
<!-- [modal image]-->
<div class="modal fade" id="imageModal{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="{{$product->name}}"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content overflow-auto touch-pinch-zoom w-full">
            <x-image :product="$product" :image="$product->images()->first()" class="hover:scale-150 hover:translate-x-1/4 hover:translate-y-1/4"/>
        </div>
    </div>
</div> <!--[end modal image]-->
