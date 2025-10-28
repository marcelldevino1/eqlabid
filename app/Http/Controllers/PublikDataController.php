<?php

namespace App\Http\Controllers;

use App\Models\UserProfile; // Gunakan model yang sama
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PublikDataController extends Controller
{
    /**
     * Menampilkan halaman dengan tabel data pendaftar publik.
     */
    public function showData()
    {
        return view('publik.daftar.data_pendaftar');
    }

    /**
     * Mengembalikan data pendaftar dalam format JSON untuk Datatables.
     */
    public function getDataJson(Request $request)
    {
        if ($request->ajax()) {
            // Ambil hanya kolom yang akan ditampilkan
            $data = UserProfile::select(
                'id',
                'full_name',
                'national_id',
                'phone_number',
                'birth_place',
                'birth_date',
                'created_at'
            )->get();

            return DataTables::of($data)
                ->addIndexColumn() // Menambahkan kolom nomor urut
                ->make(true);
        }
        return response()->json(['error' => 'Akses ditolak'], 403);
    }
}