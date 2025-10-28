@extends('public.layout.app')
@section('content')
    <div class="p-6 bg-white rounded-lg shadow-md">
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-2xl font-bold text-gray-800">Data Pendaftar</h2>
        </div>

        @if(session('success'))
            <div class="px-4 py-2 mb-4 text-green-700 bg-green-100 border border-green-200 rounded">
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-x-auto">
            <table class="min-w-full text-left border border-gray-300 divide-y divide-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-2">No</th>
                        <th class="px-4 py-2">Nama Lengkap</th>
                        <th class="px-4 py-2">Email</th>
                        <th class="px-4 py-2">NIK</th>
                        <th class="px-4 py-2">Telepon</th>
                        <th class="px-4 py-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pendaftars as $index => $p)
                        <tr>
                            <td class="px-4 py-2">{{ $index + $pendaftars->firstItem() }}</td>
                            <td class="px-4 py-2">{{ $p->full_name }}</td>
                            <td class="px-4 py-2">{{ $p->email ?? '-' }}</td>
                            <td class="px-4 py-2">{{ $p->national_id }}</td>
                            <td class="px-4 py-2">{{ $p->phone_number ?? '-' }}</td>
                            <td class="px-4 py-2">
                                <div class="flex flex-col space-y-1">
                                    <a href="{{ route('data_pendaftar.edit', $p) }}"
                                        class="px-2 py-1 text-white bg-yellow-500 rounded hover:bg-yellow-600 w-fit">Edit</a>
                                    <form action="{{ route('data_pendaftar.destroy', $p) }}" method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="px-2 py-1 text-white bg-red-500 rounded hover:bg-red-600 w-fit">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $pendaftars->links() }}
        </div>
    </div>
@endsection