 <section class="min-h-screen py-12 lg:py-20 bg-gray-50">
        <div class="container max-w-6xl px-4 mx-auto sm:px-8">
            
            <!-- Breadcrumb -->
            <nav class="mb-8 text-sm font-medium text-gray-500" aria-label="Breadcrumb">
                <a href="/" class="transition hover:text-[#0C3C6C]">Beranda</a> 
                <span class="mx-2 text-gray-400">/</span> 
                <a href="{{ route('publik.berita.index') }}" class="transition hover:text-[#0C3C6C]">Berita</a>
                <span class="mx-2 text-gray-400">/</span>
                <span class="text-[#0C3C6C] font-semibold truncate max-w-xs block sm:inline">
                    {{ \Illuminate\Support\Str::limit($berita->judul, 40) }}
                </span>
            </nav>

            <div class="grid grid-cols-1 gap-10 lg:grid-cols-4 lg:gap-14">
                
                {{-- === Konten Utama Berita (3/4 Kolom) === --}}
                <div class="lg:col-span-3">
                    
                    <!-- Judul -->
                    <h1 class="mb-4 text-3xl font-extrabold leading-snug text-gray-900 md:text-5xl">
                        {{ $berita->judul }}
                    </h1>
                    
                    <!-- Meta Info (Tanggal & Kategori) -->
                    <div class="flex flex-wrap items-center pb-4 mb-10 border-b border-gray-200">
                        <p class="flex items-center text-sm font-medium text-gray-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2 text-[#0C3C6C]" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            <span class="text-xs sm:text-sm">
                                Dipublikasikan: {{ \Carbon\Carbon::parse($berita->created_at)->translatedFormat('l, d F Y') }}
                            </span>
                        </p>
                        @if ($berita->kategori)
                            <span class="mt-2 sm:mt-0 ml-0 sm:ml-4 px-3 py-0.5 text-xs font-bold rounded-full bg-[#0C3C6C] text-white shadow-md">
                                {{ $berita->kategori }}
                            </span>
                        @endif
                    </div>
                    
                    <!-- Gambar Utama -->
                    <div class="mb-12 overflow-hidden transition-shadow duration-300 shadow-2xl rounded-xl">
                        <img src="{{ asset('storage/' . $berita->foto) }}" alt="Foto {{ $berita->judul }}"
                            class="object-cover w-full h-auto max-h-[550px]">
                    </div>

                    <!-- Konten Berita -->
                    <div class="p-6 bg-white border border-gray-100 shadow-xl sm:p-8 rounded-2xl">
                        <div class="space-y-6 leading-relaxed prose prose-lg text-gray-800 max-w-none lg:prose-xl">
                            {{-- Konten berita yang sudah di-render HTML --}}
                            {!! $berita->konten !!} 
                        </div>
                    </div>

                </div>

                {{-- === Sidebar (1/4 Kolom) === --}}
                <div class="lg:col-span-1">
                    <div class="sticky p-6 bg-white border border-gray-100 shadow-xl top-8 rounded-2xl">
                        <h3 class="mb-5 text-lg font-bold text-[#0C3C6C] pb-3 border-b-2 border-[#0C3C6C]/30">
                            Berita Terkini
                        </h3>
                        
                        {{-- Daftar Berita Terbaru --}}
                        @php
                            // Asumsi Anda mengirim variabel $beritaTerbaru dari Controller
                            $beritaTerbaru = $beritaTerbaru ?? []; 
                        @endphp

                        <div class="space-y-4">
                            @forelse ($beritaTerbaru as $terbaru)
                                <a href="{{ route('publik.berita.show', $terbaru->slug) }}" class="flex items-start p-3 -mx-3 transition duration-200 rounded-lg group hover:bg-blue-50/70">
                                    <img src="{{ asset('storage/' . $terbaru->foto) }}" alt="{{ $terbaru->judul }}" class="flex-shrink-0 object-cover w-16 h-16 mr-4 rounded-lg shadow-sm">
                                    <div>
                                        <h4 class="text-sm font-semibold leading-snug text-gray-800 transition group-hover:text-blue-700">
                                            {{ \Illuminate\Support\Str::limit($terbaru->judul, 50) }}
                                        </h4>
                                        <p class="mt-1 text-xs text-gray-500">
                                            {{ \Carbon\Carbon::parse($terbaru->created_at)->translatedFormat('d M Y') }}
                                        </p>
                                    </div>
                                </a>
                                @if (!$loop->last)
                                    <hr class="border-gray-100">
                                @endif
                            @empty
                                <p class="text-sm text-gray-500">Tidak ada berita terkait lainnya.</p>
                            @endforelse
                        </div>
                        
                        <!-- Link ke Halaman Semua Berita di Sidebar -->
                         <div class="pt-4 mt-6 border-t border-gray-100">
                            <a href="{{ route('publik.berita.index') }}"
                                class="w-full block text-center px-4 py-2 text-sm font-semibold transition text-white bg-[#0C3C6C] rounded-lg shadow-md hover:bg-blue-800">
                                Lihat Semua Berita
                            </a>
                        </div>

                    </div>
                </div>
            </div>
            
            <!-- Tombol Kembali ke Daftar Berita -->
            <div class="mt-16 text-center lg:mt-24">
                <a href="{{ route('publik.index') }}"
                    class="inline-flex items-center px-8 py-3 text-base font-semibold transition bg-white border-2 border-[#0C3C6C] text-[#0C3C6C] rounded-full shadow-lg hover:bg-[#0C3C6C] hover:text-white hover:shadow-xl group">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-3 transition group-hover:translate-x-[-2px]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Jelajahi Berita Lainnya
                </a>
            </div>

        </div>
    </section>