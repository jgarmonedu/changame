@include('layouts._header')
<body class="font-sans antialiased dark:bg-black dark:text-white/50">
<div class="bg-white text-black/50 dark:bg-black dark:text-white/50">
    <div
        class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#142e51] selection:text-white">
        <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
            <header class="grid grid-cols-1 lg:grid-cols-4 items-center gap-2 py-8">
                <div class="flex justify-center lg:justify-start">
                    <a href="/"><x-application-logo class="block h-9 w-auto fill-current text-gray-800" /></a>
                </div>
                <div class="flex flex-col col-span-1 lg:col-span-2 justify-center px-10">
                    <label for="search"
                           class="hidden mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">{{ __('Search') }}</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                            <i class="fa-solid fa-magnifying-glass fa-1x text-green-600"></i>
                        </div>
                        <input type="search" id="search"
                               class="block w-full p-2.5 ps-10 text-md text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-950 focus:border-blue-950 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-950 dark:focus:border-blue-950"
                               placeholder="{{ __('Search') }}"/>
                    </div>
                </div>
                <nav class="-mx-3 flex flex-1 justify-center lg:justify-end">
                    <span class="menu-item">
                        <a class="text-md pe-4 pt-2 text-black/60 ring-1 ring-transparent transition hover:text-blue-950 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white/80 dark:hover:text-white dark:focus-visible:ring-white"
                           href="#">{{ __('Contribute') }}</a>
                    </span>
                    <a class="text-md pe-4 pt-2 text-black/60 ring-1 ring-transparent transition hover:text-blue-950 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white/80 dark:hover:text-white dark:focus-visible:ring-white"
                       href="#" title="{{ __('Favourites') }}"><i class="fa-sharp fa-regular fa-heart fa-lg text-blue-950"></i></a>
                    <span class="menu-item">
                        <a class="text-md pe-4 pt-2 text-black/60 ring-1 ring-transparent transition hover:text-blue-950 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white/80 dark:hover:text-white dark:focus-visible:ring-white"
                           href="#">{{ __('Help') }}</a>
                    </span>

                    @if (Route::has('login'))
                        @auth
                            <a
                                href="{{ url('/dashboard') }}"
                                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                            >
                                Dashboard
                            </a>
                        @else
                            <a href="{{ route('login') }}">
                                <x-form.primary-button>
                                    {{ __('Login') }}
                                </x-form.primary-button>
                            </a>

                            {{--                            @if (Route::has('register'))--}}
                            {{--                                <a--}}
                            {{--                                    href="{{ route('register') }}"--}}
                            {{--                                    class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"--}}
                            {{--                                >--}}
                            {{--                                    Register--}}
                            {{--                                </a>--}}
                            {{--                            @endif--}}
                        @endauth
                    @endif
                </nav>
            </header>
            <hr>
            <main class="mt-6">
                <div class="grid lg:grid-cols-1 lg:gap-8 text-center py-10 text-black">
                    <h2 class="text-3xl fond-semibold">Intercambia tu juego</h2>
                    <div class="leading-8">
                        <p>Dale a una nueva vida a un juego que ya no usas. Permite que personas puedan disfrutar de tu
                            mismo juego.</p>
                        <p>Ofrece un juego propio, con idea de localizar a alguien que pueda
                            estar interesado en él, de forma que se puedas alcanzar un acuerdo de intercambio.</p>
                    </div>
                    <hr class="w-1/2 h-px mx-auto bg-black border-0 rounded md:my-5 dark:bg-gray-400">
                </div>
                <div class="grid lg:grid-cols-1 lg:gap-8 text-start pb-32">
                    <h2 class="text-xl fond-semibold ms-32 text-blue-950">Últimas incorporaciones</h2>
                </div>
                <div class="grid lg:grid-cols-1 lg:gap-8 text-start">
                    <h2 class="text-xl fond-semibold ms-32 text-blue-950">Nuestros objetivos</h2>
                    <div class="grid gap-6 lg:grid-cols-2 lg:gap-8 ps-10">
                        <div class="flex justify-end">
                            <div id="carouselObjetives" class="carousel slide bg-blue-950"
                                 style="height: 380px; width: 500px;" data-bs-ride="carousel">
                                <div class="carousel-indicators text-blue-950">
                                    <button type="button" data-bs-target="#carouselObjetives" data-bs-slide-to="0"
                                            class="active" aria-current="true" aria-label="Slide 1"></button>
                                    <button type="button" data-bs-target="#carouselObjetives" data-bs-slide-to="1"
                                            aria-label="Slide 2"></button>
                                    <button type="button" data-bs-target="#carouselObjetives" data-bs-slide-to="2"
                                            aria-label="Slide 3"></button>
                                    <button type="button" data-bs-target="#carouselObjetives" data-bs-slide-to="3"
                                            aria-label="Slide 4"></button>
                                    <button type="button" data-bs-target="#carouselObjetives" data-bs-slide-to="4"
                                            aria-label="Slide 5"></button>
                                    <button type="button" data-bs-target="#carouselObjetives" data-bs-slide-to="5"
                                            aria-label="Slide 6"></button>
                                </div>
                                <div class="carousel-inner">
                                    <div class="carousel-item active text-center p-4 text-white">
                                        <h2 class="text-3xl pt-10 pb-4">Variedad de experiencia de juego</h2>
                                        <p class="pb-12">Intercambiar juegos permite a los jugadores acceder a una
                                            amplia variedad de juegos sin tener que gastar grandes sumas de dinero en comprarlos todos.
                                            Esto les brinda la oportunidad de probar diferentes estilos de juegos, géneros y mecánicas de
                                            juego.</p>
                                    </div>
                                    <div class="carousel-item text-center p-4 text-white">
                                        <h2 class="text-3xl pt-10 pb-4">Fomentamos la colaboración y la competencia amistosa</h2>
                                        <p class="pb-12">Al intercambiar juegos, los jugadores
                                            pueden reunirse para jugar juntos, lo que fomenta la colaboración, la cooperación y la construcción
                                            de relaciones sociales positivas. También pueden competir de manera amistosa en los
                                            juegos intercambiados, lo que promueve habilidades de resolución de problemas y pensamiento
                                            estratégico.</p>
                                    </div>
                                    <div class="carousel-item text-center p-4 text-white">
                                        <h2 class="text-3xl pt-10 pb-4">Ahorro de dinero</h2>
                                        <p class="pb-12">Intercambiar juegos es una forma económica de expandir la biblioteca de
                                            juegos de uno sin tener que comprarlos nuevos. Esto es especialmente útil dado el costo relativamente
                                            alto de muchos juegos de mesa y videojuegos.</p>
                                    </div>
                                    <div class="carousel-item text-center p-4 text-white">
                                        <h2 class="text-3xl pt-10 pb-4">Renovación de la experiencia de juego</h2>
                                        <p class="pb-12">Intercambiar juegos usados puede brindar a los jugadores
                                            una forma de renovar su experiencia de juego al obtener juegos nuevos para ellos sin
                                            tener que gastar dinero adicional.</p>
                                    </div>
                                    <div class="carousel-item text-center p-4 text-white">
                                        <h2 class="text-3xl pt-10 pb-4">Promueve la sostenibilidad</h2>
                                        <p class="pb-12">Al intercambiar juegos, se fomenta la reutilización y el reciclaje de
                                            juegos usados en lugar de desecharlos. Esto ayuda a reducir el desperdicio y promueve prácticas
                                            más sostenibles.</p>
                                    </div>
                                    <div class="carousel-item text-center p-4 text-white">
                                        <h2 class="text-3xl pt-10 pb-4">Despertar nuevos intereses</h2>
                                        <p class="pb-12">Intercambiar juegos puede permitir a los jugadores explorar
                                            nuevos intereses y géneros de juegos que de otra manera no habrían considerado comprar.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="w-4/6">
                            <img src="/images/banner-1.png" alt="objetivos">
                        </div>
                    </div>
                </div>
                <div class="grid lg:grid-cols-1 lg:gap-8 text-center py-10 text-black">
                    <hr class="w-1/2 h-px mx-auto my-4 bg-black border-0 rounded md:my-10 dark:bg-gray-400">
                    <div class="container text-center">
                        <h2 class="text-3xl fond-semibold pb-10">¡Entre todos hagamos un mundo mejor!</h2>
                        <div>
                            <p>Trabajamos en desarrollar objetivos de Desarrollo Sostenible (ODS) diseñados para ser un
                                «plan para
                                lograr un futuro mejor y más sostenible para todos. </p>
                            <ul class="pt-8 leading-8 italic">
                                <li class="list-group-item fst-italic"><small>"Garantizar una educación inclusiva,
                                        equitativa y de
                                        calidad y promover oportunidades de aprendizaje durante toda la vida para
                                        todos"</small>
                                </li>
                                <li class="list-group-item fst-italic"><small>"Lograr que las ciudades sean más
                                        inclusivas, seguras,
                                        resilientes y sostenibles"</small></li>
                                <li class="list-group-item fst-italic"><small>"Garantizar modalidades de consumo y
                                        producción
                                        sostenibles"</small></li>
                                <li class="list-group-item fst-italic"><small>"Adoptar medidas urgentes para combatir el
                                        cambio
                                        climático y sus efectos"</small></li>
                            </ul>
                        </div>

                        <div class="flex flex-wrap justify-center gap-3 pt-5">
                            <img
                                src="https://www.un.org/sustainabledevelopment/es/wp-content/uploads/sites/3/2018/07/S_SDG-goals_icons-individual-rgb-04.png"
                                class="size-24" alt="ODS 4">
                            <img
                                src="https://www.un.org/sustainabledevelopment/es/wp-content/uploads/sites/3/2018/07/S_SDG-goals_icons-individual-rgb-11.png"
                                class="size-24" alt="ODS 11">
                            <img
                                src="https://www.un.org/sustainabledevelopment/es/wp-content/uploads/sites/3/2018/07/S_SDG-goals_icons-individual-rgb-12.png"
                                class="size-24" alt="ODS 12">
                            <img
                                src="https://www.un.org/sustainabledevelopment/es/wp-content/uploads/sites/3/2018/07/S_SDG-goals_icons-individual-rgb-13.png"
                                class="size-24" alt="ODS 13">
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div class="relative w-full">
            @include('layouts._footer')
        </div>
    </div>
</div>
</body>
</html>
