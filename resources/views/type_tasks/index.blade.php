@extends('dashboard')

@section('title', 'Type Tasks')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Type Tasks</h2>
        <a href="{{ route('type-tasks.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Tambah Task</a>
    </div>

    <div class="overflow-x-auto">
        <table id="typeTasksTable" class="min-w-full divide-y divide-gray-200 border border-gray-300 text-left">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2">No</th>
                    <th class="px-4 py-2">User</th>
                    <th class="px-4 py-2">Mapel</th>
                    <th class="px-4 py-2">Description</th>
                    <th class="px-4 py-2">Type</th>
                    <th class="px-4 py-2">Start Date</th>
                    <th class="px-4 py-2">End Date</th>
                    <th class="px-4 py-2">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tasks as $index => $task)
                    <tr>
                        <td class="px-4 py-2">{{ $index + 1 }}</td>
                        <td class="px-4 py-2">{{ $task->teachingAssignment->user->name ?? '-' }}</td>
                        <td class="px-4 py-2">{{ $task->teachingAssignment->mapel->name ?? '-' }}</td>
                        <td class="px-4 py-2">{{ $task->description }}</td>
                        <td class="px-4 py-2">
                            @if($task->type_task == 1)
                                Tugas Harian
                            @elseif($task->type_task == 2)
                                Ulangan
                            @else
                                -
                            @endif
                        </td>
                        <td class="px-4 py-2">{{ $task->start_date }}</td>
                        <td class="px-4 py-2">{{ $task->end_date }}</td>
                        <td class="px-4 py-2">
                            <div class="flex flex-col space-y-1">
                                <a href="{{ route('type-tasks.edit', $task->id) }}" 
                                class="px-1 py-0.5 text-xs bg-yellow-500 text-white rounded w-12 text-center hover:bg-yellow-600 transition">
                                Edit
                                </a>

                                <a href="{{ route('type-tasks-siswa.index', $task->id) }}" 
                                class="px-1 py-0.5 text-xs bg-blue-500 text-white rounded w-12 text-center hover:bg-blue-600 transition">
                                Lihat
                                </a>

                                <form action="{{ route('type-tasks.destroy', $task->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                        class="px-1 py-0.5 text-xs bg-red-500 text-white rounded w-12 text-center hover:bg-red-600 transition">
                                        Hapus
                                    </button>
                                </form>

                            </div>
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
    $('#typeTasksTable').DataTable({
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
