@extends('publik.layout.simple')

@section('title', $prestasi->prestasi)

@section('content')
  <div class="max-w-4xl mx-auto p-6 bg-white rounded-2xl shadow-[0_6px_18px_rgba(2,6,23,.06)] space-y-6" data-anim="rise" data-delay="80">

    {{-- 🔹 Breadcrumb --}}
    <nav class="text-sm text-gray-600" aria-label="Breadcrumb">
      <ol class="flex flex-wrap items-center space-x-2">
        <li>
          <a href="{{ url('/') }}" class="text-[#0C3C6C] hover:underline font-medium">Beranda</a>
        </li>
        <li class="text-gray-400">/</li>
        <li>
          <a href="{{ url('/#prestasi') }}" class="text-[#0C3C6C] hover:underline font-medium">Prestasi</a>
        </li>
        <li class="text-gray-400">/</li>
        <li aria-current="page" class="text-gray-700 font-semibold truncate max-w-[200px] md:max-w-[400px]">
          {{ $prestasi->prestasi }}
        </li>
      </ol>
    </nav>

    {{-- 🔹 Header --}}
    <div>
      <h1 class="text-2xl md:text-3xl font-extrabold text-[#0C3C6C] leading-tight">
        {{ $prestasi->prestasi }}
      </h1>
      <div class="flex flex-wrap items-center gap-2 mt-3 text-sm text-gray-600">
        @if(!empty($prestasi->nama))
          <span class="inline-block px-3 py-1 text-gray-700 bg-gray-100 rounded-md">
            {{ $prestasi->nama }}
          </span>
        @endif
        <span class="inline-block px-3 py-1 font-medium text-blue-800 rounded-md bg-blue-50">
          {{ $prestasi->kelas }}
        </span>
        <span class="text-gray-500">
          {{ \Carbon\Carbon::parse($prestasi->created_at)->translatedFormat('d F Y') }}
        </span>
      </div>
    </div>

    {{-- 🔹 Media --}}
    @if ($prestasi->foto)
      <img src="{{ $prestasi->foto_url }}" alt="Foto {{ $prestasi->prestasi }}"
        class="w-full h-[44vh] md:h-[52vh] object-cover object-center rounded-xl ring-1 ring-black/5">
    @else
      <img src="{{ asset('images/default-placeholder.jpg') }}" alt="No image"
        class="w-full h-[44vh] md:h-[52vh] object-cover object-center rounded-xl ring-1 ring-black/5">
    @endif

    {{-- 🔹 Deskripsi --}}
    <article class="leading-relaxed prose text-gray-800 max-w-none" data-anim="fade" data-delay="220">
      {!! nl2br(e($prestasi->deskripsi)) !!}
    </article>

    {{-- 🔹 Tombol Kembali --}}
    <div class="flex justify-end mt-8" data-anim="rise" data-delay="260">
      <a href="{{ route('hero') }}#prestasi"
         class="inline-flex items-center gap-2 px-4 py-2 rounded-lg bg-[#0C3C6C] text-white font-semibold hover:bg-[#092e54] transition">
        ← Kembali ke Prestasi
      </a>
    </div>
  </div>
@endsection
