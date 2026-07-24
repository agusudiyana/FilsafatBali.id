<header class="bg-white shadow px-8 py-5 flex justify-between items-center">

    <div>

        <h1 class="text-3xl font-bold">

            Dashboard Penulis

        </h1>

        <p class="text-gray-500">

            Selamat datang di Panel Penulis

        </p>

    </div>

    <div class="flex items-center gap-4">

        <div
            class="w-12 h-12 rounded-full bg-[#D4A64A] text-white flex items-center justify-center font-bold">

            {{ strtoupper(substr(auth()->user()->name,0,1)) }}

        </div>

        <div>

            <h3 class="font-semibold">

                {{ auth()->user()->name }}

            </h3>

            <small class="text-gray-500">

                Penulis

            </small>

        </div>

    </div>

</header>