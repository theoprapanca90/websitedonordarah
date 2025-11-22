<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PendonorController extends Controller
{
    public function index()
    {
        $pendonors = User::where('role', 'pendonor')
            ->withCount('riwayatDonor')
            ->latest()
            ->paginate(10);
        
        return view('admin.pendonor.index', compact('pendonors'));
    }

    public function create()
    {
        return view('admin.pendonor.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'golongan_darah' => 'required|in:A+,A-,B+,B-,AB+,AB-,O+,O-',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string',
            'telepon' => 'required|string',
        ]);

        $validated['password'] = Hash::make($validated['password']);
        $validated['role'] = 'pendonor';

        User::create($validated);

        return redirect()->route('admin.pendonor.index')
            ->with('success', 'Pendonor berhasil ditambahkan');
    }

    public function show(User $pendonor)
    {
        $pendonor->load('riwayatDonor');
        return view('admin.pendonor.show', compact('pendonor'));
    }

    public function edit(User $pendonor)
    {
        return view('admin.pendonor.edit', compact('pendonor'));
    }

    public function update(Request $request, User $pendonor)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $pendonor->id,
            'golongan_darah' => 'required|in:A+,A-,B+,B-,AB+,AB-,O+,O-',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string',
            'telepon' => 'required|string',
        ]);

        if ($request->filled('password')) {
            $validated['password'] = Hash::make($request->password);
        }

        $pendonor->update($validated);

        return redirect()->route('admin.pendonor.index')
            ->with('success', 'Pendonor berhasil diperbarui');
    }

    public function destroy(User $pendonor)
    {
        $pendonor->delete();

        return redirect()->route('admin.pendonor.index')
            ->with('success', 'Pendonor berhasil dihapus');
    }
}
