<nav class="bg-[#F7F1E3] shadow-md">
    <div class="max-w-7xl mx-auto flex items-center justify-between py-5 px-8">

        <!-- Logo -->
        <div>
            <h1 class="text-3xl font-bold text-red-900">
                FilsafatBali
            </h1>

            <p class="text-xs tracking-[5px] text-yellow-700">
                .ID • ARSIP BUDAYA
            </p>
        </div>

        <!-- Menu -->
        <ul class="hidden md:flex gap-8 text-sm uppercase font-semibold text-gray-700">
            <li>
                <a href="#" class="hover:text-red-700">
                    Ajaran Tetua
                </a>
            </li>

            <li>
                <a href="#" class="hover:text-red-700">
                    Cecimpedan
                </a>
            </li>

            <li>
                <a href="#" class="hover:text-red-700">
                    Satua & Istilah
                </a>
            </li>

            <li>
                <a href="#" class="hover:text-red-700">
                    Kontributor
                </a>
            </li>
        </ul>

        <!-- Tombol -->
        <div class="flex gap-3">

            <a href="{{ route('login') }}"
                class="border border-red-900 px-5 py-2 rounded-lg hover:bg-red-900 hover:text-white transition">
                Masuk
            </a>

            <a href="{{ route('register') }}"
                class="bg-red-900 text-white px-5 py-2 rounded-lg hover:bg-red-800 transition">
                Daftar
            </a>

        </div>

    </div>
</nav>