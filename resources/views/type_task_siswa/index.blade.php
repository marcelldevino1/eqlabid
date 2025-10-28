@extends('dashboard')

@section('title', 'Type Task Siswa')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-2xl font-bold mb-4">Siswa untuk Task: {{ $task->dexcription }}</h2>

    @if(session('success'))
        <div class="text-green-700 bg-green-100 border border-green-200 px-4 py-2 rounded">
            {{ session('success') }}
        </div>
    @endif

    <div class="flex justify-end mb-4">
        <a href="{{ route('type-tasks-siswa.create', $task->id) }}"
           class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
           Add New Task
        </a>
    </div>

    <table id="typeTaskSiswaTable" class="min-w-full divide-y divide-gray-200 text-left">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-4 py-2">No</th>
                <th class="px-4 py-2">Student Name</th>
                <th class="px-4 py-2">Description</th>
                <th class="px-4 py-2">Status</th>
                <th class="px-4 py-2">Link</th>
                <th class="px-4 py-2">Nilai</th>
                <th class="px-4 py-2">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $index => $student)
            <tr>
                <td class="px-4 py-2">{{ $index + 1 }}</td>
                <td class="px-4 py-2">{{ $student->user->name ?? 'N/A' }}</td>
                <td class="px-4 py-2">{{ $student->description }}</td>
                <td class="px-4 py-2">{{ ucfirst($student->status) }}</td>

                {{-- Tombol Lihat --}}
                <td class="px-4 py-2">
                    @if($student->link)
                        <a href="{{ $student->link }}" target="_blank" 
                           class="px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600">
                           Lihat
                        </a>
                    @else
                        <span class="text-gray-500 italic">Tidak ada link</span>
                    @endif
                </td>

                {{-- Input nilai --}}
                <td class="px-4 py-2">
                <form action="{{ route('type-tasks-siswa.updatenilai', $student->id) }}" method="POST" class="inline-flex items-center space-x-2">
                    @csrf
                    @method('PUT')
                    <input type="number" name="nilai" value="{{ $student->nilai }}" class="w-20 border border-gray-300 rounded p-1 text-center">
                    <button type="submit" class="px-2 py-1 bg-green-600 text-white rounded hover:bg-green-700">
                        Update Nilai
                    </button>
                </form>
                </td>

                <td class="px-4 py-2">
                    <a href="{{ route('type-tasks-siswa.edit', $student->id) }}" class="text-yellow-600 hover:underline">Edit</a> |
                    <form action="{{ route('type-tasks-siswa.destroy', $student->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:underline">Delete</button>
                    </form>
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
        $('#typeTaskSiswaTable').DataTable({
            paging: true,
            searching: true,
            ordering: true,
            info: true,
            lengthChange: true,
            autoWidth: false,
            responsive: true
        });
    });
</script>
@endpush
