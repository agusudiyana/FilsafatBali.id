<div class="bg-white shadow-md px-8 py-5 flex justify-between items-center">

    <div>

        <h2 class="text-2xl font-bold text-[#1A110A]">
            Dashboard
        </h2>

        <p class="text-gray-500 text-sm">
            Selamat datang di Panel Admin
        </p>

    </div>

    <div class="flex items-center gap-4">

        <div class="w-10 h-10 rounded-full bg-[#C48D2D] flex items-center justify-center text-white font-bold">
            {{ strtoupper(substr(Auth::user()->name,0,1)) }}
        </div>

        <div>

            <p class="font-semibold">
                {{ Auth::user()->name }}
            </p>

            <p class="text-sm text-gray-500">
                Administrator
            </p>

        </div>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button
                type="submit"
                class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg transition">
                Logout
            </button>

        </form>

    </div>

</div>