@extends('dashboard')

@section('title', 'Edit Mata Pelajaran')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-2xl font-bold mb-4">Edit Mata Pelajaran</h2>

    <form action="{{ route('mapels.update', $mapel->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Nama Mata Pelajaran</label>
            <input type="text" name="name" id="name" class="mt-1 block w-full border-gray-300 rounded-md" value="{{ $mapel->name }}" required>
        </div>

         <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Slug</label>
            <input type="text" name="slug" id="slug" class="mt-1 block w-full border-gray-300 rounded-md" value="{{ $mapel->slug }}" required>
        </div>

        <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi</label>
            <textarea name="description" id="description" rows="3" class="mt-1 block w-full border-gray-300 rounded-md">{{ $mapel->description }}</textarea>
        </div>

        <div class="mb-4">
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Perbarui</button>
            <a href="{{ route('mapels.index') }}" class="ml-2 px-4 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400">Batal</a>
        </div>
    </form>
</div>
@endsection
