<x-guest-layout>
    <div class="relative flex flex-col items-center justify-center min-h-screen bg-white">
        <!-- 🔙 Tombol Back -->
        <a href="{{ url('/login') }}"
            class="absolute flex items-center gap-2 px-3 py-2 text-sm font-medium text-[#0C3C6C] top-6 left-6 hover:text-[#0a3056] transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                stroke="currentColor" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
            </svg>
            Kembali
        </a>

        <!-- 🧩 Card Form -->
        <div class="w-full max-w-md p-8 space-y-6 bg-white border border-gray-100 shadow-lg rounded-2xl">
            <h2 class="text-4xl font-semibold text-center" style="color: #0C3C6C;">
                Lupa Password
            </h2>
            <p class="mb-4 text-sm text-center text-gray-600">
                Jangan khawatir! Masukkan email kamu untuk mendapatkan panduan reset password.
            </p>

            {{-- FORM EMAIL --}}
            <form method="POST" action="{{ route('password.email') }}" id="forgotForm">
                @csrf
                <div class="mb-5">
                    <label for="email" class="block text-sm font-medium text-gray-700">Alamat Email</label>
                    <input id="email" name="email" type="email"
                        class="w-full p-3 mt-1 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#0C3C6C] focus:outline-none"
                        placeholder="contoh: user@gmail.com" required />
                </div>

                <button type="submit"
                    class="w-full py-2 font-semibold text-white transition rounded-lg shadow-md hover:opacity-90"
                    style="background-color: #0C3C6C;">
                    Kirim Permintaan Reset
                </button>
            </form>
        </div>
    </div>

    {{-- 🔔 SWEETALERT SECTION --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- Setelah user klik submit --}}
    @if (session('status'))
        <script>
            Swal.fire({
                icon: 'info',
                title: 'Permintaan Dikirim!',
                text: 'Tunggu informasi dari admin / tata usaha di email kamu.',
                confirmButtonText: 'Oke',
                confirmButtonColor: '#0C3C6C'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "{{ url('/login') }}";
                }
            });
        </script>
    @endif
</x-guest-layout>
