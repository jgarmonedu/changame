@props(['product'])
<div class="card product-wrapper shadow-sm mx-8 my-5">
    <div class="product-action ">
        <div class="product-action-style bg-blue-950 rounded">
            <a class="action-plus text-white" title="{{__('Details')}}" href="#" data-abc="true"> <i class="fa fa-plus hover:text-green-600"></i> </a>
            <a class="action-zoom text-white" title="Zoom" data-toggle="modal" data-target="#exampleModal" href="#" data-abc="true"> <i class="fa fa-search hover:text-green-600"></i> </a>
            <a class="action-heart text-white" title="{{__('Add')}}" href="#" data-abc="true"> <i class="fa fa-sharp fa-regular fa-heart fa-lg  hover:text-green-600"></i> </a>
        </div>
    </div>
    <small class="rounded text-bg-light absolute inline end-4 top-3 py-2 px-3"><i class="fa fa-heart text-green-600"> 2 </i></small>
    <img src="{{ $product->thumbnail==null ? $product->thumbnail : '/images/boardgames.jpg' }}" class="h-auto max-w-full rounded-lg" alt="{{ $product->thumbnail==null ? $product->name : '<a href="https://www.freepik.es/vector-gratis/juegos-mesa-isometricos-juegos-parejas-familias-dados-clavijas-fichas-virtuales-pantalla-tableta-ilustracion-vectorial_26765492.htm">Imagen de macrovector</a> en Freepik' }}" />

    <hr>
    <div class="card-body">
        <div class="btn-group pb-2">
            <i class="fa-solid fa-clock-rotate-left"></i><span class="px-2">{{$product->play_time}}min</span>
            <i class="fa-solid fa-users"></i><span class="px-2">{{$product->player_count_from}}-{{$product->player_count_to}}</span>
            <i class="fa-solid fa-person-circle-plus"></i><span class="px-2">{{$product->from_age}}+</span>
            <i class="fa-solid fa-signal"></i><span class="px-2"></span>
        </div>

        <div class="card-text h-24 overflow-hidden">
            <h4 class="text-lg">{{$product->name}}</h4>
            <small>{{$product->description}}</small>
        </div>

        <div class="d-flex justify-content-between align-items-center pt-3">
            <div class="btn-group pb-2"></div>
            <small class="px-2 text-xs text-stone-400">{{$product->update_at}}</small>
        </div>

    </div>
</div><!--[end of card]-->
