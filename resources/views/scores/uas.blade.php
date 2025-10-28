@extends('dashboard')

@section('title', 'Nilai UAS - ' . $class->nm_kelas)

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-2xl font-bold mb-4">Nilai UAS - {{ $class->nm_kelas }}</h2>
    <p><strong>Kode Kelas:</strong> {{ $class->kd_kelas }}</p>
    <p><strong>Status:</strong> {{ $class->is_stats ? 'Aktif' : 'Tidak Aktif' }}</p>

    <div class="mt-6">
        <p class="text-gray-700">📘 Di sini nanti akan ditampilkan daftar nilai UAS siswa untuk kelas ini.</p>
    </div>

    <div class="mt-4">
        <a href="{{ route('scores.index') }}" class="px-3 py-2 bg-gray-600 text-white rounded hover:bg-gray-700">Kembali</a>
    </div>
</div>
@endsection
