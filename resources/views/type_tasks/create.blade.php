@extends('dashboard')

@section('title', 'Tambah Type Task')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-2xl font-bold mb-4">Tambah Type Task</h2>

    <form action="{{ route('type-tasks.store') }}" method="POST">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-4">
    <!-- Teaching Assignment -->
    <div>
        <label class="block text-sm font-medium">Teaching Assignment</label>
        <select name="id_ta" class="mt-1 block w-full border-gray-300 rounded-md" required>
            <option value="">-- Pilih TA --</option>
            @foreach($teachingAssignments as $ta)
                <option value="{{ $ta->id }}">
                    {{ $ta->user->name ?? '-' }} - {{ $ta->mapel->name ?? '-' }}
                </option>
            @endforeach
        </select>
    </div>

    <!-- Description -->
    <div>
        <label class="block text-sm font-medium">Description</label>
        <input type="text" name="description" class="mt-1 block w-full border-gray-300 rounded-md" required>
    </div>

    <!-- Type Task -->
    <div>
        <label class="block text-sm font-medium">Type Task</label>
        <select name="type_task" class="mt-1 block w-full border-gray-300 rounded-md" required>
            <option value="">- Pilih -</option>
            <option value="1">Tugas Harian</option>
            <option value="2">Ulangan</option>
            <option value="3">UTS</option>
            <option value="4">UAS</option>
        </select>
    </div>

    <!-- Start Date -->
    <div>
        <label class="block text-sm font-medium">Start Date</label>
        <input type="date" name="start_date" class="mt-1 block w-full border-gray-300 rounded-md" required>
    </div>

    <!-- End Date -->
    <div>
        <label class="block text-sm font-medium">End Date</label>
        <input type="date" name="end_date" class="mt-1 block w-full border-gray-300 rounded-md" required>
    </div>
</div>

        <div class="flex space-x-2 mt-4">
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Simpan</button>
            <a href="{{ route('type-tasks.index') }}" class="px-4 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400">Batal</a>
        </div>
    </form>
</div>

@endsection
