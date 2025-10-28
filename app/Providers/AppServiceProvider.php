<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Log;
use App\Models\ModulePermission;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public const HOME = '/dashboard';

    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Log::info('AppServiceProvider booted');

        Blade::if('canAccess', function ($moduleSlug, $actionSlug) {
            $user = auth()->user();

            // Log awal: semua user yang masuk ke canAccess
            Log::info('canAccess check started', [
                'user_id' => $user->user_id ?? $user->id ?? null,
                'user_email' => $user->email ?? null,
                'has_role_relation' => isset($user?->role),
                'module' => $moduleSlug,
                'action' => $actionSlug,
            ]);

            // Jika user belum login
            if (!$user) {
                Log::warning('canAccess blocked: user not authenticated');
                return false;
            }

            // Jika user tidak punya relasi role
            if (!$user->role) {
                Log::warning('canAccess blocked: user has no role relation', [
                    'user_id' => $user->user_id ?? $user->id ?? null,
                    'email' => $user->email,
                ]);
                return false;
            }

            // Jika user dan role valid
            Log::info('canAccess called', [
                'user_id' => $user->user_id ?? $user->id,
                'user_email' => $user->email ?? null,
                'role_id' => $user->role->id,
                'role_name' => $user->role->name ?? null,
                'module' => $moduleSlug,
                'action' => $actionSlug,
            ]);

            // Cek izin akses berdasarkan ModulePermission
            return ModulePermission::where('role_id', $user->role->id)
                ->whereHas('module', fn($q) => $q->where('slug', $moduleSlug))
                ->whereHas('methodAction', fn($q) => $q->where('slug', $actionSlug))
                ->exists();
        });
    }
}
