@extends('dashboard')

@section('title', 'Edit Type Task Siswa')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-2xl font-bold mb-4">Edit Siswa for Task: {{ $typeTaskSiswa->typeTask->name }}</h2>

    <form action="{{ route('type-tasks-siswa.update', $typeTaskSiswa->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label>Description</label>
            <textarea name="description" required class="w-full border-gray-300 rounded-md">{{ old('description', $typeTaskSiswa->description) }}</textarea>
        </div>

        <div>
            <label>Link</label>
            <input type="url" name="link" value="{{ old('link', $typeTaskSiswa->link) }}" class="w-full border-gray-300 rounded-md">
        </div>

        <div class="mt-3">
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md">Save</button>
        </div>
    </form>
</div>
@endsection
