<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * Kolom yang bisa diisi secara massal.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    /**
     * Kolom yang disembunyikan saat serialisasi (misal API response).
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Tipe casting kolom.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Set password otomatis ter-enkripsi saat diisi.
     *
     * @param string $value
     */
    public function setPasswordAttribute($value)
    {
        // Kalau sudah ter-enkripsi (panjang 60 karakter bcrypt), jangan ubah
        $this->attributes['password'] = \Illuminate\Support\Str::startsWith($value, '$2y$')
            ? $value
            : bcrypt($value);
    }
}
