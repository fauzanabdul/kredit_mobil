<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\MerekController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KerusakanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PromoController;
use App\Http\Controllers\MobilController;
use App\Http\Controllers\KreditController;
use App\Http\Controllers\LaporanController;

// Redirect root URL ke login
Route::get('/', fn() => redirect()->route('login'));

// Halaman Login
Route::get('/login', fn() => view('auth.login'))->name('login');

// Proses Login
Route::post('/login', function (Request $request) {
    $credentials = $request->only('email', 'password');
    if (Auth::attempt($credentials)) {
        return redirect()->route('dashboard');
    }
    return back()->withErrors(['login' => 'Email atau password salah.']);
})->name('login.post');

// Logout
Route::post('/logout', function () {
    Auth::logout();
    return redirect()->route('login');
})->name('logout');

// Route yang memerlukan login
Route::middleware('auth')->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Pendataan Umum
    Route::get('/pendataan', fn() => view('pendataan'))->name('pendataan');

    // Pendataan Kredit
    Route::get('/kredit', [KreditController::class, 'index'])->name('kredit.index'); // <<✅ ini ditampilkan dari controller
    Route::post('/kredit', [KreditController::class, 'store'])->name('kredit.store');

    // Promo
    Route::get('/promo', [PromoController::class, 'index'])->name('promo');

    // Pendataan Mobil (CRUD)
    Route::get('/mobil', [MobilController::class, 'index'])->name('mobil.index');
    Route::get('/mobil/create', [MobilController::class, 'create'])->name('mobil.create');
    Route::post('/mobil', [MobilController::class, 'store'])->name('mobil.store');
    Route::get('/mobil/{id}/edit', [MobilController::class, 'edit'])->name('mobil.edit');
    Route::put('/mobil/{id}', [MobilController::class, 'update'])->name('mobil.update');
    Route::delete('/mobil/{id}', [MobilController::class, 'destroy'])->name('mobil.destroy');

    // Pendataan Merek
    Route::get('/merek', [MerekController::class, 'index'])->name('merek.index');
    Route::get('/merek/create', [MerekController::class, 'create'])->name('merek.create');
    Route::post('/merek/store', [MerekController::class, 'store'])->name('merek.store');
    Route::get('/merek/{id}/edit', [MerekController::class, 'edit'])->name('merek.edit');
    Route::put('/merek/{id}', [MerekController::class, 'update'])->name('merek.update');
    Route::delete('/merek/{id}', [MerekController::class, 'destroy'])->name('merek.destroy');

    // Pendataan Kerusakan
    Route::get('/kerusakan', [KerusakanController::class, 'index'])->name('kerusakan.index');

    // Daftar Pengguna
    Route::get('/pengguna', [UserController::class, 'index'])->name('pengguna');
    Route::get('/pengguna/create', [UserController::class, 'create'])->name('pengguna.create');
    Route::post('/pengguna', [UserController::class, 'store'])->name('pengguna.store');
    Route::get('/pengguna/{id}/edit', [UserController::class, 'edit'])->name('pengguna.edit');
    Route::put('/pengguna/{id}', [UserController::class, 'update'])->name('pengguna.update');
    Route::delete('/pengguna/{id}', [UserController::class, 'destroy'])->name('pengguna.destroy');

    // Form Tambah Pengguna dari PenggunaController
    Route::get('/register_user', [PenggunaController::class, 'create'])->name('register_user');
    Route::post('/register_user', [PenggunaController::class, 'store'])->name('register_user.store');

    // Laporan
    Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan');
    Route::get('/laporan/kredit', [LaporanController::class, 'kredit'])->name('laporan.kredit');
    Route::get('/laporan/mobil', [LaporanController::class, 'mobil'])->name('laporan.mobil');

    // Pendataan Kredit
    Route::get('/kredit', [KreditController::class, 'index'])->name('kredit.index');
    Route::post('/kredit', [KreditController::class, 'store'])->name('kredit.store');
    Route::get('/kredit/{id}/edit', [KreditController::class, 'edit'])->name('kredit.edit');
    Route::put('/kredit/{id}', [KreditController::class, 'update'])->name('kredit.update');
    Route::delete('/krdit/{id}', [KreditController::class, 'destroy'])->name('kredit.destroy');

});
