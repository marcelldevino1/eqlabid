<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TypeTaskSiswa;
use App\Models\TypeTask;
use App\Models\User;
use App\Models\Module;
use Auth;

class TypeTaskSiswaController extends Controller
{
    // Menampilkan semua siswa untuk task tertentu
    public function index($taskId)
    {
        $task = TypeTask::findOrFail($taskId);
        $students = TypeTaskSiswa::where('id_tts', $taskId)->get();
        
        return view('type_task_siswa.index', compact('task', 'students'));
    }

    // Menampilkan form untuk menambahkan siswa pada task tertentu
    public function create($taskId)
    {
        $task = TypeTask::findOrFail($taskId);
        return view('type_task_siswa.create', compact('task'));
    }

    // Menyimpan data siswa
    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required',
            'nilai' => 'nullable|numeric',
            'link' => 'nullable|url',
        ]);

        $taskId = $request->input('task_id');
        TypeTaskSiswa::create([
            'id_tts' => $taskId,
            'user_id' => Auth::id(),
            'description' => $request->description,
            'nilai' => null,  // Nilai kosong saat pertama kali disimpan
            'status' => 'proses',  // Status awal adalah proses
            'link' => $request->link,
        ]);

        return redirect()->route('type-tasks-siswa.index', $taskId)
            ->with('success', 'Data siswa berhasil disimpan.');
    }

    // Menampilkan form edit data siswa
    public function edit($id)
    {
        $typeTaskSiswa = TypeTaskSiswa::findOrFail($id);
        return view('type_task_siswa.edit', compact('typeTaskSiswa'));
    }

    // Update data siswa
    public function update(Request $request, $id)
    {
        $request->validate([
            'description' => 'required',
            'nilai' => 'nullable|numeric',
            'link' => 'nullable|url',
        ]);

        $typeTaskSiswa = TypeTaskSiswa::findOrFail($id);
        $typeTaskSiswa->update([
            'description' => $request->description,
            'nilai' => $request->nilai,
            'status' => $request->status ?? 'proses', // Jika tidak ada status, set default 'proses'
            'link' => $request->link,
        ]);

        return redirect()->route('type-tasks-siswa.index', $typeTaskSiswa->id_tts)
            ->with('success', 'Data siswa berhasil diperbarui.');
    }
    public function updateNilai(Request $request, $id)
{
    \Log::info('updateNilai dipanggil', [
        'id' => $id,
        'nilai_input' => $request->nilai,
    ]);

    $request->validate([
        'nilai' => 'required|numeric|min:0|max:100',
        
    ]);

    $taskSiswa = \App\Models\TypeTaskSiswa::find($id);

    if (!$taskSiswa) {
        \Log::error('updateNilai gagal: data tidak ditemukan', ['id' => $id]);
        return back()->with('error', 'Data tidak ditemukan.');
    }

    $taskSiswa->nilai = $request->nilai;
    $taskSiswa->status = 'finish';
    $taskSiswa->save();

    \Log::info('updateNilai berhasil', [
        'id' => $id,
        'nilai_baru' => $taskSiswa->nilai,
    ]);

    return back()->with('success', 'Nilai berhasil diperbarui.');
}

    // Menghapus data siswa
    public function destroy($id)
    {
        $typeTaskSiswa = TypeTaskSiswa::findOrFail($id);
        $taskId = $typeTaskSiswa->id_tts;
        $typeTaskSiswa->delete();

        return redirect()->route('type-tasks-siswa.index', $taskId)
            ->with('success', 'Data siswa berhasil dihapus.');
    }
}
