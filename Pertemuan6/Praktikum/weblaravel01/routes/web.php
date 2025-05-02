<?php

use Illuminate\Support\Facades\Route;

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