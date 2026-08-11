<!DOCTYPE html>
<html lang="id" class="h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penulis - FilsafatBali</title>

    <!-- Vite CSS & JS -->
    @vite(['resources/css/app.css','resources/js/app.js'])

    <!-- Alpine.js untuk Dropdown Profil -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <!-- Feather Icons CDN -->
    <script src="https://unpkg.com/feather-icons"></script>

    <!-- CSS Sembunyikan Scrollbar -->
    <style>
        ::-webkit-scrollbar {
            display: none !important;
            width: 0 !important;
            height: 0 !important;
        }

        html, body, div, main {
            -ms-overflow-style: none !important;
            scrollbar-width: none !important;
        }
    </style>
</head>

<body class="bg-[#F7F0E7] font-sans antialiased h-full overflow-hidden">

<div class="flex h-screen w-screen overflow-hidden">

    <!-- 1. SIDEBAR (Terkunci Murni di Kiri) -->
    <aside class="w-64 flex-shrink-0 h-full bg-[#1A110A] z-30">
        @include('penulis.partials.sidebar')
    </aside>

    <!-- 2. AREA KANAN (TopBar + Main Area) -->
    <div class="flex-1 min-w-0 flex flex-col h-full overflow-hidden relative">

        <!-- Topbar Navbar (DIAM DI TEMPAT / TIDAK BISA BERGOYANG) -->
        <header class="w-full flex-none bg-[#52130D] border-b border-[#3D0C07] z-20">
            @include('penulis.partials.navbar')
        </header>

        <!-- Main Content Area (HANYA AREA INI YANG BISA DI-SCROLL) -->
        <main class="flex-1 overflow-y-auto p-6">
            @yield('content')
        </main>

    </div>

</div>

<!-- Inisialisasi Feather Icons -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        if (typeof feather !== 'undefined') {
            feather.replace();
        }
    });
</script>

</body>

</html>