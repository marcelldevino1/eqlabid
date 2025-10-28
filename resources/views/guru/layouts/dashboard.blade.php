@extends('guru.layouts.app')

@section('title', 'Dashboard Guru')

@section('content')
<div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
    {{-- Statistik atas --}}
    <div class="grid grid-cols-2 gap-4 lg:col-span-3 md:grid-cols-5">
        <div class="p-6 text-center bg-white shadow rounded-xl">
            <h3 class="text-sm text-gray-500">Jumlah Kelas</h3>
            <p class="text-3xl font-bold text-[#001b9a] mt-2">12</p>
        </div>
        <div class="p-6 text-center bg-white shadow rounded-xl">
            <h3 class="text-sm text-gray-500">Jumlah Murid</h3>
            <p class="text-3xl font-bold text-[#001b9a] mt-2">504</p>
        </div>
        <div class="p-6 text-center bg-white shadow rounded-xl">
            <h3 class="text-sm text-gray-500">Absensi Hari Ini</h3>
            <p class="text-3xl font-bold text-[#001b9a] mt-2">494</p>
        </div>
        <div class="p-6 text-center bg-white shadow rounded-xl">
            <h3 class="text-sm text-gray-500">Tugas Aktif</h3>
            <p class="text-3xl font-bold text-[#001b9a] mt-2">65</p>
        </div>
        <div class="p-6 text-center bg-white shadow rounded-xl">
            <h3 class="text-sm text-gray-500">Tugas Belum Dinilai</h3>
            <p class="text-3xl font-bold text-[#001b9a] mt-2">40</p>
        </div>
    </div>

    {{-- Grafik Absensi --}}
    <div class="p-6 bg-white shadow lg:col-span-2 rounded-xl">
        <h3 class="text-xl font-semibold text-[#001b9a] mb-4">Absensi selama 2023–2025</h3>
        <canvas id="absensiChart"></canvas>
    </div>

    {{-- Pesan Terakhir --}}
    <div class="p-6 bg-white shadow rounded-xl">
        <h3 class="text-xl font-semibold text-[#001b9a] mb-4">Pesan Terakhir</h3>
        <ul class="space-y-3">
            <li class="flex items-center justify-between">
                <div>
                    <p class="font-semibold text-gray-800">Budi Santoso</p>
                    <p class="text-sm text-gray-500">Tugas nya mana Budi?</p>
                </div>
                <span class="text-sm text-gray-400">10.00 WIB</span>
            </li>
            <!-- Tambah pesan lainnya -->
        </ul>
    </div>
</div>
@endsection
