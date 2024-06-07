@props(['name'])


<textarea
    class="p-2 h-32 w-full border-gray-300 focus:border-green-600 focus:ring-green-600 rounded-md shadow-sm"
    name="{{ $name }}"
    id="{{ $name }}"
    required
    {{ $attributes }}
>{{ $slot ?? old($name) }}</textarea>


