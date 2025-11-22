<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JadwalDonor;
use Illuminate\Http\Request;

class JadwalDonorController extends Controller
{
    public function index()
    {
        $jadwalDonor = JadwalDonor::orderBy('tanggal', 'desc')->paginate(10);
        return view('admin.jadwal-donor.index', compact('jadwalDonor'));
    }

    public function create()
    {
        return view('admin.jadwal-donor.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'lokasi' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
            'keterangan' => 'nullable|string',
        ]);

        JadwalDonor::create($validated);

        return redirect()->route('admin.jadwal-donor.index')
            ->with('success', 'Jadwal donor berhasil ditambahkan');
    }

    public function edit(JadwalDonor $jadwalDonor)
    {
        return view('admin.jadwal-donor.edit', compact('jadwalDonor'));
    }

    public function update(Request $request, JadwalDonor $jadwalDonor)
    {
        $validated = $request->validate([
            'lokasi' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
            'keterangan' => 'nullable|string',
        ]);

        $jadwalDonor->update($validated);

        return redirect()->route('admin.jadwal-donor.index')
            ->with('success', 'Jadwal donor berhasil diperbarui');
    }

    public function destroy(JadwalDonor $jadwalDonor)
    {
        $jadwalDonor->delete();

        return redirect()->route('admin.jadwal-donor.index')
            ->with('success', 'Jadwal donor berhasil dihapus');
    }
}
