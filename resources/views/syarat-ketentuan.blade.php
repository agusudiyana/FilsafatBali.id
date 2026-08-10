<x-app-layout>
    <div class="py-16 bg-[#FAF6F0] min-h-screen">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- CARD CONTAINER UTAMA -->
            <div class="bg-white border border-[#E5D6BF] shadow-xl rounded-2xl overflow-hidden">
                
                <!-- HEADER KLASIK ELEGAN (DISAMAKAN DENGAN STYLE HALAMAN TENTANG KAMI) -->
                <div class="relative w-full h-72 md:h-80 overflow-hidden border-b border-[#E5D6BF]">
                    <!-- Foto Latar Header -->
                    <img src="{{ asset('images/hero.png') }}" alt="Syarat dan Ketentuan" class="w-full h-full object-cover">
                    
                    <!-- Overlay & Logo di Tengah -->
                    <div class="absolute inset-0 bg-[#2B1A0E]/65 flex flex-col items-center justify-center text-center px-4">
                        <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-20 h-20 md:w-24 md:h-24 mb-3 object-contain brightness-[1.2] drop-shadow-md">
                        <h1 class="text-3xl md:text-4xl font-bold text-white tracking-wide" style="font-family: 'Cormorant Garamond', serif;">
                            Syarat & Ketentuan
                        </h1>
                        <p class="text-[#C8A45A] uppercase tracking-[3px] text-[10px] font-bold mt-2">
                            Ketentuan Layanan FilsafatBali.id
                        </p>
                    </div>
                </div>

                <!-- KONTEN UTAMA -->
                <div class="p-8 md:p-14 text-[#2B1A0E] space-y-10">
                    
                    <!-- Pengantar -->
                    <div class="space-y-4 text-center max-w-2xl mx-auto">
                        <h2 class="text-2xl font-bold text-[#8D2B1D]" style="font-family: 'Cormorant Garamond', serif;">
                            Ketentuan Penggunaan Platform
                        </h2>
                        <p class="text-[#675A4D] leading-relaxed text-justify">
                            Selamat datang di <b>FilsafatBali.id</b>. Dengan mengakses, mendaftar, atau menggunakan situs web dan layanan kami, Anda dianggap telah membaca, memahami, dan menyetujui seluruh syarat dan ketentuan yang berlaku di bawah ini.
                        </p>
                    </div>

                    <!-- POIN-POIN DENGAN KOTAK KHAS WEB ANDA -->
                    <div class="space-y-6">
                        
                        <!-- Poin 1 -->
                        <div class="bg-[#FAF6F0] p-6 rounded-xl border border-[#E5D6BF]">
                            <h3 class="text-base font-bold text-[#8D2B1D] mb-2 uppercase tracking-widest text-xs">
                                1. Ruang Lingkup Arsip & Layanan
                            </h3>
                            <p class="text-sm text-[#675A4D] leading-relaxed text-justify">
                                FilsafatBali.id adalah ruang arsip digital independen yang mendedikasikan diri untuk merawat kebudayaan, naskah, dan filosofi Bali. Seluruh konten disediakan murni sebagai sarana edukasi dan pelestarian budaya.
                            </p>
                        </div>

                        <!-- Poin 2 -->
                        <div class="bg-[#FAF6F0] p-6 rounded-xl border border-[#E5D6BF]">
                            <h3 class="text-base font-bold text-[#8D2B1D] mb-2 uppercase tracking-widest text-xs">
                                2. Akun Pengguna & Keamanan
                            </h3>
                            <p class="text-sm text-[#675A4D] leading-relaxed text-justify">
                                Untuk mengakses fitur tertentu seperti diskusi atau penulisan arsip, Anda mungkin diminta membuat akun. Anda bertanggung jawab penuh atas kerahasiaan kata sandi serta aktivitas yang terjadi di dalam akun Anda.
                            </p>
                        </div>

                        <!-- Poin 3 -->
                        <div class="bg-[#FAF6F0] p-6 rounded-xl border border-[#E5D6BF]">
                            <h3 class="text-base font-bold text-[#8D2B1D] mb-2 uppercase tracking-widest text-xs">
                                3. Hak Kekayaan Intelektual
                            </h3>
                            <p class="text-sm text-[#675A4D] leading-relaxed text-justify">
                                Segala bentuk materi, logo, desain tata letak, dan naskah arsip yang dikurasi dilindungi oleh hak cipta. Pengguna dilarang menyalin atau mendistribusikan ulang untuk kepentingan komersial tanpa izin tertulis.
                            </p>
                        </div>

                        <!-- Poin 4 -->
                        <div class="bg-[#FAF6F0] p-6 rounded-xl border border-[#E5D6BF]">
                            <h3 class="text-base font-bold text-[#8D2B1D] mb-2 uppercase tracking-widest text-xs">
                                4. Etika Komunitas & Konten
                            </h3>
                            <p class="text-sm text-[#675A4D] leading-relaxed text-justify">
                                Pengguna yang berpartisipasi dalam diskusi atau mengirimkan ulasan wajib memastikan konten tidak melanggar hukum, tidak mengandung unsur SARA atau ujaran kebencian, serta menghormati nilai luhur tradisi.
                            </p>
                        </div>

                        <!-- Poin 5 -->
                        <div class="bg-[#FAF6F0] p-6 rounded-xl border border-[#E5D6BF]">
                            <h3 class="text-base font-bold text-[#8D2B1D] mb-2 uppercase tracking-widest text-xs">
                                5. Perubahan Ketentuan
                            </h3>
                            <p class="text-sm text-[#675A4D] leading-relaxed text-justify">
                                Pengelola berhak sewaktu-waktu memperbarui Syarat dan Ketentuan ini demi penyesuaian sistem dan layanan. Perubahan berlaku seketika setelah diterbitkan di halaman ini.
                            </p>
                        </div>

                    </div>

                    <!-- KUTIPAN PENUTUP & TOMBOL KEMBALI -->
                    <div class="pt-8 text-center border-t border-[#EADCC9] space-y-6">
                        <p class="text-sm text-[#8D2B1D] italic font-medium" style="font-family: 'Cormorant Garamond', serif;">
                            "Menjunjung tata krama dan aturan bersama adalah wujud luhur peradaban."
                        </p>
                        
                        <div>
                            <a href="{{ url('/') }}" class="inline-block px-8 py-3 border border-[#8D2B1D] text-[#8D2B1D] hover:bg-[#8D2B1D] hover:text-white rounded-lg text-xs font-bold uppercase tracking-widest transition-all shadow-sm">
                                Kembali ke Beranda
                            </a>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</x-app-layout>