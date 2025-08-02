<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    protected $table = 'pembayarans'; // pastikan sama dengan nama tabel
    protected $fillable = ['user_id', 'mobil_id', 'jumlah', 'tanggal', 'metode'];
}
