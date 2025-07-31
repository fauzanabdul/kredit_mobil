<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Tampilkan semua pengguna
    public function index()
    {
        $users = User::all();
        return view('pengguna', compact('users'));
    }

    // Tampilkan form tambah pengguna
    public function create()
    {
        return view('auth.register_user');
    }

    // Simpan pengguna baru
    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('pengguna')->with('success', 'Pengguna berhasil ditambahkan.');
    }

    // Tampilkan form edit pengguna
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('auth.edit', compact('user'));
    }

    // Simpan perubahan data pengguna
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:users,email,' . $id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $user->name  = $request->name;
        $user->email = $request->email;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('pengguna')->with('success', 'Data pengguna berhasil diperbarui.');
    }

    // Hapus pengguna
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('pengguna')->with('success', 'Pengguna berhasil dihapus.');
    }
}
