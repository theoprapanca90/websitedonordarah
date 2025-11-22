@extends('layouts.user')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')
<div class="row">
    <div class="col-md-4 mb-4">
        <div class="card card-dashboard">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h6 class="card-subtitle mb-2 text-muted">Total Donor Saya</h6>
                        <h3 class="stat-number">{{ $totalDonor }}</h3>
                    </div>
                    <div class="icon-stat">
                        <i class="fas fa-tint fa-2x text-danger"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-4">
        <div class="card card-dashboard">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h6 class="card-subtitle mb-2 text-muted">Golongan Darah</h6>
                        <h3 class="stat-number">{{ Auth::user()->golongan_darah }}</h3>
                    </div>
                    <div class="icon-stat">
                        <i class="fas fa-heartbeat fa-2x text-primary"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-4">
        <div class="card card-dashboard">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h6 class="card-subtitle mb-2 text-muted">Jadwal Mendatang</h6>
                        <h3 class="stat-number">{{ $jadwalTerdekat->count() }}</h3>
                    </div>
                    <div class="icon-stat">
                        <i class="fas fa-calendar fa-2x text-success"></i>
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
                <h5 class="card-title">Jadwal Donor Terdekat</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>Lokasi</th>
                                <th>Jam</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($jadwalTerdekat as $jadwal)
                            <tr>
                                <td>{{ $jadwal->tanggal->format('d/m/Y') }}</td>
                                <td>{{ $jadwal->lokasi }}</td>
                                <td>{{ $jadwal->jam_mulai }} - {{ $jadwal->jam_selesai }}</td>
                                <td>{{ $jadwal->keterangan ?? '-' }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="text-center">Belum ada jadwal donor</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <a href="{{ route('user.jadwal-donor') }}" class="btn btn-blood btn-sm mt-2">
                    Lihat Semua Jadwal <i class="fas fa-arrow-right ms-1"></i>
                </a>
            </div>
        </div>
    </div>

    <div class="col-md-4 mb-4">
        <div class="card">
            <div class="card-header bg-white">
                <h5 class="card-title">Stok Darah</h5>
            </div>
            <div class="card-body">
                @foreach($stokDarah as $stok)
                <div class="blood-type-card p-2 mb-2">
                    <div class="d-flex justify-content-between">
                        <span class="blood-type" style="font-size: 1.2rem;">{{ $stok->golongan_darah }}</span>
                        <span class="fw-bold">{{ $stok->jumlah }}</span>
                    </div>
                </div>
                @endforeach
                <a href="{{ route('user.stok-darah') }}" class="btn btn-blood btn-sm mt-2 w-100">
                    Lihat Detail <i class="fas fa-arrow-right ms-1"></i>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-white">
                <h5 class="card-title">Riwayat Donor Terbaru</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>Lokasi</th>
                                <th>Status</th>
                                <th>Catatan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($riwayatDonor as $riwayat)
                            <tr>
                                <td>{{ $riwayat->tanggal->format('d/m/Y') }}</td>
                                <td>{{ $riwayat->lokasi }}</td>
                                <td>
                                    @if($riwayat->status == 'selesai')
                                        <span class="badge bg-success">Selesai</span>
                                    @elseif($riwayat->status == 'dijadwalkan')
                                        <span class="badge bg-warning">Dijadwalkan</span>
                                    @else
                                        <span class="badge bg-danger">Dibatalkan</span>
                                    @endif
                                </td>
                                <td>{{ $riwayat->catatan ?? '-' }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="text-center">Belum ada riwayat donor</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <a href="{{ route('user.riwayat-donor') }}" class="btn btn-blood btn-sm mt-2">
                    Lihat Semua Riwayat <i class="fas fa-arrow-right ms-1"></i>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
