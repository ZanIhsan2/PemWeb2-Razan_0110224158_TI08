<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\KelurahanController;
use App\Http\Controllers\PasienController;
use Illuminate\View\View;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get(uri: '/papan', action: function (): View {
    return view(view: 'index');
    })->name(name: 'admin');
});

// Tambahan Route Baru
Route::get('/salam', function(){
    return "Salam STTNF, Selamat datang di Laravel";
});

Route::get('/woi', function(){
    return "INI ADMIN";
});

Route::get('/mahasiswa', function(){
    return view('profil');
});

Route::get(uri: '/books', action: [BookController::class, 'index']);
Route::get(uri: '/books/create', action: [BookController::class, 'create']);
Route::post(uri: '/books/store', action: [BookController::class, 'store']);
Route::get(uri: '/books/edit/{id}', action: [BookController::class, 'edit']);
Route::put(uri: '/books/update/{id}', action: [BookController::class, 'update']);
Route::delete(uri: '/books/delete/{id}', action: [BookController::class, 'destroy']);

// Route::get('kelurahan', [KelurahanController::class, 'index'])->name('kelurahan.index');

Route::get('/pasien/show', [PasienController::class, 'show']);



require __DIR__.'/auth.php';