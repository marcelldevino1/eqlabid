<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserAssignment;
use App\Models\User;
use App\Models\Role;
use App\Models\Tahun;
use App\Models\UserProfile;
use Illuminate\Support\Facades\DB;


class UserAssignmentController extends Controller
{
    public function index()
    {
        $assignments = UserAssignment::with(['user_profile','role','tahun'])->get();
        $roles = Role::all(); // ambil semua role

        return view('user_assignments.index', compact('assignments','roles'));
    }

    public function create()
    {
        $users = User::all();
        $roles = Role::all();
        $tahuns = Tahun::all();
        return view('user_assignments.create', compact('users','roles','tahuns'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'role_id' => 'required|exists:roles,id',
            'tahun_id' => 'required|exists:tahun,id',
        ]);

        UserAssignment::create($request->all());

        return redirect()->route('user-assignments.index')->with('success', 'User Assignment berhasil ditambahkan.');
    }

    public function edit(UserAssignment $userAssignment)
    {
        $users = User::all();
        $roles = Role::all();
        $tahuns = Tahun::all();
        return view('user_assignments.edit', compact('userAssignment','users','roles','tahuns'));
    }

    public function update(Request $request, UserAssignment $userAssignment)
    {
        $request->validate([
            'role_id' => 'required|exists:roles,id',
        ]);

        $userAssignment->update([
            'role_id' => $request->role_id,
        ]);

        return redirect()->route('user-assignments.index')->with('success', 'Role berhasil diperbarui!');
    }

    public function destroy(UserAssignment $userAssignment)
    {
        $userAssignment->delete();
        return redirect()->route('user-assignments.index')->with('success', 'User Assignment berhasil dihapus.');
    }

    public function show($id)
    {
        $assignment = UserAssignment::with(['user', 'role', 'tahun'])->findOrFail($id);
        return view('user_assignments.show', compact('assignment'));
    }

    public function sync()
{
    // Ambil user_profiles yang is_stats = 0
    $profiles = UserProfile::where('is_stats', 0)->get();

    if ($profiles->isEmpty()) {
        return redirect()->route('user-assignments.index')
                         ->with('info', 'Tidak ada data baru yang perlu di-sync.');
    }

    DB::beginTransaction();

    try {
        foreach ($profiles as $profile) {
            // Buat record di user_assignments
            UserAssignment::create([
                'user_id' => $profile->id,
                'role_id' => 1, // default role_id jika perlu
                'tahun_id' => 1, // default tahun_id jika perlu
            ]);

            // Update is_stats menjadi 1
            $profile->update(['is_stats' => 1]);
        }

        DB::commit();

        return redirect()->route('user-assignments.index')
                         ->with('success', 'Data berhasil di-sync.');
    } catch (\Exception $e) {
        DB::rollBack();
        return redirect()->route('user-assignments.index')
                         ->with('error', 'Sync gagal: ' . $e->getMessage());
    }
}



}
