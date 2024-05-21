@props(['product'])
@php
$src = $product->thumbnail==null ? asset('storage/' . $product->thumbnail) : '/images/boardgames.jpg';
$alt = $product->thumbnail==null ? $product->name : '<a href="https://www.freepik.es/vector-gratis/juegos-mesa-isometricos-juegos-parejas-familias-dados-clavijas-fichas-virtuales-pantalla-tableta-ilustracion-vectorial_26765492.htm">Imagen de macrovector</a> en Freepik';
@endphp
<img {{ $attributes->merge(['src'=> $src, 'class' => 'max-w-full rounded-lg', 'alt' => $alt]) }} />
