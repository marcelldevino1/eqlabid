@extends('dashboard')

@section('title', 'Tambah User Assignment')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-2xl font-bold mb-4">Tambah User Assignment</h2>

    <form action="{{ route('user-assignments.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label class="block text-sm font-medium">User</label>
            <select name="user_id" class="mt-1 block w-full border-gray-300 rounded-md" required>
                <option value="">-- Pilih User --</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium">Role</label>
            <select name="role_id" class="mt-1 block w-full border-gray-300 rounded-md" required>
                <option value="">-- Pilih Role --</option>
                @foreach($roles as $role)
                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium">Tahun</label>
            <select name="tahun_id" class="mt-1 block w-full border-gray-300 rounded-md" required>
                <option value="">-- Pilih Tahun --</option>
                @foreach($tahuns as $tahun)
                    <option value="{{ $tahun->id }}">{{ $tahun->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="flex space-x-2">
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Simpan</button>
            <a href="{{ route('user-assignments.index') }}" class="px-4 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400">Batal</a>
        </div>
    </form>
</div>
@endsection
