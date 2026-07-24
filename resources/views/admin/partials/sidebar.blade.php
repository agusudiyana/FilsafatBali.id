<div class="w-64 bg-[#1A110A] text-white min-h-screen">

    <div class="p-6 border-b border-[#3A2A1A]">

        <h1 class="text-2xl font-bold text-[#D4A64A]">
            FilsafatBali
        </h1>

        <p class="text-sm text-[#C7A56A]">
            Admin Panel
        </p>

    </div>

    <nav class="mt-6">

        <!-- Dashboard -->
        <a href="{{ route('admin.dashboard') }}"
            class="block px-6 py-3 hover:bg-[#C48D2D]">
            Dashboard
        </a>

        <p class="px-6 mt-6 mb-2 text-xs uppercase text-[#C7A56A]">
            Verifikasi Konten
        </p>

        <!-- Ajaran -->
        <a href="{{ route('admin.verifikasi.ajaran') }}"
            class="block px-6 py-3 hover:bg-[#C48D2D]">
            Verifikasi Ajaran
        </a>

        <!-- Cecimpedan -->
        <a href="{{ route('admin.verifikasi.cecimpedan') }}"
            class="block px-6 py-3 hover:bg-[#C48D2D]">
            Verifikasi Cecimpedan
        </a>

        <!-- Satua -->
        <a href="{{ route('admin.verifikasi.satua') }}"
            class="block px-6 py-3 hover:bg-[#C48D2D]">
            Verifikasi Satua Bali
        </a>

        <!-- Istilah -->
        <a href="{{ route('admin.verifikasi.istilah') }}"
            class="block px-6 py-3 hover:bg-[#C48D2D]">
            Verifikasi Istilah Bali
        </a>

        <p class="px-6 mt-6 mb-2 text-xs uppercase text-[#C7A56A]">
            Manajemen
        </p>

        <!-- Penulis -->
        <a href="#"
            class="block px-6 py-3 hover:bg-[#C48D2D]">
            Penulis
        </a>

        <!-- Pengguna -->
        <a href="#"
            class="block px-6 py-3 hover:bg-[#C48D2D]">
            Pengguna
        </a>

    </nav>

</div>