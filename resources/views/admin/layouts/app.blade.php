<!DOCTYPE html>
<html lang="id" class="h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin FilsafatBali</title>

    <!-- Tailwind CSS / Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Feather Icons CDN -->
    <script src="https://unpkg.com/feather-icons"></script>

    <!-- Alpine.js untuk fitur dropdown profile navbar -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- CSS Sembunyikan Visual Scrollbar Tapi Tetap Bisa Di-scroll -->
    <style>
        /* Sembunyikan visual scrollbar untuk Chrome, Safari, dan Opera */
        ::-webkit-scrollbar {
            display: none !important;
            width: 0 !important;
            height: 0 !important;
        }

        /* Sembunyikan visual scrollbar untuk IE, Edge, dan Firefox */
        html, body, div, main {
            -ms-overflow-style: none !important;  /* IE dan Edge */
            scrollbar-width: none !important;  /* Firefox */
        }
    </style>
</head>

<body class="bg-[#F7F0E7] h-full text-[#1A110A] font-sans antialiased overflow-hidden">

    <div class="flex h-screen w-screen overflow-hidden">

        <!-- Sidebar Admin (Lebar Fixed w-64 di Kiri) -->
        <aside class="w-64 flex-shrink-0 h-full bg-[#1A110A] z-50">
            @include('admin.partials.sidebar')
        </aside>

        <!-- Area Kanan Konten (Fleksibel & Terkunci Murni) -->
        <div class="flex-1 min-w-0 flex flex-col h-full overflow-hidden relative">

            <!-- Navbar Admin (Flex-none: Terkunci di Atas Tanpa Fixed Melayang) -->
            <header class="w-full flex-none z-40 relative">
                @include('admin.partials.navbar')
            </header>

            <!-- Main Content Area (Scroll Hanya Berjalan di Dalam Area Ini) -->
            <main class="flex-1 overflow-y-auto p-8 relative z-10">
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