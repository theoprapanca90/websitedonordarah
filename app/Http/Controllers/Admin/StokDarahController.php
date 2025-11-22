<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StokDarah;
use Illuminate\Http\Request;

class StokDarahController extends Controller
{
    public function index()
    {
        $stokDarah = StokDarah::all();
        return view('admin.stok-darah.index', compact('stokDarah'));
    }

    public function create()
    {
        return view('admin.stok-darah.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'golongan_darah' => 'required|in:A+,A-,B+,B-,AB+,AB-,O+,O-|unique:stok_darah,golongan_darah',
            'jumlah' => 'required|integer|min:0',
        ]);

        StokDarah::create($validated);

        return redirect()->route('admin.stok-darah.index')
            ->with('success', 'Stok darah berhasil ditambahkan');
    }

    public function edit(StokDarah $stokDarah)
    {
        return view('admin.stok-darah.edit', compact('stokDarah'));
    }

    public function update(Request $request, StokDarah $stokDarah)
    {
        $validated = $request->validate([
            'jumlah' => 'required|integer|min:0',
        ]);

        $stokDarah->update($validated);

        return redirect()->route('admin.stok-darah.index')
            ->with('success', 'Stok darah berhasil diperbarui');
    }

    public function destroy(StokDarah $stokDarah)
    {
        $stokDarah->delete();

        return redirect()->route('admin.stok-darah.index')
            ->with('success', 'Stok darah berhasil dihapus');
    }
}
