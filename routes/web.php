<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Profile\ProfileController;

Route::get('/', function () {
    return view('welcome');
});

/* Rotas da área administrativa do adminiistrador */
Route::prefix('/admin')->group(function () {
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
});
/* Rotas da área administrativa do adminiistrador */

/* Rotas da área administrativa do cliente */
Route::prefix('/perfil')->group(function () {
    Route::get('/', [ProfileController::class, 'dashboard'])->name('profile.dashboard');
});
/* Rotas da área administrativa do cliente */

/* Rotas públicas do site */
