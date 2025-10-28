@extends('dashboard')

@section('title', 'Tahun')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Daftar Tahun</h2>
        <a href="{{ route('tahun.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Tambah Tahun</a>
    </div>

    @if(session('success'))
        <div class="mb-4 text-green-700 bg-green-100 border border-green-200 px-4 py-2 rounded">
            {{ session('success') }}
        </div>
    @endif

    <table class="min-w-full divide-y divide-gray-200 border border-gray-300">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-4 py-2 border-r">No</th>
                <th class="px-4 py-2 border-r">Tahun</th>
                <th class="px-4 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
            @foreach($tahuns as $index => $tahun)
            <tr>
                <td class="px-4 py-2 border-r">{{ $index+1 }}</td>
                <td class="px-4 py-2 border-r">{{ $tahun->name }}</td>
                <td class="px-4 py-2 space-x-2">
                    <a href="{{ route('tahun.edit', $tahun->id) }}" class="px-3 py-1 bg-yellow-500 text-white text-xs rounded hover:bg-yellow-600">Edit</a>
                    <form action="{{ route('tahun.destroy', $tahun->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Yakin ingin hapus?')" class="px-3 py-1 bg-red-600 text-white text-xs rounded hover:bg-red-700">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
