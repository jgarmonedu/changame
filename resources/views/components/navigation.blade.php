<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-24">
            <div class="flex align-items-center w-full">
                <!-- Logo -->
                <div class="justify-center lg:justify-start">
                    <a href="/">
                        <x-application-logo class="fill-current text-gray-800" alt="logotipo"/>
                    </a>
                </div>
                <div class="hidden space-x-3 sm:-my-px sm:ms-10 sm:flex sm:justify-end align-items-center" style="width: 100%">
                    <div class="flex flex-col justify-center px-10" style="width: 60%">
                        <label for="search"
                               class="hidden mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">{{ __('Search') }}</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                <i class="fa-solid fa-magnifying-glass fa-1x text-green-600"></i>
                            </div>
                            <form method="GET" action="/products/?{{ http_build_query(request()->except('search','page')) }}">
                                @if (isset($filters))
                                    @foreach ($filters as $filter)
                                        @if (request($filter) && $filter!='search')
                                            <input type="hidden" name="{{$filter}}" value="{{ request($filter) }}">
                                        @endif
                                    @endforeach
                                @endif
                                <input type="search" id="search" name="search"
                                       class="block w-full p-2.5 ps-10 text-md text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-950 focus:border-blue-950 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-950 dark:focus:border-blue-950"
                                       placeholder="{{ __('Search') }}"
                                       value="{{ request('search') }}"
                                />
                            </form>
                        </div>
                    </div>

                    <x-nav-link :href="route('my.product.create')" :active="request()->routeIs('my.product.create')">
                        {{ __('Contribute') }}
                    </x-nav-link>
                    <x-nav-link :href="route('products')" :active="request()->routeIs('products')">
                        {{ __('Catalogue') }}
                    </x-nav-link>
                    @auth
                        @php
                            $donates=Auth::user()->donations()->whereNull('change_with')->count();
                        @endphp
                        @if($donates>0)
                            <x-icon-link class="position-relative" :href="route('my.products.donate')" :active="request()->routeIs('my.products.donate')">
                                <i class="fa-solid fa-bullhorn fa-xl text-blue-950"></i>
                                <span class="position-absolute pt-1.5 start-100 translate-middle badge rounded-pill bg-green-600">
                                    <span class="text-white">{{ $donates }}</span>
                                </span>
                            </x-icon-link>
                            @endif
                        @endauth

                    <x-icon-link class="position-relative" :href="route('my.products.favorite')" :active="request()->routeIs('my.products.favorite')" title="{{ __('Favorites') }}">
                        <i class="fa-sharp fa-regular fa-heart fa-xl text-blue-950"></i>
                        @auth
                        @php
                        $favorites=Auth::user()->favorites()->whereNull('change_with')->count();
                        @endphp
                        @if($favorites>0)
                        <span
                            class="position-absolute pt-1.5 start-100 translate-middle badge rounded-pill bg-warning">
                            <span class="text-blue-950">{{ $favorites }}</span>
                        </span>
                        @endif
                        @endauth
                    </x-icon-link>
                    @auth
                        <x-icon-link class="position-relative" :href="route('my.products.agreement')" :active="request()->routeIs('my.products.agreement')">
                            <i class="fa-solid fa-people-arrows fa-lg  text-blue-950"></i>
                            @php
                                $agreements=Auth::user()->agreements()->count();
                            @endphp
                            @if( $agreements>0 )
                                <span
                                    class="position-absolute pt-1.5 ms-4 translate-middle badge rounded-pill bg-blue-950">
                                    <span class="text-white">{{  $agreements }}</span>
                                </span>
                            @endif
                        </x-icon-link>
                        <x-icon-link>
                            <i class="fa-regular fa-bell  fa-lg text-blue-950"></i>
                        </x-icon-link>
                    @endauth
                    @guest
                        <a href="{{ route('login') }}">
                            <x-form.primary-button>
                                {{ __('Login') }}
                            </x-form.primary-button>
                        </a>
                    @endguest
                </div>
                <!-- Settings Dropdown -->
                <div class="hidden sm:flex sm:items-center sm:ms-6">
                    @if (Route::has('login'))
                        @auth
                            <x-dropdown align="right">
                                <x-slot name="trigger">
                                    <x-form.primary-button class="text-blue-950 gap-2 hover:text-white font-semibold justify-content-between">
                                        <div>
                                            @if (Auth::user()->photo)
                                                <img class="rounded-full shadow-md w-24 m-[-3px]" src="{{ asset('storage/' .  Auth::user()->photo) }}" >
                                            @else
                                                <i class="fa-regular fa-user w-4"></i>
                                            @endif
                                        </div>
                                        {{ strtok(Auth::user()->name, " ") }}
                                        <div><i class="fa-solid fa-chevron-down"></i></div>
                                    </x-form.primary-button>
                                </x-slot>
                                <x-slot name="content">
                                    <span class="ps-2 text-xs uppercase"> {{ __('Explorer') }}</span>
                                    <x-dropdown-link :href="route('my.products.favorite')">
                                        {{ __('Favorites') }}
                                    </x-dropdown-link>
                                    <x-dropdown-link :href="route('my.products.agreement')">
                                        {{ __('Agreements') }}
                                    </x-dropdown-link>
                                    <x-dropdown-link :href="route('my.products')">   {{--?owner='.Auth::user()->id --}}
                                        {{ __('Contributions') }}
                                    </x-dropdown-link>
                                    <x-dropdown-link :href="route('my.products.donate')">
                                        {{ __('Donations') }}
                                    </x-dropdown-link>
                                    @admin
                                    <span class="ps-2 text-xs uppercase"> {{ __('Administration') }}</span>
                                    <x-dropdown-link :href="route('dashboard')">
                                        {{ __('Dashboard') }}
                                    </x-dropdown-link>
                                    @endadmin
                                    <span class="ps-2 text-xs uppercase">{{ __('Account') }}</span>
                                    <x-dropdown-link :href="route('profile.edit')">
                                        {{ __('Profile') }}
                                    </x-dropdown-link>
                                    <!-- Authentication -->
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <x-dropdown-link :href="route('logout')"
                                                         onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                            {{ __('Log Out') }}
                                        </x-dropdown-link>
                                    </form>
                                </x-slot>
                            </x-dropdown>
                        @endauth
                    @endif
                </div>
            </div>


            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                        class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex"
                              stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16"/>
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                              stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        @guest()
            <a href="{{ route('login') }}">
                <x-form.primary-button class="mb-3">
                    {{ __('Login') }}
                </x-form.primary-button>
            </a>
        @endguest
        @auth
            <div class="pt-2 pb-3 space-y-1">
                <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    {{ __('Dashboard') }}
                </x-responsive-nav-link>
            </div>

            <!-- Responsive Settings Options -->
            <div class="pt-4 pb-1 border-t border-gray-200">
                <div class="px-4">
                    <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>

                <div class="mt-3 space-y-1">
                    <hr class="p-2">
                    <x-responsive-nav-link :href="route('products')">
                        {{ __('Catalogue') }}
                    </x-responsive-nav-link>
                    <hr class="p-2">
                    <x-responsive-nav-link :href="route('my.products.favorite')">
                        {{ __('Favorites') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('my.products.agreement')">
                        {{ __('Agreements') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('my.products')">
                        {{ __('Contributions') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('my.products.donate')">
                        {{ __('Donations') }}
                    </x-responsive-nav-link>
                    <hr class="p-2">
                    <x-responsive-nav-link :href="route('profile.edit')">
                        {{ __('Profile') }}
                    </x-responsive-nav-link>

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-responsive-nav-link :href="route('logout')"
                                               onclick="event.preventDefault();
                                        this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </form>
                </div>
            </div>
        @endauth
    </div>
</nav>
