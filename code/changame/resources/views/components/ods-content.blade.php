<div class="grid lg:grid-cols-1 lg:gap-8 text-center py-10 text-black">
    <hr class="w-1/2 h-px mx-auto my-4 bg-black border-0 rounded md:my-10 dark:bg-gray-400">
    <div class="container text-center">
        <h2 class="text-3xl fond-semibold pb-10">¡Entre todos hagamos un mundo mejor!</h2>
        <div>
            <p>Trabajamos en desarrollar objetivos de Desarrollo Sostenible (ODS) diseñados para ser un
                «plan para
                lograr un futuro mejor y más sostenible para todos. </p>
            <ul class="pt-8 leading-8 italic">
                @foreach ($ods as $o)
                    <li class="list-group-item fst-italic"><small>"{{ $o->excerpt }}"</small></li>
                @endforeach
            </ul>
        </div>

        <div class="flex flex-wrap justify-center gap-3 pt-5">
            @foreach ($ods as $o)
                <a href="{{ $o->url }}">
                    <img src="{{ $o->logo }}" class="size-24" alt="{{ $o->alias }}">
                </a>
            @endforeach
        </div>
    </div>
</div>
