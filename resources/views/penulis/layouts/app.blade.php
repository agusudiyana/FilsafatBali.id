<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penulis - FilsafatBali</title>

    <!-- Vite CSS & JS -->
    @vite(['resources/css/app.css','resources/js/app.js'])

    <!-- Alpine.js untuk Dropdown Profil -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <!-- Feather Icons (Opsional jika digunakan di dalam halaman) -->
    <script src="https://unpkg.com/feather-icons"></script>
</head>

<body class="bg-[#F7F0E7] font-sans antialiased">

<div class="flex min-h-screen">

    <!-- Sidebar Penulis -->
    @include('penulis.partials.sidebar')

    <div class="flex-1 flex flex-col min-w-0">

        <!-- Navbar Penulis -->
        @include('penulis.partials.navbar')

        <main class="p-8 flex-1">
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