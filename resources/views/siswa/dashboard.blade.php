@extends('siswa.layouts.app')

@section('title', 'Dashboard Siswa')

@section('content')
<div class="grid grid-cols-3 gap-6">
    {{-- ================= MATA PELAJARAN ================= --}}
    <div class="col-span-2 p-6 bg-white shadow rounded-2xl">
        <h2 class="mb-4 text-lg font-semibold">Mata Pelajaran</h2>
        <div class="grid grid-cols-2 gap-4 lg:grid-cols-3">
            @php
                $mapel = [
                    ['nama' => 'PPKN', 'guru' => 'Bu Lala'],
                    ['nama' => 'Informatika', 'guru' => 'Bu Jefri'],
                    ['nama' => 'Math', 'guru' => 'Bu Ila'],
                    ['nama' => 'Agama', 'guru' => 'Pak Edward'],
                    ['nama' => 'Bahasa Indonesia', 'guru' => 'Bu Lulu'],
                    ['nama' => 'Inggris', 'guru' => 'Miss Luna'],
                    ['nama' => 'Mandarin', 'guru' => 'Laose Xia'],
                    ['nama' => 'BK', 'guru' => 'Pak Golih'],
                    ['nama' => 'Penjas', 'guru' => 'Pak Lolo'],
                    ['nama' => 'IPA', 'guru' => 'Bu Lala'],
                    ['nama' => 'IPS', 'guru' => 'Bu Lala'],
                ];
            @endphp

            @foreach ($mapel as $m)
                <div class="bg-[#001b9a] text-white rounded-xl p-4 flex items-center justify-between hover:opacity-90 transition">
                    <div>
                        <p class="text-sm font-medium">{{ $m['nama'] }}</p>
                        <p class="text-xs text-gray-300">{{ $m['guru'] }}</p>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5l7 7-7 7" />
                    </svg>
                </div>
            @endforeach
        </div>
    </div>

    {{-- ================= DATA ABSENSI ================= --}}
    <div class="p-6 bg-white shadow rounded-2xl">
        <h2 class="mb-4 text-lg font-semibold">Data Absensi Kamu</h2>
        <p class="mb-2 text-sm text-gray-500">Bulan Agustus</p>
        <div class="space-y-2">
            <div class="flex justify-between px-3 py-2 border rounded-lg">
                <span>Hadir</span>
                <span class="font-semibold">29</span>
            </div>
            <div class="flex justify-between px-3 py-2 border rounded-lg">
                <span>Izin</span>
                <span class="font-semibold">1</span>
            </div>
            <div class="flex justify-between px-3 py-2 border rounded-lg">
                <span>Alpa</span>
                <span class="font-semibold">0</span>
            </div>
        </div>
    </div>

    {{-- ================= DAFTAR TUGAS ================= --}}
    <div class="col-span-2 p-6 bg-white shadow rounded-2xl">
        <h2 class="mb-4 text-lg font-semibold">Daftar Tugas</h2>
        <p class="mb-2 text-sm text-gray-500">Bulan Agustus</p>
        <div class="space-y-2">
            <div class="flex justify-between p-3 text-white bg-green-500 rounded-xl">
                <span>PPKN</span><span>Bu Lala</span>
            </div>
            <div class="flex justify-between p-3 text-white bg-red-500 rounded-xl">
                <span>Inggris</span><span>Miss Luna</span>
            </div>
            <div class="flex justify-between p-3 text-white bg-green-500 rounded-xl">
                <span>Mandarin</span><span>Laose Xia</span>
            </div>
            <div class="flex justify-between p-3 text-white bg-red-500 rounded-xl">
                <span>Agama</span><span>Pak Edward</span>
            </div>
        </div>
    </div>

    {{-- ================= PESAN TERAKHIR ================= --}}
    <div class="p-6 bg-white shadow rounded-2xl">
        <h2 class="mb-4 text-lg font-semibold">Pesan Terakhir</h2>
        <div class="space-y-4">
            <div class="flex items-start space-x-3">
                <div class="flex items-center justify-center w-8 h-8 bg-gray-200 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-500" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 11c.5304 0 1.0391-.2107 1.4142-.5858C13.7893 10.0391 14 9.5304 14 9s-.2107-1.0391-.5858-1.4142C13.0391 7.2107 12.5304 7 12 7s-1.0391.2107-1.4142.5858C10.2107 7.9609 10 8.4696 10 9s.2107 1.0391.5858 1.4142C10.9609 10.7893 11.4696 11 12 11z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 14v7" />
                    </svg>
                </div>
                <div class="flex-1">
                    <p class="text-sm font-semibold">Bu Ila</p>
                    <p class="text-xs text-gray-600">Baik, Terima kasih Bu Ila</p>
                    <span class="text-xs text-gray-400">10.00 WIB</span>
                </div>
            </div>

            <div class="flex items-start space-x-3">
                <div class="flex items-center justify-center w-8 h-8 bg-gray-200 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-500" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 11c.5304 0 1.0391-.2107 1.4142-.5858C13.7893 10.0391 14 9.5304 14 9s-.2107-1.0391-.5858-1.4142C13.0391 7.2107 12.5304 7 12 7s-1.0391.2107-1.4142.5858C10.2107 7.9609 10 8.4696 10 9s.2107 1.0391.5858 1.4142C10.9609 10.7893 11.4696 11 12 11z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 14v7" />
                    </svg>
                </div>
                <div class="flex-1">
                    <p class="text-sm font-semibold">Bu Lala</p>
                    <p class="text-xs text-gray-600">Apakah tugas kamu sudah selesai?</p>
                    <span class="text-xs text-gray-400">12.00 WIB</span>
                </div>
            </div>
        </div>
    </div>

    {{-- ================= JADWAL HARI INI ================= --}}
    <div class="p-6 bg-white shadow rounded-2xl">
        <h2 class="mb-4 text-lg font-semibold">Jadwal Hari Ini</h2>
        <p class="mb-2 text-sm text-gray-500">Senin 21/7/2025</p>
        <div class="space-y-2">
            <div class="bg-[#001b9a] text-white rounded-xl p-3 flex justify-between">
                <span>PPKN</span><span>Bu Lala</span>
            </div>
            <div class="bg-[#001b9a] text-white rounded-xl p-3 flex justify-between">
                <span>Informatika</span><span>Pak Jefri</span>
            </div>
            <div class="bg-[#001b9a] text-white rounded-xl p-3 flex justify-between">
                <span>Math</span><span>Bu Ila</span>
            </div>
            <div class="bg-[#001b9a] text-white rounded-xl p-3 flex justify-between">
                <span>Agama</span><span>Pak Edward</span>
            </div>
            <div class="bg-[#001b9a] text-white rounded-xl p-3 flex justify-between">
                <span>Bahasa Inggris</span><span>Miss Luna</span>
            </div>
        </div>
    </div>
</div>
@endsection
