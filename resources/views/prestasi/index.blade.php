@extends('dashboard')

@section('title', 'Daftar Prestasi')

@section('content')
<div class="p-6 bg-white rounded-lg shadow-md">

    <div class="flex items-center justify-between mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Daftar Prestasi</h2>
        <a href="{{ route('prestasi.create') }}"
           class="px-4 py-2 text-white bg-blue-600 rounded-md hover:bg-blue-700">Tambah Prestasi</a>
    </div>

    @if(session('success'))
        <div class="px-4 py-2 mb-4 text-green-700 bg-green-100 border border-green-200 rounded">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto">
        <table id="prestasiTable" class="min-w-full text-left border border-gray-300 divide-y divide-gray-200">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 text-left">No</th>
                    <th class="px-4 py-2 text-left">Nama Siswa</th>
                    <th class="px-4 py-2 text-left">Kelas</th>
                    <th class="px-4 py-2 text-left">Prestasi (Judul)</th>
                    <th class="px-4 py-2 text-left">Deskripsi</th>
                    <th class="px-4 py-2 text-left">Foto</th>
                    <th class="px-4 py-2 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($prestasis as $index => $prestasi)
                <tr>
                    {{-- $prestasis menggunakan paginate(10) di controller --}}
                    <td class="px-4 py-2 text-left">{{ $index + $prestasis->firstItem() }}</td>
                    <td class="px-4 py-2 text-left">{{ $prestasi->nama }}</td>
                    <td class="px-4 py-2 text-left">{{ $prestasi->kelas }}</td>
                    <td class="px-4 py-2 text-left">{{ $prestasi->prestasi }}</td>
                    <td class="max-w-xs px-4 py-2 overflow-hidden text-left truncate">{{ $prestasi->deskripsi }}</td>
                    <td class="px-4 py-2 text-left">
                        @if ($prestasi->foto)
                            {{-- Menggunakan $prestasi->foto --}}
                            <img src="{{ asset('storage/' . $prestasi->foto) }}" alt="Foto {{ $prestasi->nama }}" class="object-cover w-12 h-12 rounded">
                        @else
                            -
                        @endif
                    </td>
                    <td class="px-4 py-2 text-left">
                        <div class="flex flex-col space-y-1">
                            <a href="{{ route('prestasi.edit', $prestasi->id) }}"
                               class="px-2 py-1 text-white bg-yellow-500 rounded hover:bg-yellow-600 w-fit">Edit</a>
                            <form action="{{ route('prestasi.destroy', $prestasi->id) }}" method="POST" class="inline w-fit" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-2 py-1 text-white bg-red-500 rounded hover:bg-red-600">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $prestasis->links() }}
    </div>

</div>
@endsection
