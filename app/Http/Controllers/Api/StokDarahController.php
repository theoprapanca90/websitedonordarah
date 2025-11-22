<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\StokDarah;
use Illuminate\Http\Request;

class StokDarahController extends Controller
{
    public function index()
    {
        $stokDarah = StokDarah::all();
        return response()->json([
            'success' => true,
            'data' => $stokDarah
        ]);
    }

    public function show($golonganDarah)
    {
        $stok = StokDarah::where('golongan_darah', $golonganDarah)->first();
        
        if (!$stok) {
            return response()->json([
                'success' => false,
                'message' => 'Golongan darah tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $stok
        ]);
    }
}
