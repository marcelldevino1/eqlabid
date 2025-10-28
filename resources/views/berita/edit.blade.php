@extends('dashboard')

@section('title', 'Edit Berita: ' . \Illuminate\Support\Str::limit($berita->judul, 30))

@section('content')
    <div class="max-w-4xl p-6 mx-auto bg-white rounded-lg shadow-md">

        <h2 class="mb-6 text-2xl font-bold text-gray-800">Edit Berita</h2>

        @if ($errors->any())
            <div class="px-4 py-2 mb-4 text-red-700 bg-red-100 border border-red-200 rounded">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('berita.update', $berita) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="judul" class="block mb-1 text-sm font-medium text-gray-700">Judul Berita</label>
                <input type="text" name="judul" id="judul" value="{{ old('judul', $berita->judul) }}"
                    class="w-full p-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" required>
            </div>

            <div class="mb-4">
                <label for="foto" class="block mb-1 text-sm font-medium text-gray-700">Ganti Foto Utama (Kosongkan jika
                    tidak ingin ganti)</label>
                <input type="file" name="foto" id="foto"
                    class="w-full p-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
            </div>

            @if($berita->foto)
                <div class="mb-4">
                    <label class="block mb-1 text-sm font-medium text-gray-700">Foto Saat Ini</label>
                    <img src="{{ asset('storage/' . $berita->foto) }}" alt="Foto Berita"
                        class="object-cover w-24 h-24 rounded shadow">
                </div>
            @endif

            <div class="mb-4">
                <label for="konten" class="block mb-1 text-sm font-medium text-gray-700">Konten Berita</label>
                <textarea name="konten" id="konten" rows="10"
                    class="w-full p-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
                    required>{{ old('konten', $berita->konten ?? $berita->deskripsi) }}</textarea>
                <p class="mt-1 text-xs text-gray-500">Isi detail lengkap berita.</p>
            </div>

            <div class="flex justify-end space-x-3">
                <a href="{{ route('berita.index') }}"
                    class="px-4 py-2 text-gray-800 bg-gray-300 rounded-md hover:bg-gray-400">Batal</a>
                <button type="submit" class="px-4 py-2 text-white bg-green-600 rounded-md hover:bg-green-700">Update
                    Berita</button>
            </div>
        </form>
    </div>
@endsection