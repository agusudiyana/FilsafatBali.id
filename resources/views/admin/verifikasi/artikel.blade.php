@extends('admin.layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto px-4 py-8">
        
        <!-- Header Halaman -->
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4 border-b border-[#E6D5B8] pb-6">
            <div>
                <span class="text-xs font-semibold tracking-widest text-[#C48D2D] uppercase">Manajemen Konten</span>
                <h1 class="text-3xl font-bold font-serif text-[#2C221E] mt-1">
                    Verifikasi Artikel
                </h1>
                <p class="text-[#6B635B] text-sm mt-1">
                    Daftar kiriman artikel dari penulis yang menunggu verifikasi.
                </p>
            </div>
        </div>

        <!-- Filter Kategori (Tab Navigasi berdasarkan Kategori Artikel) -->
        <div class="flex flex-wrap gap-2 mb-6 border-b border-gray-200 pb-3" id="category-tabs">
            <button onclick="filterCategory('semua', this)" 
                class="tab-btn px-4 py-2 text-sm font-semibold text-white bg-[#2C221E] rounded-lg shadow-sm transition">
                Semua
            </button>
            <button onclick="filterCategory('Ajaran Tertua', this)" 
                class="tab-btn px-4 py-2 text-sm font-medium text-[#6B635B] hover:text-[#2C221E] hover:bg-gray-100 rounded-lg transition">
                Ajaran Tertua
            </button>
            <button onclick="filterCategory('Cecimpedan', this)" 
                class="tab-btn px-4 py-2 text-sm font-medium text-[#6B635B] hover:text-[#2C221E] hover:bg-gray-100 rounded-lg transition">
                Cecimpedan
            </button>
            <button onclick="filterCategory('Satua Bali', this)" 
                class="tab-btn px-4 py-2 text-sm font-medium text-[#6B635B] hover:text-[#2C221E] hover:bg-gray-100 rounded-lg transition">
                Satua Bali
            </button>
            <button onclick="filterCategory('Istilah Bali', this)" 
                class="tab-btn px-4 py-2 text-sm font-medium text-[#6B635B] hover:text-[#2C221E] hover:bg-gray-100 rounded-lg transition">
                Istilah Bali
            </button>
        </div>

        @if (session('success'))
            <div class="bg-emerald-50 border-l-4 border-emerald-500 text-emerald-800 p-4 rounded-xl mb-6 flex items-center gap-3 shadow-sm">
                <i data-feather="check-circle" class="w-5 h-5 text-emerald-600"></i>
                <span class="text-sm font-medium">{{ session('success') }}</span>
            </div>
        @endif

        <!-- Tabel Data Verifikasi Artikel -->
        <div class="bg-white rounded-2xl shadow-sm border border-[#E6D5B8]/60 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead class="bg-[#FBF9F5] text-[#2C221E] uppercase text-xs tracking-wider border-b border-[#E6D5B8]">
                        <tr>
                            <th class="p-4 font-semibold">NO</th>
                            <th class="p-4 font-semibold">JUDUL ARTIKEL</th>
                            <th class="p-4 font-semibold">KATEGORI</th>
                            <th class="p-4 font-semibold">STATUS</th>
                            <th class="p-4 text-center font-semibold">AKSI VERIFIKASI</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 text-sm">
                        @php $no = 1; @endphp

                        {{-- Loop Khusus Data Artikel (Ajaran/Artikel) --}}
                        @foreach($ajaran as $item)
                            <tr class="article-row hover:bg-[#FBF9F5]/60 transition" data-category="{{ $item->kategori ?? 'Ajaran Tertua' }}">
                                <td class="p-4 font-medium text-gray-500">{{ $no++ }}</td>
                                <td class="p-4 font-semibold text-[#2C221E]">{{ $item->judul }}</td>
                                <td class="p-4">
                                    <span class="bg-[#F3E7D0] text-[#2C221E] px-3.5 py-1.5 rounded-full text-xs font-medium">
                                        {{ $item->kategori ?? 'Ajaran Tertua' }}
                                    </span>
                                </td>
                                <td class="p-4">
                                    <span class="inline-flex items-center gap-1.5 bg-amber-50 text-amber-700 border border-amber-200 px-3 py-1 rounded-full text-xs font-semibold">
                                        <i data-feather="clock" class="w-3.5 h-3.5"></i> Pending
                                    </span>
                                </td>
                                <td class="p-4 text-center">
                                    <div class="flex items-center justify-center gap-1.5">
                                        <!-- Tombol Detail Artikel -->
                                        <a href="{{ route('admin.verifikasi.artikel.detail', $item->id) }}" title="Lihat Detail" class="text-sky-600 hover:text-sky-800 p-2 hover:bg-sky-50 rounded-lg transition">
                                            <i data-feather="eye" class="w-5 h-5"></i>
                                        </a>

                                        <!-- Tombol Setujui -->
                                        <form action="{{ route('admin.verifikasi.artikel.setujui', $item->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" title="Setujui" class="text-emerald-600 hover:text-emerald-800 p-2 hover:bg-emerald-50 rounded-lg transition">
                                                <i data-feather="check-circle" class="w-5 h-5"></i>
                                            </button>
                                        </form>

                                        <!-- Tombol Tolak -->
                                        <form action="{{ route('admin.verifikasi.artikel.tolak', $item->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" title="Tolak" class="text-rose-600 hover:text-rose-800 p-2 hover:bg-rose-50 rounded-lg transition">
                                                <i data-feather="x-circle" class="w-5 h-5"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                        {{-- Jika Tidak Ada Data Artikel --}}
                        @if($ajaran->isEmpty())
                            <tr>
                                <td colspan="5" class="text-center py-12 text-gray-400">
                                    <div class="flex flex-col items-center justify-center gap-2">
                                        <i data-feather="inbox" class="w-10 h-10 stroke-1 text-gray-300"></i>
                                        <span class="text-base font-medium text-gray-500">Tidak ada artikel yang perlu diverifikasi.</span>
                                    </div>
                                </td>
                            </tr>
                        @endif

                    </tbody>
                </table>
            </div>
        </div>

    </div>

    <!-- CDN & Script Feather Icons -->
    <script src="https://unpkg.com/feather-icons"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            if (typeof feather !== 'undefined') {
                feather.replace();
            }
        });

        function filterCategory(category, selectedBtn) {
            const buttons = document.querySelectorAll('.tab-btn');
            buttons.forEach(btn => {
                btn.className = "tab-btn px-4 py-2 text-sm font-medium text-[#6B635B] hover:text-[#2C221E] hover:bg-gray-100 rounded-lg transition";
            });

            selectedBtn.className = "tab-btn px-4 py-2 text-sm font-semibold text-white bg-[#2C221E] rounded-lg shadow-sm transition";

            const rows = document.querySelectorAll('.article-row');
            rows.forEach(row => {
                const rowCategory = row.getAttribute('data-category');
                if (category === 'semua' || rowCategory === category) {
                    row.classList.remove('hidden');
                } else {
                    row.classList.add('hidden');
                }
            });
        }
    </script>
@endsection