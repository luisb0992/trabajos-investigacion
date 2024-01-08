<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__ . '/auth.php';
require __DIR__ . '/profile.php';


// grupo de rutas para works
Route::group(['prefix' => 'investigation-works', 'as' => 'investigation-works.'], function () {
    Route::get('/', [App\Http\Controllers\InvestigationWorkController::class, 'index'])->name('index');
    Route::get('/create', [App\Http\Controllers\InvestigationWorkController::class, 'create'])->name('create');
    Route::post('/', [App\Http\Controllers\InvestigationWorkController::class, 'store'])->name('store');
    Route::get('/{work}/edit', [App\Http\Controllers\InvestigationWorkController::class, 'edit'])->name('edit')->middleware('admin_rol');
    Route::put('/{work}', [App\Http\Controllers\InvestigationWorkController::class, 'update'])->name('update')->middleware('admin_rol');
    Route::delete('/{work}', [App\Http\Controllers\InvestigationWorkController::class, 'destroy'])->name('destroy')->middleware('admin_rol');
    Route::get('/{work}', [App\Http\Controllers\InvestigationWorkController::class, 'downloadFile'])->name('downloadFile');
})->middleware(['auth']);

// grupo de rutas para usuarios
Route::group(['prefix' => 'users', 'as' => 'users.'], function () {
    Route::get('/', [App\Http\Controllers\UserController::class, 'index'])->name('index')->middleware('admin_rol');
    Route::get('/create', [App\Http\Controllers\UserController::class, 'create'])->name('create')->middleware('admin_rol');
    Route::post('/', [App\Http\Controllers\UserController::class, 'store'])->name('store')->middleware('admin_rol');
    Route::get('/{user}/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('edit')->middleware('admin_rol');
    Route::put('/{user}', [App\Http\Controllers\UserController::class, 'update'])->name('update')->middleware('admin_rol');
    Route::delete('/{user}', [App\Http\Controllers\UserController::class, 'destroy'])->name('destroy')->middleware('admin_rol');
})->middleware(['auth']);
