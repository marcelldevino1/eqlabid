@extends('dashboard')

@section('title', 'User Assignments')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">User Assignments</h2>
        <a href="{{ route('user-assignments.sync') }}"
           class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">Sync</a>
    </div>

    {{-- Notifikasi --}}
    @if (session('success'))
        <div class="mb-4 text-green-700 bg-green-100 border border-green-200 px-4 py-2 rounded text-center">
            {{ session('success') }}
        </div>
    @elseif (session('error'))
        <div class="mb-4 text-red-700 bg-red-100 border border-red-200 px-4 py-2 rounded text-center">
            {{ session('error') }}
        </div>
    @elseif (session('info'))
        <div class="mb-4 text-yellow-700 bg-yellow-100 border border-yellow-200 px-4 py-2 rounded text-center">
            {{ session('info') }}
        </div>
    @endif

    <table id="assignments-table" class="min-w-full divide-y divide-gray-200 border border-gray-300 text-center">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-4 py-2 text-center">No</th>
                <th class="px-4 py-2 text-center">User</th>
                <th class="px-4 py-2 text-center">Role</th>
                <th class="px-4 py-2 text-center">Tahun</th>
                <th class="px-4 py-2 text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($assignments as $index => $assignment)
                <tr class="text-center">
                    <td class="px-4 py-2">{{ $index + 1 }}</td>
                    <td class="px-4 py-2">{{ $assignment->user_profile->full_name ?? '-'}}</td>

                    {{-- Role Dropdown + Update Button --}}
                    <td class="px-4 py-2">
                        <form action="{{ route('user-assignments.update', $assignment->id) }}" method="POST" class="flex justify-center items-center space-x-2">
                            @csrf
                            @method('PUT')
                            <select name="role_id" class="border-gray-300 rounded-md px-2 py-1 text-center">
                                <option value="">-- Pilih Role --</option>
                                @foreach($roles as $role)
                                    <option value="{{ $role->id }}" {{ $assignment->role_id == $role->id ? 'selected' : '' }}>
                                        {{ $role->name }}
                                    </option>
                                @endforeach
                            </select>
                            
                    </td>

                    <td class="px-4 py-2">{{ $assignment->tahun->name ?? '-' }}</td>

                    {{-- Delete --}}
                    <td class="px-4 py-2">
                        <button type="submit" class="px-2 py-1 bg-green-600 text-white rounded hover:bg-green-700">Update</button>
                        </form>
                       
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@push('scripts')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#assignments-table').DataTable({
            "paging": true,
            "searching": true,
            "ordering": true,
            "order": [[0, "asc"]],
        });
    });
</script>
@endpush
