@extends('ortu.layouts.app')

@section('content')
<div class="grid grid-cols-3 gap-6">
    {{-- Left Section --}}
    <div class="flex flex-col col-span-2 gap-6">
        {{-- Welcome Card --}}
        <div class="bg-[#001B9A] text-white p-6 rounded-2xl flex justify-between items-center">
            <div>
                <h2 class="text-lg font-medium">Hi, Bapak/Ibu</h2>
                <h1 class="text-2xl font-semibold">Selamat Datang Kembali</h1>
            </div>
            <img src="{{ asset('images/illustrations/calendar.svg') }}" alt="Dashboard Illustration" class="h-24">
        </div>

        {{-- Jadwal dan Pengumuman --}}
        <div class="grid grid-cols-2 gap-6">
            {{-- Jadwal Hari Ini --}}
            <div class="p-6 bg-white shadow rounded-2xl">
                <h3 class="text-lg font-semibold text-[#001B9A] mb-4">Jadwal Hari ini</h3>
                <div class="space-y-3">
                    @foreach([
                        ['mapel'=>'PPKN','ortu'=>'Bu Lala'],
                        ['mapel'=>'Informatika','ortu'=>'Pak Jefri'],
                        ['mapel'=>'Math','ortu'=>'Bu Ila'],
                        ['mapel'=>'Agama','ortu'=>'Pak Edward'],
                        ['mapel'=>'Bahasa Inggris','ortu'=>'Miss Luna']
                    ] as $item)
                    <div class="flex justify-between px-4 py-3 rounded-lg text-white
                        {{ $loop->iteration % 2 == 0 ? 'bg-[#0035C7]' : 'bg-[#001B9A]' }}">
                        <span>{{ $item['mapel'] }}</span>
                        <span>{{ $item['ortu'] }}</span>
                    </div>
                    @endforeach
                </div>
            </div>

            {{-- Pengumuman --}}
            <div class="p-6 bg-white shadow rounded-2xl">
                <h3 class="text-lg font-semibold text-[#001B9A] mb-4">Pengumuman</h3>
                <ul class="space-y-3">
                    @foreach([
                        'Pengumuman Libur Sekolah',
                        'Pengumuman Acara Sekolah',
                        'Pengumuman Jadwal Baru',
                        'Pengumuman Penting',
                        'Pengumuman Penting'
                    ] as $item)
                    <li class="flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <img src="{{ asset('images/icons/announcement.svg') }}" alt="Announcement" class="w-5 h-5">
                            <span>{{ $item }}</span>
                        </div>
                        <span class="text-sm text-gray-500">10.00 WIB</span>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    {{-- Kalender Sekolah --}}
    <div class="p-6 bg-white shadow rounded-2xl">
        <h3 class="text-lg font-semibold text-[#001B9A] mb-3">Kalender Sekolah</h3>
        <p class="mb-3 font-medium text-gray-800">Agustus 2025</p>

        <div class="grid grid-cols-7 mb-2 text-sm font-medium text-center">
            <span>S</span><span>S</span><span>R</span><span>K</span><span>J</span><span>S</span><span>M</span>
        </div>

        <div class="grid grid-cols-7 gap-2 text-center">
            @for($i = 1; $i <= 30; $i++)
                <div class="py-1 rounded-full 
                    {{ in_array($i, [7,14,18,21,23,28]) ? 'bg-red-400 text-white' : 
                    (in_array($i, [10,26]) ? 'bg-blue-500 text-white' : '') }}">
                    {{ $i }}
                </div>
            @endfor
        </div>

        <div class="flex items-center gap-4 mt-4">
            <div class="flex items-center gap-2">
                <span class="w-3 h-3 bg-blue-500 rounded-full"></span>
                <span class="text-sm">Acara Sekolah</span>
            </div>
            <div class="flex items-center gap-2">
                <span class="w-3 h-3 bg-red-400 rounded-full"></span>
                <span class="text-sm">Libur</span>
            </div>
        </div>
    </div>
</div>
@endsection
