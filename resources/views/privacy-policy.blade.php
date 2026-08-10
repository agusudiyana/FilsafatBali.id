<x-app-layout>
    <div class="py-16 bg-[#FAF6F0] min-h-screen">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- CARD CONTAINER UTAMA -->
            <div class="bg-white border border-[#E5D6BF] shadow-xl rounded-2xl overflow-hidden">
                
                <!-- HEADER DENGAN LOGO & NAMA WEB -->
                <div class="relative bg-gradient-to-b from-[#FAF6F0] to-white border-b border-[#E5D6BF] px-8 py-12 text-center">
                    <!-- Logo Utama -->
                    <img src="{{ asset('images/logo.png') }}" alt="Logo Filsafat Bali" class="w-24 h-24 mx-auto mb-4 object-contain drop-shadow-md">
                    
                    <h1 class="text-3xl md:text-5xl font-bold text-[#8D2B1D]" style="font-family: 'Cormorant Garamond', serif;">
                        FilsafatBali.id
                    </h1>
                    <span class="text-[#C8A45A] text-xs font-bold uppercase tracking-[4px] block mt-2">
                        Kebijakan Privasi & Keamanan Data
                    </span>
                    <p class="text-[11px] text-[#675A4D] mt-2">
                        Terakhir diperbarui: Agustus 2026
                    </p>
                </div>

                <!-- KONTEN UTAMA -->
                <div class="p-8 md:p-14 text-[#2B1A0E] space-y-10">
                    
                    <!-- Pengantar Berbentuk Kotak Aksen -->
                    <div class="bg-[#FAF6F0] border-l-4 border-[#8D2B1D] p-6 rounded-r-xl text-[#675A4D] leading-relaxed text-justify space-y-3 shadow-sm">
                        <p>
                            Di <b>FilsafatBali.id</b>, privasi pengunjung adalah hal yang sangat esensial. Dokumen Kebijakan Privasi ini menjelaskan bentuk informasi pribadi yang dikumpulkan, dicatat, dan bagaimana kami melindungi serta menggunakannya.
                        </p>
                        <p>
                            Komitmen kami adalah merawat kepercayaan Anda sebagaimana kami merawat warisan leluhur.
                        </p>
                    </div>

                    <!-- POIN-POIN KEBIJAKAN -->
                    <div class="space-y-8">
                        
                        <!-- Poin 1 -->
                        <div class="flex gap-4 items-start">
                            <div class="flex-shrink-0 w-10 h-10 rounded-xl bg-[#FAF6F0] border border-[#E5D6BF] flex items-center justify-center text-[#8D2B1D] font-bold text-sm" style="font-family: 'Cormorant Garamond', serif;">
                                01
                            </div>
                            <div class="space-y-2">
                                <h3 class="text-lg font-bold text-[#8D2B1D]" style="font-family: 'Cormorant Garamond', serif;">
                                    Informasi yang Kami Kumpulkan
                                </h3>
                                <p class="text-sm text-[#675A4D] leading-relaxed text-justify">
                                    Kami mengumpulkan informasi pribadi saat Anda mendaftar akun, berpartisipasi dalam diskusi komunitas, atau berinteraksi dengan arsip digital. Data ini meliputi nama, alamat email, serta preferensi interaksi Anda di dalam platform.
                                </p>
                            </div>
                        </div>

                        <!-- Poin 2 -->
                        <div class="flex gap-4 items-start pt-6 border-t border-[#EADCC9]">
                            <div class="flex-shrink-0 w-10 h-10 rounded-xl bg-[#FAF6F0] border border-[#E5D6BF] flex items-center justify-center text-[#8D2B1D] font-bold text-sm" style="font-family: 'Cormorant Garamond', serif;">
                                02
                            </div>
                            <div class="space-y-2">
                                <h3 class="text-lg font-bold text-[#8D2B1D]" style="font-family: 'Cormorant Garamond', serif;">
                                    Log File & Cookies
                                </h3>
                                <p class="text-sm text-[#675A4D] leading-relaxed text-justify">
                                    Sebagaimana standar platform digital modern, situs ini menggunakan file log untuk mencatat alamat Protokol Internet (IP), jenis peramban (browser), penyedia layanan internet, cap waktu, serta halaman rujukan guna keperluan analisis tren situs.
                                </p>
                            </div>
                        </div>

                        <!-- Poin 3 -->
                        <div class="flex gap-4 items-start pt-6 border-t border-[#EADCC9]">
                            <div class="flex-shrink-0 w-10 h-10 rounded-xl bg-[#FAF6F0] border border-[#E5D6BF] flex items-center justify-center text-[#8D2B1D] font-bold text-sm" style="font-family: 'Cormorant Garamond', serif;">
                                03
                            </div>
                            <div class="space-y-2">
                                <h3 class="text-lg font-bold text-[#8D2B1D]" style="font-family: 'Cormorant Garamond', serif;">
                                    Penggunaan Informasi
                                </h3>
                                <p class="text-sm text-[#675A4D] leading-relaxed text-justify">
                                    Informasi yang dikumpulkan digunakan secara bijak untuk:
                                </p>
                                <ul class="list-disc list-inside text-sm text-[#675A4D] space-y-1.5 pl-2">
                                    <li>Mengoperasikan dan merawat sistem arsip digital FilsafatBali.id.</li>
                                    <li>Meningkatkan pengalaman penjelajahan dan personalisasi fitur.</li>
                                    <li>Mengirimkan pembaruan informasi berkala terkait konten budaya.</li>
                                </ul>
                            </div>
                        </div>

                        <!-- Poin 4 -->
                        <div class="flex gap-4 items-start pt-6 border-t border-[#EADCC9]">
                            <div class="flex-shrink-0 w-10 h-10 rounded-xl bg-[#FAF6F0] border border-[#E5D6BF] flex items-center justify-center text-[#8D2B1D] font-bold text-sm" style="font-family: 'Cormorant Garamond', serif;">
                                04
                            </div>
                            <div class="space-y-2">
                                <h3 class="text-lg font-bold text-[#8D2B1D]" style="font-family: 'Cormorant Garamond', serif;">
                                    Perlindungan Data Pihak Ketiga
                                </h3>
                                <p class="text-sm text-[#675A4D] leading-relaxed text-justify">
                                    Kami menjamin bahwa data pribadi Anda tidak akan dijual, diperdagangkan, atau dialihkan kepada pihak luar tanpa izin, demi menjaga keamanan privasi Anda sepenuhnya.
                                </p>
                            </div>
                        </div>

                        <!-- Poin 5 -->
                        <div class="flex gap-4 items-start pt-6 border-t border-[#EADCC9]">
                            <div class="flex-shrink-0 w-10 h-10 rounded-xl bg-[#FAF6F0] border border-[#E5D6BF] flex items-center justify-center text-[#8D2B1D] font-bold text-sm" style="font-family: 'Cormorant Garamond', serif;">
                                05
                            </div>
                            <div class="space-y-2">
                                <h3 class="text-lg font-bold text-[#8D2B1D]" style="font-family: 'Cormorant Garamond', serif;">
                                    Persetujuan Pengguna
                                </h3>
                                <p class="text-sm text-[#675A4D] leading-relaxed text-justify">
                                    Dengan mengakses dan menggunakan platform FilsafatBali.id, Anda secara otomatis menyetujui seluruh ketentuan yang tertulis di dalam Kebijakan Privasi ini.
                                </p>
                            </div>
                        </div>

                    </div>

                    <!-- KUTIPAN PENUTUP & TOMBOL KEMBALI -->
                    <div class="pt-10 text-center border-t border-[#EADCC9] space-y-6">
                        <div class="p-6 bg-[#FAF6F0] rounded-2xl border border-[#E5D6BF] max-w-xl mx-auto">
                            <p class="text-sm text-[#8D2B1D] italic font-semibold" style="font-family: 'Cormorant Garamond', serif;">
                                "Menjaga kerahasiaan data adalah bagian dari komitmen kami merawat kepercayaan."
                            </p>
                        </div>
                        
                        <div class="pt-2">
                            <a href="{{ url('/') }}" class="inline-block px-8 py-3 bg-[#8D2B1D] text-white hover:bg-[#732216] rounded-xl text-xs font-bold uppercase tracking-widest transition-all shadow-md">
                                Kembali ke Beranda
                            </a>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</x-app-layout>