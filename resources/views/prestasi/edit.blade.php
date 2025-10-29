@extends('dashboard')

@section('title','Edit Prestasi: '.$prestasi->nama)

@section('content')
<div class="max-w-2xl p-6 mx-auto bg-white rounded-lg shadow-md">
  <h2 class="mb-6 text-2xl font-bold text-gray-800">Edit Prestasi: {{ $prestasi->nama }}</h2>

  @if ($errors->any())
    <div class="px-4 py-2 mb-4 text-red-700 bg-red-100 border border-red-200 rounded">
      <ul class="list-disc list-inside">
        @foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach
      </ul>
    </div>
  @endif

  <form action="{{ route('prestasi.update', $prestasi->id) }}" method="POST" enctype="multipart/form-data" id="formEditPrestasi">
    @csrf @method('PUT')

    <div class="mb-4">
      <label class="block mb-1 text-sm font-medium text-gray-700">Nama Siswa</label>
      <input type="text" name="nama" value="{{ old('nama',$prestasi->nama) }}"
             class="w-full p-2 border rounded-md focus:ring-blue-500 focus:border-blue-500" required>
    </div>

    <div class="mb-4">
      <label class="block mb-1 text-sm font-medium text-gray-700">Kelas</label>
      <input type="text" name="kelas" value="{{ old('kelas',$prestasi->kelas) }}"
             class="w-full p-2 border rounded-md focus:ring-blue-500 focus:border-blue-500" required>
    </div>

    <div class="mb-4">
      <label class="block mb-1 text-sm font-medium text-gray-700">Prestasi (Judul Singkat)</label>
      <input type="text" name="prestasi" value="{{ old('prestasi',$prestasi->prestasi) }}"
             class="w-full p-2 border rounded-md focus:ring-blue-500 focus:border-blue-500" required>
    </div>

    <div class="mb-4">
      <label class="block mb-1 text-sm font-medium text-gray-700">Deskripsi (maks 255)</label>
      <textarea name="deskripsi" id="deskripsiEdit" rows="3" maxlength="255"
                class="w-full p-2 border rounded-md focus:ring-blue-500 focus:border-blue-500" required>{{ old('deskripsi',$prestasi->deskripsi) }}</textarea>
      <div class="mt-1 text-xs text-gray-500"><span id="descCountEdit">0</span>/255</div>
    </div>

    <div class="mb-4">
      <label class="block mb-1 text-sm font-medium text-gray-700">Ganti Foto (opsional) — jpg/jpeg/png, ≤ 2MB</label>

      <label for="foto" id="dropAreaEdit"
             class="flex flex-col items-center justify-center gap-2 p-4 text-center border-2 border-dashed rounded-md cursor-pointer hover:border-blue-400">
        <div class="text-sm text-gray-600">Klik/drag file untuk mengganti foto</div>
        <input type="file" name="foto" id="foto" accept=".jpg,.jpeg,.png" class="hidden">
      </label>

      {{-- Preview foto baru / existing --}}
      <div class="mt-3">
        @if($prestasi->foto)
          <div class="flex items-center gap-3">
            <img src="{{ asset('storage/'.$prestasi->foto) }}" alt="Saat ini" class="object-cover w-24 h-24 rounded shadow">
            <span class="text-xs text-gray-500">Foto saat ini</span>
          </div>
        @endif
        <div id="previewWrapEdit" class="hidden mt-3">
          <img id="previewImgEdit" class="object-cover w-32 h-32 rounded shadow" alt="Preview baru">
          <button type="button" class="px-2 py-1 ml-3 text-sm text-red-600 rounded bg-red-50 hover:bg-red-100"
                  onclick="clearPreviewEdit()">Batalkan</button>
        </div>
        <p id="fotoErrorEdit" class="hidden mt-2 text-sm text-red-600"></p>
      </div>
    </div>

    <div class="flex justify-end gap-3">
      <a href="{{ route('prestasi.index') }}" class="px-4 py-2 text-gray-800 bg-gray-200 rounded-md hover:bg-gray-300">Batal</a>
      <button type="submit" class="px-4 py-2 text-white bg-green-600 rounded-md hover:bg-green-700">Update Prestasi</button>
    </div>
  </form>
</div>
@endsection

@push('scripts')
<script>
  // counter
  const dE = document.getElementById('deskripsiEdit');
  const dcE = document.getElementById('descCountEdit');
  const uC = ()=> dcE.textContent = (dE.value||'').length;
  dE.addEventListener('input',uC); uC();

  // dropzone + preview + validasi
  const dropE = document.getElementById('dropAreaEdit');
  const inE = document.getElementById('foto');
  const errE = document.getElementById('fotoErrorEdit');
  const wE = document.getElementById('previewWrapEdit');
  const iE = document.getElementById('previewImgEdit');
  const MAX = 2*1024*1024;
  const ALLOWED = ['image/jpeg','image/png','image/jpg'];

  const validE = (f)=>{
    errE.classList.add('hidden'); errE.textContent='';
    if(!f) return false;
    if(!ALLOWED.includes(f.type)){ errE.textContent='Format harus JPG/JPEG/PNG.'; errE.classList.remove('hidden'); return false; }
    if(f.size>MAX){ errE.textContent='Ukuran file melebihi 2MB.'; errE.classList.remove('hidden'); return false; }
    return true;
  };
  const showE = (f)=>{ iE.src=URL.createObjectURL(f); wE.classList.remove('hidden'); };

  dropE.addEventListener('click',()=>inE.click());
  ['dragenter','dragover'].forEach(ev=>dropE.addEventListener(ev,e=>{e.preventDefault();dropE.classList.add('border-blue-400','bg-blue-50');}));
  ['dragleave','drop'].forEach(ev=>dropE.addEventListener(ev,e=>{e.preventDefault();dropE.classList.remove('border-blue-400','bg-blue-50');}));
  dropE.addEventListener('drop', e=>{const f=e.dataTransfer.files[0]; if(validE(f)){ inE.files=e.dataTransfer.files; showE(f);} });
  inE.addEventListener('change', e=>{ const f=e.target.files[0]; if(validE(f)) showE(f); });

  window.clearPreviewEdit=()=>{ inE.value=''; wE.classList.add('hidden'); iE.src='#'; };

  document.getElementById('formEditPrestasi').addEventListener('submit', (e)=>{
    if(inE.files.length){
      const f=inE.files[0];
      if(!validE(f)){ e.preventDefault(); }
    }
  });
</script>
@endpush
