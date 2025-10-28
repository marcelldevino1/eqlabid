<?php

namespace App\Http\Controllers;

use App\Models\UserPermission;
use App\Models\UserProfile;
use App\Models\User;
use App\Models\Role;
use App\Models\Module;
use App\Models\MethodAction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\UserPermissionsImport;
use App\Exports\UserPermissionsExport;
use Illuminate\Support\Facades\Response;

class UserPermissionsController extends Controller
{
    // Menampilkan semua User Permissions
    public function index()
{
    // Ambil data user_profiles yang is_stats = 0 dan user_id ada di tabel users
    $users = UserProfile::where('is_stats', 0)
                        ->whereIn('id', User::pluck('user_id')) // Cek jika user_id ada di tabel users
                        ->get();

    // Ambil roles untuk dropdown
    $roles = Role::all();

    return view('user_permissions.index', compact('users', 'roles'));
}
    // Menyimpan User Permission
    public function store(Request $request)
    {
        $request->validate([
            'role_id' => 'required|exists:roles,id',
            'permissions' => 'required|array',
        ]);

        DB::beginTransaction();

        try {
            // Ambil role ID
            $roleId = $request->input('role_id');

            // Hapus semua permission yang dimiliki oleh role ini
            UserPermission::where('role_id', $roleId)->delete();

            $insertData = [];

            // Loop permissions untuk memasukkan data
            foreach ($request->permissions as $moduleId => $methodActionIds) {
                foreach ($methodActionIds as $actionId) {
                    $insertData[] = [
                        'role_id' => $roleId,
                        'module_id' => $moduleId,
                        'method_action_id' => $actionId,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];
                }
            }

            UserPermission::insert($insertData);

            DB::commit();

            return redirect()->route('user-permissions.index')->with('success', 'Permissions saved successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => 'Failed to save permissions: ' . $e->getMessage()]);
        }
    }

    // Menampilkan form edit User Permissions
    public function edit($roleId)
    {
        $role = Role::findOrFail($roleId);
        $modules = Module::all();
        $methodActions = MethodAction::all();

        // Ambil permissions yang sudah dimiliki oleh role
        $existingPermissions = UserPermission::where('role_id', $roleId)->get();

        $selected = [];
        foreach ($existingPermissions as $permission) {
            $selected[$permission->module_id][] = $permission->method_action_id;
        }

        return view('user_permissions.edit', compact(
            'role', 'modules', 'methodActions', 'selected'
        ));
    }

    // Menghapus User Permission
    public function destroy($id)
    {
        $userPermission = UserPermission::findOrFail($id);
        $userPermission->delete();

        return redirect()->route('user-permissions.index')->with('success', 'User Permission removed.');
    }

    // Import User Permissions dari file
    public function import(Request $request)
    {
        $request->validate([
            'import_file' => 'required|file|mimes:xlsx,csv',
        ]);

        Excel::import(new UserPermissionsImport, $request->file('import_file'));

        return redirect()->route('user-permissions.index')->with('success', 'Import successful.');
    }

    // Export User Permissions ke file Excel
    public function export()
    {
        return Excel::download(new UserPermissionsExport, 'user_permissions.xlsx');
    }

    // Mengunduh template untuk import
    public function downloadTemplate()
    {
        $file = storage_path('app/public/templates/user_permissions_import_template.xlsx');

        if (!file_exists($file)) {
            return abort(404, 'Template not found.');
        }

        return Response::download($file, 'user_permissions_import_template.xlsx');
    }

public function sync()
{
    // Ambil data user_profiles yang is_stats = 0
    $profiles = UserProfile::where('is_stats', 0)->get();

    // Jika tidak ada data yang ditemukan
    if ($profiles->isEmpty()) {
        return redirect()->route('user-permissions.index')->with('info', 'No data found for syncing.');
    }

    DB::beginTransaction();

    try {
        foreach ($profiles as $profile) {
            // Simpan user_id (yang berasal dari id user_profiles) ke dalam tabel users
            User::create([
                'user_id' => $profile->id,  // Ambil id dari user_profiles dan simpan sebagai user_id di users
            ]);
        }

        DB::commit();

        return redirect()->route('user-permissions.index')->with('success', 'Sync completed successfully!');
    } catch (\Exception $e) {
        DB::rollBack();
        return redirect()->route('user-permissions.index')->with('error', 'Sync failed: ' . $e->getMessage());
    }
}


}
