<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Merek;

class MerekController extends Controller
{
    // Menampilkan semua data merek
    public function index()
    {
        $mereks = Merek::all();
        return view('merek.index', compact('mereks'));
    }

    // Menampilkan form tambah merek
    public function create()
    {
        return view('merek.create');
    }

    // Menyimpan data merek baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_merek' => 'required|string|max:100',
        ]);

        Merek::create([
            'nama_merek' => $request->nama_merek
        ]);

        return redirect()->route('merek.index')->with('success', 'Merek berhasil ditambahkan!');
    }

    // Menampilkan form edit
    public function edit($id)
    {
        $merek = Merek::findOrFail($id);
        return view('merek.edit', compact('merek'));
    }

    // Memperbarui data merek
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_merek' => 'required|string|max:100',
        ]);

        $merek = Merek::findOrFail($id);
        $merek->update([
            'nama_merek' => $request->nama_merek
        ]);

        return redirect()->route('merek.index')->with('success', 'Merek berhasil diperbarui!');
    }

    // Menghapus data merek
    public function destroy($id)
    {
        $merek = Merek::findOrFail($id);
        $merek->delete();

        return redirect()->route('merek.index')->with('success', 'Merek berhasil dihapus!');
    }
}
