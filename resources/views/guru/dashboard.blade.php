@extends('guru.layouts.app')

@section('content')
<div class="flex min-h-screen bg-[#F5F7FB]">
    {{-- Sidebar --}}
    <aside class="flex flex-col justify-between w-20 bg-white shadow-md">
        <div>
            <div class="flex justify-center mt-6">
                <img src="{{ asset('images/icons/logo-blue.svg') }}" alt="Logo" class="w-auto h-10">
            </div>

            <nav class="flex flex-col items-center mt-10 space-y-6">
                <a href="#" class="p-3 bg-[#E9F0FF] rounded-xl text-[#0B63F6]">
                    <i class="text-xl fa-solid fa-table-columns"></i>
                </a>
                <a href="#" class="p-3 hover:bg-[#E9F0FF] rounded-xl text-gray-500 hover:text-[#0B63F6]">
                    <i class="text-xl fa-solid fa-users"></i>
                </a>
                <a href="#" class="p-3 hover:bg-[#E9F0FF] rounded-xl text-gray-500 hover:text-[#0B63F6]">
                    <i class="text-xl fa-solid fa-book"></i>
                </a>
                <a href="#" class="p-3 hover:bg-[#E9F0FF] rounded-xl text-gray-500 hover:text-[#0B63F6]">
                    <i class="text-xl fa-solid fa-comments"></i>
                </a>
                <a href="#" class="p-3 hover:bg-[#E9F0FF] rounded-xl text-gray-500 hover:text-[#0B63F6]">
                    <i class="text-xl fa-solid fa-gear"></i>
                </a>
            </nav>
        </div>

        <div class="flex justify-center mb-6">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="bg-[#FF3B3B] text-white px-4 py-2 rounded-lg font-semibold flex items-center gap-2">
                    <i class="fa-solid fa-right-from-bracket"></i> Log Out
                </button>
            </form>
        </div>
    </aside>

    {{-- Main Content --}}
    <div class="flex-1 px-8 py-6">
        {{-- Header --}}
        <header class="bg-gradient-to-r from-[#0B63F6] to-[#1D4ED8] rounded-2xl p-6 text-white shadow-md">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-xl font-semibold">Selamat datang kembali</h1>
                    <p class="text-sm opacity-90">Setiap anak adalah bintang, tugas kita adalah membantunya bersinar.</p>
                </div>
                <div class="flex items-center space-x-4">
                    <button class="p-2 rounded-full bg-white/20 hover:bg-white/30">
                        <i class="text-lg fa-regular fa-bell"></i>
                    </button>
                    <button class="p-2 rounded-full bg-white/20 hover:bg-white/30">
                        <i class="text-lg fa-regular fa-user"></i>
                    </button>
                </div>
            </div>
        </header>

        {{-- Statistik Cards --}}
        <div class="grid grid-cols-5 gap-6 mt-8">
            @php
                $cards = [
                    ['title' => 'Jumlah Kelas', 'value' => 12],
                    ['title' => 'Jumlah Murid', 'value' => 504],
                    ['title' => 'Absensi Hari Ini', 'value' => 494],
                    ['title' => 'Tugas Aktif', 'value' => 65],
                    ['title' => 'Tugas Belum Dinilai', 'value' => 40],
                ];
            @endphp

            @foreach ($cards as $card)
                <div class="p-6 text-center bg-white shadow-md rounded-xl">
                    <p class="text-sm text-gray-600">{{ $card['title'] }}</p>
                    <h2 class="text-4xl font-bold text-[#0B63F6] mt-2">{{ $card['value'] }}</h2>
                </div>
            @endforeach
        </div>

        {{-- Middle Section --}}
        <div class="grid grid-cols-3 gap-6 mt-8">
            {{-- Chart Section --}}
            <div class="col-span-2 p-6 bg-white shadow-md rounded-xl">
                <h3 class="font-semibold text-center text-[#0B63F6] mb-4">Absensi selama 2023–2025</h3>
                <canvas id="absensiChart" height="150"></canvas>
            </div>

            {{-- Pesan Terakhir --}}
            <div class="p-6 bg-white shadow-md rounded-xl">
                <h3 class="font-semibold text-[#0B63F6] mb-4">Pesan Terakhir</h3>
                <div class="space-y-4">
                    @foreach ([
                        ['name' => 'Budi Santoso', 'message' => 'Tugas nya mana Budi?'],
                        ['name' => 'Lina', 'message' => 'Terimakasih sudah mengumpulkan Tugas'],
                        ['name' => 'Naung', 'message' => 'Ok Naung'],
                        ['name' => 'Bu Ila', 'message' => 'Baik Terimakasih Bu Ila'],
                    ] as $msg)
                        <div class="flex items-start gap-3">
                            <div class="p-3 bg-gray-200 rounded-full">
                                <i class="fa-regular fa-user text-[#0B63F6]"></i>
                            </div>
                            <div>
                                <p class="font-semibold">{{ $msg['name'] }}</p>
                                <p class="text-sm text-gray-500">{{ $msg['message'] }}</p>
                            </div>
                            <span class="ml-auto text-xs text-gray-400">10.00 WIB</span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        {{-- Jadwal Mengajar Hari Ini --}}
        <div class="p-6 mt-8 bg-white shadow-md rounded-xl">
            <h3 class="font-semibold text-center text-[#0B63F6] mb-6">Jadwal Mengajar Hari Ini</h3>
            <div class="flex flex-wrap justify-center gap-4">
                @foreach ([
                    ['mapel' => 'PPKN', 'guru' => 'Bu Lala'],
                    ['mapel' => 'Informatika', 'guru' => 'Pak Jefri'],
                    ['mapel' => 'Math', 'guru' => 'Bu Ila'],
                    ['mapel' => 'Bahasa Inggris', 'guru' => 'Miss Luna'],
                    ['mapel' => 'Bahasa Indonesia', 'guru' => 'Bu Lulu'],
                    ['mapel' => 'Agama', 'guru' => 'Pak Edward'],
                ] as $jadwal)
                    <div class="bg-[#0B63F6] text-white rounded-xl px-4 py-2 text-center min-w-[140px]">
                        <p class="font-semibold">{{ $jadwal['mapel'] }}</p>
                        <p class="text-xs opacity-90">{{ $jadwal['guru'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

{{-- ChartJS --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('absensiChart').getContext('2d');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
            datasets: [
                {
                    label: '2023',
                    data: [70, 77, 79, 82, 91, 89, 93, 94, 93, 95, 97, 93],
                    backgroundColor: '#3B82F6'
                },
                {
                    label: '2024',
                    data: [75, 82, 87, 87, 89, 89, 90, 93, 94, 96, 97, 97],
                    backgroundColor: '#9333EA'
                },
                {
                    label: '2025',
                    data: [79, 84, 87, 89, 95, 97, 89, 76, 95, 97, 97, 80],
                    backgroundColor: '#FACC15'
                }
            ]
        },
        options: {
            responsive: true,
            plugins: { legend: { position: 'bottom' } },
            scales: { y: { beginAtZero: true } }
        }
    });
</script>
@endsection
