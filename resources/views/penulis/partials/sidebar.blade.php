<div class="w-64 bg-[#1A110A] text-white min-h-screen">

    <div class="p-6 border-b border-[#3A2A1A]">

        <h1 class="text-2xl font-bold text-[#D4A64A]">
            FilsafatBali
        </h1>

        <p class="text-sm text-[#C7A56A]">
            Panel Penulis
        </p>

    </div>

    <nav class="mt-6">

        <a href="{{ route('penulis.dashboard') }}"
           class="block px-6 py-3 hover:bg-[#C48D2D]">

            Dashboard

        </a>

        <a href="{{ route('penulis.ajaran.index') }}"
           class="block px-6 py-3 hover:bg-[#C48D2D]">

            Tambah Ajaran

        </a>

        <a href="{{ route('penulis.cecimpedan.index') }}"
           class="block px-6 py-3 hover:bg-[#C48D2D]">

            Tambah Cecimpedan

        </a>

        <a href="{{ route('penulis.satua.index') }}"
           class="block px-6 py-3 hover:bg-[#C48D2D]">

            Tambah Satua

        </a>

        <a href="{{ route('penulis.istilah.index') }}"
           class="block px-6 py-3 hover:bg-[#C48D2D]">

            Tambah Istilah

        </a>

        <a href="{{ route('penulis.riwayat') }}"
           class="block px-6 py-3 hover:bg-[#C48D2D]">

            Riwayat Kiriman

        </a>

    </nav>

</div>