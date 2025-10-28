<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/svg+xml" href="{{ asset('images/icons/logo-white.svg') }}">
    <title>EQLAB.id</title>
    @vite('resources/css/app.css')
    <script src="http://eqlabid.jh-beon.cloud/build/assets/app-CXDpL9bK.js"></script>">
    <style>
        /* Efek garis bawah dan warna aktif pas diklik */
        .active-link {
            color: #0C3C6C !important;
            font-weight: 600 !important;
            position: relative;
        }

        .active-link::after {
            content: "";
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 2px;
            background-color: #0C3C6C;
            opacity: 1;
            transition: opacity 0.3s ease;
        }

        /* Fade out pas efek hilang */
        .fade-out::after {
            opacity: 0 !important;
        }
    </style>
</head>

<body class="text-gray-800 bg-white">

    <nav id="navbar" class="fixed top-0 left-0 z-50 w-full transition-all duration-300 bg-white shadow-md">
        <div class="container flex items-center justify-between px-6 py-4 mx-auto">
            <a href="/" class="flex items-center space-x-2">
                <img src="{{ asset('images/icons/logo.svg') }}" alt="Logo" class="w-auto h-10">
            </a>

            <ul id="nav-links" class="hidden space-x-8 font-medium text-gray-700 md:flex">
                <li><a href="#hero" class="nav-item">Beranda</a></li>
                <li><a href="#about" class="nav-item">Tentang</a></li>
                <li><a href="#fitur" class="nav-item">Fitur</a></li>
                <li><a href="#prestasi" class="nav-item">Prestasi</a></li>
                <li><a href="#berita" class="nav-item">Berita</a></li>
                <li><a href="#contact" class="nav-item">Kontak</a></li>
            </ul>

            <div class="hidden space-x-3 md:flex">
                @guest
                    <a href="{{ route('login') }}"
                        class="px-5 py-2 font-medium text-white transition rounded-md bg-[#0C3C6C] hover:bg-[#092e54]">Masuk</a>
                    <a href="{{ url('/#daftar') }}"
                        class="px-5 py-2 font-medium text-[#0C3C6C] transition border border-[#0C3C6C] rounded-md hover:bg-[#0C3C6C] hover:text-white">Daftar</a>
                @endguest

                @auth
                    <a href="{{ route('dashboard') }}"
                        class="px-5 py-2 font-medium text-[#0C3C6C] transition border border-[#0C3C6C] rounded-md hover:bg-[#0C3C6C] hover:text-white">Dasbor</a>
                @endauth
            </div>

            <button id="menu-btn"
                class="relative z-50 flex flex-col justify-between w-6 h-5 focus:outline-none md:hidden">
                <span
                    class="block w-full h-[2px] bg-[#0C3C6C] transition-all duration-300 transform origin-left"></span>
                <span class="block w-full h-[2px] bg-[#0C3C6C] transition-all duration-300"></span>
                <span
                    class="block w-full h-[2px] bg-[#0C3C6C] transition-all duration-300 transform origin-left"></span>
            </button>
        </div>

        <div id="menu"
            class="absolute left-0 z-40 hidden w-full py-4 space-y-4 bg-white border-t shadow-md top-full md:hidden">
            <a href="#hero"
                class="block px-6 font-medium text-gray-700 transition hover:text-[#0C3C6C] mobile-nav-item">Beranda</a>
            <a href="#about"
                class="block px-6 font-medium text-gray-700 transition hover:text-[#0C3C6C] mobile-nav-item">Tentang</a>
            <a href="#fitur"
                class="block px-6 font-medium text-gray-700 transition hover:text-[#0C3C6C] mobile-nav-item">Fitur</a>
            <a href="#prestasi"
                class="block px-6 font-medium text-gray-700 transition hover:text-[#0C3C6C] mobile-nav-item">Prestasi</a>
            <a href="#berita"
                class="block px-6 font-medium text-gray-700 transition hover:text-[#0C3C6C] mobile-nav-item">Berita</a>
            <a href="#contact"
                class="block px-6 font-medium text-gray-700 transition hover:text-[#0C3C6C] mobile-nav-item">Kontak</a>

            <div class="px-6">
                @guest
                    <div class="flex flex-col pt-2 space-y-2 border-t">
                        <a href="{{ route('login') }}"
                            class="w-full px-4 py-2 font-medium text-center text-white transition bg-[#0C3C6C] rounded-md hover:bg-[#092e54]">Masuk</a>
                        <a href="{{ url('/#daftar') }}"
                            class="w-full px-4 py-2 font-medium text-center text-[#0C3C6C] transition border border-[#0C3C6C] rounded-md hover:bg-[#0C3C6C] hover:text-white">Daftar</a>
                    </div>
                @endguest

                @auth
                    <a href="{{ route('dashboard') }}"
                        class="w-full px-4 py-2 font-medium text-center text-[#0C3C6C] transition border border-[#0C3C6C] rounded-md hover:bg-[#0C3C6C] hover:text-white">Dasbor</a>
                @endauth
            </div>
        </div>
    </nav>

    <main class="overflow-hidden bg-white">
        @yield('content')
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const menuBtn = document.getElementById("menu-btn");
            const menu = document.getElementById("menu");
            const desktopNavLinks = document.querySelectorAll("#nav-links a.nav-item");
            const mobileNavLinks = document.querySelectorAll("#menu a.mobile-nav-item");
            let menuOpen = false;

            // --- Toggle Menu Mobile ---
            menuBtn.addEventListener("click", () => {
                menu.classList.toggle("hidden");
                menuOpen = !menuOpen;

                const spans = menuBtn.querySelectorAll("span");
                if (menuOpen) {
                    spans[0].classList.add("rotate-45", "translate-y-[10px]");
                    spans[1].classList.add("opacity-0");
                    spans[2].classList.add("-rotate-45", "-translate-y-[10px]");
                } else {
                    spans.forEach(s => s.classList.remove("rotate-45", "translate-y-[10px]", "opacity-0", "-rotate-45", "-translate-y-[10px]"));
                }
            });

            // --- Tutup menu kalau klik di luar ---
            document.addEventListener("click", (e) => {
                if (menuOpen && !menu.contains(e.target) && !menuBtn.contains(e.target)) {
                    menu.classList.add("hidden");
                    menuOpen = false;
                    const spans = menuBtn.querySelectorAll("span");
                    spans.forEach(s => s.classList.remove("rotate-45", "translate-y-[10px]", "opacity-0", "-rotate-45", "-translate-y-[10px]"));
                }
            });

            // --- Tambah efek hover + garis bawah animasi ---
            desktopNavLinks.forEach(link => {
                const underline = document.createElement("span");
                underline.classList.add(
                    "nav-underline",
                    "absolute",
                    "bottom-0",
                    "left-0",
                    "h-[2px]",
                    "bg-[#0C3C6C]",
                    "transition-all",
                    "duration-300"
                );
                underline.style.width = "0";
                underline.style.transformOrigin = "left";
                link.classList.add("relative", "pb-1", "transition", "text-gray-700", "hover:text-[#0C3C6C]");
                link.appendChild(underline);

                link.addEventListener("mouseenter", () => {
                    underline.style.width = "100%";
                    underline.style.transformOrigin = "left"; // muncul dari kiri
                });

                link.addEventListener("mouseleave", () => {
                    underline.style.width = "0";
                    underline.style.transformOrigin = "right"; // hilang ke kanan
                });

                // --- Klik efek aktif sementara ---
                link.addEventListener("click", () => {
                    link.classList.remove("text-gray-700");
                    link.classList.add("text-[#0C3C6C]", "font-semibold");
                    underline.style.width = "100%";
                    underline.style.transformOrigin = "left";

                    // Setelah 2 detik, kembali ke semula (abu-abu & garis hilang dari kanan)
                    setTimeout(() => {
                        link.classList.remove("text-[#0C3C6C]", "font-semibold");
                        link.classList.add("text-gray-700");
                        underline.style.transformOrigin = "right";
                        underline.style.width = "0";
                    }, 2000);
                });
            });

            // --- Tutup menu mobile pas klik ---
            [...mobileNavLinks].forEach(link => {
                link.addEventListener("click", () => {
                    if (window.innerWidth < 768 && menuOpen) {
                        menu.classList.add("hidden");
                        menuOpen = false;
                        menuBtn.querySelectorAll("span").forEach(s =>
                            s.classList.remove("rotate-45", "translate-y-[10px]", "opacity-0", "-rotate-45", "-translate-y-[10px]")
                        );
                    }
                });
            });
        });
    </script>


</body>

</html>