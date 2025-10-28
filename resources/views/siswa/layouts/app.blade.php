<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('images/icons/logo-white.svg') }}">
    <title>@yield('title') - {{ config('app.name', 'EQLAB.id') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=poppins:400,500,600,700&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    <link rel="stylesheet" href=" http://eqlabid.jh-beon.cloud/build/assets/app-mnQoiJVb.css ">
    @vite('resources/css/app.css')
    <script src="http://eqlabid.jh-beon.cloud/build/assets/app-CXDpL9bK.js"></script>">
</head>

<body class="font-[Poppins] antialiased bg-[#f5f7fb] text-gray-900">
    <div class="flex min-h-screen">
        {{-- Sidebar --}}
        @include('siswa.layouts.navigation')

        {{-- Main Content --}}
        <div class="flex flex-col flex-1">
            {{-- Header --}}
            <header class="flex justify-between items-center px-10 py-4 bg-[#001b9a] text-white rounded-b-3xl">
                <div>
                    <h1 class="text-xl font-semibold">
                        Hi, {{ Auth::user()->name ?? 'Siswa' }}
                    </h1>
                    <p class="text-sm text-gray-200">Kerjakan tugas dengan rajin jangan sampai telat kumpul</p>
                </div>
                <div class="flex items-center space-x-4">
                    <button class="relative">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6 6 0 10-12 0v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                        </svg>
                    </button>
                    <div class="flex items-center justify-center w-8 h-8 bg-white rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-[#001b9a]" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M5.121 17.804A7 7 0 1118.879 6.196a9 9 0 01-13.758 11.608z" />
                        </svg>
                    </div>
                </div>
            </header>

            {{-- Page Content --}}
            <main class="flex-1 p-8">
                @yield('content')
            </main>
        </div>
    </div>
</body>

</html>