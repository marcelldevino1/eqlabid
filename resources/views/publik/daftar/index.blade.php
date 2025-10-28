<section class="relative min-h-[70vh] pt-16 pb-24 bg-white flex items-center justify-center overflow-hidden" id="daftar">
    {{-- Background Image dengan Overlay --}}
    <div class="absolute inset-0 bg-center bg-cover"
        style="background-image: url('{{ asset('images/publik/tzuchi.jpg') }}');">
    </div>
    <div class="absolute inset-0 bg-[#0C3C6C] opacity-70"></div>

    {{-- 🌤 Tambahkan efek putih di bagian atas --}}
    <div class="absolute top-0 left-0 z-10 w-full h-16 bg-gradient-to-b from-white/70 to-transparent"></div>

    {{-- Konten --}}
    <div class="container relative z-20 flex flex-col items-center justify-between gap-8 px-6 mx-auto md:flex-row md:px-12 lg:px-20">
        <div class="flex-1 space-y-4 text-center text-white md:text-left">
            <h2 class="text-3xl font-semibold md:text-4xl">Daftar Siswa Baru</h2>
            <p class="max-w-lg mx-auto text-lg leading-relaxed md:mx-0">
                Bergabunglah bersama <span class="font-semibold">SMK Cinta Kasih Tzu Chi</span> dan
                wujudkan masa depan yang penuh peluang. Pendidikan unggul, lingkungan positif,
                dan dukungan untuk mengembangkan potensi terbaikmu!
            </p>
        </div>

        <div class="flex justify-center flex-1 mt-8 md:justify-end md:mt-0">
            <button
                onclick="document.getElementById('daftarModal').classList.remove('hidden')"
                class="px-10 py-4 font-semibold text-white transition border border-white rounded-md shadow-lg hover:bg-white hover:text-blue-900 shadow-white/20">
                Daftar Sekarang
            </button>
        </div>
    </div>

    {{-- Hiasan bawah --}}
    <div class="absolute bottom-0 left-0 w-full h-20 bg-gradient-to-t from-[#0C3C6C] to-transparent"></div>
</section>
