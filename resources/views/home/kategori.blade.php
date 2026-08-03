<section class="bg-[#8F2318] py-8">

    <div class="max-w-7xl mx-auto grid grid-cols-2 md:grid-cols-6 gap-8 text-center">

        <!-- 1. Ajaran Tetua -->
        <div>
            <div class="mb-2 flex justify-center">
                <i data-feather="book-open" class="w-5 h-5 text-[#D9B35D]"></i>
            </div>
            <h2 class="text-white text-4xl font-bold">
                {{ number_format($totalAjaran ?? 0, 0, ',', '.') }}
            </h2>
            <p class="text-[#D9B35D] text-[10px] tracking-[3px] uppercase mt-2 font-medium">
                Ajaran Tetua
            </p>
        </div>

        <!-- 2. Cecimpedan -->
        <div>
            <div class="mb-2 flex justify-center">
                <i data-feather="feather" class="w-5 h-5 text-[#D9B35D]"></i>
            </div>
            <h2 class="text-white text-4xl font-bold">
                {{ number_format($totalCecimpedan ?? 0, 0, ',', '.') }}
            </h2>
            <p class="text-[#D9B35D] text-[10px] tracking-[3px] uppercase mt-2 font-medium">
                Cecimpedan
            </p>
        </div>

        <!-- 3. Satua Bali -->
        <div>
            <div class="mb-2 flex justify-center">
                <i data-feather="globe" class="w-5 h-5 text-[#D9B35D]"></i>
            </div>
            <h2 class="text-white text-4xl font-bold">
                {{ number_format($totalSatua ?? 0, 0, ',', '.') }}
            </h2>
            <p class="text-[#D9B35D] text-[10px] tracking-[3px] uppercase mt-2 font-medium">
                Satua Bali
            </p>
        </div>

        <!-- 4. Istilah Bali -->
        <div>
            <div class="mb-2 flex justify-center">
                <i data-feather="tag" class="w-5 h-5 text-[#D9B35D]"></i>
            </div>
            <h2 class="text-white text-4xl font-bold">
                {{ number_format($totalIstilah ?? 0, 0, ',', '.') }}
            </h2>
            <p class="text-[#D9B35D] text-[10px] tracking-[3px] uppercase mt-2 font-medium">
                Istilah Bali
            </p>
        </div>

        <!-- 5. Kontributor -->
        <div>
            <div class="mb-2 flex justify-center">
                <i data-feather="users" class="w-5 h-5 text-[#D9B35D]"></i>
            </div>
            <h2 class="text-white text-4xl font-bold">
                {{ number_format($totalKontributor ?? 0, 0, ',', '.') }}
            </h2>
            <p class="text-[#D9B35D] text-[10px] tracking-[3px] uppercase mt-2 font-medium">
                Kontributor
            </p>
        </div>

        <!-- 6. Terverifikasi -->
        <div>
            <div class="mb-2 flex justify-center">
                <i data-feather="shield" class="w-5 h-5 text-[#D9B35D]"></i>
            </div>
            <h2 class="text-white text-4xl font-bold">
                @php
                    $terverifikasi = $totalTerverifikasi ?? 0;
                @endphp
                @if ($terverifikasi >= 1000)
                    {{ number_format($terverifikasi / 1000, 1, ',', '.') }} ribu
                @else
                    {{ number_format($terverifikasi, 0, ',', '.') }}
                @endif
            </h2>
            <p class="text-[#D9B35D] text-[10px] tracking-[3px] uppercase mt-2 font-medium">
                Terverifikasi
            </p>
        </div>

    </div>

</section>
