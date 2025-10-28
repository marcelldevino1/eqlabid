{{-- Logo --}}
<div class="w-full mb-12">
    <div class="flex items-center">
        <div class="flex items-center justify-center flex-shrink-0 w-12 h-12 rounded-lg">
            <img src="{{ asset('images/icons/icon.png') }}" alt="Logo" class="object-contain w-8 h-8">
        </div>
        <div class="ml-3 logo-text">
            <div class="text-lg font-bold text-[#0C3C6C]">EQLAB.id</div>
            <div class="text-xs text-gray-500">Dashboard</div>
        </div>
    </div>
</div>


{{-- Menu --}}
<nav class="flex flex-col flex-1 w-full gap-3 overflow-y-auto">
    @include('dashboard.menu') <!-- ini isinya cuma tombol/menu -->
</nav>

{{-- Logout --}}
<form method="POST" action="{{ route('logout') }}" class="w-full mt-auto">
    @csrf
    <button type="submit"
        class="flex items-center w-full px-3 py-3 text-white transition-colors bg-red-500 rounded-lg hover:bg-red-600">
        <svg class="flex-shrink-0 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4M16 17l5-5-5-5M21 12H9"
                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
        </svg>
        <span class="font-medium nav-text">Log Out</span>
    </button>
</form>
