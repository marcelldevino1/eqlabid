@extends('dashboard')

@section('title', 'Tambah Teaching Assignment')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md max-w-6xl mx-auto">
    <h2 class="text-2xl font-bold mb-6 text-gray-800 text-center">Add Teaching Assignment</h2>

    <form action="{{ route('teaching_assignments.store') }}" method="POST">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-4">
            <!-- User -->
            <div>
                <label class="block text-sm font-medium">User</label>
                <select name="user_id" class="select2 w-full border-gray-300 rounded-md" required>
                    <option value="">-- Pilih User --</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Role -->
            <div>
                <label class="block text-sm font-medium">Role</label>
                <select name="role_id" class="select2 w-full border-gray-300 rounded-md" required>
                    <option value="">-- Pilih Role --</option>
                    @foreach($roles as $role)
                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Mapel -->
            <div>
                <label class="block text-sm font-medium">Mata Pelajaran</label>
                <select name="mapel_id" class="select2 w-full border-gray-300 rounded-md" required>
                    <option value="">-- Pilih Mapel --</option>
                    @foreach($mapels as $mapel)
                        <option value="{{ $mapel->id }}">{{ $mapel->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Tahun Ajaran -->
            <div>
                <label class="block text-sm font-medium">Tahun Ajaran</label>
                <select name="tahun_id" class="select2 w-full border-gray-300 rounded-md" required>
                    <option value="">-- Pilih Tahun --</option>
                    @foreach($tahuns as $tahun)
                        <option value="{{ $tahun->id }}">{{ $tahun->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="flex justify-center space-x-2 mt-4">
            <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Simpan</button>
            <a href="{{ route('teaching_assignments.index') }}" class="px-6 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400">Batal</a>
        </div>
    </form>
</div>
@endsection

@push('scripts')
<!-- Load Select2 JS & CSS -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    $(document).ready(function() {
        $('.select2').select2({
            placeholder: 'Pilih salah satu',
            width: '100%'
        });
    });
</script>
@endpush
