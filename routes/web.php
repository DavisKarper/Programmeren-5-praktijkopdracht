<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ItemController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/admin/create/source', [DashboardController::class, 'adminCreateSource'])->middleware(['auth', 'verified'])->name('admin.create-source');
Route::get('/admin/store/source', [DashboardController::class, 'adminStoreSource'])->middleware(['auth', 'verified'])->name('admin.store-source');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('items', ItemController::class);

require __DIR__ . '/auth.php';
