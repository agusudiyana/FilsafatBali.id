<x-app-layout>
    <div class="py-16 bg-[#FAF6F0] min-h-screen">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="bg-white border border-[#E5D6BF] shadow-xl rounded-2xl overflow-hidden">
                
                <!-- HEADER MINIMALIS -->
                <div class="bg-[#2B1A0E] px-8 py-10 text-center text-white">
                    <h1 class="text-3xl font-bold tracking-wide" style="font-family: 'Cormorant Garamond', serif;">Hubungi Kami</h1>
                    <p class="text-[#C8A45A] uppercase tracking-[3px] text-[10px] font-bold mt-2">Saluran Komunikasi Resmi</p>
                </div>

                <!-- KONTEN KONTAK -->
                <div class="p-8 md:p-14 space-y-8">
                    
                    <p class="text-center text-[#675A4D] text-sm leading-relaxed max-w-lg mx-auto mb-10">
                        Kami sangat menghargai saran, pertanyaan, maupun kontribusi Anda dalam menjaga warisan budaya Bali melalui <b>FilsafatBali.id</b>. Silakan hubungi kami melalui kanal berikut:
                    </p>

                    <!-- KONTRAK UTAMA -->
                    <div class="space-y-4">
                        
                        <!-- WhatsApp -->
                        <a href="https://wa.me/6281234567890" target="_blank" class="flex items-center p-5 bg-[#FAF6F0] rounded-xl border border-[#E5D6BF] hover:border-[#8D2B1D] transition-all group">
                            <div class="w-12 h-12 flex items-center justify-center bg-[#25D366] text-white rounded-lg shadow-sm">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.372-.025-.521-.075-.148-.67-1.613-.919-2.206-.24-.575-.487-.497-.67-.506-.173-.007-.372-.009-.571-.009-.199 0-.521.074-.794.372-.273.297-1.043 1.018-1.043 2.484 0 1.467 1.068 2.88 1.217 3.078.149.198 2.1 3.208 5.08 4.502 2.585 1.115 2.585.744 3.052.694.468-.05 1.48-.606 1.678-1.192.198-.586.198-1.089.148-1.188-.05-.098-.198-.148-.496-.297zM12 2C6.486 2 2 6.486 2 12c0 1.956.55 3.821 1.503 5.434L2 22l4.89-1.082C8.354 21.733 10.146 22 12 22c5.514 0 10-4.486 10-10S17.514 2 12 2zm0 18.257c-1.65 0-3.237-.442-4.636-1.277l-.332-.196-3.376.746 1.01-3.315-.224-.349c-.894-1.393-1.366-3.013-1.366-4.673 0-4.678 3.805-8.483 8.483-8.483 4.678 0 8.483 3.805 8.483 8.483 0 4.678-3.805 8.483-8.483 8.483z"/></svg>
                            </div>
                            <div class="ml-5">
                                <h4 class="text-[#8D2B1D] font-bold text-sm uppercase tracking-widest">WhatsApp</h4>
                                <p class="text-[#2B1A0E] font-medium">+62 812-3456-7890</p>
                            </div>
                        </a>

                        <!-- Email -->
                        <a href="mailto:kontak@filsafatbali.id" class="flex items-center p-5 bg-[#FAF6F0] rounded-xl border border-[#E5D6BF] hover:border-[#8D2B1D] transition-all group">
                            <div class="w-12 h-12 flex items-center justify-center bg-[#8D2B1D] text-white rounded-lg shadow-sm">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                            </div>
                            <div class="ml-5">
                                <h4 class="text-[#8D2B1D] font-bold text-sm uppercase tracking-widest">Email</h4>
                                <p class="text-[#2B1A0E] font-medium">kontak@filsafatbali.id</p>
                            </div>
                        </a>
                        
                        <!-- Lokasi -->
                        <div class="flex items-center p-5 bg-[#FAF6F0] rounded-xl border border-[#E5D6BF]">
                            <div class="w-12 h-12 flex items-center justify-center bg-[#C8A45A] text-white rounded-lg shadow-sm">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            </div>
                            <div class="ml-5">
                                <h4 class="text-[#8D2B1D] font-bold text-sm uppercase tracking-widest">Alamat</h4>
                                <p class="text-[#2B1A0E] font-medium">Denpasar, Bali - Indonesia</p>
                            </div>
                        </div>
                    </div>

                    <!-- TOMBOL KEMBALI -->
                    <div class="pt-6 text-center">
                        <a href="{{ url('/') }}" class="inline-block px-8 py-3 border border-[#8D2B1D] text-[#8D2B1D] hover:bg-[#8D2B1D] hover:text-white rounded-lg text-xs font-bold uppercase tracking-widest transition-all">
                            Kembali ke Beranda
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>