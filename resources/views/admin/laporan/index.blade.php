@extends('layouts.admin')

@section('title', 'Laporan')
@section('page-title', 'Laporan')

@section('content')
<div class="row">
    <div class="col-md-4 mb-4">
        <div class="card card-dashboard">
            <div class="card-body">
                <h5 class="card-title"><i class="fas fa-users me-2 text-primary"></i>Laporan Pendonor</h5>
                <p class="card-text">Cetak laporan data pendonor lengkap dengan riwayat donor</p>
                <a href="{{ route('admin.laporan.pendonor') }}" class="btn btn-blood btn-sm" target="_blank">
                    <i class="fas fa-file-pdf me-1"></i> Cetak PDF
                </a>
            </div>
        </div>
    </div>

    <div class="col-md-4 mb-4">
        <div class="card card-dashboard">
            <div class="card-body">
                <h5 class="card-title"><i class="fas fa-tint me-2 text-danger"></i>Laporan Stok Darah</h5>
                <p class="card-text">Cetak laporan ketersediaan stok darah per golongan</p>
                <a href="{{ route('admin.laporan.stok-darah') }}" class="btn btn-blood btn-sm" target="_blank">
                    <i class="fas fa-file-pdf me-1"></i> Cetak PDF
                </a>
            </div>
        </div>
    </div>

    <div class="col-md-4 mb-4">
        <div class="card card-dashboard">
            <div class="card-body">
                <h5 class="card-title"><i class="fas fa-history me-2 text-success"></i>Laporan Riwayat Donor</h5>
                <p class="card-text">Cetak laporan riwayat donor dengan filter tanggal</p>
                <form action="{{ route('admin.laporan.riwayat-donor') }}" method="GET" target="_blank">
                    <div class="mb-2">
                        <label class="form-label small">Tanggal Mulai</label>
                        <input type="date" class="form-control form-control-sm" name="start_date">
                    </div>
                    <div class="mb-2">
                        <label class="form-label small">Tanggal Akhir</label>
                        <input type="date" class="form-control form-control-sm" name="end_date">
                    </div>
                    <button type="submit" class="btn btn-blood btn-sm">
                        <i class="fas fa-file-pdf me-1"></i> Cetak PDF
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
