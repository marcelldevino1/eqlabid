@extends('dashboard')

@section('title', 'Detail User Assignment')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md max-w-3xl mx-auto">
    <h2 class="text-2xl font-bold mb-6">Detail User Assignment</h2>

    <div class="grid grid-cols-1 gap-4 mb-4">
        <div>
            <label class="block text-sm font-medium text-gray-700">User</label>
            <p class="mt-1 text-gray-900">{{ $assignment->user->name ?? '-' }}</p>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Role</label>
            <p class="mt-1 text-gray-900">{{ $assignment->role->name ?? '-' }}</p>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Tahun</label>
            <p class="mt-1 text-gray-900">{{ $assignment->tahun->name ?? '-' }}</p>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Created At</label>
            <p class="mt-1 text-gray-900">{{ $assignment->created_at }}</p>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Updated At</label>
            <p class="mt-1 text-gray-900">{{ $assignment->updated_at }}</p>
        </div>
    </div>

    <div class="flex space-x-2 mt-4">
        <a href="{{ route('user-assignments.index') }}"
           class="px-4 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400">
           Kembali
        </a>
        <a href="{{ route('user-assignments.edit', $assignment->id) }}"
           class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
           Edit
        </a>
    </div>
</div>
@endsection
