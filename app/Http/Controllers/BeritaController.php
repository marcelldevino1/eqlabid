<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str; // Digunakan untuk membuat slug

class BeritaController extends Controller
{
    // Halaman index (Daftar Berita)
    public function index()
    {
        $beritas = Berita::latest()->paginate(10);
        return view('berita.index', compact('beritas'));
    }

    // Halaman buat berita baru
    public function create()
    {
        return view('berita.create');
    }

    // Proses simpan berita
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'konten' => 'required|string', // Konten bisa lebih panjang
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->judul); // Buat slug dari judul

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('berita', 'public');
        }

        Berita::create($data);

        return redirect()->route('berita.index')->with('success', 'Berita berhasil ditambahkan!');
    }

    // Halaman edit berita
    public function edit(Berita $berita)
    {
        return view('berita.edit', compact('berita'));
    }

    // Proses update berita
    public function update(Request $request, Berita $berita)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'konten' => 'required|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->judul);

        if ($request->hasFile('foto')) {
            if ($berita->foto) {
                Storage::disk('public')->delete($berita->foto);
            }
            $data['foto'] = $request->file('foto')->store('berita', 'public');
        }

        $berita->update($data);

        return redirect()->route('berita.index')->with('success', 'Berita berhasil diperbarui!');
    }

    // Proses hapus berita
    public function destroy(Berita $berita)
    {
        if ($berita->foto) {
            Storage::disk('public')->delete($berita->foto);
        }

        $berita->delete();

        return redirect()->route('berita.index')->with('success', 'Berita berhasil dihapus!');
    }
    public function publikIndex()
    {
        $beritas = Berita::latest()->paginate(9);
        // Pastikan Anda sudah membuat view ini!
        return view('publik.berita.index', compact('beritas'));
    }

    /**
     * Menampilkan detail satu berita berdasarkan slug (misalnya di /berita/judul-berita).
     */
    public function show(Berita $berita)
    {
        // Parameter {berita:slug} otomatis di-resolve oleh Laravel ke model Berita
        // Pastikan Anda sudah membuat view ini!
        return view('publik.berita.show', compact('berita'));
    }
}
