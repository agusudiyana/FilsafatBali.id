<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-[#2B1A0E] leading-tight"
                style="font-family: 'Cormorant Garamond', serif;">
                {{ __('Forum Diskusi Komunitas') }}
            </h2>
            <a href="{{ route('pengguna.dashboard') }}" class="text-sm font-semibold text-[#8D2B1D] hover:underline">
                &larr; Kembali ke Dashboard
            </a>
        </div>
    </x-slot>

    <div class="py-12 bg-[#FAF6F0] min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-xl relative text-sm">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Form Buat Topik -->
            <div class="bg-white border border-[#E5D6BF] p-6 rounded-2xl shadow-sm">
                <h3 class="text-lg font-bold text-[#2B1A0E] mb-4" style="font-family: 'Cormorant Garamond', serif;">
                    Mulai Topik Diskusi Baru 💬</h3>
                <form action="{{ route('pengguna.komunitas.store') }}" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label class="block text-sm font-medium text-[#2B1A0E] mb-1">Judul Topik</label>
                        <input type="text" name="judul" required placeholder="Tuliskan judul topik diskusi..."
                            class="w-full rounded-xl border-[#E5D6BF] text-sm focus:ring-[#8D2B1D] focus:border-[#8D2B1D]">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-[#2B1A0E] mb-1">Pesan / Pertanyaan</label>
                        <textarea name="pesan" rows="3" required placeholder="Tuliskan pendapat atau pertanyaan Anda di sini..."
                            class="w-full rounded-xl border-[#E5D6BF] text-sm focus:ring-[#8D2B1D] focus:border-[#8D2B1D]"></textarea>
                    </div>
                    <div class="flex justify-end">
                        <button type="submit"
                            class="px-6 py-2.5 bg-[#8D2B1D] hover:bg-[#732216] text-white font-semibold text-sm rounded-xl shadow-sm">
                            Kirim Diskusi
                        </button>
                    </div>
                </form>
            </div>

            <!-- Daftar Diskusi -->
            <div class="space-y-4">
                <h3 class="text-lg font-bold text-[#2B1A0E]" style="font-family: 'Cormorant Garamond', serif;">Diskusi
                    Terbaru</h3>

                @foreach ($diskusis as $item)
                    <div
                        class="bg-white border border-[#E5D6BF] p-6 rounded-2xl shadow-sm hover:border-[#8D2B1D] transition">
                        <div class="flex justify-between items-start mb-2">
                            <div class="flex items-center space-x-2">
                                <span class="font-bold text-[#2B1A0E] text-sm">{{ $item['penulis'] }}</span>
                                <span class="text-[#675A4D] text-xs">• {{ $item['tanggal'] }}</span>
                            </div>
                            <span class="bg-[#EFE4D3] text-[#8D2B1D] text-xs font-semibold px-2.5 py-1 rounded-md">
                                {{ $item['kategori'] }}
                            </span>
                        </div>
                        <h4 class="text-md font-bold text-[#2B1A0E] mb-2">{{ $item['judul'] }}</h4>
                        <p class="text-sm text-[#675A4D] mb-4">{{ $item['pesan'] }}</p>

                        <div
                            class="pt-3 border-t border-[#E5D6BF] flex items-center justify-between text-xs text-[#675A4D]">
                            <span>💬 {{ $item['jumlah_balasan'] }} Tanggapan</span>
                            <a href="#" class="font-semibold text-[#8D2B1D] hover:text-[#732216]">Ikut Menjawab
                                &rarr;</a>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
</x-app-layout>
