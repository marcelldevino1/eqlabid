@extends('dashboard')

@section('title', $prestasi->nama)

@section('content')
<div class="max-w-4xl p-6 mx-auto bg-white rounded-lg shadow-md">
    <h2 class="mb-4 text-3xl font-bold text-[#0C3C6C]">{{ $prestasi->nama }}</h2>
    
    <div class="mb-4 text-gray-600">
        <span class="inline-block px-3 py-1 text-sm font-medium text-blue-800 bg-blue-100 rounded-md">
            {{ $prestasi->kelas }}
        </span>
        <span class="ml-2 text-sm text-gray-500">
            {{ \Carbon\Carbon::parse($prestasi->created_at)->translatedFormat('d F Y') }}
        </span>
    </div>

    @if ($prestasi->foto)
        <div class="mb-6">
            <img src="{{ asset('storage/' . $prestasi->foto) }}" alt="Foto {{ $prestasi->nama }}" 
                 class="object-cover w-full h-64 rounded-lg shadow-md">
        </div>
    @endif

    <div class="leading-relaxed text-gray-800">
        {!! nl2br(e($prestasi->deskripsi)) !!}
    </div>

    <div class="flex justify-end mt-6">
        <a href="{{ route('publik.prestasi.index') }}" 
           class="px-4 py-2 text-white transition duration-200 bg-blue-600 rounded-md hover:bg-blue-700">
            ← Kembali ke Prestasi
        </a>
    </div>
</div>
@endsection
