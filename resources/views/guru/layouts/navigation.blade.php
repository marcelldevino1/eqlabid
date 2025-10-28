<nav class="flex flex-col items-center justify-between w-20 py-6 bg-white shadow-lg">
    <div class="space-y-8">
        {{-- Logo --}}
        <div class="flex flex-col items-center">
            <img src="{{ asset('images/icons/logo-white.svg') }}" alt="Logo" class="w-10 h-10 mb-4">
            <p class="text-xs text-[#001b9a] font-bold">EQLAB.id</p>
        </div>

        {{-- Navigation Icons --}}
        <div class="flex flex-col mt-8 space-y-6">
            <a href="{{ route('siswa.dashboard') }}" class="p-3 rounded-xl hover:bg-[#001b9a] hover:text-white {{ request()->routeIs('siswa.dashboard') ? 'bg-[#001b9a] text-white' : 'text-[#001b9a]' }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                        d="M3 9.75l9-6 9 6M4.5 10.5v10.125A1.125 1.125 0 005.625 21.75h12.75A1.125 1.125 0 0019.5 20.625V10.5M8.25 21.75v-6.375a.375.375 0 01.375-.375h6.75a.375.375 0 01.375.375V21.75" />
                </svg>
            </a>

            <a href="#" class="p-3 rounded-xl text-[#001b9a] hover:bg-[#001b9a] hover:text-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                        d="M9 12h6m2 8H7a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v12a2 2 0 01-2 2z" />
                </svg>
            </a>

            <a href="#" class="p-3 rounded-xl text-[#001b9a] hover:bg-[#001b9a] hover:text-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                        d="M8 12h.01M12 12h.01M16 12h.01M9 16h6m-3 4a9 9 0 100-18 9 9 0 000 18z" />
                </svg>
            </a>
        </div>
    </div>

    {{-- Logout --}}
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="flex items-center justify-center p-3 text-white bg-red-600 rounded-xl hover:bg-red-700">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1m0-10V5m0 6a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
        </button>
    </form>
</nav>
