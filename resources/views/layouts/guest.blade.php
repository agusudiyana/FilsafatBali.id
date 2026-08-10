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
                
                <!-- LOGO & TEKS FILSAFAT BALI DI DALAM KOTAK PUTIH -->
                <div class="flex flex-col items-center justify-center mb-6">
                    <a href="{{ url('/') }}" class="flex flex-col items-center gap-2 group">
                        <!-- Gambar Logo Diperbesar -->
                        <img src="{{ asset('images/logo.png') }}" alt="Logo Filsafat Bali" class="w-16 h-16 object-contain transition-transform duration-300 group-hover:scale-105">
                        
                        <!-- Teks Judul -->
                        <span style="font-family: 'Cormorant Garamond', serif;" class="text-2xl font-bold tracking-tight text-[#8D2B1D] leading-none">
                            FilsafatBali.id
                        </span>
                        
                        <!-- Subtitle -->
                        <span class="text-[9px] tracking-[2.5px] uppercase font-semibold text-[#C8A45A]">
                            ARSIPAN BUDAYA
                        </span>
                    </a>
                </div>

                <!-- Konten Form Login akan dirender di sini lewat $slot -->
                {{ $slot }}
            </div>

        </div>
    </body>
</html>