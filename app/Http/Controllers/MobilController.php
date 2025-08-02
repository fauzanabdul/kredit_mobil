<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mobil;
use App\Models\Merek;

class MobilController extends Controller
{
    // Tampilkan semua data mobil
    public function index()
    {
        $mobils = Mobil::with('merek')->get();
        $mereks = Merek::all();
        return view('mobil.index', compact('mobils', 'mereks'));
    }

    // Tampilkan form tambah mobil
    public function create()
    {
        $mereks = Merek::all();
        return view('mobil.create', compact('mereks'));
    }

    // Simpan data mobil baru
    public function store(Request $request)
{
    try {
        // Validasi
        $validated = $request->validate([
            'merek_id' => 'required|exists:mereks,id',
            'tahun' => 'required|integer|min:1900|max:'.(date('Y')+1),
            'warna' => 'required|string|max:50',
            'harga' => 'required|numeric|min:0',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Handle file upload
        if($request->hasFile('foto')) {
            $file = $request->file('foto');
            $fileName = time().'_'.$file->getClientOriginalName();
            $filePath = $file->storeAs('mobil-images', $fileName, 'public');
            $validated['foto'] = $filePath;
        }

        // Simpan data
        Mobil::create($validated);

        return redirect()->route('mobil.index')
            ->with('success', 'Mobil berhasil ditambahkan');

    } catch (\Exception $e) {
        return back()->withInput()
            ->with('error', 'Gagal menambahkan mobil: '.$e->getMessage());
    }
}

    // Tampilkan form edit
    public function edit($id)
    {
        $mobil = Mobil::findOrFail($id);
        $mereks = Merek::all();
        return view('mobil.edit', compact('mobil', 'mereks'));
    }

    // Simpan hasil edit
    public function update(Request $request, $id)
    {
        $mobil = Mobil::findOrFail($id);

        $request->validate([
            'merek_id' => 'required|exists:mereks,id',
            'tahun' => 'required|integer',
            'warna' => 'required|string|max:100',
            'harga' => 'required|numeric',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->except('foto');

        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($mobil->foto && file_exists(public_path($mobil->foto))) {
                unlink(public_path($mobil->foto));
            }

            $file = $request->file('foto');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('assets'), $filename);
            $data['foto'] = 'assets/' . $filename;
        }

        $mobil->update($data);

        return redirect()->route('mobil.index')->with('success', 'Data mobil berhasil diperbarui.');
    }

    // Hapus data mobil
    public function destroy($id)
    {
        $mobil = Mobil::findOrFail($id);

        // Hapus foto jika ada
        if ($mobil->foto && file_exists(public_path($mobil->foto))) {
            unlink(public_path($mobil->foto));
        }

        $mobil->delete();

        return redirect()->route('mobil.index')->with('success', 'Data mobil berhasil dihapus.');
    }
}
