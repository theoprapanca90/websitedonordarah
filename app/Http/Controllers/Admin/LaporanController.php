<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\StokDarah;
use App\Models\JadwalDonor;
use App\Models\RiwayatDonor;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class LaporanController extends Controller
{
    public function index()
    {
        return view('admin.laporan.index');
    }

    public function pendonor()
    {
        $pendonors = User::where('role', 'pendonor')
            ->withCount('riwayatDonor')
            ->get();

        $pdf = Pdf::loadView('admin.laporan.pendonor-pdf', compact('pendonors'));
        return $pdf->download('laporan-pendonor-' . date('Y-m-d') . '.pdf');
    }

    public function stokDarah()
    {
        $stokDarah = StokDarah::all();
        $totalStok = $stokDarah->sum('jumlah');

        $pdf = Pdf::loadView('admin.laporan.stok-darah-pdf', compact('stokDarah', 'totalStok'));
        return $pdf->download('laporan-stok-darah-' . date('Y-m-d') . '.pdf');
    }

    public function riwayatDonor(Request $request)
    {
        $query = RiwayatDonor::with('user');

        if ($request->filled('start_date')) {
            $query->whereDate('tanggal', '>=', $request->start_date);
        }

        if ($request->filled('end_date')) {
            $query->whereDate('tanggal', '<=', $request->end_date);
        }

        $riwayat = $query->orderBy('tanggal', 'desc')->get();

        $pdf = Pdf::loadView('admin.laporan.riwayat-donor-pdf', compact('riwayat'));
        return $pdf->download('laporan-riwayat-donor-' . date('Y-m-d') . '.pdf');
    }
}
