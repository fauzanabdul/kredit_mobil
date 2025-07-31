<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\Api\MobilController;
use App\Http\Controllers\Api\MerekController;

// 🔐 Endpoint Autentikasi (bebas diakses)
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// 🔒 Route yang butuh autentikasi Sanctum
Route::middleware('auth:sanctum')->group(function () {
    
    // ✅ Info dan Manajemen Akun
    Route::get('/me', [AuthController::class, 'me']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/users', [AuthController::class, 'getAllUsers']);
    Route::delete('/delete', [AuthController::class, 'deleteAccount']);

    // ✅ API Mobil (CRUD)
    Route::prefix('mobils')->group(function () {
        Route::get('/', [MobilController::class, 'index']);
        Route::post('/', [MobilController::class, 'store']);
        Route::get('/{id}', [MobilController::class, 'show']);
        Route::put('/{id}', [MobilController::class, 'update']);
        Route::delete('/{id}', [MobilController::class, 'destroy']);
    });

    // ✅ API Merek (CRUD sederhana: index & store)
    Route::prefix('mereks')->middleware('auth:sanctum')->group(function () {
    Route::get('/', [MerekController::class, 'index']);   // GET semua merek
    Route::post('/', [MerekController::class, 'store']);  // POST tambah merek
});

});
