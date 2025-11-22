@extends('layouts.admin')

@section('title', 'Edit Stok Darah')
@section('page-title', 'Edit Stok Darah')

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header bg-white">
                <h5 class="card-title mb-0">Form Edit Stok Darah</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.stok-darah.update', $stokDarah) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-3">
                        <label for="golongan_darah" class="form-label">Golongan Darah</label>
                        <input type="text" class="form-control" value="{{ $stokDarah->golongan_darah }}" disabled>
                        <small class="text-muted">Golongan darah tidak dapat diubah</small>
                    </div>

                    <div class="mb-3">
                        <label for="jumlah" class="form-label">Jumlah Kantong <span class="text-danger">*</span></label>
                        <input type="number" class="form-control @error('jumlah') is-invalid @enderror" 
                               id="jumlah" name="jumlah" value="{{ old('jumlah', $stokDarah->jumlah) }}" min="0" required>
                        @error('jumlah')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('admin.stok-darah.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left me-1"></i> Kembali
                        </a>
                        <button type="submit" class="btn btn-blood">
                            <i class="fas fa-save me-1"></i> Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
