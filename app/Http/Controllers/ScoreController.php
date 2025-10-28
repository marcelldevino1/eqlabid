<?php

namespace App\Http\Controllers;

use App\Models\Score;
use App\Models\ClassesStudent;
use App\Models\Kelas;
use Illuminate\Http\Request;

class ScoreController extends Controller
{
    public function index()
    {
        $classes = Kelas::orderBy('nm_kelas', 'asc')->get();
        return view('scores.index', compact('classes'));
    }

    public function uts($id)
    {
        $class = Kelas::findOrFail($id);
        $students = ClassesStudent::with('user')
            ->where('classes_id', $id)
            ->get();
        return view('scores.uts', compact('class', 'students'));
    }

    public function uas($id)
    {
        $class = Kelas::findOrFail($id);
        $students = ClassesStudent::with('user')
            ->where('classes_id', $id)
            ->get();
        return view('scores.uas', compact('class', 'students'));
    }

    // simpan nilai UTS
    public function storeUts(Request $request)
    {
        $request->validate([
            'classes_student_id' => 'required',
            'nilai' => 'required|integer|min:0|max:100',
        ]);

        Score::create([
            'classes_student_id' => $request->classes_student_id,
            'nilai' => $request->nilai,
            'keterangan' => 'UTS', // otomatis
            'tahun' => date('Y'),
        ]);

        return back()->with('success', 'Nilai UTS berhasil disimpan.');
    }

    // simpan nilai UAS
    public function storeUas(Request $request)
    {
        $request->validate([
            'classes_student_id' => 'required',
            'nilai' => 'required|integer|min:0|max:100',
        ]);

        Score::create([
            'classes_student_id' => $request->classes_student_id,
            'nilai' => $request->nilai,
            'keterangan' => 'UAS', // otomatis
            'tahun' => date('Y'),
        ]);

        return back()->with('success', 'Nilai UAS berhasil disimpan.');
    }
}
