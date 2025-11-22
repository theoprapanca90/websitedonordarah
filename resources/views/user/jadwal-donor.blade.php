@extends('layouts.user')

@section('title', 'Jadwal Donor')
@section('page-title', 'Jadwal Donor')

@section('content')
<div class="card">
    <div class="card-header bg-white">
        <h5 class="card-title mb-0">Jadwal Donor Mendatang</h5>
    </div>
    <div class="card-body">
        <div class="row">
            @forelse($jadwalDonor as $jadwal)
            <div class="col-md-6 mb-4">
                <div class="card border-start border-danger border-4">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <h5 class="card-title text-danger">
                                <i class="fas fa-map-marker-alt me-2"></i>{{ $jadwal->lokasi }}
                            </h5>
                            <span class="badge bg-danger">{{ $jadwal->tanggal->format('d M Y') }}</span>
                        </div>
                        <p class="card-text mb-2">
                            <i class="fas fa-clock me-2 text-muted"></i>
                            <strong>Jam:</strong> {{ $jadwal->jam_mulai }} - {{ $jadwal->jam_selesai }}
                        </p>
                        @if($jadwal->keterangan)
                        <p class="card-text mb-0">
                            <i class="fas fa-info-circle me-2 text-muted"></i>
                            {{ $jadwal->keterangan }}
                        </p>
                        @endif
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12">
                <div class="text-center py-5">
                    <i class="fas fa-calendar-times fa-3x text-muted mb-3"></i>
                    <p class="text-muted">Belum ada jadwal donor mendatang</p>
                </div>
            </div>
            @endforelse
        </div>
    </div>
</div>
@endsection
