<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ $berita->judul }} | EQLAB.id</title>
  @vite('resources/css/app.css')
</head>

<body class="relative text-gray-700 bg-gray-50">

  <!-- Tombol Kembali (pojok kiri atas desktop / bawah di HP) -->
  <div class="fixed z-50 hidden top-6 left-6 md:block">
    <a href="{{ route('hero') }}"
      class="inline-flex items-center px-5 py-2.5 text-sm font-semibold transition-all duration-300 border-2 border-[#0C3C6C] text-[#0C3C6C] bg-white rounded-full shadow-md hover:bg-[#0C3C6C] hover:text-white hover:shadow-xl group">
      <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2 transition-transform duration-300 group-hover:-translate-x-1"
        fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
      </svg>
      Kembali
    </a>
  </div>

  <section class="min-h-screen py-12 lg:py-20">
    <div class="container max-w-6xl px-6 mx-auto sm:px-8">

      <!-- Breadcrumb -->
      <nav class="mb-10 text-sm font-medium text-gray-500" aria-label="Breadcrumb">
        <a href="/" class="transition-colors duration-200 hover:text-[#0C3C6C]">Beranda</a>
        <span class="mx-2 text-gray-400">/</span>
        <a href="{{ route('hero') }}" class="transition-colors duration-200 hover:text-[#0C3C6C]">Berita</a>
        <span class="mx-2 text-gray-400">/</span>
        <span class="text-[#0C3C6C] font-semibold truncate max-w-xs block sm:inline">
          {{ \Illuminate\Support\Str::limit($berita->judul, 40, '...') }}
        </span>
      </nav>

      <!-- Layout Utama -->
      <div class="flex flex-col items-center gap-10 lg:flex-row lg:items-start">

        <!-- Gambar di kiri (desktop) -->
        <div class="w-full lg:w-1/2">
          <div class="overflow-hidden shadow-lg rounded-2xl">
            <img src="{{ asset('storage/' . $berita->foto) }}" alt="Foto {{ $berita->judul }}"
              class="object-cover w-full h-auto max-h-[500px] transition-transform duration-500 hover:scale-105">
          </div>
        </div>

        <!-- Teks di kanan -->
        <div class="w-full lg:w-1/2">
          <!-- Judul dan Deskripsi -->
          <div class="mb-6 text-left">
            <h1 class="mb-3 text-3xl font-extrabold leading-tight text-[#0C3C6C] sm:text-4xl lg:text-5xl">
              {{ $berita->judul }}
            </h1>

            <!-- Tambahan tanggal -->
            <p class="flex items-center mb-4 text-sm font-medium text-gray-500">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                  d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
              </svg>
              {{ \Carbon\Carbon::parse($berita->created_at)->translatedFormat('d M Y') }}
            </p>

            <p class="max-w-3xl text-base text-gray-600 sm:text-lg">
              {{ $berita->deskripsi ?? 'Berita terbaru seputar kegiatan dan informasi dari EQLAB.id yang dapat menginspirasi pembaca untuk terus berkembang.' }}
            </p>
          </div>

          <!-- Konten -->
          <div class="p-6 bg-white border border-gray-100 shadow-md sm:p-8 rounded-2xl">
            <div class="space-y-6 leading-relaxed prose prose-lg text-gray-800 max-w-none">
              {!! $berita->konten !!}
            </div>
          </div>
        </div>
      </div>

      <!-- Tombol Kembali (versi HP di bawah) -->
      <div class="mt-12 text-center md:hidden">
        <a href="{{ route('hero') }}"
          class="inline-flex items-center px-6 py-3 text-base font-semibold transition-all duration-300 border-2 border-[#0C3C6C] text-[#0C3C6C] bg-white rounded-full shadow-md hover:bg-[#0C3C6C] hover:text-white hover:shadow-xl group">
          <svg xmlns="http://www.w3.org/2000/svg"
            class="w-5 h-5 mr-3 transition-transform duration-300 group-hover:-translate-x-1" fill="none"
            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
          </svg>
          Kembali ke Berita
        </a>
      </div>

    </div>
  </section>

</body>

</html>
