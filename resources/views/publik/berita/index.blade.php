<section class="px-4 py-16 bg-white sm:px-8 lg:px-24" id="berita">
    <div class="container mx-auto text-center">
        <h2 class="mb-3 text-4xl font-semibold text-[#0C3C6C] sm:text-3xl pt-4">
            Berita & Pencapaian Sekolah
        </h2>
        <p class="mb-12 text-base text-gray-600 sm:text-lg">
            Kabar terbaru tentang kegiatan sosial dan pencapaian yang membanggakan.
        </p>

        <div class="grid grid-cols-1 gap-8 mb-12 sm:grid-cols-2 lg:grid-cols-3">
            <!-- === Berita 1: Pengesahan Tzu Chi Hospital === -->
            <div class="overflow-hidden transition duration-300 bg-white shadow-md rounded-2xl hover:shadow-xl">
               <a href="{{ route('berita.show1') }}">
                    <div class="relative overflow-hidden">
                        <img src="{{ asset('images/publik/berita/berita1.jpg') }}" 
                            alt="Pengesahan Tzu Chi Hospital"
                            class="object-cover w-full h-56 transition-transform duration-500 sm:h-64 md:h-72 hover:scale-105">
                        <div class="absolute inset-0 bg-gradient-to-b from-transparent to-white/70"></div>
                    </div>
                </a>
                <div class="p-5 text-left">
                    <p class="flex items-center mb-3 text-sm font-medium text-gray-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        12 Oktober 2025
                    </p>
                    <h3 class="mb-2 text-lg font-bold text-gray-800 transition duration-300 sm:text-xl hover:text-blue-600">
                        Pengesahan Tzu Chi Hospital Bersama Presiden Jokowi
                    </h3>
                    <p class="text-sm leading-relaxed text-gray-600 sm:text-base">
                        Momen bersejarah saat peresmian Tzu Chi Hospital oleh Presiden Jokowi sebagai simbol kolaborasi kemanusiaan dan pelayanan kesehatan.
                    </p>
                </div>
            </div>

            <!-- === Berita 2: Pembagian Sembako === -->
            <div class="overflow-hidden transition duration-300 bg-white shadow-md rounded-2xl hover:shadow-xl">
                <a href="{{ route('berita.show2') }}">
                    <div class="relative overflow-hidden">
                        <img src="{{ asset('images/publik/berita/berita2.jpg') }}" 
                            alt="Pembagian sembako kepada masyarakat"
                            class="object-cover w-full h-56 transition-transform duration-500 sm:h-64 md:h-72 hover:scale-105">
                        <div class="absolute inset-0 bg-gradient-to-b from-transparent to-white/70"></div>
                    </div>
                </a>
                <div class="p-5 text-left">
                    <p class="flex items-center mb-3 text-sm font-medium text-gray-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        25 September 2025
                    </p>
                    <h3 class="mb-2 text-lg font-bold text-gray-800 transition duration-300 sm:text-xl hover:text-blue-600">
                        Pembagian Sembako untuk Masyarakat Sekitar
                    </h3>
                    <p class="text-sm leading-relaxed text-gray-600 sm:text-base">
                        Kegiatan sosial pembagian sembako dilakukan untuk membantu masyarakat yang membutuhkan dengan penuh kasih dan kepedulian.
                    </p>
                </div>
            </div>

            <!-- === Berita 3: Membantu Masyarakat di Rumah Sakit === -->
            <div class="overflow-hidden transition duration-300 bg-white shadow-md rounded-2xl hover:shadow-xl">
                <a href="{{ route('berita.show3') }}">
                    <div class="relative overflow-hidden">
                        <img src="{{ asset('images/publik/berita/berita3.jpg') }}" 
                            alt="Kegiatan sosial membantu masyarakat di rumah sakit"
                            class="object-cover w-full h-56 transition-transform duration-500 sm:h-64 md:h-72 hover:scale-105">
                        <div class="absolute inset-0 bg-gradient-to-b from-transparent to-white/70"></div>
                    </div>
                </a>
                <div class="p-5 text-left">
                    <p class="flex items-center mb-3 text-sm font-medium text-gray-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        7 Agustus 2025
                    </p>
                    <h3 class="mb-2 text-lg font-bold text-gray-800 transition duration-300 sm:text-xl hover:text-blue-600">
                        Relawan Tzu Chi Membantu Pasien di Rumah Sakit
                    </h3>
                    <p class="text-sm leading-relaxed text-gray-600 sm:text-base">
                        Para relawan dengan tulus memberikan dukungan dan bantuan kepada pasien serta keluarga mereka di rumah sakit.
                    </p>
                </div>
            </div>
        </div>

        <a href="#"
            class="inline-block px-8 py-3 mt-4 text-sm font-semibold transition bg-white border border-gray-300 rounded-lg text-[#0C3C6C] shadow-sm hover:bg-gray-100 sm:text-base">
            Jelajahi berita lebih lanjut
        </a>
    </div>
</section>
