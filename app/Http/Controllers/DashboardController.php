<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    /**
     * Tampilkan halaman dashboard.
     */
    public function index()
    {
        // Hitung total user dengan role 'pengguna'
        $jumlahPengguna = User::where('role', 'pengguna')->count();

        // Kirim data ke tampilan
        return view('dashboard', compact('jumlahPengguna'));
    }
}
