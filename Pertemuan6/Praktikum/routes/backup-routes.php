<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KelurahanController;
use App\Http\Controllers\PasienController;

Route::get('/', function () {
    return view('welcome');
});

// Tambahan Route Baru
Route::get('/salam', function(){
    return "Salam STTNF, Selamat datang di Laravel";
});

Route::get('/admin', function(){
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