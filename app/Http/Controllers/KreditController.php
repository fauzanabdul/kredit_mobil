<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kredit;

class KreditController extends Controller
{
    // Menampilkan semua data kredit
    public function index()
    {
        $kredits = Kredit::latest()->get();
        return view('kredit.index', compact('kredits'));
    }

    // Menyimpan data kredit baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_mobil' => 'required|string|max:255',
            'tenor' => 'required|integer|min:1',
            'bunga' => 'required|numeric|min:0',
            'dp_minimum' => 'required|numeric|min:0',
            'metode_pembayaran' => 'required|string|max:100',
            'promo' => 'nullable|string|max:100',
        ]);

        Kredit::create($validated);

        return redirect()->route('kredit.index')->with('success', 'Data kredit berhasil disimpan!');
    }

    // Menampilkan form edit
    public function edit($id)
    {
        $kredit = Kredit::findOrFail($id);
        return view('kredit.edit', compact('kredit'));
    }

    // Menyimpan perubahan dari form edit
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_mobil' => 'required|string|max:255',
            'tenor' => 'required|integer|min:1',
            'bunga' => 'required|numeric|min:0',
            'dp_minimum' => 'required|numeric|min:0',
            'metode_pembayaran' => 'required|string|max:100',
            'promo' => 'nullable|string|max:100',
        ]);

        $kredit = Kredit::findOrFail($id);
        $kredit->update($validated);

        return redirect()->route('kredit.index')->with('success', 'Data kredit berhasil diperbarui!');
    }

    // Menghapus data kredit
    public function destroy($id)
    {
        $kredit = Kredit::findOrFail($id);
        $kredit->delete();

        return redirect()->route('kredit.index')->with('success', 'Data kredit berhasil dihapus!');
    }
}
