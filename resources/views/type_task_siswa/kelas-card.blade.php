@extends('dashboard')

@section('title', 'Siswa Type Task')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

    <!-- Kartu Pelajaran -->
    <div class="bg-white shadow-md rounded-xl overflow-hidden hover:shadow-lg transition-shadow duration-300">
        <!-- Header merah -->
        <div class="bg-red-700 flex justify-between items-center p-5">
            <div class="flex items-center space-x-4">
                <!-- Icon profil -->
                <div class="w-12 h-12 bg-white rounded-full flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-700" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5.121 17.804A8 8 0 1118.879 6.196M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                </div>
                <div>
                    <h2 class="text-white text-lg font-semibold">Description</h2>
                    <p class="text-gray-200 text-sm">Nama Guru</p>
                </div>
            </div>

            <!-- Gambar dekorasi kanan -->
            NILAI
        </div>

        <!-- Bagian bawah -->
        <div class="p-4 flex justify-end">
            <span class="bg-blue-600 text-white text-sm font-semibold px-4 py-1 rounded-full shadow">
                Nama Mapel
            </span>
            <span class="bg-blue-600 text-white text-sm font-semibold px-4 py-1 rounded-full shadow">
               Kirim Tugas
            </span>
        </div>
    </div>

</div>
@endsection
