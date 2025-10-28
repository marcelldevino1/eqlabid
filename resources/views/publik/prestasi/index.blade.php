<section class="relative px-8 py-20 text-center bg-gradient-to-r from-blue-50/50 to-white lg:px-24 font-inter" id="prestasi">
    <div class="absolute top-0 left-0 w-full h-16 pointer-events-none bg-gradient-to-b from-white/90 to-transparent"></div>
    <div class="absolute bottom-0 left-0 w-full h-16 pointer-events-none bg-gradient-to-t from-white/90 to-transparent"></div>

    <h2 class="mb-3 text-4xl font-semibold text-[#0C3C6C]">Prestasi</h2>
    <p class="max-w-2xl mx-auto mb-12 font-medium text-gray-600">
        Mereka yang menginspirasi dengan prestasi akademik dan non-akademik yang membanggakan.
    </p>

    <div class="relative max-w-6xl mx-auto overflow-x-hidden">
        <div id="slider-prestasi"
             class="flex pb-4 overflow-x-scroll snap-x snap-mandatory scroll-smooth scrollbar-hide"
             style="-ms-overflow-style: none;">
            
            <!-- === Item 1 === -->
            <a href="{{ route('prestasi.show1') }}" 
               class="flex-shrink-0 snap-start w-[85%] sm:w-[50%] md:w-[33.33%] lg:w-1/3 px-4">
                <div
                    class="overflow-hidden transition duration-300 bg-white border border-gray-100 shadow-xl rounded-xl hover:shadow-2xl hover:border-[#0C3C6C]">
                    <div class="relative overflow-hidden h-[28vh] sm:h-[32vh] md:h-[34vh] bg-gray-100">
                        <img src="{{ asset('images/publik/prestasi/prestasi1.jpg') }}"
                            alt="Prestasi 1" class="object-cover object-center w-full h-full">
                        <span class="absolute flex items-center justify-center w-6 h-6 text-xs font-bold text-white rounded-full top-3 left-3 bg-black/50">1</span>
                        <span class="absolute px-2 py-1 text-xs text-yellow-600 bg-white rounded-full shadow-md top-3 right-3">🏆</span>
                    </div>
                    <div class="p-4">
                        <h4 class="mb-2 text-base font-bold text-[#0C3C6C] sm:text-lg">Juara 1 Lomba Sains</h4>
                        <span class="inline-block px-3 py-1 mb-2 text-xs font-medium text-blue-800 bg-blue-100 rounded-md sm:text-sm">Kelas 12 RPL 2</span>
                        <p class="h-10 overflow-hidden text-xs text-gray-700 sm:text-sm line-clamp-2">Prestasi luar biasa dalam bidang sains tingkat kota.</p>
                    </div>
                </div>
            </a>

            <!-- === Item 2 === -->
            <a href="{{ route('prestasi.show2') }}" 
               class="flex-shrink-0 snap-start w-[85%] sm:w-[50%] md:w-[33.33%] lg:w-1/3 px-4">
                <div
                    class="overflow-hidden transition duration-300 bg-white border border-gray-100 shadow-xl rounded-xl hover:shadow-2xl hover:border-[#0C3C6C]">
                    <div class="relative overflow-hidden h-[28vh] sm:h-[32vh] md:h-[34vh] bg-gray-100">
                        <img src="{{ asset('images/publik/prestasi/prestasi2.jpg') }}"
                            alt="Prestasi 2" class="object-cover object-center w-full h-full">
                        <span class="absolute flex items-center justify-center w-6 h-6 text-xs font-bold text-white rounded-full top-3 left-3 bg-black/50">2</span>
                        <span class="absolute px-2 py-1 text-xs text-yellow-600 bg-white rounded-full shadow-md top-3 right-3">🏅</span>
                    </div>
                    <div class="p-4">
                        <h4 class="mb-2 text-base font-bold text-[#0C3C6C] sm:text-lg">Juara 2 Lomba Menyanyi</h4>
                        <span class="inline-block px-3 py-1 mb-2 text-xs font-medium text-blue-800 bg-blue-100 rounded-md sm:text-sm">Kelas 8B</span>
                        <p class="h-10 overflow-hidden text-xs text-gray-700 sm:text-sm line-clamp-2">Berprestasi di ajang seni suara tingkat provinsi.</p>
                    </div>
                </div>
            </a>

            <!-- === Item 3 === -->
            <a href="{{ route('prestasi.show3') }}" 
               class="flex-shrink-0 snap-start w-[85%] sm:w-[50%] md:w-[33.33%] lg:w-1/3 px-4">
                <div
                    class="overflow-hidden transition duration-300 bg-white border border-gray-100 shadow-xl rounded-xl hover:shadow-2xl hover:border-[#0C3C6C]">
                    <div class="relative overflow-hidden h-[28vh] sm:h-[32vh] md:h-[34vh] bg-gray-100">
                        <img src="{{ asset('images/publik/prestasi/prestasi3.jpg') }}"
                            alt="Prestasi 3" class="object-cover object-center w-full h-full">
                        <span class="absolute flex items-center justify-center w-6 h-6 text-xs font-bold text-white rounded-full top-3 left-3 bg-black/50">3</span>
                        <span class="absolute px-2 py-1 text-xs text-yellow-600 bg-white rounded-full shadow-md top-3 right-3">🎖️</span>
                    </div>
                    <div class="p-4">
                        <h4 class="mb-2 text-base font-bold text-[#0C3C6C] sm:text-lg">Juara 3 Lomba Pramuka</h4>
                        <span class="inline-block px-3 py-1 mb-2 text-xs font-medium text-blue-800 bg-blue-100 rounded-md sm:text-sm">Kelas 11 RPL 1</span>
                        <p class="h-10 overflow-hidden text-xs text-gray-700 sm:text-sm line-clamp-2">Tim sekolah meraih kemenangan membanggakan di turnamen antar sekolah.</p>
                    </div>
                </div>
            </a>
        </div>
    </div>
</section>
