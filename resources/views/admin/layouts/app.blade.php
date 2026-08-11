<!DOCTYPE html>
<html lang="id">

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

<body class="bg-[#F7F0E7] min-h-screen text-[#1A110A] font-sans antialiased">

    <div class="flex min-h-screen">

        <!-- Sidebar Admin (Fixed di Kiri) -->
        @include('admin.partials.sidebar')

        <!-- Area Kanan Konten -->
        <div class="flex-1 ml-64 min-w-0 min-h-screen flex flex-col">

            <!-- Navbar Admin Fixed (Terkunci di Atas) -->
            <header class="fixed top-0 right-0 left-64 z-40 bg-white border-b border-gray-100 shadow-sm">
                @include('admin.partials.navbar')
            </header>

            <!-- Main Content Area (Diberi pt-24 agar konten tidak tertutup Navbar) -->
            <main class="p-8 pt-24 flex-1 overflow-y-auto">
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