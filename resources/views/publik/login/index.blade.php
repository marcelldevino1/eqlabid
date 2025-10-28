<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Masuk | EQLAB.id</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="flex items-center justify-center min-h-screen bg-white">

    <div class="grid items-center w-full max-w-6xl grid-cols-1 mx-auto lg:grid-cols-2">

        <!-- Bagian Kiri (Ilustrasi) -->
        <div class="relative flex items-center justify-center p-6">
            <img src="your-illustration.png" alt="Ilustrasi" class="w-[85%] max-w-md">
            <!-- ganti 'your-illustration.png' dengan path gambar pohon dan anak -->
        </div>

        <!-- Bagian Kanan (Form Login) -->
        <div class="relative bg-[#0C3C6C] text-white rounded-l-[100px] px-12 py-16 flex flex-col justify-center">
            <div class="w-full max-w-sm mx-auto">
                <h2 class="mb-8 text-4xl font-extrabold">Masuk</h2>

                <form action="#" method="POST" class="space-y-5">
                    <!-- Email -->
                    <div>
                        <label class="block mb-1 text-sm font-medium">Email</label>
                        <input type="text" placeholder="Masukan Email anda"
                            class="w-full px-4 py-3 rounded-full text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-[#1E90FF]" />
                    </div>

                    <!-- Kata Sandi -->
                    <div>
                        <label class="block mb-1 text-sm font-medium">Kata Sandi</label>
                        <input type="password" placeholder="Masukan kata sandi anda"
                            class="w-full px-4 py-3 rounded-full text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-[#1E90FF]" />
                    </div>

                    <div class="flex justify-end text-sm">
                        <a href="#" class="text-gray-300 hover:text-white">Lupa kata sandi?</a>
                    </div>

                    <!-- Tombol Masuk -->
                    <button type="submit"
                        class="w-full bg-white text-[#0C3C6C] font-semibold py-3 rounded-full hover:bg-gray-100 transition">
                        Masuk Sekarang
                    </button>

                    <p class="mt-3 text-sm text-center text-white">
                        Belum punya akun?
                        <a href="#" class="text-[#36C2CE] font-medium hover:underline">Daftar Sekarang</a>
                    </p>
                </form>
            </div>
        </div>
    </div>

</body>

</html>