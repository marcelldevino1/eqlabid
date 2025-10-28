<?php
namespace App\Http\Controllers;

use App\Models\Module;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ModuleImport;
use App\Exports\ModuleExport;

class ModuleController extends Controller
{
    public function index()
    {
        $modules = Module::all();
        return view('modules.index', compact('modules'));
    }

    public function create()
    {
        return view('modules.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:100',
            'slug' => 'required|unique:modules',
            'description' => 'nullable|max:255',
        ]);

        Module::create($validated);
        return redirect()->route('modules.index')->with('success', 'Module created.');
    }

    public function edit(Module $module)
    {
        return view('modules.edit', compact('module'));
    }
        public function show(Module $module)
    {
        return view('modules.show', compact('module'));
    }

    public function update(Request $request, Module $module)
    {
        $validated = $request->validate([
            'name' => 'required|max:100',
            'slug' => 'required|unique:modules,slug,' . $module->id,
            'description' => 'nullable|max:255',
        ]);

        $module->update($validated);
        return redirect()->route('modules.index')->with('success', 'Module updated.');
    }

    public function destroy(Module $module)
    {
        $module->delete();
        return redirect()->route('modules.index')->with('success', 'Module deleted.');
    }

    public function import(Request $request)
    {
        $request->validate(['import_file' => 'required|file|mimes:xlsx,csv']);
        Excel::import(new ModuleImport, $request->file('import_file'));
        return redirect()->route('modules.index')->with('success', 'Modules imported.');
    }

    public function export()
    {
        return Excel::download(new ModuleExport, 'modules.xlsx');
    }
}
