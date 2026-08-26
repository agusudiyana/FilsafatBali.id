<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <!-- Viewport Penting untuk Responsif di HP & Laptop -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'FilsafatBali.id') }}</title>

        <!-- Fonts (Figtree & Cormorant Garamond untuk Nuansa Bali) -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600|cormorant-garamond:600,700&display=swap" rel="stylesheet" />

        <!-- Feather Icons (Interface & UI) -->
        <script src="https://unpkg.com/feather-icons"></script>

        <!-- Scripts & Styles via Vite -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased text-[#23160E] bg-[#F7F0E7] selection:bg-[#8D2B1D] selection:text-white overflow-x-hidden min-h-screen">
        <div class="min-h-screen flex flex-col justify-between w-full overflow-x-hidden bg-[#F7F0E7]">
            
            <!-- Bilah Navigasi Utama (Navbar) -->
            @include('layouts.navigation')

            <!-- Header Halaman (Opsional) -->
            @isset($header)
                <header class="bg-[#FAF5ED] border-b border-[#EADCC9] shadow-sm">
                    <div class="max-w-7xl mx-auto py-4 sm:py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Konten Utama (Aman & Pas di Layar HP/Laptop) -->
            <main class="flex-grow w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 sm:py-8">
                {{ $slot }}
            </main>

        </div>

        <!-- Inisialisasi Otomatis Feather Icons -->
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                if (typeof feather !== 'undefined') {
                    feather.replace();
                }
            });
        </script>
    </body>
</html>