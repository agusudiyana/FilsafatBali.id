<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <!-- Viewport Responsif Penuh untuk HP & Laptop -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'FilsafatBali.id') }}</title>

    <!-- Google & Bunny Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@500;600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">

    <!-- External Libraries (Swiper & Feather Icons) -->
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">

    <!-- Aset CSS & JS via Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        html {
            scroll-behavior: smooth;
        }

        section {
            scroll-margin-top: 80px;
        }

        /* Prevent Horizontal Overflow di HP */
        body {
            overflow-x: hidden;
        }
    </style>
</head>

<body class="bg-[#FAF6F0] text-[#2B1A0E] antialiased selection:bg-[#8D2B1D] selection:text-white min-h-screen flex flex-col justify-between" style="font-family:'Inter', sans-serif;">

    <!-- Navbar Utama -->
    @include('layouts.navigation')

    <!-- Konten Utama (Blade Yield) -->
    <main class="flex-grow w-full overflow-x-hidden">
        @yield('content')
    </main>

    <!-- Footer Utama -->
    @include('home.footer')

    <!-- Inisialisasi Feather Icons -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            if (typeof feather !== 'undefined') {
                feather.replace();
            }
        });
    </script>

</body>

</html>