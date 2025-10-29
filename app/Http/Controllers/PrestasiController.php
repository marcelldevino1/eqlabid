<?php

namespace App\Http\Controllers;

use App\Models\Prestasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PrestasiController extends Controller
{
    public function index()
    {
        $prestasis = Prestasi::latest()->paginate(10);
        return view('prestasi.index', compact('prestasis'));
    }

    public function publikIndex()
    {
        // Ambil semua data prestasi yang terbaru
        $prestasis = Prestasi::latest()->get();

        // Kirim data $prestasis ke view publik
        return view('publik.prestasi.index', compact('prestasis'));
    }

    public function create()
    {
        return view('prestasi.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:255',
            'kelas' => 'required|string|max:100',
            'prestasi' => 'required|string|max:255',
            'deskripsi' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
        ]);
        if ($request->hasFile('foto')) {
            // Simpan ke storage/app/public/prestasi/...
            $data['foto'] = $request->file('foto')->store('prestasi', 'public');
        }

        Prestasi::create($data);

        return redirect()->route('prestasi.index')->with('success', 'Prestasi berhasil ditambahkan!');
    }

    public function edit(Prestasi $prestasi)
    {
        return view('prestasi.edit', compact('prestasi'));
    }

    public function update(Request $request, Prestasi $prestasi)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:255',
            'kelas' => 'required|string|max:100',
            'prestasi' => 'required|string|max:255',
            'deskripsi' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
        ]);


        if ($request->hasFile('foto')) {
            if ($prestasi->foto) {
                Storage::disk('public')->delete($prestasi->foto);
            }
            $data['foto'] = $request->file('foto')->store('prestasi', 'public');
        }

        $prestasi->update($data);

        return redirect()->route('prestasi.index')->with('success', 'Prestasi berhasil diperbarui!');
    }

    public function destroy(Prestasi $prestasi)
    {
        if ($prestasi->foto) {
            Storage::disk('public')->delete($prestasi->foto);
        }

        $prestasi->delete();

        return redirect()->route('prestasi.index')->with('success', 'Prestasi berhasil dihapus!');
    }
    public function show($id)
    {
        $prestasi = Prestasi::findOrFail($id);
        return view('publik.prestasi.show', compact('prestasi'));
    }

    // Tambahkan ini khusus admin
    public function showAdmin($id)
    {
        $prestasi = Prestasi::findOrFail($id);
        return view('prestasi.show', compact('prestasi'));
    }
}
