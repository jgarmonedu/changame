@props(['active' => false])

@php
    $classes = 'block text-left px-3 text-sm leading-6 hover:bg-green-600 hover:text-white focus:bg-green-600' ;
    if ($active) $classes .= ' bg-green-600 text-white';
@endphp

<a {{ $attributes(['class' => $classes]) }}>
    {{ $slot }}
</a>
