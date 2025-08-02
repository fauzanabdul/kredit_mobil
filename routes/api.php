<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\Api\MobilController;
use App\Http\Controllers\Api\MerekController;
use App\Http\Controllers\Api\KreditController;

// 🔐 Endpoint Autentikasi (bebas diakses)
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// 🔒 Route yang memerlukan autentikasi Sanctum
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

    // ✅ API Merek (Index & Store)
    Route::prefix('mereks')->group(function () {
        Route::get('/', [MerekController::class, 'index']);
        Route::post('/', [MerekController::class, 'store']);
    });

    // ✅ API Kredit (CRUD)
    Route::prefix('kredit')->group(function () {
        Route::get('/', [KreditController::class, 'index']);
        Route::post('/', [KreditController::class, 'store']);
        Route::get('/{id}', [KreditController::class, 'show']);
        Route::put('/{id}', [KreditController::class, 'update']);
        Route::delete('/{id}', [KreditController::class, 'destroy']);
    });
});
