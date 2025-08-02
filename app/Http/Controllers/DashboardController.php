<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Mobil;
use App\Models\Merek;
use App\Models\Pembayaran;
use App\Models\Promo;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Hitung jumlah data dari masing-masing tabel
        $userCount = User::count();
        $mobilCount = Mobil::count();
        $merekCount = Merek::count();
        $paymentCount = Pembayaran::count();
        $promoCount = Promo::count();

        // Kirim semua data ke view dashboard
        return view('dashboard', [
            'userCount' => $userCount,
            'mobilCount' => $mobilCount,
            'merekCount' => $merekCount,
            'paymentCount' => $paymentCount,
            'promoCount' => $promoCount,
        ]);
    }
}
