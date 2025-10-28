<?php

namespace App\Http\Controllers;

use App\Models\ModulePermission;
use App\Models\Role;
use App\Models\Module;
use App\Models\MethodAction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ModulePermissionImport;
use App\Exports\ModulePermissionExport;

class ModulePermissionController extends Controller
{
    public function index()
    {
        $permissions = ModulePermission::with(['role', 'module', 'methodAction'])->get();

        $groupedPermissions = [];

        foreach ($permissions as $perm) {
            $roleName = $perm->role->name ?? 'Unknown';
            $moduleSlug = $perm->module->slug ?? 'unknown';
            $actionSlug = $perm->methodAction->slug ?? 'unknown';

            $groupedPermissions[$roleName][$moduleSlug][] = $actionSlug;
        }

        return view('module_permissions.index', compact('groupedPermissions'));
    }

    public function create()
{
    // Ambil semua role yang belum punya permission (belum ada di module_permissions)
    $usedRoleIds = ModulePermission::distinct()->pluck('role_id');
    $roles = Role::whereNotIn('id', $usedRoleIds)->get();

    $modules = Module::all();
    $methodActions = MethodAction::all();

    return view('module_permissions.create', compact('roles', 'modules', 'methodActions'));
}

    public function store(Request $request)
    {
        $request->validate([
            'role_id' => 'required|exists:roles,id',
            'permissions' => 'required|array',
        ]);

        DB::beginTransaction();

        try {
            $roleId = $request->input('role_id');

            // Hapus permission lama
            ModulePermission::where('role_id', $roleId)->delete();

            $insertData = [];

            foreach ($request->permissions as $moduleId => $actionIds) {
                foreach ($actionIds as $methodActionId) {
                    $insertData[] = [
                        'role_id' => $roleId,
                        'module_id' => $moduleId,
                        'method_action_id' => $methodActionId,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];
                }
            }

            ModulePermission::insert($insertData);

            DB::commit();

            return redirect()->route('module-permissions.index')->with('success', 'Permissions saved successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => 'Failed to save permissions: ' . $e->getMessage()]);
        }
    }

    public function edit($roleId)
    {
        $role = Role::findOrFail($roleId);
        $modules = Module::all();
        $methodActions = MethodAction::all();

        $permissions = ModulePermission::where('role_id', $roleId)->get();

        $selected = [];
        foreach ($permissions as $permission) {
            $selected[$permission->module_id][] = $permission->method_action_id;
        }

        return view('module_permissions.edit', compact('role', 'modules', 'methodActions', 'selected'));
    }

    public function destroy(ModulePermission $modulePermission)
    {
        $modulePermission->delete();
        return redirect()->route('module-permissions.index')->with('success', 'Permission deleted.');
    }

    public function import(Request $request)
    {
        $request->validate([
            'import_file' => 'required|file|mimes:xlsx,csv',
        ]);

        Excel::import(new ModulePermissionImport, $request->file('import_file'));

        return redirect()->route('module-permissions.index')->with('success', 'Import successful.');
    }

    public function export()
    {
        return Excel::download(new ModulePermissionExport, 'module_permissions.xlsx');
    }

    public function downloadTemplate()
    {
        $file = storage_path('app/public/templates/module_permissions_import_template.xlsx');

        if (!file_exists($file)) {
            return abort(404, 'Template not found.');
        }

        return Response::download($file, 'module_permissions_import_template.xlsx');
    }
}
