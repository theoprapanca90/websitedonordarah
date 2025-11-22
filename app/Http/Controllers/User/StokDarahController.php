<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\StokDarah;
use Illuminate\Http\Request;

class StokDarahController extends Controller
{
    public function index()
    {
        $stokDarah = StokDarah::all();
        $totalStok = $stokDarah->sum('jumlah');
        
        return view('user.stok-darah', compact('stokDarah', 'totalStok'));
    }
}
