@extends('dashboard')

@section('title', 'Daftar Berita')

@section('content')
    <div class="p-6 bg-white rounded-lg shadow-md">

        <div class="flex items-center justify-between mb-6">
            <h2 class="text-2xl font-bold text-gray-800">Daftar Berita</h2>
            <a href="{{ route('berita.create') }}"
                class="px-4 py-2 text-white bg-blue-600 rounded-md hover:bg-blue-700">Tambah Berita</a>
        </div>

        @if(session('success'))
            <div class="px-4 py-2 mb-4 text-green-700 bg-green-100 border border-green-200 rounded">
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-x-auto">
            <table id="beritaTable" class="min-w-full text-left border border-gray-300 divide-y divide-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-2 text-left">No</th>
                        <th class="px-4 py-2 text-left">Judul</th>
                        <th class="px-4 py-2 text-left">Foto</th>
                        <th class="px-4 py-2 text-left">Tanggal</th>
                        <th class="px-4 py-2 text-left">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($beritas as $index => $berita)
                        <tr>
                            <td class="px-4 py-2 text-left">{{ $index + $beritas->firstItem() }}</td>
                            <td class="px-4 py-2 font-medium text-left">{{ \Illuminate\Support\Str::limit($berita->judul, 50) }}
                            </td>
                            <td class="px-4 py-2 text-left">
                                @if ($berita->foto)
                                    <img src="{{ asset('storage/' . $berita->foto) }}" alt="Foto Berita"
                                        class="object-cover w-16 h-12 rounded">
                                @else
                                    -
                                @endif
                            </td>
                            <td class="px-4 py-2 text-left">
                                {{ \Carbon\Carbon::parse($berita->created_at)->translatedFormat('d M Y') }}</td>
                            <td class="px-4 py-2 text-left">
                                <div class="flex flex-col space-y-1">
                                    <a href="{{ route('berita.edit', $berita) }}"
                                        class="px-2 py-1 text-white bg-yellow-500 rounded hover:bg-yellow-600 w-fit">Edit</a>
                                    <form action="{{ route('berita.destroy', $berita->id) }}" method="POST" class="inline w-fit"
                                        onsubmit="return confirm('Yakin ingin menghapus berita ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="px-2 py-1 text-white bg-red-500 rounded hover:bg-red-600">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $beritas->links() }}
        </div>

    </div>
@endsection
