<?php

use App\Http\Controllers\DeptController;
use App\Http\Controllers\DocsController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// })->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified', 'role:admin'])->name('admin.dashboard');

Route::get('user/document/create', [DocsController::class, 'createByUser'])->middleware(['auth'])->name('docs.create.user');
Route::get('document/download/{document}', [DocsController::class, 'download'])->middleware(['auth'])->name('docs.download');
Route::get('user/document/list', [DocsController::class, 'list_documents'])->middleware(['auth'])->name('user.docs.list');
Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::get('document/list', [DocsController::class, 'index'])->name('docs.list');
    Route::get('document/create', [DocsController::class, 'create'])->name('docs.create');
    Route::post('document/store', [DocsController::class, 'store'])->name('docs.store');
    Route::get('document/create/{document}', [DocsController::class, 'edit'])->name('docs.edit');
    Route::post('document/update/{document}', [DocsController::class, 'update'])->name('docs.update');
    Route::get('document/delete/{document}', [DocsController::class, 'destroy'])->name('docs.delete');

    Route::get('department/list', [DeptController::class, 'index'])->name('department.list');
    Route::get('department/create', [DeptController::class, 'create'])->name('department.create');
    Route::post('department/store', [DeptController::class, 'store'])->name('department.store');
    Route::get('department/create/{dept}', [DeptController::class, 'edit'])->name('department.edit');
    Route::post('department/update/{dept}', [DeptController::class, 'update'])->name('department.update');
    Route::get('department/delete/{dept}', [DeptController::class, 'destroy'])->name('department.delete');

    Route::get('user/list', [UserController::class, 'index'])->name('user.list');
    Route::get('user/create', [UserController::class, 'create'])->name('user.create');
    Route::post('user/store', [UserController::class, 'store'])->name('user.store');
    Route::get('user/delete/{user}', [UserController::class, 'destroy'])->name('user.delete');

    Route::get('permission/list', [PermissionController::class, 'index'])->name('permission.list');
// Route::get('permission/create',[PermissionController::class,'create'])->name('permission.create');
    Route::get('permission/edit/{permission}', [PermissionController::class, 'edit'])->name('permission.edit');
    Route::post('permission/store', [PermissionController::class, 'store'])->name('permission.store');
    Route::post('permission/update/{permission}', [PermissionController::class, 'update'])->name('permission.update');
    Route::get('permission/delete/{user}', [PermissionController::class, 'destroy'])->name('permission.delete');

    Route::get('role/create', [RoleController::class, 'create'])->name('role.create');
    Route::get('role/edit/{role}', [RoleController::class, 'edit'])->name('role.edit');
    Route::post('role/store', [RoleController::class, 'store'])->name('role.store');
    Route::post('role/update/{role}', [RoleController::class, 'update'])->name('role.update');
    Route::get('role/delete/{role}', [RoleController::class, 'destroy'])->name('role.delete');

});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
