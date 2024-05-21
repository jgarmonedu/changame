@props(['filters']) {{-- pasamos los filtros para el control de search --}}

@include('layouts._header')
<body class="font-sans antialiased dark:bg-black dark:text-white/50">
<div class="bg-white text-black/50">
    <div class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#142e51] selection:text-white">
        <!-- Primary Navigation Menu -->
        <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
            @if (isset($filters))
                <x-navigation :filters="$filters"/>
            @else
                <x-navigation/>
            @endif
            <hr>
            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow-md text-blue-950">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif
            <main class="mt-6 min-h-screen">
                {{ $slot }}
            </main>
        </div>
@include('layouts._footer')

