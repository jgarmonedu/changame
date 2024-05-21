@include('layouts._header')
<body class="font-sans antialiased dark:bg-black dark:text-white/50">
<div class="bg-white text-black/50">
    <div class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#142e51] selection:text-white">
        <!-- Primary Navigation Menu -->
        <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
            <x-navigation/>
            <hr>
            <main class="mt-6 min-h-screen">
                <x-header-content />
                <x-last-products-content :products="$products"/>
                <x-objetive-content :goals="$goals" />
                <x-ods-content  :ods="$ods" />
            </main>
        </div>
@include('layouts._footer')
