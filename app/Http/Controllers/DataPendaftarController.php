<?php

namespace App\Http\Controllers;

use App\Models\DataPendaftar;
use Illuminate\Http\Request;

class DataPendaftarController extends Controller
{
    public function index()
    {
        $pendaftars = DataPendaftar::latest()->paginate(10);
        return view('daftar.data_pendaftar', compact('pendaftars'));
    }

    public function create()
    {
        return view('data_pendaftar.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:150',
            'email' => 'nullable|email|max:150',
            'national_id' => 'required|string|max:20',
        ]);

        DataPendaftar::create($request->all());

        return redirect()->route('data_pendaftar.index')
            ->with('success', 'Data pendaftar berhasil ditambahkan!');
    }

    public function edit(DataPendaftar $data_pendaftar)
    {
        return view('data_pendaftar.edit', compact('data_pendaftar'));
    }

    public function update(Request $request, DataPendaftar $data_pendaftar)
    {
        $request->validate([
            'full_name' => 'required|string|max:150',
            'email' => 'nullable|email|max:150',
            'national_id' => 'required|string|max:20',
        ]);

        $data_pendaftar->update($request->all());

        return redirect()->route('data_pendaftar.index')
            ->with('success', 'Data pendaftar berhasil diperbarui!');
    }

    public function destroy(DataPendaftar $data_pendaftar)
    {
        $data_pendaftar->delete();

        return redirect()->route('data_pendaftar.index')
            ->with('success', 'Data pendaftar berhasil dihapus!');
    }
}
