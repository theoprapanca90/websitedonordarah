<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\JadwalDonor;
use Illuminate\Http\Request;

class JadwalDonorController extends Controller
{
    public function index()
    {
        $jadwalDonor = JadwalDonor::where('tanggal', '>=', now())
            ->orderBy('tanggal', 'asc')
            ->paginate(10);
        
        return view('user.jadwal-donor', compact('jadwalDonor'));
    }
}
