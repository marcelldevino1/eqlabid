<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Orang Tua | EQLAB.id</title>

    {{-- Font dan Icon --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.bunny.net/css?family=poppins:400,500,600,700&display=swap" rel="stylesheet" />

    {{-- Vite --}}
    <link rel="stylesheet" href=" http://eqlabid.jh-beon.cloud/build/assets/app-mnQoiJVb.css ">
    <script src="http://eqlabid.jh-beon.cloud/build/assets/app-CXDpL9bK.js"></script>">
</head>

<body class="font-[Poppins] bg-[#F5F7FB] text-gray-900">
    <div class="flex min-h-screen">

        {{-- Sidebar --}}
        {{-- Sidebar --}}
        <aside class="fixed top-0 left-0 flex flex-col justify-between w-32 h-screen py-6 bg-white shadow-md">
            <div>
                <div class="flex justify-center mb-8">
                    <img src="{{ asset('images/icons/logo-blue.svg') }}" alt="Logo" class="w-auto h-10">
                </div>

                <nav class="flex flex-col items-center space-y-6">
                    <a href="{{ route('ortu.dashboard') }}"
                        class="p-3 bg-[#E9F0FF] rounded-xl text-[#001B9A] transition-all duration-200">
                        <i class="text-xl fa-solid fa-house"></i>
                    </a>
                    <a href="#"
                        class="p-3 hover:bg-[#E9F0FF] rounded-xl text-gray-500 hover:text-[#001B9A] transition-all duration-200">
                        <i class="text-xl fa-solid fa-envelope"></i>
                    </a>
                    <a href="#"
                        class="p-3 hover:bg-[#E9F0FF] rounded-xl text-gray-500 hover:text-[#001B9A] transition-all duration-200">
                        <i class="text-xl fa-solid fa-users"></i>
                    </a>
                </nav>
            </div>

            {{-- Tombol Logout --}}
            <div class="flex justify-center mt-10">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="flex items-center gap-2 px-4 py-2 bg-[#FF3B3B] hover:bg-[#E22E2E] text-white rounded-xl shadow-md transition-all duration-200">
                        <i class="fa-solid fa-right-from-bracket"></i>
                        <span class="font-medium">Log Out</span>
                    </button>
                </form>
            </div>
        </aside>

        {{-- Main Content --}}
        <main class="flex-1 p-8">
            {{-- Header (icon notifikasi dan user) --}}
            <div class="flex justify-end mb-6 space-x-4">
                <button class="p-3 bg-white rounded-full shadow hover:bg-gray-50">
                    <i class="text-gray-600 fa-regular fa-bell"></i>
                </button>
                <button class="p-3 bg-white rounded-full shadow hover:bg-gray-50">
                    <i class="text-gray-600 fa-regular fa-user"></i>
                </button>
            </div>

            {{-- Konten dinamis --}}
            @yield('content')
        </main>
    </div>
</body>

</html>