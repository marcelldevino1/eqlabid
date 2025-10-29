<footer class="bg-[#0C3C6C] text-white pt-24 pb-10 px-6 md:px-12 lg:px-24 relative overflow-hidden" id="contact">
    <div class="absolute inset-0 pointer-events-none bg-gradient-to-t from-blue-900/40 to-transparent"></div>

    <div class="container relative mx-auto">

        <!-- STRIP LOGO PENYELENGGARA / PARTNER -->
        <section aria-labelledby="partners" class="mb-10">
            <div class="flex items-center justify-between gap-3 mb-5">
                <h3 id="partners" class="text-base font-semibold tracking-wide text-white/90">Didukung oleh</h3>
                <div class="flex-1 h-px bg-white/20"></div>
            </div>

            <div class="flex flex-wrap items-center justify-center gap-4 md:gap-6">
                <!-- INFRA Competition (ukuran disamakan) -->
                <div
                    class="px-3 py-2 shadow-sm rounded-xl bg-white/80 backdrop-blur-sm ring-1 ring-white/10 transition hover:scale-[1.02] hover:shadow-md">
                    <img src="{{ asset('images/partners/infra-competition-badge.png') }}"
                        alt="INFRA Competition by Jagoan Hosting" class="object-contain w-auto h-12 md:h-14">
                </div>

                <!-- Divider vertikal -->
                <span aria-hidden="true" class="hidden w-px h-12 md:h-14 bg-white/25 md:inline-block"></span>

                <!-- Jagoan Hosting -->
                <a href="https://www.jagoanhosting.com/" target="_blank" rel="noopener" class="group">
                    <div
                        class="rounded-xl bg-white/80 backdrop-blur-sm px-3 py-2 shadow-sm ring-1 ring-white/10 transition group-hover:shadow-md group-hover:scale-[1.02]">
                        <img src="{{ asset('images/partners/jagoan-hosting.png') }}" alt="Jagoan Hosting"
                            class="object-contain w-auto h-12 md:h-14">
                    </div>
                </a>

                <!-- Komdigi -->
                <a href="https://komdigi.go.id" target="_blank" rel="noopener" class="group">
                    <div
                        class="rounded-xl bg-white/80 backdrop-blur-sm px-3 py-2 shadow-sm ring-1 ring-white/10 transition group-hover:shadow-md group-hover:scale-[1.02]">
                        <img src="{{ asset('images/partners/komdigi.png') }}" alt="Komdigi"
                            class="object-contain w-auto h-12 md:h-14">
                    </div>
                </a>

                <!-- Maspion IT -->
                <a href="https://www.maspionit.com" target="_blank" rel="noopener" class="group">
                    <div
                        class="rounded-xl bg-white/80 backdrop-blur-sm px-3 py-2 shadow-sm ring-1 ring-white/10 transition group-hover:shadow-md group-hover:scale-[1.02]">
                        <img src="{{ asset('images/partners/maspion-it.png') }}" alt="Maspion IT"
                            class="object-contain w-auto h-12 md:h-14">
                    </div>
                </a>

                <!-- Garuda Spark -->
                <a href="https://garudaspark.id" target="_blank" rel="noopener" class="group">
                    <div
                        class="rounded-xl bg-white/80 backdrop-blur-sm px-3 py-2 shadow-sm ring-1 ring-white/10 transition group-hover:shadow-md group-hover:scale-[1.02]">
                        <img src="{{ asset('images/partners/garuda-spark.png') }}" alt="Garuda Spark Innovation Hub"
                            class="object-contain w-auto h-12 md:h-14">
                    </div>
                </a>
            </div>
        </section>

        <!-- BLOK KONTEN FOOTER -->
        <div class="flex flex-col justify-between gap-12 lg:flex-row">
            <!-- Kiri: logo & kontak -->
            <div class="flex-1 pt-2 space-y-6 lg:order-1">
                <div class="space-y-5">
                    <div class="flex items-center space-x-3">
                        <img src="{{ asset('images/icons/logo-white.svg') }}" alt="Logo EQLAB" class="w-[100px]">
                    </div>
                    <p class="max-w-lg leading-relaxed text-white/80">
                        EQLAB.ID adalah platform digital sekolah yang menghubungkan siswa, guru,
                        dan orang tua dalam satu sistem terpadu. Semua aktivitas sekolah kini bisa
                        dilakukan secara <span class="font-semibold text-white">online & real-time</span>.
                    </p>
                </div>

                <h3 class="pt-2 text-xl font-semibold md:text-2xl">Hubungi Kami</h3>
                <!-- Telepon -->
                <div class="flex items-center gap-3">
                    <!-- phone -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 w-5 h-5" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                            d="M2.25 6.75a2.25 2.25 0 012.25-2.25h1.5a1.5 1.5 0 011.5 1.5v2.25a1.5 1.5 0 01-.44 1.06l-1.06 1.06a.75.75 0 000 1.06l4.5 4.5a.75.75 0 001.06 0l1.06-1.06a1.5 1.5 0 011.06-.44h2.25a1.5 1.5 0 011.5 1.5v1.5a2.25 2.25 0 01-2.25 2.25H17.5c-9.113 0-15.25-6.137-15.25-15.25V6.75z" />
                    </svg>
                    <a href="tel:+622154397462" class="hover:underline">+62 21 5439 7462</a>
                </div>

                <!-- Email -->
                <div class="flex items-center gap-3">
                    <!-- envelope -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 w-5 h-5" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                            d="M21.75 7.5v9a2.25 2.25 0 01-2.25 2.25H4.5A2.25 2.25 0 012.25 16.5v-9A2.25 2.25 0 014.5 5.25h15a2.25 2.25 0 012.25 2.25z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                            d="M3 7.5l8.39 5.59a1.5 1.5 0 001.72 0L21.5 7.5" />
                    </svg>
                    <a href="mailto:info.smk@cintakasihtzuchi.sch.id"
                        class="hover:underline">info.smk@cintakasihtzuchi.sch.id</a>
                </div>

                <!-- Alamat -->
                <div class="flex items-start gap-3">
                    <!-- map-pin -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 w-5 h-5" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                            d="M12 21s7-5.373 7-11a7 7 0 10-14 0c0 5.627 7 11 7 11z" />
                        <circle cx="12" cy="10" r="2.5" stroke-width="1.8" />
                    </svg>
                    <span class="text-white/80">
                        SMK Cinta Kasih Tzu Chi, Jl. Kamal Raya Outer Ring Road No.20 Cengkareng, Jakarta Barat.
                    </span>
                </div>
            </div>

            <!-- Kanan: peta -->
            <div class="flex-1 lg:order-2">
                <h3 class="mb-4 text-xl font-semibold md:text-2xl">Lokasi Kami</h3>
                <div class="w-full overflow-hidden bg-white rounded-lg shadow-2xl h-80">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3967.114705572887!2d106.71185507504386!3d-6.112282393874314!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f886d9a8a709%3A0xc6659c2ef50058b8!2sSMK%20Cinta%20Kasih%20Tzu%20Chi!5e0!3m2!1sen!2sid!4v1700000000000!5m2!1sen!2sid"
                        width="100%" height="100%" style="border:0" allowfullscreen loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>
        </div>

        <div class="relative my-10 border-t border-white/20"></div>

        <!-- Menu footer -->
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

        <!-- Bar bawah -->
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