<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserAccess;
use App\Models\UserProfile;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserAccessController extends Controller
{
    // Halaman index
    public function index()
    {
        $users = UserAccess::with(['userProfile', 'role'])->get();
        $roles = Role::all();
        return view('user_access.index', compact('users', 'roles'));
    }

    // Update username dan password
    public function update(Request $request, $id)
    {
        $request->validate([
            'username' => 'required|string|max:50',
            'password' => 'nullable|string|min:6',
        ]);

        $user = UserAccess::findOrFail($id);
        $user->username = $request->username;
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
        $user->save();

        return redirect()->route('user-access.index')->with('success', 'User updated successfully.');
    }

    // Non-active user
    public function deactivate($id)
    {
        $user = UserAccess::findOrFail($id);
        $user->status = 0; // 0 = nonactive
        $user->save();

        return redirect()->route('user-access.index')->with('success', 'User has been deactivated.');
    }
}
