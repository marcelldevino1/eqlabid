<section id="hero" class="relative flex flex-col items-center justify-between px-6 py-16 overflow-hidden bg-gradient-to-b from-blue-50 to-white xl:flex-row xl:px-20 h-[calc(100dvh-80px)]">
  <!-- BG dekor halus -->
  <div class="pointer-events-none absolute inset-0 bg-[radial-gradient(90%_60%_at_50%_-10%,rgba(30,64,175,0.08),transparent_60%)]"></div>

  <!-- Ilustrasi: mobile/tablet – benar2 center -->
  <img
    src="{{ asset('images/publik/hero.svg') }}"
    alt="Graduation Background"
    class="pointer-events-none absolute inset-x-0 bottom-[-6vw] mx-auto w-[78vw] max-w-[520px] opacity-25 object-contain xl:hidden"
    data-anim="float-slow"/>

  <!-- Kiri: teks -->
  <div class="relative z-20 max-w-xl pt-12 text-center xl:text-left">
    <h1
      class="mb-5 font-extrabold tracking-tight text-[#0C3C6C] [text-wrap:balance]
             text-[clamp(30px,7.2vw,44px)] leading-[1.15]"
      data-anim="rise" data-delay="80"
    >
      Semua fitur sekolah digital,<br class="hidden sm:block"> dalam satu tempat
    </h1>

    <p
      class="mb-8 text-[15px] md:text-base leading-relaxed text-[#0C3C6C]/80"
      data-anim="fade" data-delay="180"
    >
      Selalu terhubung dengan perkembangan akademik dan kehadiran anak Anda.
      Monitoring real-time, laporan lengkap, dan komunikasi tanpa batas.
    </p>

    <!-- Fitur / CTA -->
    <div class="grid grid-cols-2 gap-4 mb-8">
      <div class="px-4 py-3 text-center transition bg-white shadow-md rounded-xl ring-1 ring-black/5 hover:shadow-lg"
           data-anim="pop" data-delay="280">
        <p class="text-sm font-semibold text-gray-800">Terakreditasi A</p>
      </div>
      <div class="px-4 py-3 text-center transition bg-white shadow-md rounded-xl ring-1 ring-black/5 hover:shadow-lg"
           data-anim="pop" data-delay="360">
        <p class="text-sm font-semibold text-gray-800">Sistem Terintegrasi</p>
      </div>
      <div class="col-span-2 px-4 py-3 text-center transition bg-white shadow-md sm:col-span-1 rounded-xl ring-1 ring-black/5 hover:shadow-lg"
           data-anim="pop" data-delay="440">
        <p class="text-sm font-semibold text-gray-800">Peningkatan 95% Nilai Siswa</p>
      </div>

      <a href="#fitur"
         class="col-span-2 sm:col-span-1 inline-flex items-center justify-center px-6 py-3 rounded-xl font-semibold text-white bg-[#1E3A8A] hover:bg-[#1b3379] shadow-md ring-1 ring-white/10 transition"
         data-anim="pop cta-glow" data-delay="520">
        Jelajahi Fitur
        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 ml-2" fill="none" viewBox="0 0 24 24"
             stroke="currentColor" stroke-width="2" aria-hidden="true">
          <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
        </svg>
      </a>
    </div>
  </div>

  <!-- Kanan: desktop -->
  <div class="relative z-10 items-end justify-end hidden h-full xl:flex xl:w-1/2">
    <img
      src="{{ asset('images/publik/hero.svg') }}"
      alt="Graduation"
      class="relative z-10 object-contain w-[520px] max-w-[50vw] max-h-[78%] opacity-25"
      data-anim="float-slow"
    />
    <!-- Badge dengan ikon trophy kiri-kanan -->
    <div
      class="absolute bottom-10 right-[190px] z-20 px-5 py-3 text-center bg-white/90 backdrop-blur-sm rounded-xl shadow-md ring-1 ring-black/5"
      data-anim="rise" data-delay="640"
    >
      <p class="text-xs font-semibold text-gray-700">Prestasi Siswa</p>
      <div class="flex items-center justify-center gap-2">
        <!-- trophy kiri -->
        <svg aria-hidden="true" class="w-5 h-5 text-amber-500" viewBox="0 0 24 24" fill="currentColor">
          <path d="M19 4h-2V3a1 1 0 0 0-1-1H8a1 1 0 0 0-1 1v1H5a1 1 0 0 0-1 1v2a5 5 0 0 0 4 4.9V14H8a4 4 0 0 0-4 4v1h16v-1a4 4 0 0 0-4-4h0v-2.1A5 5 0 0 0 20 7V5a1 1 0 0 0-1-1Zm-1 3a3 3 0 0 1-3 3V6h3v1ZM6 7V6h3v4a3 3 0 0 1-3-3Z"/>
        </svg>
        <p class="text-2xl font-bold text-blue-700">100+</p>
        <!-- trophy kanan -->
        <svg aria-hidden="true" class="w-5 h-5 text-amber-500" viewBox="0 0 24 24" fill="currentColor">
          <path d="M19 4h-2V3a1 1 0 0 0-1-1H8a1 1 0 0 0-1 1v1H5a1 1 0 0 0-1 1v2a5 5 0 0 0 4 4.9V14H8a4 4 0 0 0-4 4v1h16v-1a4 4 0 0 0-4-4h0v-2.1A5 5 0 0 0 20 7V5a1 1 0 0 0-1-1Zm-1 3a3 3 0 0 1-3 3V6h3v1ZM6 7V6h3v4a3 3 0 0 1-3-3Z"/>
        </svg>
      </div>
    </div>
  </div>
</section>
