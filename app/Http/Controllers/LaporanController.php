<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kredit;
use App\Models\Mobil;

class LaporanController extends Controller
{
    // Menampilkan halaman utama laporan
    public function index()
    {
        return view('laporan');
    }

    // Menampilkan laporan data kredit
    public function kredit()
    {
        $kredits = Kredit::latest()->get();
        return view('laporan.kredit', compact('kredits'));
    }

    // Menampilkan laporan data mobil
    public function mobil()
    {
        $mobils = Mobil::with('merek')->latest()->get();
        return view('laporan.mobil', compact('mobils'));
    }

    // Tambahkan method laporan lain di sini kalau diperlukan
}
