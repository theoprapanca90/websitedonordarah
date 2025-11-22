@extends('layouts.admin')

@section('title', 'Stok Darah')
@section('page-title', 'Stok Darah')

@section('content')
<div class="card">
    <div class="card-header bg-white d-flex justify-content-between align-items-center">
        <h5 class="card-title mb-0">Manajemen Stok Darah</h5>
        <a href="{{ route('admin.stok-darah.create') }}" class="btn btn-blood">
            <i class="fas fa-plus me-1"></i> Tambah Stok
        </a>
    </div>
    <div class="card-body">
        <div class="row">
            @foreach($stokDarah as $stok)
            <div class="col-md-3 mb-4">
                <div class="card blood-type-card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <span class="blood-type">{{ $stok->golongan_darah }}</span>
                            <div>
                                <a href="{{ route('admin.stok-darah.edit', $stok) }}" class="btn btn-sm btn-outline-success">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.stok-darah.destroy', $stok) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus stok ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                        <h3 class="stat-number text-center">{{ $stok->jumlah }}</h3>
                        <p class="text-center text-muted mb-0">Kantong Darah</p>
                        <div class="progress mt-3" style="height: 10px;">
                            <div class="progress-bar bg-danger" style="width: {{ min(($stok->jumlah / 100) * 100, 100) }}%"></div>
                        </div>
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
    </div>
</div>
@endsection
