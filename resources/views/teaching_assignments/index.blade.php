@extends('dashboard')

@section('title', 'Teaching Assignments')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Teaching Assignments</h2>
        <a href="{{ route('teaching_assignments.create') }}"
           class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Add New</a>
    </div>

    @if(session('success'))
        <div class="mb-4 text-green-700 bg-green-100 border border-green-200 px-4 py-2 rounded">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto">
        <table id="teachingAssignmentsTable" class="min-w-full divide-y divide-gray-200 border border-gray-300 text-center">
            <thead class="bg-gray-100">
                <tr>
                    <th>No</th>
                    <th>User</th>
                    <th>Role</th>
                    <th>Mapel</th>
                    <th>Tahun</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php $no = 1; @endphp
                @foreach($assignments as $assignment)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $assignment->user->name ?? '-' }}</td>
                        <td>{{ $assignment->role->name ?? '-' }}</td>
                        <td>{{ $assignment->mapel->name ?? '-' }}</td>
                        <td>{{ $assignment->tahun->name ?? '-' }}</td>
                        <td class="flex justify-center space-x-2">
                            <a href="{{ route('teaching_assignments.edit', $assignment->id) }}" class="px-2 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600">Edit</a>
                            <form action="{{ route('teaching_assignments.destroy', $assignment->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-2 py-1 bg-red-500 text-white rounded hover:bg-red-600">Delete</button>
                            </form>
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
    $(document).ready(function() {
        $('#teachingAssignmentsTable').DataTable({
            "paging": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "lengthChange": true,
            "autoWidth": false,
            "responsive": true
        });
    });
</script>
@endpush
