<footer class="bg-[#0C3C6C] text-white pt-20 pb-6 px-6 md:px-12 lg:px-24 relative overflow-hidden" id="contact" data-anim="rise" data-delay="100">
    <!-- Enhanced gradient overlays -->
    <div class="absolute inset-0 pointer-events-none">
        <div class="absolute inset-0 bg-gradient-to-br from-blue-500/10 via-transparent to-blue-900/30"></div>
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_30%_20%,rgba(59,130,246,0.1),transparent_50%)]"></div>
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_70%_80%,rgba(37,99,235,0.1),transparent_50%)]"></div>
    </div>
    
    <!-- Decorative elements -->
    <div class="absolute top-10 right-10 w-72 h-72 bg-blue-400/5 rounded-full blur-3xl animate-pulse"></div>
    <div class="absolute bottom-10 left-10 w-96 h-96 bg-blue-500/5 rounded-full blur-3xl animate-pulse" style="animation-delay: 1s;"></div>

    <div class="container relative mx-auto max-w-7xl">
        
        <!-- Main Content Grid - NEW LAYOUT -->
        <div class="grid gap-12 lg:grid-cols-3 mb-16" data-anim="rise" data-delay="200">
            
            <!-- Column 1: Branding & Description -->
            <div class="lg:col-span-1 space-y-8">
                <div class="inline-block">
                    <div class="">
                        <img src="{{ asset('images/icons/logo-white.svg') }}" alt="Logo EQLAB" class="w-[130px]">
                    </div>
                </div>
                
                <div class="space-y-4">
                    <h3 class="text-xl font-bold tracking-tight">
                        <span class="bg-gradient-to-r from-white via-blue-100 to-white bg-clip-text text-transparent">
                            Platform Digital Sekolah
                        </span>
                    </h3>
                    <p class="text-white/80 leading-relaxed text-sm">
                        <span class="font-bold text-white">EQLAB.ID</span> menghubungkan siswa, guru, dan orang tua dalam satu sistem terpadu untuk aktivitas sekolah secara <span class="font-semibold text-white">online & real-time</span>.
                    </p>
                </div>

                <!-- Social Media / Quick Links -->
                <div class="pt-4">
                    <h4 class="text-xs font-semibold tracking-wider uppercase text-white/60 mb-4">Navigasi Cepat</h4>
                    <div class="flex flex-wrap gap-2">
                        @foreach (['Beranda' => '#hero', 'Tentang' => '#about', 'Fitur' => '#fitur', 'Prestasi' => '#prestasi'] as $label => $href)
                            <a href="{{ $href }}" class="px-4 py-2 text-xs font-medium text-white/80 bg-white/5 rounded-lg backdrop-blur-sm ring-1 ring-white/10 hover:bg-white/15 hover:text-white transition-all duration-300">
                                {{ $label }}
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Column 2: Contact Information -->
            <div class="lg:col-span-1 space-y-8">
                <div>
                    <h3 class="text-2xl font-bold tracking-tight mb-6 flex items-center gap-3">
                        <span class="w-1 h-8 bg-gradient-to-b from-white to-blue-200 rounded-full"></span>
                        <span class="bg-gradient-to-r from-white to-white/90 bg-clip-text text-transparent">Hubungi Kami</span>
                    </h3>
                    
                    <ul class="space-y-3">
                        <li class="group">
                            <a href="tel:+622154397462" class="flex items-center gap-4 p-4 rounded-xl bg-white/5 backdrop-blur-sm ring-1 ring-white/10 transition-all duration-300 hover:bg-white/10 hover:ring-white/20 hover:translate-x-2">
                                <div class="flex items-center justify-center w-11 h-11 rounded-xl bg-gradient-to-br from-white/20 to-white/5 ring-1 ring-white/20 group-hover:scale-110 transition-transform">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <p class="text-xs text-white/60 mb-1">Telepon</p>
                                    <p class="font-semibold text-white">+62 21 5439 7462</p>
                                </div>
                            </a>
                        </li>
                        
                        <li class="group">
                            <a href="mailto:info.smk@cintakasihtzuchi.sch.id" class="flex items-center gap-4 p-4 rounded-xl bg-white/5 backdrop-blur-sm ring-1 ring-white/10 transition-all duration-300 hover:bg-white/10 hover:ring-white/20 hover:translate-x-2">
                                <div class="flex items-center justify-center w-11 h-11 rounded-xl bg-gradient-to-br from-white/20 to-white/5 ring-1 ring-white/20 group-hover:scale-110 transition-transform">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <p class="text-xs text-white/60 mb-1">Email</p>
                                    <p class="font-semibold text-white text-sm break-all">info.smk@cintakasihtzuchi.sch.id</p>
                                </div>
                            </a>
                        </li>
                        
                        <li class="group">
                            <div class="flex items-start gap-4 p-4 rounded-xl bg-white/5 backdrop-blur-sm ring-1 ring-white/10 transition-all duration-300 hover:bg-white/10 hover:ring-white/20">
                                <div class="flex items-center justify-center w-11 h-11 rounded-xl bg-gradient-to-br from-white/20 to-white/5 ring-1 ring-white/20 group-hover:scale-110 transition-transform shrink-0">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <p class="text-xs text-white/60 mb-1">Alamat</p>
                                    <p class="font-semibold text-white text-sm leading-relaxed">SMK Cinta Kasih Tzu Chi, Jl. Kamal Raya Outer Ring Road No.20 Cengkareng, Jakarta Barat.</p>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Column 3: Map -->
            <div class="lg:col-span-1 space-y-6" data-anim="rise" data-delay="400">
                <h3 class="text-2xl font-bold tracking-tight flex items-center gap-3">
                    <span class="w-1 h-8 bg-gradient-to-b from-white to-blue-200 rounded-full"></span>
                    <span class="bg-gradient-to-r from-white to-white/90 bg-clip-text text-transparent">Lokasi Kami</span>
                </h3>
                
                <div class="relative group">
                    <div class="absolute -inset-0.5 bg-gradient-to-r from-blue-400/30 via-blue-500/30 to-blue-600/30 rounded-2xl blur-xl opacity-60 group-hover:opacity-100 transition duration-500"></div>
                    <div class="relative w-full overflow-hidden bg-white rounded-2xl shadow-2xl h-[400px] ring-1 ring-white/30">
                        <iframe src="https://www.google.com/maps/embed?pb=..." width="100%" height="100%" style="border:0" allowfullscreen loading="lazy" class="grayscale-[20%] hover:grayscale-0 transition-all duration-700"></iframe>
                    </div>
                </div>
            </div>
        </div>

        <!-- Partner Section - Repositioned -->
        <section aria-labelledby="partners" class="mb-16 pt-8 border-t border-white/10" data-anim="rise" data-delay="600">
            <div class="text-center mb-10">
                <div class="inline-flex items-center gap-4 px-6 py-2 bg-white/5 backdrop-blur-sm rounded-full ring-1 ring-white/20">
                    <div class="w-2 h-2 bg-blue-300 rounded-full animate-pulse"></div>
                    <h3 id="partners" class="text-sm font-semibold tracking-wider uppercase text-white/90">Didukung oleh Mitra Terpercaya</h3>
                    <div class="w-2 h-2 bg-blue-300 rounded-full animate-pulse"></div>
                </div>
            </div>

            <div class="flex flex-wrap items-center justify-center gap-6 md:gap-8">
                @foreach ([
                    ['infra-competition-badge.png', 'INFRA Competition'],
                    ['jagoan-hosting.png', 'Jagoan Hosting', 'https://www.jagoanhosting.com/'],
                    ['komdigi.png', 'Komdigi', 'https://komdigi.go.id'],
                    ['maspion-it.png', 'Maspion IT', 'https://www.maspionit.com'],
                    ['garuda-spark.png', 'Garuda Spark', 'https://garudaspark.id']
                ] as $partner)
                    @php [$src, $alt, $link] = array_pad($partner, 3, null); @endphp
                    <a href="{{ $link ?? '#' }}" target="_blank" class="group" data-anim="pop" data-delay="700">
                        <div class="relative rounded-2xl bg-white/95 backdrop-blur-sm px-6 py-4 shadow-lg ring-1 ring-white/30 transition-all duration-300 group-hover:shadow-2xl group-hover:scale-110 group-hover:bg-white group-hover:-translate-y-2">
                            <div class="absolute inset-0 bg-gradient-to-br from-blue-50/50 to-transparent rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity"></div>
                            <img src="{{ asset('images/partners/'.$src) }}" alt="{{ $alt }}" class="relative object-contain w-auto h-14 md:h-16">
                        </div>
                    </a>
                @endforeach
            </div>
        </section>

        <!-- Bottom Bar -->
        <div class="pt-8 border-t border-white/10">
            <div class="flex flex-col-reverse md:flex-row items-center justify-between gap-6">
                <!-- Copyright -->
                <div class="flex items-center gap-8">
                    <p class="text-sm text-white/70">
                        © 2025 <span class="font-bold text-white">EQLAB.id</span>
                    </p>
                    <div class="hidden md:flex items-center gap-4 text-xs text-white/50">
                        <a href="#" class="hover:text-white transition">Privacy Policy</a>
                        <span>•</span>
                        <a href="#" class="hover:text-white transition">Terms of Service</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>