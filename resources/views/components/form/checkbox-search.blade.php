@props(['name','text','filters'])


<form method="GET" id="noOwnerSearch" action="/products/?{{ http_build_query(request()->except('noOwner','page')) }}">
    @foreach ($filters as $filter)
        @if (request($filter) && $filter!=$name)
            <input type="hidden" name="{{$filter}}" value="{{ request($filter) }}">
        @endif
    @endforeach
    <label class="inline-flex items-center cursor-pointer">
        <input type="checkbox" id="{{ $name }}"
               name="{{ $name }}"
               value="{{ Auth()->user()->id }}"
               {{  request('noOwner') ? 'checked' : '' }}
               class="sr-only peer">
        <span class="ms-3">{{  __('No Owner') }}</span>
        <div class="relative ms-3 w-12 h-6 bg-gray-100 rounded-full
                        peer peer-checked:after:translate-x-full
                        rtl:peer-checked:after:-translate-x-full
                        peer-checked:after:border-white after:content-['']
                        after:absolute after:top-[2px] after:start-[2px]
                        after:bg-white after:border-gray-300 after:border
                        after:rounded-full after:h-5
                        after:w-5 after:transition-all
                        peer-checked:bg-green-600">
        </div>
    </label>
</form>



