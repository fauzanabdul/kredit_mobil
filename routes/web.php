<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\MerekController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KerusakanController; // <-- Tambahan
use App\Http\Controllers\DashboardController;

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
// Redirect root URL ke login
Route::get('/', function () {
    return redirect()->route('login');
});

// Halaman Login
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

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
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Pendataan Umum
    Route::get('/pendataan', function () {
        return view('pendataan');
    })->name('pendataan');

    // Pendataan Kredit
    Route::get('/kredit', function () {
        return view('kredit.index');
    })->name('kredit.index');

    // Pendataan Mobil
    Route::get('/mobil', function () {
        return view('mobil.index');
    })->name('mobil.index');

    // Pendataan Merek
    Route::get('/merek', [MerekController::class, 'index'])->name('merek.index');
    Route::get('/merek/create', [MerekController::class, 'create'])->name('merek.create');
    Route::post('/merek', [MerekController::class, 'store'])->name('merek.store');
    Route::get('/merek/{id}/edit', [MerekController::class, 'edit'])->name('merek.edit');
    Route::put('/merek/{id}', [MerekController::class, 'update'])->name('merek.update');
    Route::delete('/merek/{id}', [MerekController::class, 'destroy'])->name('merek.destroy');
    Route::post('/merek/store', [MerekController::class, 'store'])->name('merek.store');

    // Pendataan Kerusakan
    Route::get('/kerusakan', [KerusakanController::class, 'index'])->name('kerusakan.index');

    // Daftar Pengguna
    Route::get('/pengguna', [UserController::class, 'index'])->name('pengguna');
    Route::get('/pengguna/create', [UserController::class, 'create'])->name('pengguna.create');
    Route::post('/pengguna', [UserController::class, 'store'])->name('pengguna.store');
    Route::get('/pengguna/{id}/edit', [UserController::class, 'edit'])->name('pengguna.edit');
    Route::put('/pengguna/{id}', [UserController::class, 'update'])->name('pengguna.update');
    Route::delete('/pengguna/{id}', [UserController::class, 'destroy'])->name('pengguna.destroy');

    // Form Tambah Pengguna
    Route::get('/register_user', [PenggunaController::class, 'create'])->name('register_user');

    // Proses Tambah Pengguna
    Route::post('/register_user', [PenggunaController::class, 'store'])->name('register_user.store');

    // Laporan
    Route::get('/laporan', function () {
        return view('laporan');
    })->name('laporan');
});
