 <section id="ajaran" class="bg-[#1A120C] py-24">

        <div class="max-w-[1200px] mx-auto px-6">

            <p class="uppercase tracking-[6px] text-[#D4A64A] text-xs mb-3">
                SOROTAN
            </p>

            <h2 class="text-[66px] leading-[0.95] font-semibold mb-12 text-[#F7F1E8]"
                style="font-family:'Cormorant Garamond',serif;">
                Ajaran Tetua
            </h2>

            <div class="grid lg:grid-cols-[540px_1fr] gap-14 items-center">

                <!-- FOTO -->
                <div>

                    <img id="mainImage" src="{{ asset('images/ajaran.jpeg') }}"
                        class="w-[540px] h-[420px] rounded-xl object-cover shadow-xl">

                </div>

                <!-- KONTEN -->
                <div>

                    <span id="mainTag"
                        class="inline-block
                        border
                        border-[#8B6528]
                        text-[#D4A64A]
                        bg-transparent
                        text-[10px]
                        tracking-[3px]
                        uppercase
                        px-4
                        py-2
                        rounded-md">
                        FILSAFAT KEHIDUPAN
                    </span>

                    <h2 id="mainTitle"
                        class="mt-6
                        text-[64px]
                        leading-[0.95]
                        font-semibold
                        text-[#F7F1E8]"
                        style="font-family:'Cormorant Garamond',serif;">
                        Tri Hita Karana
                    </h2>
                    <p id="mainDesc"
                        class="mt-7
                        text-[#E5D7C8]
                        text-[19px]
                        leading-[38px]
                        font-normal">

                        Tri Hita Karana merupakan filosofi kehidupan masyarakat Bali yang mengajarkan keharmonisan
                        hubungan manusia dengan Tuhan, sesama manusia, dan alam.

                    </p>

                    <div class="flex justify-between items-end mt-10">

                        <!-- Profil -->
                        <div id="mainProfile" class="flex items-center">

                            <div class="w-14 h-14 rounded-full bg-[#7C5216] flex items-center justify-center">

                                <span class="text-[#D4A64A] font-semibold">I</span>

                            </div>

                            <div class="ml-4">

                                <h4 id="mainAuthor" class="text-[#F8F2E8] text-[30px] font-semibold"
                                    style="font-family:'Cormorant Garamond',serif;">

                                    Ida Bagus Mantra

                                </h4>

                                <p id="mainRole" class="text-[#A98C67] uppercase tracking-[3px] text-[11px]">

                                    EST. 1940

                                </p>

                            </div>

                        </div>

                        <!-- Tombol -->
                        <button id="mainButton"
                            class="border border-[#8D6627]
        text-[#D4A64A]
        px-8 py-3
        rounded-md
        hover:bg-[#D4A64A]
        hover:text-[#241308]
        transition">

                            DETAIL →

                        </button>

                    </div>

                </div>
            </div>


            <!-- THUMBNAIL + DOT -->
            <div class="mt-10 flex flex-col items-center">

                <div class="flex gap-4 items-center">

                    <!-- TRI HITA KARANA -->
                    <div onclick="changeSlide(1)" id="thumb1"
                        class="thumb relative w-[360px] h-[90px] rounded-xl overflow-hidden cursor-pointer border-2 border-[#D4A64A] transition-all duration-500">

                        <img src="{{ asset('images/ajaran.jpeg') }}" class="w-full h-full object-cover">


                        <div class="absolute inset-0 bg-black/50"></div>

                        <span class="absolute bottom-3 left-3 text-white font-semibold">

                            Tri Hita Karana

                        </span>

                    </div>

                    <!-- TAT TWAM ASI -->
                    <div onclick="changeSlide(2)" id="thumb2"
                        class="thumb relative w-[360px] h-[90px] rounded-xl overflow-hidden cursor-pointer border-2 border-transparent transition-all duration-500">

                        <img src="{{ asset('images/tat twam asi.jpeg') }}" class="w-full h-full object-cover">

                        <div class="absolute inset-0 bg-black/50"></div>

                        <span class="absolute bottom-3 left-3 text-white font-semibold">
                            Tat Twam Asi
                        </span>

                    </div>

                    <!-- DESA KALA PATRA -->
                    <div onclick="changeSlide(3)" id="thumb3"
                        class="thumb relative w-[360px] h-[90px] rounded-xl overflow-hidden cursor-pointer border-2 border-transparent transition-all duration-500">

                        <img src="{{ asset('images/desa kala patra.jpeg') }}" class="w-full h-full object-cover">

                        <div class="absolute inset-0 bg-black/50"></div>

                        <span class="absolute bottom-3 left-3 text-white font-semibold">
                            Desa Kala Patra
                        </span>

                    </div>

                </div>

                <!-- DOT -->
                <div class="flex justify-center gap-2 mt-5">

                    <span id="dot1" class="w-2 h-2 rounded-full bg-[#D9B35D]"></span>

                    <span id="dot2" class="w-2 h-2 rounded-full bg-[#665548]"></span>

                    <span id="dot3" class="w-2 h-2 rounded-full bg-[#665548]"></span>

                </div>

            </div>


    </section>