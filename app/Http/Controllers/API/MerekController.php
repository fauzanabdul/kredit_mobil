<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Merek;
use Illuminate\Support\Facades\Validator;

class MerekController extends Controller
{
    // GET /api/merek
    public function index()
    {
        $data = Merek::all();

        return response()->json([
            'success' => true,
            'message' => 'Daftar semua merek',
            'data' => $data
        ], 200);
    }

    // POST /api/merek
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $merek = Merek::create([
            'nama' => $request->nama
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Merek berhasil ditambahkan',
            'data' => $merek
        ], 201);
    }
}
