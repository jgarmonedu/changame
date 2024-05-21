@props(['name','type','text','filters'])

<form method="GET" action="/products/?{{ http_build_query(request()->except('name','page')) }}">
    @foreach ($filters as $filter)
        @if (request($filter) && $filter!=$name)
            <input type="hidden" name="{{$filter}}" value="{{ request($filter) }}">
        @endif
    @endforeach
    <div class="relative lg:inline-flex items-center rounded-xl gap-2">
        <x-form.text-input id="{{ $name }}" class="block mt-1 w-full" type="{{ $type }}" name="{{ $name }}"
                           autofocus autocomplete="{{ $name }}" placeholder=" {{ __($text) }}"
                           value="{{ request($name) }}"/>
    </div>
</form>
