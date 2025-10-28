@extends('dashboard')

@section('title', 'Tambah Prestasi Baru')

@section('content')
<div class="max-w-2xl p-6 mx-auto bg-white rounded-lg shadow-md">

    <h2 class="mb-6 text-2xl font-bold text-gray-800">Tambah Prestasi Baru</h2>

    @if ($errors->any())
        <div class="px-4 py-2 mb-4 text-red-700 bg-red-100 border border-red-200 rounded">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('prestasi.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="mb-4">
            <label for="nama" class="block mb-1 text-sm font-medium text-gray-700">Nama Siswa</label>
            <input type="text" name="nama" id="nama" value="{{ old('nama') }}"
                   class="w-full p-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" required>
        </div>

        <div class="mb-4">
            <label for="kelas" class="block mb-1 text-sm font-medium text-gray-700">Kelas</label>
            <input type="text" name="kelas" id="kelas" value="{{ old('kelas') }}"
                   class="w-full p-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" required>
        </div>
        
        <div class="mb-4">
            <label for="prestasi" class="block mb-1 text-sm font-medium text-gray-700">Prestasi (Judul Singkat)</label>
            <input type="text" name="prestasi" id="prestasi" value="{{ old('prestasi') }}"
                   class="w-full p-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" required>
        </div>

        <div class="mb-4">
            <label for="deskripsi" class="block mb-1 text-sm font-medium text-gray-700">Deskripsi Lengkap</label>
            <textarea name="deskripsi" id="deskripsi" rows="3"
                      class="w-full p-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" required>{{ old('deskripsi') }}</textarea>
            <p class="mt-1 text-xs text-gray-500">Isi deskripsi lengkap prestasi yang dicapai.</p>
        </div>

        <div class="mb-4">
            <label for="foto" class="block mb-1 text-sm font-medium text-gray-700">Foto (Max 2MB, jpg, jpeg, png)</label>
            {{-- Menggunakan nama field: foto --}}
            <input type="file" name="foto" id="foto"
                   class="w-full p-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
        </div>

        <div class="flex justify-end space-x-3">
            <a href="{{ route('prestasi.index') }}" class="px-4 py-2 text-gray-800 bg-gray-300 rounded-md hover:bg-gray-400">Batal</a>
            <button type="submit" class="px-4 py-2 text-white bg-blue-600 rounded-md hover:bg-blue-700">Simpan Prestasi</button>
        </div>
    </form>
</div>
@endsection