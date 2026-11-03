<?php

use Illuminate\Support\Facades\Route;

// Halaman utama MEDICARE
Route::get('/', function () {
    return view('welcome');
});

// Halaman manajemen MEDICARE
Route::view('/manajemen', 'management');