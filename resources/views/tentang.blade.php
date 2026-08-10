<x-app-layout>
    <div class="py-12">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- CARD CONTAINER -->
            <div class="bg-white border border-[#E5D6BF] shadow-lg rounded-2xl overflow-hidden">
                
                <!-- HEADER AREA -->
                <div class="relative h-80 md:h-[400px] w-full">
                    <!-- Foto -->
                    <img src="{{ asset('images/hero.png') }}" alt="Tentang Kami" class="w-full h-full object-cover">
                    
                    <!-- Overlay & Logo -->
                    <div class="absolute inset-0 bg-[#2B1A0E]/60 flex flex-col items-center justify-center text-center px-4">
                        <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-40 h-40 md:w-48 md:h-48 mb-6 object-contain drop-shadow-2xl">
                        <h1 class="text-3xl md:text-5xl font-bold text-white tracking-wide" style="font-family: 'Cormorant Garamond', serif;">
                            FilsafatBali.id
                        </h1>
                    </div>
                </div>

                <!-- CONTENT AREA -->
                <div class="p-8 md:p-14 text-[#2B1A0E]">
                    
                    <div class="max-w-2xl mx-auto space-y-10">
                        <!-- Judul Sub-bagian -->
                        <div class="text-center">
                            <h2 class="text-2xl md:text-3xl font-bold text-[#8D2B1D]" style="font-family: 'Cormorant Garamond', serif;">
                                Menjaga Warisan, Menerangi Masa Depan
                            </h2>
                        </div>

                        <!-- Paragraf Utama (Rata Kanan-Kiri) -->
                        <div class="space-y-6 text-[#675A4D] leading-relaxed text-justify">
                            <p>
                                <b>FilsafatBali.id</b> adalah arsip digital yang didedikasikan untuk mendokumentasikan, merawat, dan menyebarluaskan kekayaan intelektual serta filosofi leluhur Bali.
                            </p>
                            <p>
                                Kami percaya bahwa nilai-nilai seperti <i>Tri Hita Karana</i> dan <i>Tat Tvam Asi</i> adalah kompas kehidupan yang harus terus dijaga keberadaannya di era digital, agar tetap dapat diakses oleh generasi masa kini sebagai pijakan hidup yang bijak.
                            </p>
                        </div>

                        <!-- VISI & MISI -->
                        <div class="grid md:grid-cols-2 gap-6 pt-2">
                            <!-- Kotak Visi -->
                            <div class="relative bg-[#FAF6F0] border-t-4 border-[#8D2B1D] border-x border-b border-[#E5D6BF] rounded-xl p-6 shadow-sm flex flex-col justify-between">
                                <div>
                                    <span class="text-[#8D2B1D] text-xs font-bold uppercase tracking-widest block mb-2">✦ Visi Kami</span>
                                    <p class="text-sm text-[#675A4D] leading-relaxed text-left">
                                        Menjadi pusat arsip digital kebudayaan Bali yang paling autentik dan terpercaya secara global.
                                    </p>
                                </div>
                            </div>

                            <!-- Kotak Misi -->
                            <div class="relative bg-[#FAF6F0] border-t-4 border-[#C8A45A] border-x border-b border-[#E5D6BF] rounded-xl p-6 shadow-sm flex flex-col justify-between">
                                <div>
                                    <span class="text-[#C8A45A] text-xs font-bold uppercase tracking-widest block mb-2">✦ Misi Kami</span>
                                    <p class="text-sm text-[#675A4D] leading-relaxed text-left">
                                        Digitalisasi naskah kuno dan sastra untuk edukasi nilai luhur yang berkelanjutan.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- SENTUHAN TAMBAHAN: QUOTE PENUTUP BERKELAS -->
                        <div class="pt-6 text-center border-t border-[#EADCC9]">
                            <p class="text-sm text-[#8D2B1D] italic font-medium" style="font-family: 'Cormorant Garamond', serif;">
                                "Taksu Bali abadi dalam laku, sastra, dan pikiran."
                            </p>
                        </div>

                        <!-- Tombol -->
                        <div class="text-center pt-2">
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