@extends('layouts.admin')

@section('title', 'Detail Pendonor')
@section('page-title', 'Detail Pendonor')

@section('content')
<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-header bg-white">
                <h5 class="card-title mb-0">Informasi Pendonor</h5>
            </div>
            <div class="card-body">
                <div class="text-center mb-3">
                    <i class="fas fa-user-circle fa-5x text-secondary"></i>
                    <h4 class="mt-2">{{ $pendonor->name }}</h4>
                    <span class="blood-badge">{{ $pendonor->golongan_darah }}</span>
                </div>
                
                <table class="table table-sm">
                    <tr>
                        <th width="40%">Email</th>
                        <td>{{ $pendonor->email }}</td>
                    </tr>
                    <tr>
                        <th>Tanggal Lahir</th>
                        <td>{{ $pendonor->tanggal_lahir?->format('d/m/Y') }}</td>
                    </tr>
                    <tr>
                        <th>Telepon</th>
                        <td>{{ $pendonor->telepon }}</td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td>{{ $pendonor->alamat }}</td>
                    </tr>
                    <tr>
                        <th>Terdaftar</th>
                        <td>{{ $pendonor->created_at->format('d/m/Y') }}</td>
                    </tr>
                </table>

                <div class="d-flex gap-2">
                    <a href="{{ route('admin.pendonor.edit', $pendonor) }}" class="btn btn-success btn-sm flex-fill">
                        <i class="fas fa-edit me-1"></i> Edit
                    </a>
                    <a href="{{ route('admin.pendonor.index') }}" class="btn btn-secondary btn-sm flex-fill">
                        <i class="fas fa-arrow-left me-1"></i> Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-8">
        <div class="card">
            <div class="card-header bg-white">
                <h5 class="card-title mb-0">Riwayat Donor</h5>
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
                            @forelse($pendonor->riwayatDonor as $riwayat)
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
            </div>
        </div>
    </div>
</div>
@endsection
