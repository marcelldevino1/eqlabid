@extends('dashboard')

@section('title', 'Classes Students')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md">

    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Classes Students</h2>
        <a href="{{ route('classes-students.create') }}" 
           class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Add Student</a>
    </div>

    @if(session('success'))
        <div class="mb-4 text-green-700 bg-green-100 border border-green-200 px-4 py-2 rounded">
            {{ session('success') }}
        </div>
    @endif

    <table id="classesStudentsTable" class="min-w-full divide-y divide-gray-200 border border-gray-300 text-left">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-4 py-2 text-left">No</th>
                <th class="px-4 py-2 text-left">Student Name</th>
                <th class="px-4 py-2 text-left">Class</th>
                <th class="px-4 py-2 text-left">Years</th>
                <th class="px-4 py-2 text-left">Status</th>
                <th class="px-4 py-2 text-left">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $index => $student)
            <tr>
                <td class="px-4 py-2 text-left">{{ $index + 1 }}</td>
                <td class="px-4 py-2 text-left">{{ $student->userProfile->full_name ?? '-' }}</td>
                <td class="px-4 py-2 text-left">{{ $student->classes->nm_kelas ?? '-' }}</td>
                <td class="px-4 py-2 text-left">{{ $student->tahun->name ?? '-' }}</td>
                <td class="px-4 py-2 text-left">{{ $student->is_status ? 'Active' : 'Inactive' }}</td>
                <td class="px-4 py-2 text-left">
                    <div class="flex flex-col space-y-1">
                        <a href="{{ route('classes-students.edit', $student->id) }}" 
                           class="px-2 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600 w-fit">Edit</a>
                        <form action="{{ route('classes-students.destroy', $student->id) }}" method="POST" class="inline w-fit">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-2 py-1 bg-red-500 text-white rounded hover:bg-red-600">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    $('#classesStudentsTable').DataTable({
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
