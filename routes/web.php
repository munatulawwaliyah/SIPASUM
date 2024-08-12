<?php

use App\Http\Controllers\AdminBeritaController;
use App\Http\Controllers\AdminPerumahanController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\DaptarperumController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::match(['get', 'post'], '/', [HomeController::class, 'index']);
Route::get('/getDesa/{kecamatan_id}', [HomeController::class, 'getDesa']);

Route::get('/daftarperumahan', [DaptarperumController::class, 'index']);
Route::get('/berita', [BeritaController::class, 'index'])->name('berita.index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/perumahan', [AdminPerumahanController::class, 'index'])->name('perumahan');
    Route::post('/perumahan', [AdminPerumahanController::class, 'create'])->name('perumahan.create');
    Route::delete('/perumahan/{id}', [AdminPerumahanController::class, 'delete'])->name('perumahan.delete');
    Route::put('/perumahan/{id}', [AdminPerumahanController::class, 'update'])->name('perumahan.update');
    Route::get('/perumahan/{kecamatans_id}', [AdminPerumahanController::class, 'getDesa']);
});

Route::middleware('auth')->group(function () {
    Route::get('/adminberita', [AdminBeritaController::class, 'index', 'show'])->name('adminberita');
    Route::post('/adminberita', [AdminBeritaController::class, 'store'])->name('adminberita.store');
    Route::put('/adminberita/{id}', [AdminBeritaController::class, 'update'])->name('adminberita.update');
    Route::delete('/adminberita/{id}', [AdminBeritaController::class, 'delete'])->name('adminberita.delete');

});

require __DIR__.'/auth.php';
