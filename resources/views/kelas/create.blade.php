@extends('dashboard')

@section('title', 'Tambah Kelas')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md max-w-md mx-auto">
    <h2 class="text-2xl font-bold mb-6 text-gray-800">Tambah Kelas</h2>

    <form action="{{ route('kelas.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label class="block text-sm font-medium">Kode Kelas</label>
            <input type="text" name="kd_kelas" class="mt-1 block w-full border-gray-300 rounded-md" required>
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium">Nama Kelas</label>
            <input type="text" name="nm_kelas" class="mt-1 block w-full border-gray-300 rounded-md" required>
        </div>

        <div class="flex space-x-2">
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Simpan</button>
            <a href="{{ route('kelas.index') }}" class="px-4 py-2 bg-gray-300 text-gray-700 rounded hover:bg-gray-400">Batal</a>
        </div>
    </form>
</div>
@endsection
