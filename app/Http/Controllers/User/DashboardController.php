<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\StokDarah;
use App\Models\JadwalDonor;
use App\Models\RiwayatDonor;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $stokDarah = StokDarah::all();
        $jadwalTerdekat = JadwalDonor::where('tanggal', '>=', now())
            ->orderBy('tanggal', 'asc')
            ->take(3)
            ->get();
        
        $riwayatDonor = RiwayatDonor::where('user_id', $user->id)
            ->orderBy('tanggal', 'desc')
            ->take(5)
            ->get();
        
        $totalDonor = RiwayatDonor::where('user_id', $user->id)
            ->where('status', 'selesai')
            ->count();

        return view('user.dashboard', compact('stokDarah', 'jadwalTerdekat', 'riwayatDonor', 'totalDonor'));
    }
}
