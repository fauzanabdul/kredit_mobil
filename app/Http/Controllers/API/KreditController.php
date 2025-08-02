<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kredit;

class KreditController extends Controller
{
    // GET /api/kredit
    public function index()
    {
        $kredits = Kredit::all();
        return response()->json($kredits);
    }

    // POST /api/kredit
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

        $kredit = Kredit::create($validated);

        return response()->json([
            'message' => 'Data kredit berhasil disimpan.',
            'data' => $kredit
        ], 201);
    }

    // GET /api/kredit/{id}
    public function show($id)
    {
        $kredit = Kredit::find($id);

        if (!$kredit) {
            return response()->json(['message' => 'Data tidak ditemukan.'], 404);
        }

        return response()->json($kredit);
    }

    // PUT /api/kredit/{id}
    public function update(Request $request, $id)
    {
        $kredit = Kredit::find($id);

        if (!$kredit) {
            return response()->json(['message' => 'Data tidak ditemukan.'], 404);
        }

        $validated = $request->validate([
            'nama_mobil' => 'required|string|max:255',
            'tenor' => 'required|integer|min:1',
            'bunga' => 'required|numeric|min:0',
            'dp_minimum' => 'required|numeric|min:0',
            'metode_pembayaran' => 'required|string|max:100',
            'promo' => 'nullable|string|max:100',
        ]);

        $kredit->update($validated);

        return response()->json([
            'message' => 'Data kredit berhasil diperbarui.',
            'data' => $kredit
        ]);
    }

    // DELETE /api/kredit/{id}
    public function destroy($id)
    {
        $kredit = Kredit::find($id);

        if (!$kredit) {
            return response()->json(['message' => 'Data tidak ditemukan.'], 404);
        }

        $kredit->delete();

        return response()->json(['message' => 'Data kredit berhasil dihapus.']);
    }
}
