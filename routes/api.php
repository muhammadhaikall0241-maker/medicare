<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CustomerController;
use App\Http\Controllers\Api\StaffController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// API KATEGORI MEDICARE
Route::apiResource('categories', CategoryController::class);

// API PRODUK MEDICARE
Route::apiResource('products', ProductController::class);

// API PELANGGAN MEDICARE
Route::apiResource('customers', CustomerController::class);

// API STAF APOTEK MEDICARE
Route::apiResource('staff', StaffController::class);

// API AUTENTIKASI MEDICARE
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth:sanctum');