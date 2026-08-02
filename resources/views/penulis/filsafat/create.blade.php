@extends('penulis.layouts.app')

@section('content')
<div class="p-6 bg-[#F6F0E6] text-[#1A110A]">
    <!-- Container Card Putih -->
    <div class="max-w-4xl mx-auto p-8 bg-white rounded-2xl shadow-sm border border-[#E2D5C3]">
        <h2 class="text-2xl font-bold mb-6 text-[#1A110A]">Tambah Wawasan Filsafat</h2>

        <form action="{{ route('penulis.filsafat.store') }}" method="POST">
            @csrf

            <!-- Judul Filsafat -->
            <div class="mb-5">
                <label class="block text-sm font-semibold text-[#1A110A] mb-2">Judul Filsafat</label>
                <input type="text" name="judul" required placeholder="Contoh: Filsafat Barat"
                    class="w-full px-4 py-3 bg-white border border-[#D5C7B5] rounded-xl text-[#1A110A] placeholder-[#8C7B6C] focus:outline-none focus:border-[#C38E2A] focus:ring-1 focus:ring-[#C38E2A] transition">
            </div>

            <!-- Deskripsi Singkat -->
            <div class="mb-5">
                <label class="block text-sm font-semibold text-[#1A110A] mb-2">Deskripsi / Pengantar</label>
                <textarea name="deskripsi" rows="3" required placeholder="Filsafat Barat berkembang sejak Yunani Kuno dan menjadi dasar lahirnya ilmu pengetahuan..."
                    class="w-full px-4 py-3 bg-white border border-[#D5C7B5] rounded-xl text-[#1A110A] placeholder-[#8C7B6C] focus:outline-none focus:border-[#C38E2A] focus:ring-1 focus:ring-[#C38E2A] transition"></textarea>
            </div>

            <!-- Grid: Asal & Fokus -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-5">
                <div>
                    <label class="block text-sm font-semibold text-[#1A110A] mb-2">Asal / Wilayah Perkembangan</label>
                    <input type="text" name="asal" placeholder="Contoh: Yunani Kuno / Bali"
                        class="w-full px-4 py-3 bg-white border border-[#D5C7B5] rounded-xl text-[#1A110A] placeholder-[#8C7B6C] focus:outline-none focus:border-[#C38E2A] focus:ring-1 focus:ring-[#C38E2A] transition">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-[#1A110A] mb-2">Fokus / Pokok Bahasan</label>
                    <input type="text" name="fokus" placeholder="Contoh: Logika & Rasionalitas / Etika & Harmoni"
                        class="w-full px-4 py-3 bg-white border border-[#D5C7B5] rounded-xl text-[#1A110A] placeholder-[#8C7B6C] focus:outline-none focus:border-[#C38E2A] focus:ring-1 focus:ring-[#C38E2A] transition">
                </div>
            </div>

            <!-- Tokoh Terkenal -->
            <div class="mb-5">
                <label class="block text-sm font-semibold text-[#1A110A] mb-2">Tokoh Terkenal & Pemikirannya</label>
                <textarea name="tokoh_terkenal" rows="4" placeholder="Socrates: Mengajarkan pentingnya berpikir kritis.&#10;Plato: Pendiri Akademi dan pencetus teori dunia ide.&#10;Aristoteles: Mengembangkan logika, etika, dan ilmu alam."
                    class="w-full px-4 py-3 bg-white border border-[#D5C7B5] rounded-xl text-[#1A110A] placeholder-[#8C7B6C] focus:outline-none focus:border-[#C38E2A] focus:ring-1 focus:ring-[#C38E2A] transition"></textarea>
            </div>

            <!-- Karakteristik -->
            <div class="mb-5">
                <label class="block text-sm font-semibold text-[#1A110A] mb-2">Karakteristik Utama</label>
                <textarea name="karakteristik" rows="4" placeholder="- Berpikir logis.&#10;- Argumentasi rasional.&#10;- Metode ilmiah.&#10;- Pencarian kebenaran."
                    class="w-full px-4 py-3 bg-white border border-[#D5C7B5] rounded-xl text-[#1A110A] placeholder-[#8C7B6C] focus:outline-none focus:border-[#C38E2A] focus:ring-1 focus:ring-[#C38E2A] transition"></textarea>
            </div>

            <!-- Implikasi / Penutup -->
            <div class="mb-6">
                <label class="block text-sm font-semibold text-[#1A110A] mb-2">Implikasi & Manfaat Dalam Kehidupan</label>
                <textarea name="implikasi" rows="3" placeholder="Menjadi dasar perkembangan ilmu pengetahuan, demokrasi, pendidikan, hukum, dan teknologi modern."
                    class="w-full px-4 py-3 bg-white border border-[#D5C7B5] rounded-xl text-[#1A110A] placeholder-[#8C7B6C] focus:outline-none focus:border-[#C38E2A] focus:ring-1 focus:ring-[#C38E2A] transition"></textarea>
            </div>

            <!-- Tombol Simpan & Kembali (Inline CSS menjamin warna pasti tampil) -->
            <div class="flex items-center gap-3 pt-2">
                <button type="submit" 
                        style="background-color: #C38E2A; color: #ffffff;"
                        class="px-7 py-2.5 font-semibold rounded-xl shadow-sm transition hover:opacity-90">
                    Simpan
                </button>
                <a href="{{ route('penulis.filsafat.index') }}" 
                   style="background-color: #6C757D; color: #ffffff;"
                   class="px-7 py-2.5 font-semibold rounded-xl shadow-sm transition hover:opacity-90 inline-block">
                    Kembali
                </a>
            </div>
        </form>
    </div>
</div>
@endsection