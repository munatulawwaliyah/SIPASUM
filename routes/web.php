<?php

use App\Http\Controllers\AdminPerumahanController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Models\Perumahan;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::match(['get', 'post'], '/', [HomeController::class, 'index']);

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


    // Route::resource('perumahan', AdminPerumahanController::class);

});

require __DIR__.'/auth.php';
