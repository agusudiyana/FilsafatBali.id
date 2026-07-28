<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <!-- Banner Pesan Login -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-medium text-gray-900 mb-1">
                        {{ __('Selamat Datang Kembali, ') }} {{ Auth::user()->name }}! 👋
                    </h3>
                    <p class="text-sm text-gray-600">
                        {{ __('Anda berhasil login. Sekarang Anda dapat mengakses seluruh fitur khusus berikut:') }}
                    </p>
                </div>
            </div>

            <!-- Grid Fitur Sesuai Gambar -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                <!-- 1. Akses seluruh koleksi arsip -->
                <div
                    class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 border-l-4 border-amber-600 hover:shadow-md transition">
                    <div class="flex items-center space-x-3 mb-3">
                        <span class="text-2xl">📚</span>
                        <h4 class="font-semibold text-gray-800">Akses Seluruh Koleksi Arsip</h4>
                    </div>
                    <p class="text-sm text-gray-600 mb-4">
                        Jelajahi naskah kuno, manuskrip, dan dokumen sejarah filsafat Bali secara lengkap.
                    </p>
                    <a href="{{ route('arsip.index') }}"
                        class="inline-flex items-center text-sm font-semibold text-amber-700 hover:text-amber-900">
                        Buka Koleksi Arsip &rarr;
                    </a>
                </div>

                <!-- 2. Simpan artikel favorit -->
                <div
                    class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 border-l-4 border-amber-600 hover:shadow-md transition">
                    <div class="flex items-center space-x-3 mb-3">
                        <span class="text-2xl">🔖</span>
                        <h4 class="font-semibold text-gray-800">Simpan Artikel Favorit</h4>
                    </div>
                    <p class="text-sm text-gray-600 mb-4">
                        Akses kembali artikel dan bacaan yang telah Anda simpan sebelumnya.
                    </p>
                    <a href="{{ route('favorit.index') }}"
                        class="inline-flex items-center text-sm font-semibold text-amber-700 hover:text-amber-900">
                        Lihat Artikel Favorit &rarr;
                    </a>
                </div>

                <!-- 3. Ikuti diskusi komunitas -->
                <div
                    class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 border-l-4 border-amber-600 hover:shadow-md transition">
                    <div class="flex items-center space-x-3 mb-3">
                        <span class="text-2xl">💬</span>
                        <h4 class="font-semibold text-gray-800">Ikuti Diskusi Komunitas</h4>
                    </div>
                    <p class="text-sm text-gray-600 mb-4">
                        Sampaikan pemikiran dan berdiskusi dengan sesama anggota komunitas.
                    </p>
                    <a href="{{ route('komunitas.index') }}"
                        class="inline-flex items-center text-sm font-semibold text-amber-700 hover:text-amber-900">
                        Masuk Forum Diskusi &rarr;
                    </a>
                </div>

                <!-- 4. Unduh konten pilihan -->
                <div
                    class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 border-l-4 border-amber-600 hover:shadow-md transition">
                    <div class="flex items-center space-x-3 mb-3">
                        <span class="text-2xl">📥</span>
                        <h4 class="font-semibold text-gray-800">Unduh Konten Pilihan</h4>
                    </div>
                    <p class="text-sm text-gray-600 mb-4">
                        Unduh berkas PDF, e-book, atau dokumen pilihan langsung ke perangkat Anda.
                    </p>
                    <a href="{{ route('unduhan.index') }}"
                        class="inline-flex items-center text-sm font-semibold text-amber-700 hover:text-amber-900">
                        Pusat Unduhan &rarr;
                    </a>
                </div>

                <!-- 5. Notifikasi artikel terbaru -->
                <div
                    class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 border-l-4 border-amber-600 hover:shadow-md transition">
                    <div class="flex items-center space-x-3 mb-3">
                        <span class="text-2xl">🔔</span>
                        <h4 class="font-semibold text-gray-800">Notifikasi Artikel Terbaru</h4>
                    </div>
                    <p class="text-sm text-gray-600 mb-4">
                        Dapatkan pembaruan langsung begitu artikel atau analisis baru dirilis.
                    </p>
                    <a href="{{ route('notifikasi.index') }}"
                        class="inline-flex items-center text-sm font-semibold text-amber-700 hover:text-amber-900">
                        Lihat Notifikasi &rarr;
                    </a>
                </div>

            </div>

        </div>
    </div>
</x-app-layout>
