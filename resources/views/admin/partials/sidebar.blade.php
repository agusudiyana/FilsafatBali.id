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
            class="block px-6 py-3 hover:bg-[#C48D2D] transition-colors">
            Dashboard
        </a>

        <p class="px-6 mt-6 mb-2 text-xs uppercase text-[#C7A56A] font-semibold tracking-wider">
            Verifikasi Konten
        </p>

        <!-- Verifikasi Artikel -->
        <a href="{{ route('admin.verifikasi.artikel') }}"
            class="block px-6 py-3 hover:bg-[#C48D2D] transition-colors">
            Verifikasi Artikel
        </a>

        <!-- Cecimpedan -->
        <a href="{{ route('admin.verifikasi.cecimpedan') }}"
            class="block px-6 py-3 hover:bg-[#C48D2D] transition-colors">
            Verifikasi Cecimpedan
        </a>

        <!-- Satua -->
        <a href="{{ route('admin.verifikasi.satua') }}"
            class="block px-6 py-3 hover:bg-[#C48D2D] transition-colors">
            Verifikasi Satua Bali
        </a>

        <!-- Istilah -->
        <a href="{{ route('admin.verifikasi.istilah') }}"
            class="block px-6 py-3 hover:bg-[#C48D2D] transition-colors">
            Verifikasi Istilah Bali
        </a>

        <p class="px-6 mt-6 mb-2 text-xs uppercase text-[#C7A56A] font-semibold tracking-wider">
            Manajemen
        </p>

        <!-- Penulis -->
        <a href="{{ route('admin.penulis.index') }}"
            class="block px-6 py-3 hover:bg-[#C48D2D] transition-colors">
            Penulis
        </a>

        <!-- Pengguna -->
        <a href="{{ route('admin.pengguna.index') }}"
            class="block px-6 py-3 hover:bg-[#C48D2D] transition-colors">
            Pengguna
        </a>

    </nav>

</div>