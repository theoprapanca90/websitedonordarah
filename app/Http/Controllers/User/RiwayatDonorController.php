<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\RiwayatDonor;
use Illuminate\Http\Request;

class RiwayatDonorController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $riwayatDonor = RiwayatDonor::where('user_id', $user->id)
            ->orderBy('tanggal', 'desc')
            ->paginate(10);
        
        return view('user.riwayat-donor', compact('riwayatDonor'));
    }
}
