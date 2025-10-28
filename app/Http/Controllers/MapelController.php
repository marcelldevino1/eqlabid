<?php
namespace App\Http\Controllers;

use App\Models\Mapel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MapelController extends Controller
{
    // Menampilkan semua data Mapel
    public function index()
    {
        $mapels = Mapel::all();
        return view('mapels.index', compact('mapels'));
    }

    // Menampilkan form untuk membuat Mapel baru
    public function create()
    {
        return view('mapels.create');
    }

    // Menyimpan Mapel baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|unique:mapels,slug|max:255',
            'description' => 'nullable|string',
        ]);

        Mapel::create([
                        'name' => $request->name,
                        'slug' => Str::slug($request->name),
                        'description' => $request->description,
                    ]);

        return redirect()->route('mapels.index')->with('success', 'Mata Pelajaran berhasil ditambahkan.');
    }

    // Menampilkan form untuk mengedit Mapel
    public function edit(Mapel $mapel)
    {
        return view('mapels.edit', compact('mapel'));
    }

    // Memperbarui data Mapel
    public function update(Request $request, Mapel $mapel)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|unique:mapels,slug,' . $mapel->id . '|max:255',
            'description' => 'nullable|string',
        ]);

        $mapel->update([
                            'name' => $request->name,
                            'slug' => Str::slug($request->name),
                            'description' => $request->description,
                        ]);

        return redirect()->route('mapels.index')->with('success', 'Mata Pelajaran berhasil diperbarui.');
    }

    // Menghapus Mapel
    public function destroy(Mapel $mapel)
    {
        $mapel->delete();
        return redirect()->route('mapels.index')->with('success', 'Mata Pelajaran berhasil dihapus.');
    }
}
