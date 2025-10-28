<section class="px-6 py-20 bg-white sm:px-10 lg:px-24" id="about">
    <div class="container mx-auto text-center">
        <h2 class="mb-5 text-4xl font-semibold text-[#0C3C6C]">
            Apa itu EQLAB.ID?
        </h2>

        <p class="max-w-3xl mx-auto text-lg text-gray-700 sm:text-xl">
            EQLAB.ID adalah platform digital sekolah yang menghubungkan siswa, guru,
            dan orang tua dalam satu sistem terpadu. Semua aktivitas sekolah mulai dari
            absensi hingga pembelajaran bisa dilakukan secara online dan real-time.
        </p>

        <a href="{{ route('about') }}"
            class="inline-flex items-center justify-center px-6 py-3 mt-4 text-base font-semibold text-white transition duration-300 bg-[#0C3C6C] rounded-lg shadow-md hover:bg-[#093054] hover:shadow-lg">
            Lihat Lebih Lengkap
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 ml-2" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3" />
            </svg>
        </a>
        {{-- END: Tambahan Button "Lihat Lebih Lengkap" --}}

        <div class="grid grid-cols-1 gap-6 mt-10 sm:grid-cols-2 lg:grid-cols-3 lg:items-center">

            <div
                class="relative order-1 p-6 text-center transition bg-white border border-gray-100 shadow-md rounded-2xl hover:shadow-lg lg:order-1">
                <div class="flex flex-col items-center">
                    <div
                        class="flex items-center justify-center w-14 h-14 mb-3 text-white bg-[#0C3C6C] rounded-xl shadow-md">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                            <path d="M14 2v6h6"></path>
                            <path d="M10 13l2 2 4-4"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-[#0C3C6C]">99%</h3>
                    <p class="text-gray-600">Kepuasan</p>
                </div>
                <span
                    class="absolute flex items-center justify-center w-6 h-6 text-xs font-semibold text-white bg-gray-500 rounded-full top-3 right-4">1</span>
            </div>

            <div
                class="relative order-3 p-6 text-center transition bg-white border border-gray-100 shadow-md rounded-2xl hover:shadow-lg lg:order-4">
                <div class="flex flex-col items-center">
                    <div
                        class="flex items-center justify-center w-14 h-14 mb-3 text-white bg-[#0C3C6C] rounded-xl shadow-md">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2z"></path>
                            <line x1="6" y1="13" x2="18" y2="13"></line>
                            <line x1="6" y1="17" x2="18" y2="17"></line>
                        </svg>
                    </div>
                    <span
                        class="absolute flex items-center justify-center w-6 h-6 text-xs font-semibold text-white bg-gray-500 rounded-full top-3 right-4">2</span>
                </div>
                <h3 class="mb-2 text-xl font-bold text-[#0C3C6C]">Visi Jelas</h3>
                <p class="leading-relaxed text-gray-600">
                    Menjadi platform edukasi digital terdepan yang mendorong generasi muda untuk berkembang melalui
                    teknologi inovatif.
                </p>
            </div>

            <div
                class="relative order-3 p-6 text-center transition bg-white border border-gray-100 shadow-md rounded-2xl hover:shadow-lg lg:order-3">
                <div class="flex flex-col items-center">
                    <div
                        class="flex items-center justify-center w-14 h-14 mb-3 text-white bg-[#0C3C6C] rounded-xl shadow-md">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path
                                d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z">
                            </path>
                            <path d="M13 7h-2v6h2zm0 8h-2v2h2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-[#0C3C6C]">24/7</h3>
                    <p class="text-gray-600">Support</p>
                </div>
                <span
                    class="absolute flex items-center justify-center w-6 h-6 text-xs font-semibold text-white bg-gray-500 rounded-full top-3 right-4">3</span>
            </div>

            <div
                class="relative order-4 p-6 text-left transition bg-white border border-gray-100 shadow-md rounded-2xl hover:shadow-lg lg:order-6">
                <div class="flex items-center justify-center">
                    <div
                        class="flex items-center justify-center w-14 h-14 text-white bg-[#0C3C6C] rounded-xl shadow-md">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <circle cx="12" cy="12" r="10"></circle>
                            <path d="M12 16L12 8"></path>
                            <path d="M15 11L12 8L9 11"></path>
                        </svg>
                    </div>
                    <span
                        class="absolute flex items-center justify-center w-6 h-6 text-xs font-semibold text-white bg-gray-500 rounded-full top-3 right-4">4</span>
                </div>
                <h3 class="mb-2 text-xl font-bold text-[#0C3C6C] text-center">Akses 24/7</h3>
                <p class="leading-relaxed text-center text-gray-600">
                    Kapan saja, di mana saja — akses tanpa batas 24/7 untuk memenuhi kebutuhan Anda setiap saat.
                </p>
            </div>

            <div
                class="relative flex flex-col justify-center order-5 p-6 text-left transition bg-white border border-gray-100 shadow-md rounded-2xl hover:shadow-xl sm:col-span-2 lg:col-span-1 lg:row-span-2 lg:order-2">
                <div class="space-y-4">
                    <div class="flex items-center justify-center">

                        <div
                            class="flex items-center justify-center w-14 h-14 mb-3 text-white bg-[#0C3C6C] rounded-xl shadow-md mr-4 ">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <circle cx="12" cy="12" r="10"></circle>
                                <polyline points="12 6 12 12 16 14"></polyline>
                            </svg>
                        </div>

                        <span
                            class="absolute flex items-center justify-center w-6 h-6 text-xs font-semibold text-white bg-gray-500 rounded-full shadow-sm top-3 right-4">
                            5
                        </span>
                    </div>

                    <div>
                        <h3 class="mb-2 text-lg font-extrabold text-[#0C3C6C] sm:text-xl">
                            Efisiensi Tinggi
                        </h3>
                        <p class="text-sm leading-relaxed text-gray-600 sm:text-base">
                            Hemat waktu hingga <span class="font-semibold text-[#0C3C6C]">70%</span> melalui sistem
                            otomatis yang meningkatkan produktivitas dan efisiensi kerja.
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
