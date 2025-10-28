<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClassesStudent;
use App\Models\Kelas;
use App\Models\UserProfile;
use App\Models\Tahun;

class ClassesStudentController extends Controller
{
    public function index()
    {
        $students = ClassesStudent::with(['userProfile', 'classes', 'tahun'])->get();
        return view('classes_students.index', compact('students'));
    }

    public function create()
    {
        $users = UserProfile::all();
        $classes = Kelas::where('is_stats', 1)->get();
        $tahuns = Tahun::where('active', 1)->get();
        return view('classes_students.create', compact('users', 'classes', 'tahuns'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:user_profiles,id',
            'classes_id' => 'required|exists:classes,id',
            'tahun_id' => 'required|exists:tahun,id',
        ]);

        ClassesStudent::create([
            'user_id' => $request->user_id,
            'classes_id' => $request->classes_id,
            'tahun_id' => $request->tahun_id,
            'is_status' => 1,
        ]);

        return redirect()->route('classes-students.index')->with('success', 'Student added to class successfully.');
    }

    public function edit(ClassesStudent $classesStudent)
    {
        $users = UserProfile::all();
        $classes = Kelas::where('is_stats', 1)->get();
        $tahuns = Tahun::where('active', 1)->get();
        return view('classes_students.edit', compact('classesStudent', 'users', 'classes', 'tahuns'));
    }

    public function update(Request $request, ClassesStudent $classesStudent)
    {
        $request->validate([
            'user_id' => 'required|exists:user_profiles,id',
            'classes_id' => 'required|exists:classes,id',
            'tahun_id' => 'required|exists:tahun,id',
            'is_status' => 'nullable|boolean',
        ]);

        $classesStudent->update([
            'user_id' => $request->user_id,
            'classes_id' => $request->classes_id,
            'tahun_id' => $request->tahun_id,
            'is_status' => $request->is_status ?? 1,
        ]);

        return redirect()->route('classes-students.index')->with('success', 'Student updated successfully.');
    }

    public function destroy(ClassesStudent $classesStudent)
    {
        $classesStudent->delete();
        return redirect()->route('classes-students.index')->with('success', 'Student removed from class.');
    }
}
