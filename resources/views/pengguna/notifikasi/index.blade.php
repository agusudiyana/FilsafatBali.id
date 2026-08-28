<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <!-- JUDUL DENGAN AKSEN GARIS MARUN TEGAK -->
            <div class="flex items-center gap-3">
                <div class="w-2 h-7 bg-[#8D2B1D] rounded-full"></div>
                <h2 class="font-bold text-2xl text-[#2B1A0E] leading-tight"
                    style="font-family: 'Cormorant Garamond', serif;">
                    Pusat Notifikasi
                </h2>
            </div>

            <!-- TOMBOL KEMBALI STYLE PILL (TANPA SIMBOL PANAH) -->
            <a href="{{ route('pengguna.dashboard') }}"
                class="inline-flex items-center px-5 py-2 rounded-full bg-[#FAF6F0] border border-[#E5D6BF] text-[#8D2B1D] hover:bg-[#8D2B1D] hover:text-white text-xs font-bold tracking-wider uppercase transition shadow-sm">
                <span>Dashboard Pengguna</span>
            </a>
        </div>
    </x-slot>

    <div class="py-12 bg-[#FAF6F0] min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <div class="bg-white border border-[#E5D6BF] rounded-2xl p-6 shadow-sm">
                <!-- Header Dalam Notifikasi -->
                <div class="flex items-center justify-between pb-4 mb-4 border-b border-[#E5D6BF]">
                    <div class="flex items-center gap-3">
                        <h3 style="font-family: 'Cormorant Garamond', serif;" class="text-2xl font-bold text-[#2B1A0E]">
                            Semua Notifikasi
                        </h3>
                        @if (isset($unreadCount) && $unreadCount > 0)
                            <span class="bg-[#8D2B1D] text-white text-[11px] font-bold px-2.5 py-0.5 rounded-full">
                                {{ $unreadCount }} Belum Dibaca
                            </span>
                        @else
                            <span class="bg-[#F0FDF4] text-[#166534] border border-[#BBF7D0] text-[11px] font-bold px-2.5 py-0.5 rounded-full">
                                Semua Sudah Dibaca
                            </span>
                        @endif
                    </div>

                    @if (isset($unreadCount) && $unreadCount > 0)
                        <form action="{{ route('notifikasi.bacaSemua') }}" method="POST">
                            @csrf
                            <button type="submit"
                                class="text-xs font-semibold text-[#8D2B1D] hover:underline cursor-pointer">
                                Tandai Semua Sudah Dibaca
                            </button>
                        </form>
                    @endif
                </div>

                <!-- List Notifikasi -->
                <div class="space-y-3">
                    @forelse($notifikasis as $notif)
                        @php
                            $isUnread = is_null($notif->read_at);
                            $data = $notif->data;
                        @endphp

                        <div
                            class="p-4 rounded-xl border transition-all flex flex-col sm:flex-row sm:items-center justify-between gap-4 {{ $isUnread ? 'bg-[#FAF6F0] border-[#C8A45A]' : 'bg-white border-[#E5D6BF] opacity-75' }}">
                            
                            <div class="flex items-start gap-3">
                                <!-- TITIK MERAH (HANYA MUNCUL JIKA BELUM DIBACA) -->
                                @if ($isUnread)
                                    <div class="w-2.5 h-2.5 rounded-full bg-[#8D2B1D] mt-1.5 shrink-0"></div>
                                @endif

                                <div>
                                    <div class="flex items-center gap-2">
                                        <span
                                            class="text-[10px] font-bold uppercase tracking-wider px-2 py-0.5 rounded bg-[#8D2B1D] text-white">
                                            {{ $data['kategori'] ?? 'AJARAN' }}
                                        </span>
                                        <span class="text-[11px] text-[#675A4D]">
                                            {{ $data['created_at'] ?? '' }}
                                        </span>
                                    </div>

                                    <h4 class="text-base font-bold text-[#2B1A0E] mt-1">
                                        {{ $data['title'] ?? 'Notifikasi' }}
                                    </h4>

                                    <p class="text-sm text-[#675A4D] mt-0.5">
                                        {{ $data['judul'] ?? '' }}
                                    </p>

                                    <!-- BACA SEKARANG (BERSIH TANPA PANAH) -->
                                    <a href="{{ route('notifikasi.buka', ['id' => $notif->id, 'open' => $data['judul'] ?? ($data['title'] ?? '')]) }}"
                                        class="inline-flex items-center text-xs font-bold text-[#8D2B1D] hover:underline mt-2">
                                        <span>Baca Sekarang</span>
                                    </a>
                                </div>
                            </div>

                            <!-- TOMBOL TANDAI SUDAH DIBACA -->
                            @if ($isUnread)
                                <div class="shrink-0 pt-2 sm:pt-0 border-t sm:border-t-0 border-[#E5D6BF]/60">
                                    <form action="{{ route('notifikasi.baca', $notif->id) }}" method="POST">
                                        @csrf
                                        <button type="submit"
                                            class="px-3 py-1.5 rounded-lg bg-white border border-[#E5D6BF] hover:bg-[#8D2B1D] hover:text-white text-[#675A4D] text-xs font-bold transition shadow-2xs cursor-pointer">
                                            Tandai Sudah Dibaca
                                        </button>
                                    </form>
                                </div>
                            @endif
                        </div>
                    @empty
                        <div class="text-center py-12 text-[#675A4D]">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="w-10 h-10 mx-auto text-[#C8A45A] mb-2 opacity-60" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                            </svg>
                            <p class="text-sm font-medium">Belum ada notifikasi saat ini.</p>
                        </div>
                    @endforelse
                </div>

                @if ($notifikasis->hasPages())
                    <div class="mt-6 pt-4 border-t border-[#E5D6BF]">
                        {{ $notifikasis->links() }}
                    </div>
                @endif
            </div>

        </div>
    </div>
</x-app-layout>