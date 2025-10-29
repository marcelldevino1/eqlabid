@extends('dashboard')

@section('title', 'Daftar Prestasi')

@section('content')
<div class="p-6 bg-white rounded-lg shadow-md">

  {{-- Header + actions --}}
  <div class="flex flex-col gap-3 mb-6 md:flex-row md:items-center md:justify-between">
    <h2 class="text-2xl font-bold text-gray-800">Daftar Prestasi</h2>

    <div class="flex flex-col items-stretch gap-2 sm:flex-row sm:items-center">
      <form method="GET" action="{{ route('prestasi.index') }}" class="flex gap-2">
        <input type="text" name="q" value="{{ request('q') }}" placeholder="Cari nama/kelas/judul…"
               class="w-56 px-3 py-2 text-sm bg-white border rounded-md focus:ring-blue-500 focus:border-blue-500"/>
        <select name="kelas" class="px-3 py-2 text-sm bg-white border rounded-md focus:ring-blue-500 focus:border-blue-500">
          <option value="">Semua Kelas</option>
          @php
            $kelasList = \App\Models\Prestasi::select('kelas')->distinct()->orderBy('kelas')->pluck('kelas');
          @endphp
          @foreach($kelasList as $k)
            <option value="{{ $k }}" {{ request('kelas')===$k?'selected':'' }}>{{ $k }}</option>
          @endforeach
        </select>
        <button class="px-4 py-2 text-white bg-blue-600 rounded-md hover:bg-blue-700">Filter</button>
        @if(request()->hasAny(['q','kelas']))
          <a href="{{ route('prestasi.index') }}" class="px-3 py-2 text-sm text-gray-700 bg-gray-100 rounded-md hover:bg-gray-200">Reset</a>
        @endif
      </form>

      <a href="{{ route('prestasi.create') }}"
         class="px-4 py-2 text-center text-white bg-blue-600 rounded-md hover:bg-blue-700">Tambah Prestasi</a>
    </div>
  </div>

  {{-- Flash --}}
  @if(session('success'))
    <div class="px-4 py-2 mb-4 text-green-700 bg-green-100 border border-green-200 rounded">
      {{ session('success') }}
    </div>
  @endif

  {{-- Table --}}
  <div class="overflow-x-auto">
    <table class="min-w-full text-left border border-gray-200 divide-y divide-gray-200">
      <thead class="text-sm bg-gray-50">
        <tr>
          <th class="px-4 py-2">No</th>
          <th class="px-4 py-2">Nama Siswa</th>
          <th class="px-4 py-2">Kelas</th>
          <th class="px-4 py-2">Prestasi</th>
          <th class="px-4 py-2">Deskripsi</th>
          <th class="px-4 py-2">Foto</th>
          <th class="px-4 py-2">Aksi</th>
        </tr>
      </thead>
      <tbody class="text-sm">
        @forelse($prestasis as $i => $prestasi)
          <tr class="hover:bg-gray-50">
            <td class="px-4 py-2 align-top">{{ $i + $prestasis->firstItem() }}</td>
            <td class="px-4 py-2 align-top">{{ $prestasi->nama }}</td>
            <td class="px-4 py-2 align-top">{{ $prestasi->kelas }}</td>
            <td class="px-4 py-2 align-top">{{ $prestasi->prestasi }}</td>
            <td class="max-w-xs px-4 py-2 text-gray-700 align-top">
              <span title="{{ $prestasi->deskripsi }}" class="line-clamp-2">{{ $prestasi->deskripsi }}</span>
            </td>
            <td class="px-4 py-2 align-top">
              @if($prestasi->foto)
                <button type="button" class="group"
                        data-preview="{{ asset('storage/'.$prestasi->foto) }}"
                        onclick="openPreview(this)">
                  <img src="{{ asset('storage/'.$prestasi->foto) }}"
                       alt="Foto {{ $prestasi->nama }}"
                       class="object-cover w-12 h-12 transition rounded shadow-sm group-hover:scale-105"/>
                </button>
              @else
                <span class="text-gray-400">—</span>
              @endif
            </td>
            <td class="px-4 py-2 align-top">
              <div class="flex flex-wrap gap-2">
                <a href="{{ route('prestasi.edit', $prestasi->id) }}"
                   class="px-3 py-1 text-white bg-yellow-500 rounded hover:bg-yellow-600">Edit</a>
                <form action="{{ route('prestasi.destroy', $prestasi->id) }}" method="POST"
                      onsubmit="return confirm('Hapus data ini?')">
                  @csrf @method('DELETE')
                  <button type="submit" class="px-3 py-1 text-white bg-red-500 rounded hover:bg-red-600">
                    Hapus
                  </button>
                </form>
              </div>
            </td>
          </tr>
        @empty
          <tr><td colspan="7" class="px-4 py-6 text-center text-gray-500">Belum ada data.</td></tr>
        @endforelse
      </tbody>
    </table>
  </div>

  {{-- Pagination info --}}
  <div class="flex items-center justify-between mt-4 text-sm text-gray-600">
    <div>
      Menampilkan {{ $prestasis->firstItem() }}–{{ $prestasis->lastItem() }} dari {{ $prestasis->total() }} data
    </div>
    <div>{{ $prestasis->appends(request()->query())->links() }}</div>
  </div>
</div>

{{-- Modal preview sederhana --}}
<div id="imgModal" class="fixed inset-0 z-[60] hidden place-items-center bg-black/60 p-4" onclick="closePreview(event)">
  <img id="imgPreview" src="#" alt="Preview" class="max-h-[85vh] max-w-[90vw] rounded shadow-2xl">
</div>
@endsection

@push('scripts')
<script>
  function openPreview(btn){
    const src = btn.getAttribute('data-preview');
    const m = document.getElementById('imgModal');
    const img = document.getElementById('imgPreview');
    img.src = src; m.classList.remove('hidden'); document.body.style.overflow='hidden';
  }
  function closePreview(e){
    if(e.target.id === 'imgModal'){ e.currentTarget.classList.add('hidden'); document.body.style.overflow=''; }
  }
</script>
@endpush
