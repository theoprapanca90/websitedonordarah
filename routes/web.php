<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\PendonorController;
use App\Http\Controllers\Admin\StokDarahController as AdminStokDarahController;
use App\Http\Controllers\Admin\JadwalDonorController as AdminJadwalDonorController;
use App\Http\Controllers\Admin\LaporanController;
use App\Http\Controllers\User\DashboardController as UserDashboardController;
use App\Http\Controllers\User\JadwalDonorController as UserJadwalDonorController;
use App\Http\Controllers\User\StokDarahController as UserStokDarahController;
use App\Http\Controllers\User\RiwayatDonorController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        if (auth()->user()->isAdmin()) {
            return redirect()->route('admin.dashboard');
        }
        return redirect()->route('user.dashboard');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    
    Route::resource('pendonor', PendonorController::class);
    Route::resource('stok-darah', AdminStokDarahController::class)->except(['show']);
    Route::resource('jadwal-donor', AdminJadwalDonorController::class)->except(['show']);
    
    Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
    Route::get('/laporan/pendonor', [LaporanController::class, 'pendonor'])->name('laporan.pendonor');
    Route::get('/laporan/stok-darah', [LaporanController::class, 'stokDarah'])->name('laporan.stok-darah');
    Route::get('/laporan/riwayat-donor', [LaporanController::class, 'riwayatDonor'])->name('laporan.riwayat-donor');
});

Route::middleware(['auth'])->prefix('user')->name('user.')->group(function () {
    Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('dashboard');
    Route::get('/jadwal-donor', [UserJadwalDonorController::class, 'index'])->name('jadwal-donor');
    Route::get('/stok-darah', [UserStokDarahController::class, 'index'])->name('stok-darah');
    Route::get('/riwayat-donor', [RiwayatDonorController::class, 'index'])->name('riwayat-donor');
});

require __DIR__.'/auth.php';
