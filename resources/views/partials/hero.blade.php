<section class="relative h-screen">

    <!-- Background -->
    <img src="{{ asset('images/hero.jpg') }}"
        class="absolute inset-0 w-full h-full object-cover">

    <!-- Overlay -->
    <div class="absolute inset-0 bg-black/60"></div>

    <!-- Content -->
    <div class="relative z-10 flex flex-col justify-center items-center h-full text-center px-6">

        <span class="text-yellow-300 tracking-[8px] uppercase">
            Arsip Digital Budaya Bali
        </span>

        <h1 class="text-6xl md:text-7xl font-bold text-white mt-4">
            Menjaga Warisan
        </h1>

        <h2 class="text-5xl md:text-6xl font-bold text-yellow-400">
            Menerangi Masa Depan
        </h2>

        <p class="text-white mt-6 max-w-3xl text-lg">
            Jelajahi ajaran tetua Bali, cecimpedan, satua,
            istilah budaya, dan filosofi kehidupan dalam
            satu platform digital.
        </p>

        <div class="mt-10 w-full max-w-3xl">

            <input
                type="text"
                placeholder="Cari ajaran, satua, istilah..."
                class="w-full rounded-xl px-6 py-4 text-lg">

        </div>

    </div>

</section>