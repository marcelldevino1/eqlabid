@extends('dashboard')

@section('title', 'Mata Pelajaran')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Mata Pelajaran</h2>
        <a href="{{ route('mapels.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Tambah Mata Pelajaran</a>
    </div>

    @if (session('success'))
        <div class="mb-4 text-green-700 bg-green-100 border border-green-200 px-4 py-2 rounded">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500">No</th>
                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500">Nama Mata Pelajaran</th>
                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500">Slug</th>
                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($mapels as $index => $mapel)
                    <tr>
                        <td class="px-4 py-2">{{ $index + 1 }}</td>
                        <td class="px-4 py-2">{{ $mapel->name }}</td>
                        <td class="px-4 py-2">{{ $mapel->slug }}</td>
                        <td class="px-4 py-2">
                            <a href="{{ route('mapels.edit', $mapel->id) }}" class="text-yellow-600">Edit</a> |
                            <form action="{{ route('mapels.destroy', $mapel->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
