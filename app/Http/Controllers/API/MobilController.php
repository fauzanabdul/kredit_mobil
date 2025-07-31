<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mobil;
use Illuminate\Support\Facades\Validator;

class MobilController extends Controller
{
    // GET: Semua mobil
    public function index()
    {
        $mobils = Mobil::with('merek')->get();
        return response()->json([
            'success' => true,
            'data' => $mobils
        ], 200);
    }

    // POST: Tambah mobil baru
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'tahun' => 'required|digits:4|integer',
            'warna' => 'required|string',
            'harga' => 'required|numeric',
            'merek_id' => 'required|exists:mereks,id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $mobil = Mobil::create($validator->validated());

        return response()->json([
            'success' => true,
            'message' => 'Mobil berhasil ditambahkan',
            'data' => $mobil
        ], 201);
    }

    // GET: Detail mobil
    public function show($id)
    {
        $mobil = Mobil::with('merek')->find($id);

        if (!$mobil) {
            return response()->json([
                'success' => false,
                'message' => 'Mobil tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $mobil
        ], 200);
    }

    // PUT: Update mobil
    public function update(Request $request, $id)
    {
        $mobil = Mobil::find($id);

        if (!$mobil) {
            return response()->json([
                'success' => false,
                'message' => 'Mobil tidak ditemukan'
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'nama' => 'sometimes|required|string|max:255',
            'tahun' => 'sometimes|required|digits:4|integer',
            'warna' => 'sometimes|required|string',
            'harga' => 'sometimes|required|numeric',
            'merek_id' => 'sometimes|required|exists:mereks,id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $mobil->update($validator->validated());

        return response()->json([
            'success' => true,
            'message' => 'Mobil berhasil diperbarui',
            'data' => $mobil
        ], 200);
    }

    // DELETE: Hapus mobil
    public function destroy($id)
    {
        $mobil = Mobil::find($id);

        if (!$mobil) {
            return response()->json([
                'success' => false,
                'message' => 'Mobil tidak ditemukan'
            ], 404);
        }

        $mobil->delete();

        return response()->json([
            'success' => true,
            'message' => 'Mobil berhasil dihapus'
        ], 200);
    }
}
