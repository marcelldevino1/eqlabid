@extends('dashboard')

@section('title', 'Edit Teaching Assignment')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-2xl font-bold mb-4">Edit Teaching Assignment</h2>

    <form action="{{ route('teaching_assignments.update', $teachingAssignment->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- User -->
        <div class="mb-4">
            <label class="block text-sm font-medium">User</label>
            <select name="user_id" class="mt-1 block w-full border-gray-300 rounded-md" required>
                <option value="">-- Pilih User --</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}" 
                        {{ $user->id == $teachingAssignment->user_id ? 'selected' : '' }}>
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Role -->
        <div class="mb-4">
            <label class="block text-sm font-medium">Role</label>
            <select name="role_id" class="mt-1 block w-full border-gray-300 rounded-md" required>
                <option value="">-- Pilih Role --</option>
                @foreach($roles as $role)
                    <option value="{{ $role->id }}"
                        {{ $role->id == $teachingAssignment->role_id ? 'selected' : '' }}>
                        {{ $role->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Mata Pelajaran -->
        <div class="mb-4">
            <label class="block text-sm font-medium">Mata Pelajaran</label>
            <select name="mapel_id" class="mt-1 block w-full border-gray-300 rounded-md" required>
                <option value="">-- Pilih Mapel --</option>
                @foreach($mapels as $mapel)
                    <option value="{{ $mapel->id }}"
                        {{ $mapel->id == $teachingAssignment->mapel_id ? 'selected' : '' }}>
                        {{ $mapel->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Tahun Ajaran -->
        <div class="mb-4">
            <label class="block text-sm font-medium">Tahun Ajaran</label>
            <select name="tahun_id" class="mt-1 block w-full border-gray-300 rounded-md" required>
                <option value="">-- Pilih Tahun --</option>
                @foreach($tahuns as $tahun)
                    <option value="{{ $tahun->id }}"
                        {{ $tahun->id == $teachingAssignment->tahun_id ? 'selected' : '' }}>
                        {{ $tahun->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Tombol -->
        <div class="flex space-x-2">
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Update</button>
            <a href="{{ route('teaching_assignments.index') }}" class="px-4 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400">Batal</a>
        </div>
    </form>
</div>
@endsection
