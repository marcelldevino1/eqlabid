<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Juara 3 Lomba Pramuka | EQLAB.id</title>
  @vite('resources/css/app.css')
</head>
<body class="relative text-gray-700 bg-gray-50">

  <!-- Tombol Kembali -->
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
      <nav class="mb-10 text-sm font-medium text-gray-500">
        <a href="/" class="hover:text-[#0C3C6C]">Beranda</a>
        <span class="mx-2 text-gray-400">/</span>
        <a href="{{ route('hero') }}" class="hover:text-[#0C3C6C]">Prestasi</a>
        <span class="mx-2 text-gray-400">/</span>
        <span class="text-[#0C3C6C] font-semibold">Juara 3 Lomba Pramuka</span>
      </nav>

      <!-- Layout -->
      <div class="flex flex-col items-center gap-10 lg:flex-row lg:items-start">
        <div class="w-full lg:w-1/2">
          <div class="overflow-hidden shadow-lg rounded-2xl">
            <img src="{{ asset('images/publik/prestasi/prestasi3.jpg') }}" 
              alt="Juara 3 Lomba Pramuka"
              class="object-cover w-full h-auto max-h-[500px] transition-transform duration-500 hover:scale-105">
          </div>
        </div>

        <div class="w-full lg:w-1/2">
          <h1 class="mb-3 text-3xl font-extrabold text-[#0C3C6C] sm:text-4xl">
            Juara 3 Lomba Pramuka Antar Sekolah
          </h1>
          <p class="mb-4 text-sm font-medium text-gray-500">
            10 Juli 2025 — Kelas 11 RPL 1
          </p>
          <p class="leading-relaxed text-gray-700">
            Tim Pramuka sekolah meraih juara 3 dalam ajang lomba antar sekolah tingkat kota.
            Dengan kerja sama, kedisiplinan, dan semangat pantang menyerah, mereka berhasil menampilkan performa terbaiknya. 
            Kemenangan ini menegaskan pentingnya nilai gotong royong dan tanggung jawab dalam kegiatan kepemimpinan.
          </p>
        </div>
      </div>
    </div>
  </section>

</body>
</html>
