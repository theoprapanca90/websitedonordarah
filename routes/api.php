<?php

use App\Http\Controllers\Api\StokDarahController;
use App\Http\Controllers\Api\JadwalDonorController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('v1')->group(function () {
    Route::get('/stok-darah', [StokDarahController::class, 'index']);
    Route::get('/stok-darah/{golonganDarah}', [StokDarahController::class, 'show']);
    
    Route::get('/jadwal-donor', [JadwalDonorController::class, 'index']);
    Route::get('/jadwal-donor/{id}', [JadwalDonorController::class, 'show']);
});
