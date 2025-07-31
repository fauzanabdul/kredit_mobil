<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kerusakan;

class KerusakanController extends Controller
{
    // Tampilkan semua data kerusakan
    public function index()
    {
        $data = Kerusakan::all();
        return view('kerusakan.index', compact('data'));
    }

    // Tampilkan form tambah kerusakan
    public function create()
    {
        return view('kerusakan.create');
    }

    // Simpan data kerusakan baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_mobil' => 'required|string',
            'deskripsi' => 'required|string',
            'status' => 'required|string',
        ]);

        Kerusakan::create($request->all());

        return redirect()->route('kerusakan.index')->with('success', 'Data kerusakan berhasil ditambahkan.');
    }

    // Tampilkan form edit kerusakan
    public function edit($id)
    {
        $kerusakan = Kerusakan::findOrFail($id);
        return view('kerusakan.edit', compact('kerusakan'));
    }

    // Update data kerusakan
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_mobil' => 'required|string',
            'deskripsi' => 'required|string',
            'status' => 'required|string',
        ]);

        $kerusakan = Kerusakan::findOrFail($id);
        $kerusakan->update($request->all());

        return redirect()->route('kerusakan.index')->with('success', 'Data kerusakan berhasil diperbarui.');
    }

    // Hapus data kerusakan
    public function destroy($id)
    {
        $kerusakan = Kerusakan::findOrFail($id);
        $kerusakan->delete();

        return redirect()->route('kerusakan.index')->with('success', 'Data kerusakan berhasil dihapus.');
    }
}
