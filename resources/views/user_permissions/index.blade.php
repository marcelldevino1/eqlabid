@extends('dashboard')

@section('title', 'User Permissions')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">User Permissions</h2>
        <div class="space-x-2">
            <!-- Tombol Sync -->
            <a href="{{ route('user-permissions.sync') }}"
               class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">Sync</a>
        </div>
    </div>

    @if (session('success'))
        <div class="mb-4 text-green-700 bg-green-100 border border-green-200 px-4 py-2 rounded">
            {{ session('success') }}
        </div>
    @elseif (session('info'))
        <div class="mb-4 text-yellow-700 bg-yellow-100 border border-yellow-200 px-4 py-2 rounded">
            {{ session('info') }}
        </div>
    @elseif (session('error'))
        <div class="mb-4 text-red-700 bg-red-100 border border-red-200 px-4 py-2 rounded">
            {{ session('error') }}
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200 border border-gray-300">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase border-r">No</th>
                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase border-r">Fullname</th>
                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase border-r">Username</th>
                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase border-r">Role</th>
                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Action</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @php $no = 1; @endphp
                @foreach($users as $user)
                    <tr>
                        <td class="px-4 py-2 text-sm text-gray-700 border-r align-top">{{ $no++ }}</td>
                        <td class="px-4 py-2 text-sm text-gray-700 border-r align-top">{{ $user->user->full_name ?? '-' }}</td>
                        <td class="px-4 py-2 text-sm text-gray-700 border-r align-top">{{ $user->user->name ?? '-' }}</td>
                        <td class="px-4 py-2 text-sm text-gray-700 border-r align-top">
                            {{-- Cek apakah relasi user ada dan mengakses role_id --}}
                            <form action="{{ route('user-permissions.store') }}" method="POST">
                                @csrf
                                <select name="role_id" class="px-2 py-1 border rounded-md">
                                    <option value="">-- Pilih Role --</option>
                                    @foreach($roles as $role)
                                        <option value="{{ $role->id }}" 
                                            {{ optional($user->user)->role_id == $role->id ? 'selected' : '' }}>
                                            {{ $role->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </form>
                        </td>


                        <td class="px-4 py-2 text-sm text-gray-700">
                            <a href=""
                               class="inline-flex items-center px-3 py-1 bg-yellow-500 text-white text-xs rounded hover:bg-yellow-600">
                                Edit
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection

@push('scripts')
<script>
    // Skrip lainnya jika diperlukan
</script>
@endpush
