@extends('layouts.user')

@section('title', 'Stok Darah')
@section('page-title', 'Stok Darah')

@section('content')
<div class="card">
    <div class="card-header bg-white">
        <h5 class="card-title mb-0">Ketersediaan Stok Darah</h5>
    </div>
    <div class="card-body">
        <div class="row">
            @foreach($stokDarah as $stok)
            <div class="col-md-3 mb-4">
                <div class="card blood-type-card">
                    <div class="card-body text-center">
                        <span class="blood-type">{{ $stok->golongan_darah }}</span>
                        <h2 class="stat-number my-3">{{ $stok->jumlah }}</h2>
                        <p class="text-muted mb-3">Kantong Darah</p>
                        <div class="progress" style="height: 10px;">
                            <div class="progress-bar bg-danger" style="width: {{ min(($stok->jumlah / 100) * 100, 100) }}%"></div>
                        </div>
                        @if($stok->jumlah < 20)
                            <small class="text-danger mt-2 d-block">
                                <i class="fas fa-exclamation-triangle me-1"></i>Stok Menipis
                            </small>
                        @elseif($stok->jumlah < 50)
                            <small class="text-warning mt-2 d-block">
                                <i class="fas fa-info-circle me-1"></i>Stok Terbatas
                            </small>
                        @else
                            <small class="text-success mt-2 d-block">
                                <i class="fas fa-check-circle me-1"></i>Stok Tersedia
                            </small>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        @if($stokDarah->isEmpty())
        <div class="text-center py-5">
            <i class="fas fa-tint fa-3x text-muted mb-3"></i>
            <p class="text-muted">Belum ada data stok darah</p>
        </div>
        @endif

        <div class="alert alert-info mt-4">
            <i class="fas fa-info-circle me-2"></i>
            <strong>Informasi:</strong> Data stok darah diperbarui secara berkala. Untuk informasi lebih lanjut, silakan hubungi admin.
        </div>
    </div>
</div>
@endsection
