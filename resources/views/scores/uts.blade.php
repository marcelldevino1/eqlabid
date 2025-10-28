@extends('dashboard')

@section('title', 'Nilai UTS - ' . $class->nm_kelas)

@section('content')
<div class="bg-white p-6 rounded-lg shadow">
    <h2 class="text-xl font-semibold mb-4">Nilai UTS - {{ $class->nm_kelas }}</h2>

    <form action="{{ route('scores.store.uts') }}" method="POST" class="flex gap-2">
        @csrf

        <table class="min-w-full divide-y divide-gray-200 text-left">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2">No</th>
                    <th class="px-4 py-2">Nama Siswa</th>
                    <th class="px-4 py-2">Nilai UTS</th>
                </tr>
            </thead>
            <tbody>
                @foreach($class->students as $i => $student)
                <tr>
                    <td class="px-4 py-2">{{ $i + 1 }}</td>
                    <td class="px-4 py-2">{{ $student->userProfile->nm_lengkap ?? 'Tidak ada nama' }}</td>
                    <td class="px-4 py-2">
                        <input type="number" name="nilai[{{ $student->id }}]" min="0" max="100"
                               class="border rounded px-2 py-1 w-24 text-center"
                               value="{{ old('nilai.' . $student->id) }}">
                    </td>
                </tr>
                @endforeach
                <tr>
                    <td class="px-4 py-2"></td>
                    <td class="px-4 py-2"></td>
                    <td class="px-4 py-2"><button type="submit"
                class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Simpan 
            </button></form></td>
                </tr>
            </tbody>
        </table>
    
</div>
@endsection
