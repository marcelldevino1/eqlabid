<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MethodAction;
use App\Models\Module;

class MethodActionController extends Controller
{
    public function index()
    {
        $methodActions = MethodAction::with('modules')->get();
        $modules = Module::all();
        return view('method_actions.index', compact('methodActions', 'modules'));
    }

    public function create()
    {
        $modules = Module::all();
        return view('method_actions.create', compact('modules'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'slug' => 'required|string|max:100|unique:method_actions,slug',
            'modules' => 'required|array',
        ]);

        $methodAction = MethodAction::create($request->only('name', 'slug', 'description'));
        $methodAction->modules()->sync($request->modules);

        return redirect()->route('method-actions.index')->with('success','Method Action created.');
    }

    public function edit(MethodAction $methodAction)
    {
        $modules = Module::all();
        $selectedModules = $methodAction->modules->pluck('id')->toArray();
        return view('method_actions.edit', compact('methodAction','modules','selectedModules'));
    }

    public function update(Request $request, MethodAction $methodAction)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'slug' => 'required|string|max:100|unique:method_actions,slug,'.$methodAction->id,
            'modules' => 'required|array',
        ]);

        $methodAction->update($request->only('name', 'slug', 'description'));
        $methodAction->modules()->sync($request->modules);

        return redirect()->route('method-actions.index')->with('success','Method Action updated.');
    }

    public function destroy(MethodAction $methodAction)
    {
        $methodAction->delete();
        return redirect()->route('method-actions.index')->with('success','Method Action deleted.');
    }

    public function export($type)
    {
        // Export logic, misal gunakan Laravel Excel atau DomPDF
    }

    public function importView()
    {
        return view('method_actions.import');
    }

    public function print()
    {
        $methodActions = MethodAction::with('modules')->get();
        return view('method_actions.print', compact('methodActions'));
    }
}
