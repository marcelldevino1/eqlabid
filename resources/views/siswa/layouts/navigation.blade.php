<aside class="flex flex-col justify-between w-20 bg-white shadow-lg">
    <div>
        <div class="p-4">
            <img src="{{ asset('images/icons/logo-white.svg') }}" alt="Logo" class="w-10 mx-auto">
        </div>

        <nav class="flex flex-col items-center mt-10 space-y-6">
            <a href="{{ route('siswa.dashboard') }}"
                class="p-2 bg-[#001b9a] rounded-xl text-white hover:bg-[#001b9a]/80 transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                        d="M3 12l2-2m0 0l7-7 7 7M13 5v6h6" />
                </svg>
            </a>
            <a href="#" class="p-2 hover:bg-[#001b9a]/20 rounded-xl text-gray-600">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                        d="M7 8h10M7 12h10m-7 4h7" />
                </svg>
            </a>
            <a href="#" class="p-2 hover:bg-[#001b9a]/20 rounded-xl text-gray-600">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                        d="M12 20h9" />
                </svg>
            </a>
        </nav>
    </div>

    {{-- Logout --}}
    <form method="POST" action="{{ route('logout') }}" class="p-4">
        @csrf
        <button type="submit"
            class="flex items-center justify-center w-full p-2 text-white bg-red-500 rounded-lg hover:bg-red-600">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h6a2 2 0 012 2v1" />
            </svg>
        </button>
    </form>
</aside>
