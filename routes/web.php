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
Route::delete('/admin/destroy/source/{source}', [DashboardController::class, 'adminDestroySource'])->middleware(['auth', 'verified'])->name('admin.destroy-source');
Route::get('/admin/store/source', [DashboardController::class, 'adminStoreSource'])->middleware(['auth', 'verified'])->name('admin.store-source');

Route::delete('/admin/destroy/user/{user}', [DashboardController::class, 'adminDestroyUser'])->middleware(['auth', 'verified'])->name('admin.destroy-user');

Route::post('/items/{id}/verify', [DashboardController::class, 'verifyItem'])->middleware(['auth', 'verified'])->name('admin.verify-items');

Route::post('/items/{id}/favorite', [DashboardController::class, 'addFavorite'])->middleware(['auth', 'verified'])->name('user.favorite');
Route::post('/items/{id}/unfavorite', [DashboardController::class, 'removeFavorite'])->middleware(['auth', 'verified'])->name('user.unfavorite');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('items', ItemController::class);

require __DIR__ . '/auth.php';
