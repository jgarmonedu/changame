<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/sass/app.scss', 'resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans bg-gray-100 antialiased">
    <section class="">
        <div class="container p-3 p-md-4 p-xl-5">
            <div class="row justify-content-center">
                <div class="col-12 col-xxl-10">
                    <div class="card border-light-subtle shadow-sm">
                        <div class="row g-0">
                            <div class="col-12 col-md-6 p-5 mx-auto">
                                <img class="img-fluid rounded-start w-100 h-100 object-fit-cover" loading="lazy" src="https://img.freepik.com/foto-gratis/dados-3d-estudio_23-2151110451.jpg" alt="Bienvenido!">
                            </div>
                            <div class="col-12 col-md-6 d-flex align-items-center justify-content-center">
                                <div class="col-12 col-lg-11 col-xl-10">
                                    <div class="card-body p-3 p-md-4 p-xl-5">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="mb-5">
                                                    <div class="text-center mb-4">
                                                        <a href="/">
                                                            <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                                                        </a>
                                                    </div>
                                                    <h4 class="text-2xl text-blue-950 text-center font-bold">Bienvenido al Changame!</h4>
                                                </div>
                                            </div>
                                        </div>
                                        {{ $slot }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    </body>
</html>
