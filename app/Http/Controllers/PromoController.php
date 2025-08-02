<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Promo;

class PromoController extends Controller
{
    public function index()
    {
        $promos = Promo::all();
        return view('promo.index', compact('promos'));
    }

    public function create()
    {
        return view('promo.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'diskon' => 'required|numeric',
            'deskripsi' => 'nullable|string',
        ]);

        Promo::create($request->all());

        return redirect()->route('promo.index')->with('success', 'Promo berhasil ditambahkan');
    }

    public function edit($id)
    {
        $promo = Promo::findOrFail($id);
        return view('promo.edit', compact('promo'));
    }

    public function update(Request $request, $id)
    {
        $promo = Promo::findOrFail($id);

        $request->validate([
            'judul' => 'required|string|max:255',
            'diskon' => 'required|numeric',
            'deskripsi' => 'nullable|string',
        ]);

        $promo->update($request->all());

        return redirect()->route('promo.index')->with('success', 'Promo berhasil diupdate');
    }

    public function destroy($id)
    {
        Promo::destroy($id);
        return redirect()->route('promo.index')->with('success', 'Promo berhasil dihapus');
    }
}
