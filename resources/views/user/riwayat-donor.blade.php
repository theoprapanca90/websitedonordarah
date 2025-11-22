@extends('layouts.user')

@section('title', 'Riwayat Donor')
@section('page-title', 'Riwayat Donor')

@section('content')
<div class="card">
    <div class="card-header bg-white">
        <h5 class="card-title mb-0">Riwayat Donor Saya</h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Lokasi</th>
                        <th>Status</th>
                        <th>Catatan</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($riwayatDonor as $index => $riwayat)
                    <tr>
                        <td>{{ $riwayatDonor->firstItem() + $index }}</td>
                        <td>{{ $riwayat->tanggal->format('d/m/Y') }}</td>
                        <td>{{ $riwayat->lokasi }}</td>
                        <td>
                            @if($riwayat->status == 'selesai')
                                <span class="badge bg-success">
                                    <i class="fas fa-check-circle me-1"></i>Selesai
                                </span>
                            @elseif($riwayat->status == 'dijadwalkan')
                                <span class="badge bg-warning">
                                    <i class="fas fa-clock me-1"></i>Dijadwalkan
                                </span>
                            @else
                                <span class="badge bg-danger">
                                    <i class="fas fa-times-circle me-1"></i>Dibatalkan
                                </span>
                            @endif
                        </td>
                        <td>{{ $riwayat->catatan ?? '-' }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center py-5">
                            <i class="fas fa-history fa-3x text-muted mb-3 d-block"></i>
                            <p class="text-muted mb-0">Belum ada riwayat donor</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <div class="mt-3">
            {{ $riwayatDonor->links() }}
        </div>

        @if($riwayatDonor->isNotEmpty())
        <div class="alert alert-success mt-4">
            <i class="fas fa-heart me-2"></i>
            <strong>Terima kasih!</strong> Anda telah mendonorkan darah sebanyak {{ $riwayatDonor->total() }} kali. Kontribusi Anda sangat berarti untuk menyelamatkan nyawa.
        </div>
        @endif
    </div>
</div>
@endsection
