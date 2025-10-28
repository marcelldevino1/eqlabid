<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="{{ asset('images/icons/logo-white.svg') }}">
  <title>EQLAB.id</title>
  @vite('resources/css/app.css')
</head>
<body class="relative text-gray-800 bg-white">

  {{-- ======== PENJELASAN EQLAB ======== --}}
  <section class="px-6 text-center bg-gradient-to-b from-blue-50 to-white">
    <header class="flex items-center justify-between px-6 py-4 md:py-6">
      
      <!-- Tombol kembali (desktop) -->
      <a href="{{ route('hero') }}"
        class="hidden md:inline-flex items-center px-5 py-2 text-sm font-semibold transition border-2 rounded-full border-[#0C3C6C] text-[#0C3C6C] hover:bg-[#0C3C6C] hover:text-white hover:shadow-md group">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2 transition group-hover:-translate-x-1" fill="none"
          viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
        </svg>
        Kembali ke Berita
      </a>

      <!-- Breadcrumb (readonly style) -->
      <nav class="text-sm text-gray-500 select-none">
        <ol class="flex items-center space-x-2">
          <li><span class="font-medium text-gray-400 cursor-default">Beranda</span></li>
          <li>/</li>
          <li><span class="font-medium text-gray-400 cursor-default">About</span></li>
          <li>/</li>
          <li class="font-semibold text-[#0C3C6C] cursor-default">About Details</li>
        </ol>
      </nav>
    </header>

    <div class="container mx-auto">
      <h1 class="mb-4 text-4xl font-bold text-[#0C3C6C]">Tentang EQLAB.ID</h1>
      <p class="max-w-3xl mx-auto text-lg text-gray-700">
        EQLAB.ID adalah platform digital sekolah yang menghubungkan siswa, guru,
        dan orang tua dalam satu sistem terpadu. Semua aktivitas sekolah mulai dari
        absensi hingga pembelajaran bisa dilakukan secara online dan real-time.
      </p>
    </div>
  </section>

  {{-- ======== PRESTASI SISWA ======== --}}
  <section class="relative px-8 py-20 text-center bg-white font-inter" id="prestasi">
    <h2 class="mb-3 text-4xl font-semibold text-[#0C3C6C]">Prestasi Siswa</h2>
    <p class="max-w-2xl mx-auto mb-12 text-gray-600">
      Mereka yang menginspirasi dengan prestasi akademik dan non-akademik yang membanggakan.
    </p>

    <div class="grid max-w-6xl grid-cols-1 gap-8 mx-auto sm:grid-cols-2 lg:grid-cols-3">
      @forelse ($prestasis as $prestasi)
        <div
          class="overflow-hidden transition duration-300 bg-white border border-gray-100 shadow-md rounded-2xl hover:shadow-lg">
          <div class="relative h-56 overflow-hidden">
            <img src="{{ asset('storage/' . $prestasi->foto) }}"
              onerror="this.src='https://placehold.co/600x400/CCCCCC/333333?text=No+Image';" 
              alt="Foto {{ $prestasi->nama }}"
              class="object-cover w-full h-full">
          </div>
          <div class="p-5 text-left">
            <h4 class="mb-1 text-lg font-bold text-[#0C3C6C]">{{ $prestasi->nama }}</h4>
            <p class="mb-2 text-sm text-gray-500">{{ $prestasi->kelas }}</p>
            <p class="text-sm leading-relaxed text-gray-700 line-clamp-2">{{ $prestasi->deskripsi }}</p>
          </div>
        </div>
      @empty
        <p class="w-full text-center text-gray-500">Belum ada data prestasi yang tersedia.</p>
      @endforelse
    </div>
  </section>

  {{-- ======== BERITA SEKOLAH ======== --}}
  <section class="relative px-6 py-20 text-center bg-gradient-to-t from-blue-50 to-white">
    <div class="container mx-auto">
      <h2 class="mb-3 text-4xl font-semibold text-[#0C3C6C]">Berita & Kegiatan Sekolah</h2>
      <p class="mb-12 text-gray-600">
        Kabar terbaru tentang prestasi siswa dan aktivitas sekolah.
      </p>

      <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3">
        @forelse ($beritas as $berita)
          <div
            class="overflow-hidden transition duration-300 bg-white border border-gray-100 shadow-md rounded-2xl hover:shadow-xl">
            <a href="{{ route('publik.berita.show', $berita->slug) }}">
              <div class="relative overflow-hidden">
                <img src="{{ asset('storage/' . $berita->foto) }}"
                  onerror="this.src='https://placehold.co/600x400/CCCCCC/333333?text=No+Image';"
                  alt="{{ $berita->judul }}"
                  class="object-cover w-full h-56 transition-transform duration-500 hover:scale-105">
                <div class="absolute inset-0 bg-gradient-to-b from-transparent to-white/70"></div>
              </div>
            </a>
            <div class="p-5 text-left">
              <p class="flex items-center mb-2 text-sm text-gray-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24"
                  stroke="currentColor" stroke-width="2">
                  <path stroke-linecap="round" stroke-linejoin="round"
                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                {{ \Carbon\Carbon::parse($berita->created_at)->translatedFormat('d M Y') }}
              </p>
              <a href="{{ route('publik.berita.show', $berita->slug) }}">
                <h3 class="mb-2 text-lg font-bold text-gray-800 hover:text-[#0C3C6C]">{{ $berita->judul }}</h3>
              </a>
              <p
                class="text-sm text-gray-600">{{ \Illuminate\Support\Str::limit(strip_tags($berita->deskripsi), 100, '...') }}
              </p>
            </div>
          </div>
        @empty
          <p class="w-full text-center text-gray-500">Belum ada berita terbaru.</p>
        @endforelse
      </div>
    </div>
  </section>

  {{-- ======== Tombol kembali (mobile) ======== --}}
  <div class="fixed z-50 transform -translate-x-1/2 bottom-5 left-1/2 md:hidden">
    <a href="{{ route('hero') }}"
      class="inline-flex items-center px-6 py-3 text-base font-semibold transition bg-white border-2 border-[#0C3C6C] text-[#0C3C6C] rounded-full shadow-md hover:bg-[#0C3C6C] hover:text-white hover:shadow-xl group">
      <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-3 transition group-hover:-translate-x-1" fill="none"
        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
      </svg>
      Kembali ke Berita
    </a>
  </div>

</body>
</html>
