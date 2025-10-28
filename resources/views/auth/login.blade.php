<x-guest-layout>
    <div class="relative flex flex-col justify-center min-h-screen overflow-hidden md:flex-row">
        <!-- === Background utama === -->
        <div class="absolute inset-0 bg-no-repeat bg-cover bg-[center_bottom] md:bg-[20vw_center]"
            style="background-image: url('{{ asset('images/publik/background/login-right.svg') }}');"></div>

        <!-- === Bagian kiri (ilustrasi + tombol kembali) === -->
        <div class="relative z-20 items-center justify-center hidden w-full text-white md:w-1/2 md:flex">
            <!-- Tombol Kembali -->
            <a href="{{ url('/') }}"
                class="absolute flex items-center gap-2 transition-colors top-6 left-6 text-[#0C3C6C] hover:text-[#0a3056]">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                    stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                </svg>
                <span class="font-medium">Kembali</span>
            </a>

            <!-- Ilustrasi -->
            <img src="{{ asset('images/publik/background/login-ilustrasi.svg') }}" alt="Login Illustration"
                class="w-3/4 max-w-md">
        </div>

        <!-- === Bagian kanan (form login) === -->
        <div class="relative z-30 flex items-center justify-center w-full px-6 py-16 md:w-1/2 sm:py-24">
            <div
                class="w-full max-w-md p-8 shadow-lg rounded-2xl bg-white/10 backdrop-blur-md md:bg-transparent md:backdrop-blur-none md:shadow-none">

                <!-- Judul -->
                <h2 class="mb-8 text-3xl font-bold text-center text-white md:text-left">
                    Masuk
                </h2>

                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <!-- Form -->
                <form method="POST" action="{{ route('login') }}" class="space-y-5">
                    @csrf

                    <!-- Email / NIS / NIP -->
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-white">
                            Email
                        </label>
                        <input id="email" name="email" type="text" value="{{ old('email') }}" required autofocus
                            placeholder="Masukkan Email Anda"
                            class="w-full px-4 py-2.5 border border-gray-300 rounded-full outline-none focus:ring-2 focus:ring-[#0C3C6C] focus:border-[#0C3C6C] text-sm" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-400" />
                    </div>

                    <!-- Password -->
                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium text-white">
                            Kata Sandi
                        </label>
                        <input id="password" name="password" type="password" required
                            placeholder="Masukkan Kata Sandi Anda"
                            class="w-full px-4 py-2.5 border border-gray-300 rounded-full outline-none focus:ring-2 focus:ring-[#0C3C6C] focus:border-[#0C3C6C] text-sm" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-400" />

                        @if (Route::has('password.request'))
                            <div class="mt-2 text-xs font-medium text-right text-gray-200">
                                <a href="{{ route('password.request') }}" class="hover:underline hover:text-cyan-300">
                                    Lupa kata sandi?
                                </a>
                            </div>
                        @endif
                    </div>

                    <!-- Tombol Submit -->
                    <button type="submit"
                        class="w-full px-4 py-2.5 font-semibold text-sm text-[#0C3C6C] bg-white rounded-full shadow hover:bg-gray-100 transition-all">
                        Masuk Sekarang
                    </button>
                </form>

                <!-- Link Daftar -->
                <p class="mt-3 text-sm text-center text-white">
                    Belum punya akun?
                    <a href="{{ url('/#daftar') }}" class="text-[#36C2CE] font-medium hover:underline">
                        Daftar Sekarang
                    </a>
                </p>
            </div>
        </div>
    </div>
</x-guest-layout>