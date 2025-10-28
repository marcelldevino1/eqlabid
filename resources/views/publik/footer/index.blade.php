<footer class="bg-[#0C3C6C] text-white pt-16 pb-10 px-6 md:px-12 lg:px-24 relative overflow-hidden" id="contact">
    <div class="absolute inset-0 pointer-events-none bg-gradient-to-t from-blue-900/40 to-transparent"></div>

    <div class="container relative mx-auto">

        <div class="flex flex-col justify-between gap-12 lg:flex-row">

            <div class="flex-1 pt-10 space-y-6 lg:order-1">
                {{-- Logo dan Deskripsi EQLAB --}}
                <div class="space-y-5">
                    <div class="flex items-center space-x-3">
                        <img src="{{ asset('images/icons/logo-white.svg') }}" alt="Logo EQLAB" class="w-[100px]">
                    </div>
                    <p class="max-w-lg leading-relaxed text-white/80">
                        EQLAB.ID adalah platform digital sekolah yang menghubungkan siswa, guru,
                        dan orang tua dalam satu sistem terpadu. Semua aktivitas sekolah kini bisa
                        dilakukan secara <span class="font-semibold text-[#ffffff]">online & real-time</span>.
                    </p>
                </div>

                <h3 class="pt-6 text-xl font-semibold md:text-2xl">Hubungi Kami</h3>
                <div class="space-y-4 text-white/90">

                    {{-- Kontak Telepon --}}
                    <div class="flex items-center space-x-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 w-5 h-5 text-white" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 5h2l3.6 7.59-1.35 2.45A1 1 0 008 17h8a1 1 0 00.95-.68L21 7H6" />
                        </svg>
                        <a href="tel:+622154397462" class="hover:underline">
                            +62 21 5439 7462
                        </a>
                    </div>

                    {{-- Kontak Email --}}
                    <div class="flex items-center space-x-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 w-5 h-5 text-white" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12H8m0 0l4-4m-4 4l4 4" />
                        </svg>
                        <a href="mailto:info.smk@cintakasihtzuchi.sch.id" class="hover:underline">
                            info.smk@cintakasihtzuchi.sch.id
                        </a>
                    </div>

                    {{-- Kontak Alamat --}}
                    <div class="flex items-start space-x-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 w-5 h-5 text-white" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17.657 16.657L13.414 12l4.243-4.243m-4.243 8.485L8.586 12l4.243-4.243m4.243 8.485L20 12l-3.657-3.657M4 6h16M4 18h16" />
                        </svg>
                        <span class="text-white/80">SMK Cinta Kasih Tzu Chi, Jl. Kamal Raya Outer Ring Road No.20 Cengkareng, Jakarta Barat.</span>
                    </div>
                </div>
            </div>

            <div class="flex-1 lg:order-2">
                <h3 class="mb-4 text-xl font-semibold md:text-2xl">Lokasi Kami</h3>
                <div class="w-full overflow-hidden bg-white rounded-lg shadow-2xl h-80">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3967.114705572887!2d106.71185507504386!3d-6.112282393874314!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f886d9a8a709%3A0xc6659c2ef50058b8!2sSMK%20Cinta%20Kasih%20Tzu%20Chi!5e0!3m2!1sen!2sid!4v1700000000000!5m2!1sen!2sid"
                        width="100%"
                        height="100%"
                        style="border:0;"
                        allowfullscreen=""
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>

        </div>

        <div class="relative my-10 border-t border-white/20"></div>

        <div class="flex-1 space-y-5">
            <ul class="flex flex-wrap gap-x-8 gap-y-3 text-white/80">
                <li><a href="#hero" class="transition hover:text-white">Beranda</a></li>
                <li><a href="#about" class="transition hover:text-white">Tentang Kami</a></li>
                <li><a href="#fitur" class="transition hover:text-white">Fitur</a></li>
                <li><a href="#prestasi" class="transition hover:text-white">Prestasi</a></li>
                <li><a href="#berita" class="transition hover:text-white">Berita</a></li>
                <li><a href="#kontak" class="transition hover:text-white">Kontak</a></li>
            </ul>
        </div>

        <div class="relative my-10 border-t border-white/20"></div>

        <div class="relative flex flex-col items-center justify-between gap-6 md:flex-row">

            <p class="order-2 text-sm text-white/70 md:order-1">
                © 2025 <span class="font-semibold text-white">EQLAB.id</span> — Semua Hak Dilindungi.
            </p>

             <div class="order-1 text-sm text-white/70 md:order-2">
                <a href="/login" class="font-semibold transition hover:text-white">Masuk (Admin)</a>
            </div>
        </div>
    </div>
</footer>
