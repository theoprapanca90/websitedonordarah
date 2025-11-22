<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\StokDarah;
use App\Models\JadwalDonor;
use App\Models\RiwayatDonor;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalPendonor = User::where('role', 'pendonor')->count();
        $totalKantongDarah = StokDarah::sum('jumlah');
        $totalJadwal = JadwalDonor::where('tanggal', '>=', now())->count();
        $donorHariIni = RiwayatDonor::whereDate('tanggal', today())
            ->where('status', 'selesai')
            ->count();

        $stokDarah = StokDarah::all();
        $pendonorTerbaru = User::where('role', 'pendonor')
            ->with('riwayatDonor')
            ->latest()
            ->take(5)
            ->get();

        $riwayatBulanIni = RiwayatDonor::whereMonth('tanggal', now()->month)
            ->whereYear('tanggal', now()->year)
            ->where('status', 'selesai')
            ->count();

        return view('admin.dashboard', compact(
            'totalPendonor',
            'totalKantongDarah',
            'totalJadwal',
            'donorHariIni',
            'stokDarah',
            'pendonorTerbaru',
            'riwayatBulanIni'
        ));
    }
}
