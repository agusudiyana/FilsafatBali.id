<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <!-- Viewport Responsif Ponsel (HP) -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'FilsafatBali.id') }}</title>

        <!-- Fonts (Inter & Cormorant Garamond) -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@600;700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">

        <!-- Scripts & Styles via Vite -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-[#2B1A0E] antialiased bg-[#FAF6F0] min-h-screen">
        <div class="min-h-screen flex flex-col justify-center items-center px-4 py-8 sm:px-6 bg-[#FAF6F0]">
            
            <!-- KOTAK PUTIH UTAMA (RESPONSIF HP & LAPTOP) -->
            <div class="w-full max-w-sm sm:max-w-md bg-white shadow-xl border border-[#E5D6BF] overflow-hidden rounded-2xl p-6 sm:p-8">
                
                <!-- LOGO TERBESAR DENGAN TEKS DIHAPUS -->
                <div class="flex flex-col items-center justify-center mb-4">
                    <a href="{{ url('/') }}" class="inline-block group">
                        <img src="{{ asset('images/logo.png') }}" 
                             alt="Logo Filsafat Bali" 
                             class="w-28 h-28 sm:w-32 sm:h-32 object-contain transition-transform duration-300 group-hover:scale-105">
                    </a>
                </div>

                <!-- Konten Form (Login/Register/Reset Password) -->
                <div class="w-full">
                    {{ $slot }}
                </div>
                
            </div>

        </div>
    </body>
</html>