<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-[#2B1A0E] leading-tight" style="font-family: 'Cormorant Garamond', serif;">
                {{ __('Forum Diskusi Komunitas') }}
            </h2>
            <a href="{{ route('home') }}" class="text-sm font-semibold text-[#8D2B1D] hover:underline">
                &larr; Kembali ke Beranda
            </a>
        </div>
    </x-slot>

    <div class="py-12 bg-[#FAF6F0] min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-xl relative text-sm" role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            <!-- Form Buat Topik -->
            <div class="bg-white border border-[#E5D6BF] p-6 rounded-2xl shadow-sm">
                <h3 class="text-lg font-bold text-[#2B1A0E] mb-4" style="font-family: 'Cormorant Garamond', serif;">
                    Mulai Topik Diskusi Baru 💬
                </h3>
                <form action="{{ Route::has('pengguna.komunitas.store') ? route('pengguna.komunitas.store') : '#' }}" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label class="block text-sm font-medium text-[#2B1A0E] mb-1">Pesan / Pertanyaan / Gagasan</label>
                        <textarea name="comment" rows="3" required placeholder="Tuliskan pendapat atau pertanyaan Anda di sini..." class="w-full rounded-xl border-[#E5D6BF] text-sm focus:ring-[#8D2B1D] focus:border-[#8D2B1D] bg-[#FAF6F0] p-3"></textarea>
                    </div>
                    <div class="flex justify-end">
                        <button type="submit" class="px-6 py-2.5 bg-[#8D2B1D] hover:bg-[#732216] text-white font-semibold text-sm rounded-xl shadow-sm transition">
                            Kirim Diskusi
                        </button>
                    </div>
                </form>
            </div>

            <!-- Daftar Diskusi -->
            @php
                $items = isset($discussions) ? $discussions : (isset($diskusis) ? $diskusis : []);
            @endphp

            <div class="space-y-4">
                <h3 class="text-lg font-bold text-[#2B1A0E]" style="font-family: 'Cormorant Garamond', serif;">
                    Diskusi Terbaru
                </h3>

                @if(count($items) > 0)
                    @foreach ($items as $item)
                        @php
                            $userName = is_array($item) ? ($item['penulis'] ?? $item['name'] ?? 'Pengguna') : ($item->user->name ?? $item->name ?? 'Pengguna');
                            $userAvatar = is_array($item) ? ($item['avatar'] ?? null) : ($item->user->avatar ?? $item->avatar ?? null);
                            $pesan = is_array($item) ? ($item['pesan'] ?? $item['comment'] ?? '') : ($item->comment ?? $item->pesan ?? '');
                            $kategori = is_array($item) ? ($item['kategori'] ?? 'Diskusi Budaya') : ($item->kategori ?? 'Diskusi Budaya');
                            $tanggapan = is_array($item) ? ($item['jumlah_balasan'] ?? 0) : ($item->jumlah_balasan ?? 0);
                            
                            $rawDate = is_array($item) ? ($item['tanggal'] ?? $item['created_at'] ?? null) : ($item->created_at ?? null);
                            $dateFormatted = $rawDate ? \Carbon\Carbon::parse($rawDate)->diffForHumans() : 'Baru saja';
                        @endphp

                        <div class="bg-white border border-[#E5D6BF] p-6 rounded-2xl shadow-sm hover:border-[#8D2B1D] transition">
                            <div class="flex justify-between items-start mb-3">
                                <div class="flex items-center space-x-3">
                                    <div class="w-9 h-9 rounded-full bg-[#F4EAD8] border border-[#E5D6BF] overflow-hidden flex items-center justify-center text-[#8D2B1D] font-bold text-xs shrink-0">
                                        @if($userAvatar)
                                            <img src="{{ asset('storage/' . $userAvatar) }}" class="w-full h-full object-cover">
                                        @else
                                            {{ substr($userName, 0, 1) }}
                                        @endif
                                    </div>
                                    <div>
                                        <span class="font-bold text-[#2B1A0E] text-sm block leading-none">{{ $userName }}</span>
                                        <span class="text-[#675A4D] text-[11px]">{{ $dateFormatted }}</span>
                                    </div>
                                </div>
                                <span class="bg-[#EFE4D3] text-[#8D2B1D] text-xs font-semibold px-2.5 py-1 rounded-md">
                                    {{ $kategori }}
                                </span>
                            </div>

                            <p class="text-sm text-[#2B1A0E] my-3 leading-relaxed">{{ $pesan }}</p>

                            <div class="pt-3 border-t border-[#E5D6BF] flex items-center justify-between text-xs text-[#675A4D]">
                                <span>💬 {{ $tanggapan }} Tanggapan</span>
                                <a href="#" class="font-semibold text-[#8D2B1D] hover:text-[#732216]">
                                    Ikut Menjawab &rarr;
                                </a>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="bg-white border border-[#E5D6BF] p-12 text-center rounded-2xl shadow-sm">
                        <div class="text-4xl mb-3">💬</div>
                        <h3 class="text-lg font-bold text-[#2B1A0E]" style="font-family: 'Cormorant Garamond', serif;">Belum Ada Diskusi</h3>
                        <p class="text-sm text-[#675A4D] mt-1">Jadilah yang pertama memulai pemikiran atau pertanyaan kebudayaan di atas!</p>
                    </div>
                @endif
            </div>

        </div>
    </div>
</x-app-layout>