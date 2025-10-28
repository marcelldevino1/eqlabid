@extends('dashboard')

@section('title', 'Daftar Nilai Kelas')

@section('content')
<div class="bg-white p-6 rounded-lg shadow">
    <h2 class="text-xl font-semibold mb-4">Daftar Kelas</h2>

    <table class="min-w-full divide-y divide-gray-200 text-left">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-4 py-2">No</th>
                <th class="px-4 py-2">Nama Kelas</th>
                <th class="px-4 py-2 text-center">UTS</th>
                <th class="px-4 py-2 text-center">UAS</th>
            </tr>
        </thead>
        <tbody>
            @foreach($classes as $i => $class)
            <tr>
                <td class="px-4 py-2">{{ $i+1 }}</td>
                <td class="px-4 py-2">{{ $class->nm_kelas }}</td>
                <td class="px-4 py-2 text-center">
                    <a href="{{ route('scores.uts', $class->id) }}" class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">Lihat</a>
                </td>
                <td class="px-4 py-2 text-center">
                    <a href="{{ route('scores.uas', $class->id) }}" class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600">Lihat</a>
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
    $('#scoreTable').DataTable({
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
