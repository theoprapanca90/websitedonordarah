<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\JadwalDonor;
use Illuminate\Http\Request;

class JadwalDonorController extends Controller
{
    public function index()
    {
        $jadwalDonor = JadwalDonor::where('tanggal', '>=', now())
            ->orderBy('tanggal', 'asc')
            ->get();
        
        return response()->json([
            'success' => true,
            'data' => $jadwalDonor
        ]);
    }

    public function show($id)
    {
        $jadwal = JadwalDonor::find($id);
        
        if (!$jadwal) {
            return response()->json([
                'success' => false,
                'message' => 'Jadwal tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $jadwal
        ]);
    }
}
