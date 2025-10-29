<section id="prestasi"
  class="relative px-8 py-20 text-center bg-gradient-to-r from-blue-50/50 to-white lg:px-24 font-inter">

  <!-- Fade atas/bawah -->
  <div class="absolute top-0 left-0 w-full h-16 pointer-events-none bg-gradient-to-b from-white/90 to-transparent"></div>
  <div class="absolute bottom-0 left-0 w-full h-16 pointer-events-none bg-gradient-to-t from-white/90 to-transparent"></div>

  <h2 class="mb-3 text-4xl font-semibold text-[#0C3C6C]" data-anim="rise" data-delay="80">Prestasi</h2>
  <p class="max-w-2xl mx-auto mb-12 font-medium text-gray-600" data-anim="fade" data-delay="160">
    Mereka yang menginspirasi dengan prestasi akademik dan non-akademik yang membanggakan.
  </p>

  <!-- hint geser -->
  <div class="max-w-6xl mx-auto mb-3 text-sm text-blue-900/70 sm:hidden" data-anim="rise" data-delay="200">
    Geser ke kanan untuk melihat lainnya →
  </div>

  <!-- WRAPPER -->
  <div class="relative max-w-6xl mx-auto" data-anim="rise" data-delay="220">
    <!-- edge mask -->
    <div class="absolute inset-y-0 left-0 w-12 pointer-events-none bg-gradient-to-r from-white to-transparent rounded-l-2xl"></div>
    <div class="absolute inset-y-0 right-0 w-12 pointer-events-none bg-gradient-to-l from-white to-transparent rounded-r-2xl"></div>

    <!-- SLIDER -->
    <div id="slider-prestasi"
         class="flex gap-6 pb-2 overflow-x-auto snap-x snap-mandatory scroll-smooth"
         style="scrollbar-width:none;-ms-overflow-style:none;">
      <style>#slider-prestasi::-webkit-scrollbar{display:none}</style>

      @foreach(($prestasis ?? collect())->take(5) as $prestasi)
        <a href="{{ route('prestasi.show', $prestasi->id) }}"
           class="snap-start shrink-0 w-[86%] sm:w-[60%] md:w-[46%] lg:w-[33.333%] focus:outline-none"
           data-anim="pop" data-delay="{{ 260 + ($loop->index*60) }}">
          <article
            class="h-full overflow-hidden transition duration-300 bg-white border border-gray-100 rounded-2xl shadow-[0_6px_18px_rgba(2,6,23,.06)] hover:shadow-[0_10px_24px_rgba(2,6,23,.12)] hover:-translate-y-[2px]">
            <!-- media rasio 4:3 -->
            <div class="relative bg-gray-100/60 aspect-[4/3]">
              @if($prestasi->foto)
                <img src="{{ asset('storage/'.$prestasi->foto) }}"
                     alt="Prestasi {{ $prestasi->prestasi }}"
                     loading="lazy" decoding="async"
                     class="object-cover object-center w-full h-full">
              @else
                <img src="{{ asset('images/default-placeholder.jpg') }}"
                     alt="No image" loading="lazy" decoding="async"
                     class="object-cover object-center w-full h-full">
              @endif

              <span class="absolute top-3 left-3 grid h-7 w-7 place-items-center rounded-full bg-black/60 text-[11px] font-bold text-white">
                {{ $loop->iteration }}
              </span>
              <span class="absolute px-2 py-1 text-xs text-yellow-700 bg-white rounded-full shadow top-3 right-3">🏆</span>
            </div>

            <div class="p-4 text-left">
              <h3 class="mb-1 text-base font-bold text-[#0C3C6C] sm:text-lg line-clamp-1">
                {{ $prestasi->prestasi }}
              </h3>
              <div class="mb-2">
                <span class="inline-block px-3 py-1 text-[11px] sm:text-xs font-medium text-blue-800 bg-blue-100 rounded-md">
                  {{ $prestasi->kelas }}
                </span>
              </div>
              <p class="text-xs text-gray-700 sm:text-sm line-clamp-2">
                {{ \Illuminate\Support\Str::limit($prestasi->deskripsi, 140) }}
              </p>
            </div>
          </article>
        </a>
      @endforeach

      <!-- Kartu CTA di ujung -->
      <a href="{{ route('publik.prestasi.index') }}"
         class="snap-start shrink-0 w-[86%] sm:w-[60%] md:w-[46%] lg:w-[33.333%] focus:outline-none"
         data-anim="pop" data-delay="{{ 260 + (min( ($prestasis ?? collect())->count(), 5) * 60) }}">
        <article
          class="flex h-full items-center justify-center gap-3 bg-white/70 border border-dashed border-[#0C3C6C]/30 rounded-2xl p-6 shadow-[inset_0_0_0_1px_rgba(12,60,108,.06)] hover:border-[#0C3C6C] hover:bg-white transition">
          <span class="inline-flex h-10 w-10 items-center justify-center rounded-xl bg-[#0C3C6C] text-white">＋</span>
          <div class="text-left">
            <h4 class="font-bold text-[#0C3C6C]">Lihat lebih banyak</h4>
            <p class="text-sm text-gray-600">Buka semua daftar prestasi siswa</p>
          </div>
        </article>
      </a>
    </div>
  </div>
</section>
