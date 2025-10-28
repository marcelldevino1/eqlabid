<?php

namespace App\Http\Controllers;

use App\Models\TeachingAssignment;
use App\Models\User;
use App\Models\Role;
use App\Models\Mapel;
use App\Models\Tahun;
use Illuminate\Http\Request;

class TeachingAssignmentController extends Controller
{
    // Index: menampilkan semua teaching assignment
    public function index()
    {
        $assignments = TeachingAssignment::with(['user', 'role', 'mapel', 'tahun'])->get();
        return view('teaching_assignments.index', compact('assignments'));
    }

    // Create: form tambah data
    public function create()
    {
        $users = User::all();
        $roles = Role::all();
        $mapels = Mapel::all();
        $tahuns = Tahun::all();

        return view('teaching_assignments.create', compact('users', 'roles', 'mapels', 'tahuns'));
    }

    // Store: simpan data baru
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'role_id' => 'required|exists:roles,id',
            'mapel_id' => 'required|exists:mapels,id',
            'tahun_id' => 'required|exists:tahun,id',
        ]);

        TeachingAssignment::create($request->all());

        return redirect()->route('teaching_assignments.index')->with('success', 'Teaching assignment berhasil ditambahkan.');
    }

    // Edit: form edit data
    public function edit(TeachingAssignment $teachingAssignment)
    {
        $users = User::all();
        $roles = Role::all();
        $mapels = Mapel::all();
        $tahuns = Tahun::all();

        return view('teaching_assignments.edit', compact('teachingAssignment', 'users', 'roles', 'mapels', 'tahuns'));
    }

    // Update: update data
    public function update(Request $request, TeachingAssignment $teachingAssignment)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'role_id' => 'required|exists:roles,id',
            'mapel_id' => 'required|exists:mapels,id',
            'tahun_id' => 'required|exists:tahuns,id',
        ]);

        $teachingAssignment->update($request->all());

        return redirect()->route('teaching_assignments.index')->with('success', 'Teaching assignment berhasil diperbarui.');
    }

    // Delete
    public function destroy(TeachingAssignment $teachingAssignment)
    {
        $teachingAssignment->delete();
        return redirect()->route('teaching_assignments.index')->with('success', 'Teaching assignment berhasil dihapus.');
    }
}
