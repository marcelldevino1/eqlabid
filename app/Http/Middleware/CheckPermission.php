<?php

namespace App\Http\Middleware; // ✅ WAJIB ada namespace ini!

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Models\ModulePermission; // ✅ juga perlu di-import

class CheckPermission
{
    public function handle($request, Closure $next, $module, $action)
    {
        $user = Auth::user();

        if (!$user || !$user->role) {
            abort(403, 'Unauthorized');
        }

        $hasPermission = ModulePermission::where('role_id', $user->role->id)
            ->whereHas('module', fn($q) => $q->where('slug', $module))
            ->whereHas('methodAction', fn($q) => $q->where('slug', $action))
            ->exists();

        if (!$hasPermission) {
            abort(403, 'Permission Denied');
        }

        return $next($request);
    }
}
