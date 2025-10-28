@extends('dashboard')

@section('title', 'Edit Tahun')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-2xl font-bold mb-4">Edit Tahun</h2>

    <form action="{{ route('tahun.update', $tahun->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Nama Tahun</label>
            <input type="text" name="name" id="name" value="{{ $tahun->name }}" class="mt-1 block w-full border-gray-300 rounded-md" required>
        </div>

        <div class="mb-4">
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Simpan</button>
            <a href="{{ route('tahun.index') }}" class="ml-2 px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Batal</a>
        </div>
    </form>
</div>
@endsection
