<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\MethodActionController;
use App\Http\Controllers\ModulePermissionController;
use App\Http\Controllers\UserPermissionsController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\TeachingAssignmentController;
use App\Http\Controllers\TahunController;
use App\Http\Controllers\TypeTaskController;
use App\Http\Controllers\TypeTaskSiswaController;
use App\Http\Controllers\UserAssignmentController;
use App\Http\Controllers\UserAccessController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\ClassesStudentController;
use App\Http\Controllers\ScoreController;

// control on the public side
use App\Http\Controllers\PublikController;
use App\Http\Controllers\PrestasiController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\DataPendaftarController;

use Illuminate\Support\Facades\Route;

Route::get('/', [PublikController::class, 'index'])->name('hero');

// publik

Route::resource('data_pendaftar', DataPendaftarController::class);

Route::get('/about', [PublikController::class, 'about'])->name('about');

Route::prefix('berita')->group(function () {
    // Menampilkan daftar semua berita publik (misalnya di /berita)
    Route::get('/', [BeritaController::class, 'publikIndex'])->name('publik.berita.index');
    // Menampilkan detail satu berita berdasarkan slug (misalnya di /berita/judul-berita-slug)
    Route::get('/{berita:slug}', [BeritaController::class, 'show'])->name('publik.berita.show');
});

// Route untuk tombol Daftar di navbar
Route::get('/daftar', [PendaftaranController::class, 'index'])->name('publik.daftar.index');

// Route untuk menyimpan data pendaftaran
Route::post('/daftar', [PendaftaranController::class, 'store'])->name('publik.pendaftaran.store');

Route::prefix('prestasi')->group(function () {
    // daftar semua prestasi publik
    Route::get('/', [PrestasiController::class, 'publikIndex'])->name('publik.prestasi.index');
    // detail prestasi publik
    Route::get('/{prestasi:slug}', [PrestasiController::class, 'show'])->name('publik.prestasi.show');
});


/*
|--------------------------------------------------------------------------
| Dashboard Routes (role-based)
|--------------------------------------------------------------------------
*/

// Dashboard Admin
Route::middleware(['auth', 'check.role:administrator'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

// Dashboard Guru
Route::middleware(['auth', 'check.role:guru'])->group(function () {
    Route::get('/guru/dashboard', function () {
        return view('guru.dashboard');
    })->name('guru.dashboard');
});

// Dashboard Siswa
Route::middleware(['auth', 'check.role:siswa'])->group(function () {
    Route::get('/dashboard-siswa', [DashboardController::class, 'siswa'])->name('siswa.dashboard');
});

// Dashboard Orang Tua
Route::middleware(['auth', 'check.role:ortu'])->group(function () {
    Route::get('/ortu/dashboard', function () {
        return view('ortu.dashboard');
    })->name('ortu.dashboard');
});

// Route manual untuk 3 berita statis
Route::prefix('berita-static')->group(function () {
    Route::view('/1', 'publik.berita.show-1')->name('berita.show1');
    Route::view('/2', 'publik.berita.show-2')->name('berita.show2');
    Route::view('/3', 'publik.berita.show-3')->name('berita.show3');
});

// Prestasi Publik
Route::prefix('prestasi-static')->group(function () {
    Route::view('/1', 'publik.prestasi.show-1')->name('prestasi.show1');
    Route::view('/2', 'publik.prestasi.show-2')->name('prestasi.show2');
    Route::view('/3', 'publik.prestasi.show-3')->name('prestasi.show3');
});

Route::middleware('auth')->group(function () {
    Route::resource('type-tasks', TypeTaskController::class);
});

Route::middleware('auth')->group(function () {
    Route::resource('classes-students', ClassesStudentController::class);
});

Route::middleware(['auth'])->group(function () {
    Route::resource('tahun', TahunController::class);
});

Route::middleware('auth')->group(function () {
    Route::resource('kelas', KelasController::class);
    Route::put('kelas/{kelas}/toggle-status', [KelasController::class, 'toggleStatus'])->name('kelas.toggle-status');
});

Route::middleware('auth')->group(function () {
    Route::prefix('admin')->group(function () {
        // Blok Admin yang SUDAH ADA
        Route::resource('prestasi', PrestasiController::class);

        // Tambahkan Berita di sini agar URL-nya menjadi /admin/berita/create
        Route::resource('berita', BeritaController::class)->parameters([
            'berita' => 'berita',
        ]);
    });
});


Route::middleware('auth')->group(function () {


    Route::get('/user-access', [UserAccessController::class, 'index'])->name('user-access.index');
    Route::put('/user-access/update/{id}', [UserAccessController::class, 'update'])->name('user-access.update');
    Route::put('/user-access/deactivate/{id}', [UserAccessController::class, 'deactivate'])->name('user-access.deactivate');
    // --

    Route::post('/daftar-siswa-baru', [PendaftaranController::class, 'store'])->name('publik.pendaftaran.store');

    // --

    // Menampilkan daftar siswa berdasarkan taskId
    Route::get('/type-task-siswa/{taskId}', [TypeTaskSiswaController::class, 'index'])->name('type-tasks-siswa.index');

    // Menampilkan form untuk membuat data siswa terkait task tertentu
    Route::get('/type-task-siswa/create/{taskId}', [TypeTaskSiswaController::class, 'create'])->name('type-tasks-siswa.create');

    // Menyimpan data siswa terkait task tertentu
    Route::post('/type-task-siswa/store', [TypeTaskSiswaController::class, 'store'])->name('type-tasks-siswa.store');

    // Menampilkan form edit data siswa
    Route::get('/type-task-siswa/{typeTaskSiswa}/edit', [TypeTaskSiswaController::class, 'edit'])->name('type-tasks-siswa.edit');

    // Mengupdate data siswa
    Route::put('/type-task-siswa/{typeTaskSiswa}', [TypeTaskSiswaController::class, 'update'])->name('type-tasks-siswa.update');

    // Menghapus data siswa
    Route::delete('/type-task-siswa/{typeTaskSiswa}', [TypeTaskSiswaController::class, 'destroy'])->name('type-tasks-siswa.destroy');

    Route::put('/type-task-siswa/{id}/updatenilai', [TypeTaskSiswaController::class, 'updateNilai'])
        ->name('type-tasks-siswa.updatenilai');
    // ----
    Route::resource('user-assignments', UserAssignmentController::class)->except(['show']);
    Route::get('/user-assignments/sync', [UserAssignmentController::class, 'sync'])->name('user-assignments.sync');

    // ---
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // --

    Route::get('/scores', [ScoreController::class, 'index'])->name('scores.index');
    Route::get('/scores/uts/{id}', [ScoreController::class, 'uts'])->name('scores.uts');
    Route::get('/scores/uas/{id}', [ScoreController::class, 'uas'])->name('scores.uas');

    Route::post('/scores/store-uts', [ScoreController::class, 'storeUts'])->name('scores.store.uts');
    Route::post('/scores/store-uas', [ScoreController::class, 'storeUas'])->name('scores.store.uas');

    // ----
    Route::resource('user_profiles', UserProfileController::class);
    Route::resource('module-permissions', ModulePermissionController::class);
    // Module Permissions import & export routes
    Route::post('module-permissions/import', [ModulePermissionController::class, 'import'])->name('module-permissions.import');
    Route::get('module-permissions/export', [ModulePermissionController::class, 'export'])->name('module-permissions.export');
    Route::get('module-permissions/template', [ModulePermissionController::class, 'downloadTemplate'])->name('module-permissions.download-template');

    // ----
    Route::get('/user-permissions', [UserPermissionsController::class, 'index'])->name('user-permissions.index');
    Route::post('/user-permissions/store', [UserPermissionsController::class, 'store'])->name('user-permissions.store');
    Route::get('/user-permissions/edit/{roleId}', [UserPermissionsController::class, 'edit'])->name('user-permissions.edit');
    Route::post('/user-permissions/import', [UserPermissionsController::class, 'import'])->name('user-permissions.import');
    Route::get('/user-permissions/export', [UserPermissionsController::class, 'export'])->name('user-permissions.export');
    Route::get('/user-permissions/template', [UserPermissionsController::class, 'downloadTemplate'])->name('user-permissions.download-template');
    Route::get('/user-permissions/sync', [UserPermissionsController::class, 'sync'])->name('user-permissions.sync');

    Route::resource('mapels', MapelController::class);


    // ---
    Route::resource('teaching_assignments', controller: TeachingAssignmentController::class);
    Route::post('/user-profiles/import', [UserProfileController::class, 'import'])->name('user_profiles.import');
    Route::get('/user-profiles/template', [UserProfileController::class, 'downloadTemplate'])->name('user_profiles.download-template');
    Route::get('user-profiles/export/{format}', [UserProfileController::class, 'export'])->name('user_profiles.export');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::post('roles/import', [RoleController::class, 'import'])->name('roles.import');
    Route::get('roles/export', [RoleController::class, 'export'])->name('roles.export');
    Route::resource('roles', RoleController::class);

    Route::resource('modules', ModuleController::class);
    Route::post('modules/import', [ModuleController::class, 'import'])->name('modules.import');
    Route::get('modules/export', [ModuleController::class, 'export'])->name('modules.export');

    Route::resource('method-actions', MethodActionController::class);
    Route::get('method-actions/export/{type}', [MethodActionController::class, 'export'])->name('method-actions.export');
    Route::get('method-actions/import-view', [MethodActionController::class, 'importView'])->name('method-actions.import-view');
    Route::get('method-actions/print', [MethodActionController::class, 'print'])->name('method-actions.print');

});

// Route::get('/modules', [ModuleController::class, 'index'])
//     ->middleware('check.permission:modules,index')
//     ->name('modules.index');


require __DIR__ . '/auth.php';
