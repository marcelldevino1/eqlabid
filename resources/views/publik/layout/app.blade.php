<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/svg+xml" href="{{ asset('images/icons/logo-white.svg') }}">
    <title>EQLAB.id</title>
    @vite('resources/css/app.css')
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
    tetsing

    <main class="overflow-hidden bg-white">
        @yield('content')
    </main>

    <script>
document.addEventListener("DOMContentLoaded", () => {
  const observer = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          const el = entry.target;
          const anim = el.dataset.anim;
          const delay = el.dataset.delay || 0;
          el.classList.add(`animate-${anim}`);
          if (delay) el.style.animationDelay = `${delay}ms`;
          observer.unobserve(el);
        }
      });
    },
    { threshold: 0.15 } // muncul 15% dari tinggi elemen
  );

  document.querySelectorAll("[data-anim]").forEach((el) => observer.observe(el));
});
</script>

</body>

</html>