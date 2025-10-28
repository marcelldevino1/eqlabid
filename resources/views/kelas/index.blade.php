@extends('dashboard')

@section('title', 'Master Class')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-2xl font-bold text-gray-800">Master Class</h2>
        <a href="{{ route('kelas.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Tambah Kelas</a>
    </div>

    @if (session('success'))
        <div class="mb-4 text-green-700 bg-green-100 border border-green-200 px-4 py-2 rounded text-center">
            {{ session('success') }}
        </div>
    @endif

    <table id="kelasTable" class="min-w-full divide-y divide-gray-200 border border-gray-300 text-left">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-4 py-2">No</th>
                <th class="px-4 py-2">Kode Kelas</th>
                <th class="px-4 py-2">Nama Kelas</th>
                <th class="px-4 py-2">Status</th>
                <th class="px-4 py-2">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($kelas as $index => $k)
            <tr>
                <td class="px-4 py-2">{{ $index + 1 }}</td>
                <td class="px-4 py-2">{{ $k->kd_kelas }}</td>
                <td class="px-4 py-2">{{ $k->nm_kelas }}</td>
                <td class="px-4 py-2">
                    @if($k->is_stats)
                        <span class="px-2 py-1 bg-green-500 text-white rounded">Active</span>
                    @else
                        <span class="px-2 py-1 bg-red-500 text-white rounded">Inactive</span>
                    @endif
                </td>
                <td class="px-4 py-2 flex flex-wrap gap-2">
                    <a href="{{ route('kelas.edit', $k->id) }}" class="px-2 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600">Edit</a>
                    <form action="{{ route('kelas.destroy', $k->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="px-2 py-1 bg-red-500 text-white rounded hover:bg-red-600">Delete</button>
                    </form>
                    <form action="{{ route('kelas.toggle-status', $k->id) }}" method="POST" class="inline">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="px-2 py-1 bg-blue-500 text-white rounded hover:bg-blue-600">Toggle Status</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@push('scripts')
<!-- Include jQuery & DataTables JS -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script>
$(document).ready(function() {
    $('#kelasTable').DataTable({
        "paging": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "lengthChange": true,
        "autoWidth": false,
        "columnDefs": [
            { "orderable": false, "targets": 4 } // disable ordering for Action column
        ]
    });
});
</script>
@endpush

@push('styles')
<!-- Include DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
@endpush
