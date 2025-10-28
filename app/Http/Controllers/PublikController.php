<?php

namespace App\Http\Controllers;

use App\Models\Prestasi;
use App\Models\Berita;
use Illuminate\Http\Request;

class PublikController extends Controller
{
    public function index()
    {
        // 1. Ambil data untuk section Prestasi
        // Misalnya, hanya menampilkan 5 data terbaru di halaman utama
        $prestasis = Prestasi::latest()->take(5)->get(); 
        
        // 2. Ambil data untuk section Berita (Persiapan untuk fitur berikutnya)
        $beritas = Berita::latest()->take(3)->get(); 

        // 3. Gabungkan semua data dan kirim ke view utama
        return view('publik.index', compact('prestasis', 'beritas'));
    }

    public function about()
{
    $prestasis = \App\Models\Prestasi::latest()->take(6)->get();
    $beritas = \App\Models\Berita::latest()->take(6)->get();

    return view('publik.about.aboutDetails', compact('prestasis', 'beritas'));
}

    
    // Fungsi untuk halaman detail Prestasi (Prestasi.publik)
    // Walaupun PrestasiController yang handle admin, lebih baik publik dipisah
    // Tapi jika mau pakai PrestasiController juga tidak masalah.
    // Jika Anda sudah membuat PrestasiController::publikIndex(), gunakan itu.
}