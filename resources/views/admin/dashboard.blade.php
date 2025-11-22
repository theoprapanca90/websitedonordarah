@extends('layouts.admin')

@section('title', 'Dashboard Admin')
@section('page-title', 'Dashboard')

@section('content')
<div class="row">
    <div class="col-md-3 mb-4">
        <div class="card card-dashboard">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h6 class="card-subtitle mb-2 text-muted">Total Pendonor</h6>
                        <h3 class="stat-number">{{ $totalPendonor }}</h3>
                    </div>
                    <div class="icon-stat">
                        <i class="fas fa-users fa-2x text-primary"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-4">
        <div class="card card-dashboard">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h6 class="card-subtitle mb-2 text-muted">Total Kantong Darah</h6>
                        <h3 class="stat-number">{{ $totalKantongDarah }}</h3>
                    </div>
                    <div class="icon-stat">
                        <i class="fas fa-tint fa-2x text-danger"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-4">
        <div class="card card-dashboard">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h6 class="card-subtitle mb-2 text-muted">Jadwal Mendatang</h6>
                        <h3 class="stat-number">{{ $totalJadwal }}</h3>
                    </div>
                    <div class="icon-stat">
                        <i class="fas fa-calendar fa-2x text-success"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-4">
        <div class="card card-dashboard">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h6 class="card-subtitle mb-2 text-muted">Donor Hari Ini</h6>
                        <h3 class="stat-number">{{ $donorHariIni }}</h3>
                    </div>
                    <div class="icon-stat">
                        <i class="fas fa-calendar-day fa-2x text-warning"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-8 mb-4">
        <div class="card">
            <div class="card-header bg-white">
                <h5 class="card-title">Donor Bulan Ini</h5>
            </div>
            <div class="card-body">
                <p class="mb-0">Total donor bulan ini: <strong>{{ $riwayatBulanIni }}</strong></p>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-4">
        <div class="card">
            <div class="card-header bg-white">
                <h5 class="card-title">Stok Darah per Golongan</h5>
            </div>
            <div class="card-body">
                @foreach($stokDarah as $stok)
                <div class="blood-type-card p-3 mb-3">
                    <div class="d-flex justify-content-between">
                        <span class="blood-type">{{ $stok->golongan_darah }}</span>
                        <span class="fw-bold">{{ $stok->jumlah }} Kantong</span>
                    </div>
                    <div class="progress mt-2" style="height: 8px;">
                        <div class="progress-bar bg-danger" style="width: {{ min(($stok->jumlah / 100) * 100, 100) }}%"></div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-white d-flex justify-content-between align-items-center">
                <h5 class="card-title">Pendonor Terbaru</h5>
                <a href="{{ route('admin.pendonor.create') }}" class="btn btn-blood btn-sm">
                    <i class="fas fa-plus me-1"></i> Tambah Pendonor
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Gol. Darah</th>
                                <th>Telepon</th>
                                <th>Total Donor</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($pendonorTerbaru as $pendonor)
                            <tr>
                                <td>{{ $pendonor->name }}</td>
                                <td>{{ $pendonor->email }}</td>
                                <td><span class="blood-badge">{{ $pendonor->golongan_darah }}</span></td>
                                <td>{{ $pendonor->telepon }}</td>
                                <td>{{ $pendonor->riwayat_donor_count }}</td>
                                <td>
                                    <a href="{{ route('admin.pendonor.show', $pendonor) }}" class="btn btn-sm btn-outline-primary">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.pendonor.edit', $pendonor) }}" class="btn btn-sm btn-outline-success">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center">Belum ada data pendonor</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
