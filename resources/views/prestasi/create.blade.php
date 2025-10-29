@extends('dashboard')

@section('title','Tambah Prestasi Baru')

@section('content')
<div class="max-w-2xl p-6 mx-auto bg-white rounded-lg shadow-md">
  <h2 class="mb-6 text-2xl font-bold text-gray-800">Tambah Prestasi Baru</h2>

  @if ($errors->any())
    <div class="px-4 py-2 mb-4 text-red-700 bg-red-100 border border-red-200 rounded">
      <ul class="list-disc list-inside">
        @foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach
      </ul>
    </div>
  @endif

  <form action="{{ route('prestasi.store') }}" method="POST" enctype="multipart/form-data" id="formPrestasi">
    @csrf

    <div class="mb-4">
      <label for="nama" class="block mb-1 text-sm font-medium text-gray-700">Nama Siswa</label>
      <input type="text" name="nama" id="nama" value="{{ old('nama') }}"
             class="w-full p-2 border rounded-md focus:ring-blue-500 focus:border-blue-500" required>
    </div>

    <div class="mb-4">
      <label for="kelas" class="block mb-1 text-sm font-medium text-gray-700">Kelas</label>
      <input type="text" name="kelas" id="kelas" value="{{ old('kelas') }}"
             class="w-full p-2 border rounded-md focus:ring-blue-500 focus:border-blue-500" required>
    </div>

    <div class="mb-4">
      <label for="prestasi" class="block mb-1 text-sm font-medium text-gray-700">Prestasi (Judul Singkat)</label>
      <input type="text" name="prestasi" id="prestasi" value="{{ old('prestasi') }}"
             class="w-full p-2 border rounded-md focus:ring-blue-500 focus:border-blue-500" required>
    </div>

    <div class="mb-4">
      <label for="deskripsi" class="block mb-1 text-sm font-medium text-gray-700">Deskripsi (maks 255)</label>
      <textarea name="deskripsi" id="deskripsi" rows="3" maxlength="255"
                class="w-full p-2 border rounded-md focus:ring-blue-500 focus:border-blue-500" required>{{ old('deskripsi') }}</textarea>
      <div class="mt-1 text-xs text-gray-500"><span id="descCount">0</span>/255</div>
    </div>

    <div class="mb-4">
      <label class="block mb-1 text-sm font-medium text-gray-700">Foto (jpg/jpeg/png, ≤ 2MB)</label>

      {{-- Dropzone minimal tanpa lib --}}
      <label for="foto" id="dropArea"
             class="flex flex-col items-center justify-center gap-2 p-4 text-center border-2 border-dashed rounded-md cursor-pointer hover:border-blue-400">
        <svg class="w-8 h-8 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M7 16V4m0 0L3 8m4-4l4 4M17 8v12m0 0l4-4m-4 4l-4-4"/>
        </svg>
        <div class="text-sm text-gray-600">
          Tarik & letakkan gambar di sini atau klik untuk pilih file
        </div>
        <div class="text-xs text-gray-500">Maks 2MB • Format: jpg, jpeg, png</div>
        <input type="file" name="foto" id="foto" accept=".jpg,.jpeg,.png" class="hidden">
      </label>

      {{-- Preview --}}
      <div id="previewWrap" class="hidden mt-3">
        <img id="previewImg" src="#" alt="Preview" class="object-cover w-32 h-32 rounded shadow">
        <button type="button" class="px-2 py-1 ml-3 text-sm text-red-600 rounded bg-red-50 hover:bg-red-100"
                onclick="clearPreview()">Hapus</button>
      </div>

      <p id="fotoError" class="hidden mt-2 text-sm text-red-600"></p>
    </div>

    <div class="flex justify-end gap-3">
      <a href="{{ route('prestasi.index') }}" class="px-4 py-2 text-gray-800 bg-gray-200 rounded-md hover:bg-gray-300">Batal</a>
      <button type="submit" class="px-4 py-2 text-white bg-blue-600 rounded-md hover:bg-blue-700">Simpan Prestasi</button>
    </div>
  </form>
</div>
@endsection

@push('scripts')
<script>
  // counter deskripsi
  const desc = document.getElementById('deskripsi');
  const descCount = document.getElementById('descCount');
  const updateCount = () => descCount.textContent = (desc.value || '').length;
  desc.addEventListener('input', updateCount); updateCount();

  // dropzone + preview + validasi client
  const dropArea = document.getElementById('dropArea');
  const input = document.getElementById('foto');
  const err = document.getElementById('fotoError');
  const wrap = document.getElementById('previewWrap');
  const img = document.getElementById('previewImg');
  const MAX = 2 * 1024 * 1024;
  const ALLOWED = ['image/jpeg','image/png','image/jpg'];

  const validateFile = (file) => {
    err.classList.add('hidden'); err.textContent='';
    if(!file) return false;
    if(!ALLOWED.includes(file.type)){ err.textContent='Format harus JPG/JPEG/PNG.'; err.classList.remove('hidden'); return false; }
    if(file.size > MAX){ err.textContent='Ukuran file melebihi 2MB.'; err.classList.remove('hidden'); return false; }
    return true;
  };

  const showPreview = (file) => {
    const url = URL.createObjectURL(file);
    img.src = url; wrap.classList.remove('hidden');
  };

  dropArea.addEventListener('click', () => input.click());
  ['dragenter','dragover'].forEach(ev => dropArea.addEventListener(ev, e=>{ e.preventDefault(); dropArea.classList.add('border-blue-400','bg-blue-50'); }));
  ['dragleave','drop'].forEach(ev => dropArea.addEventListener(ev, e=>{ e.preventDefault(); dropArea.classList.remove('border-blue-400','bg-blue-50'); }));
  dropArea.addEventListener('drop', e => { const f=e.dataTransfer.files[0]; if(validateFile(f)){ input.files=e.dataTransfer.files; showPreview(f);} });
  input.addEventListener('change', e => { const f=e.target.files[0]; if(validateFile(f)) showPreview(f); });

  window.clearPreview = () => { input.value=''; wrap.classList.add('hidden'); img.src='#'; };

  // cegah submit jika file tidak valid (bila ada)
  document.getElementById('formPrestasi').addEventListener('submit', (e)=>{
    if(input.files.length){
      const f=input.files[0];
      if(!validateFile(f)){ e.preventDefault(); }
    }
  });
</script>
@endpush
