<?php

namespace App\Http\Controllers;

use App\Models\TypeTask;
use App\Models\TeachingAssignment;
use Illuminate\Http\Request;

class TypeTaskController extends Controller
{
    public function index()
    {
        $tasks = TypeTask::with(['teachingAssignment.user', 'teachingAssignment.mapel'])->get();
        return view('type_tasks.index', compact('tasks'));
    }

    public function create()
    {
        $teachingAssignments = TeachingAssignment::with('user', 'mapel')->get();
        return view('type_tasks.create', compact('teachingAssignments'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_ta' => 'required|exists:teaching_assignments,id',
            'description' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'type_task' => 'required|string|max:50',
        ]);

        TypeTask::create($request->all());

        return redirect()->route('type-tasks.index')->with('success', 'Task berhasil dibuat.');
    }

    public function edit(TypeTask $typeTask)
    {
        $teachingAssignments = TeachingAssignment::with('user', 'mapel')->get();
        return view('type_tasks.edit', compact('typeTask', 'teachingAssignments'));
    }

    public function update(Request $request, TypeTask $typeTask)
    {
        $request->validate([
            'id_ta' => 'required|exists:teaching_assignments,id',
            'description' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'type_task' => 'required|string|max:50',
        ]);

        $typeTask->update($request->all());

        return redirect()->route('type-tasks.index')->with('success', 'Task berhasil diperbarui.');
    }

    public function destroy(TypeTask $typeTask)
    {
        $typeTask->delete();
        return redirect()->route('type-tasks.index')->with('success', 'Task berhasil dihapus.');
    }
}
