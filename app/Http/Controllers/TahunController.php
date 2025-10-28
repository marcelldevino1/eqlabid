<?php

namespace App\Http\Controllers;

use App\Models\Tahun;
use Illuminate\Http\Request;

class TahunController extends Controller
{
    public function index()
    {
        $tahuns = Tahun::all();
        return view('tahun.index', compact('tahuns'));
    }

    public function create()
    {
        return view('tahun.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
        ]);

        Tahun::create([
            'name' => $request->name,
        ]);

        return redirect()->route('tahun.index')->with('success', 'Tahun berhasil ditambahkan.');
    }

    public function edit(Tahun $tahun)
    {
        return view('tahun.edit', compact('tahun'));
    }

    public function update(Request $request, Tahun $tahun)
    {
        $request->validate([
            'name' => 'required|string|max:100',
        ]);

        $tahun->update([
            'name' => $request->name,
        ]);

        return redirect()->route('tahun.index')->with('success', 'Tahun berhasil diperbarui.');
    }

    public function destroy(Tahun $tahun)
    {
        $tahun->delete();
        return redirect()->route('tahun.index')->with('success', 'Tahun berhasil dihapus.');
    }
}
