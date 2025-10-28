<section
    class=" flex flex-col items-center justify-between px-6 py-16 overflow-hidden xl:flex-row xl:px-20 bg-gradient-to-b from-blue-50 to-white relative h-[calc(100dvh-80px)]" id="hero">

    <!-- Background Image for Mobile -->
    <img src="{{ asset('images/publik/hero.svg') }}" alt="Graduation Background"
        class="absolute z-0 w-[60%] md:w-[50%] sm:w-[40%] xl:hidden opacity-20 object-cover">

    <!-- Left Section -->
    <div class="relative z-20 max-w-xl text-center pt-14 xl:text-left">
        <h1 class="mb-6 text-4xl font-bold text-[#0C3C6C] leading-tight">
            Semua fitur sekolah digital,<br> dalam satu tempat
        </h1>
        <p class="mb-8 text-[#0C3C6C] leading-relaxed">
            Selalu terhubung dengan perkembangan akademik dan kehadiran anak Anda.
            Monitoring real-time, laporan lengkap, dan komunikasi tanpa batas.
        </p>

        <!-- Fitur Box -->
        <div class="grid grid-cols-2 gap-4 mb-8">
            <div class="px-4 py-3 text-center transition bg-white rounded-lg shadow-md hover:shadow-lg">
                <p class="text-sm font-semibold text-gray-800">Terakreditasi A</p>
            </div>
            <div class="px-4 py-3 text-center transition bg-white rounded-lg shadow-md hover:shadow-lg">
                <p class="text-sm font-semibold text-gray-800">Sistem Terintegrasi</p>
            </div>
            <div class="col-span-2 px-4 py-3 text-center transition bg-white rounded-lg shadow-md hover:shadow-lg sm:col-span-1">
                <p class="text-sm font-semibold text-gray-800">Peningkatan 95% Nilai Siswa</p>
            </div>
            <!-- Tombol -->
            <a href="#fitur"
                class="inline-block col-span-2 px-6 py-3 font-medium text-center text-white transition bg-blue-900 rounded-md hover:bg-blue-800 sm:col-span-1">
                Jelajahi Fitur
            </a>
        </div>
    </div>

    <!-- Right Section (visible only on desktop) -->
    <div class="relative justify-center hidden w-full h-full mt-12 xl:flex xl:w-1/2">
        <!-- Gambar utama desktop -->
        <img src="{{ asset('images/publik/hero.svg') }}" alt="Graduation"
            class="absolute bottom-0 z-10 transition-transform duration-500 hover:scale-105">

        <!-- Badge -->
        <div class="absolute z-20 px-6 py-3 text-center -translate-x-1/2 bg-white shadow-md rounded-xl bottom-4 left-1/2">
            <p class="font-semibold text-gray-800">Prestasi Siswa</p>
            <p class="text-xl font-bold text-blue-700">100+</p>
        </div>
    </div>
</section>
