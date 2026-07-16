<nav class="bg-[#F7F1E3] shadow">

    <div class="max-w-7xl mx-auto flex items-center justify-between py-5 px-8">

        <div>
            <h1 class="text-3xl font-bold text-red-900">
                FilsafatBali
            </h1>

            <p class="text-xs tracking-[5px] text-yellow-700">
                .ID • ARSIP BUDAYA
            </p>
        </div>

        <ul class="hidden md:flex gap-10 uppercase text-sm">

            <li><a href="#">Ajaran Tetua</a></li>
            <li><a href="#">Cecimpedan</a></li>
            <li><a href="#">Satua & Istilah</a></li>
            <li><a href="#">Kontributor</a></li>

        </ul>

        <div class="flex gap-3">

            <a href="{{ route('login') }}"
                class="border border-red-900 px-5 py-2 rounded-lg">
                Masuk
            </a>

            <a href="{{ route('register') }}"
                class="bg-red-900 text-white px-5 py-2 rounded-lg">
                Daftar
            </a>

        </div>

    </div>

</nav>