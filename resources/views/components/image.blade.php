@props(['product','image','class'])
@php
    $src =  $image!=null ? asset('storage/' .  $image->thumbnail) : 'https://loremflickr.com/320/240/boardgame?lock='.$product->id;
    $alt =  $image!=null ? $product->name : 'https://loremflickr.com/320/240/boardgame?lock='.$product->id;
@endphp
<img {{ $attributes->merge(['src'=> $src, 'class' => $class, 'alt' => $alt]) }}"/>
