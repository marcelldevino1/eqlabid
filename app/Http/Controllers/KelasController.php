<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index()
    {
        $kelas = Kelas::all();
        return view('kelas.index', compact('kelas'));
    }

    public function create()
    {
        return view('kelas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kd_kelas' => 'required|string|unique:classes,kd_kelas|max:10',
            'nm_kelas' => 'required|string|max:255',
        ]);

        Kelas::create([
            'kd_kelas' => $request->kd_kelas,
            'nm_kelas' => $request->nm_kelas,
            'is_stats' => 1,
        ]);

        return redirect()->route('kelas.index')->with('success', 'Kelas berhasil ditambahkan.');
    }

    public function edit(Kelas $kelas)
    {
        return view('kelas.edit', compact('kelas'));
    }

    public function update(Request $request, Kelas $kelas)
    {
        $request->validate([
            'kd_kelas' => 'required|string|unique:classes,kd_kelas,' . $kelas->id . '|max:10',
            'nm_kelas' => 'required|string|max:255',
        ]);

        $kelas->update([
            'kd_kelas' => $request->kd_kelas,
            'nm_kelas' => $request->nm_kelas,
        ]);

        return redirect()->route('kelas.index')->with('success', 'Kelas berhasil diperbarui.');
    }

    public function destroy(Kelas $kelas)
    {
        $kelas->delete();
        return redirect()->route('kelas.index')->with('success', 'Kelas berhasil dihapus.');
    }

    // Opsional: toggle is_stats
    public function toggleStatus(Kelas $kelas)
    {
        $kelas->is_stats = !$kelas->is_stats;
        $kelas->save();

        return redirect()->route('kelas.index')->with('success', 'Status Kelas berhasil diubah.');
    }
}
