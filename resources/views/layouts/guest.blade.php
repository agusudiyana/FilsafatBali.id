<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'FilsafatBali.id') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@600;700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-[#2B1A0E] antialiased bg-[#FAF6F0]">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-[#FAF6F0]">
            
            <!-- KOTAK PUTIH UTAMA -->
            <div class="w-full sm:max-w-md mt-6 px-6 py-8 bg-white shadow-lg border border-[#E5D6BF] overflow-hidden sm:rounded-2xl">
                
                <!-- LOGO UKURAN JUMBO (w-28 h-28) & TETAP PAS DI TENANGBAGIAN ATAS -->
                <div class="flex flex-col items-center justify-center mt-6 mb-4">
                    <a href="{{ url('/') }}" class="inline-block group">
                        <img src="{{ asset('images/logo.png') }}" alt="Logo Filsafat Bali" class="w-28 h-28 object-contain transition-transform duration-300 group-hover:scale-105">
                    </a>
                </div>

                <!-- Konten Form (Login/Register) -->
                {{ $slot }}
            </div>

        </div>
    </body>
</html>