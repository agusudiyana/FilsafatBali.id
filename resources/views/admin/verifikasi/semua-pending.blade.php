@extends('admin.layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-4 flex flex-col h-[calc(100vh-100px)] text-[#1A110A]">

    <div class="flex-none mb-6 border-b border-[#E6D5B8] pb-4 flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl sm:text-3xl font-bold text-[#1A110A]">
                Konten Perlu Verifikasi (Pending)
            </h1>
            <p class="text-gray-500 text-xs sm:text-sm mt-1">
                Daftar semua kiriman dari seluruh modul yang membutuhkan persetujuan admin.
            </p>
        </div>

        <div class="flex items-center gap-3 self-start md:self-auto">
            <select id="filterModul" onchange="filterModulTabel()" class="text-xs font-semibold border border-[#E6D5B8] rounded-xl px-3 py-2 bg-white text-gray-800 focus:outline-none focus:ring-2 focus:ring-[#C48D2D] shadow-sm cursor-pointer min-w-[140px]">
                <option value="semua">Semua Modul</option>
                <option value="Artikel">Artikel</option>
                <option value="Filsafat">Filsafat</option>
                <option value="Ajaran Tertua">Ajaran Tertua</option>
                <option value="Cecimpedan">Cecimpedan</option>
                <option value="Satua Bali">Satua Bali</option>
                <option value="Istilah Bali">Istilah Bali</option>
            </select>

            <a href="{{ route('admin.dashboard') }}" class="px-4 py-2 bg-gray-100 hover:bg-gray-200 rounded-xl text-xs font-semibold text-gray-700 transition whitespace-nowrap">
                &larr; Kembali
            </a>
        </div>
    </div>

    <div class="bg-white flex-1 rounded-2xl shadow-sm border border-[#E6D5B8] overflow-hidden flex flex-col min-h-0">
        <div class="overflow-y-auto overflow-x-auto flex-1 bg-white">
            <table class="w-full text-left border-collapse bg-white" id="tabelPending">
                <thead class="bg-white text-[#1A110A] font-bold text-sm border-b border-[#E6D5B8] sticky top-0 z-10 shadow-sm">
                    <tr>
                        <th class="p-4 bg-white">No</th>
                        <th class="p-4 bg-white">Judul / Konten</th>
                        <th class="p-4 bg-white">Kategori Modul</th>
                        <th class="p-4 bg-white">Penulis</th>
                        <th class="p-4 bg-white">Status</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-100 bg-white text-sm">
                    @forelse($semuaPending as $item)
                        <tr class="hover:bg-[#FAF6F0] transition bg-white baris-konten" data-modul="{{ $item->kategori_modul }}">
                            <td class="p-4 font-medium text-gray-500 nomor-urut">{{ $loop->iteration }}</td>
                            <td class="p-4 font-semibold text-[#1A110A]">
                                {{ $item->judul ?? $item->istilah ?? $item->pertanyaan ?? 'Konten' }}
                            </td>
                            <td class="p-4">
                                <span class="bg-[#F8EFE3] text-[#8D2B1D] px-3 py-1 rounded-full text-xs font-bold border border-[#E6D5B8]">
                                    {{ $item->kategori_modul }}
                                </span>
                            </td>
                            <td class="p-4 text-gray-600">
                                {{ $item->user->name ?? 'Penulis' }}
                            </td>
                            <td class="p-4">
                                <span class="inline-flex items-center gap-1 bg-amber-100 text-amber-800 px-3 py-1 rounded-full text-xs font-semibold">
                                    <i data-feather="clock" class="w-3.5 h-3.5"></i>
                                    Pending
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center p-8 text-gray-500 bg-white">
                                <div class="flex flex-col items-center justify-center gap-2">
                                    <i data-feather="check-circle" class="w-8 h-8 text-green-500"></i>
                                    <span>Tidak ada konten yang menunggu verifikasi saat ini.</span>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        if (typeof feather !== 'undefined') feather.replace();
    });

    function filterModulTabel() {
        const selectedModul = document.getElementById('filterModul').value;
        const barisKonten = document.querySelectorAll('.baris-konten');
        let counter = 1;

        barisKonten.forEach(baris => {
            const modulBaris = baris.getAttribute('data-modul');
            if (selectedModul === 'semua' || modulBaris === selectedModul) {
                baris.classList.remove('hidden');
                const tdNomor = baris.querySelector('.nomor-urut');
                if (tdNomor) tdNomor.textContent = counter++;
            } else {
                baris.classList.add('hidden');
            }
        });
    }
</script>
@endsection