<?php
namespace App\Http\Controllers;

use App\Models\UserProfile; // Pastikan model ini sudah ada
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Untuk transaksi DB

class PendaftaranController extends Controller
{
    // Menampilkan halaman landing pendaftaran
    public function index()
    {
        return view('publik.daftar.index');
    }

    // Menyimpan data pendaftaran dari form
    public function store(Request $request)
    {
        // 1. Validasi Data
        $validated = $request->validate([
            'full_name'             => 'required|string|max:150',
            'email'                 => 'nullable|email|max:150|unique:user_profiles,email',
            'national_id'           => 'required|string|max:20|unique:user_profiles,national_id',
            'family_card_number'    => 'nullable|string|max:20',
            'phone_number'          => 'nullable|string|max:20',
            'birth_place'           => 'nullable|string|max:100',
            'birth_date'            => 'nullable|date',
            'gender'                => 'nullable|in:male,female,other',
            'address'               => 'nullable|string',
            'nationality'           => 'nullable|string|max:100',
            'province'              => 'nullable|string|max:100',
            'city_district'         => 'nullable|string|max:100',
            'sub_district'          => 'nullable|string|max:100',
            'village'               => 'nullable|string|max:100',
            'rw'                    => 'nullable|string|max:5',
            'rt'                    => 'nullable|string|max:5',
            'postal_code'           => 'nullable|string|max:10',
            'father_name'           => 'nullable|string|max:150',
            'mother_name'           => 'nullable|string|max:150',
            'siblings_count'        => 'nullable|integer',
            'child_number'          => 'nullable|integer',
            'bio'                   => 'nullable|string',
        ]);

        try {
            // 2. Simpan Data ke user_profiles
            UserProfile::create($validated);

            // 3. Respon Sukses (Digunakan untuk AJAX)
            return response()->json([
                'success' => true,
                'message' => 'Pendaftaran berhasil! Anda akan diarahkan ke halaman utama.',
                'redirect' => route('hero') // route('hero') adalah route home/awal Anda
            ]);

        } catch (\Exception $e) {
            // 4. Respon Gagal
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat menyimpan data. Silakan coba lagi. Error: ' . $e->getMessage(),
            ], 500);
        }
    }
}
