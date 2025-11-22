@extends('layouts.admin')

@section('title', 'Tambah Stok Darah')
@section('page-title', 'Tambah Stok Darah')

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header bg-white">
                <h5 class="card-title mb-0">Form Tambah Stok Darah</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.stok-darah.store') }}" method="POST">
                    @csrf
                    
                    <div class="mb-3">
                        <label for="golongan_darah" class="form-label">Golongan Darah <span class="text-danger">*</span></label>
                        <select class="form-select @error('golongan_darah') is-invalid @enderror" 
                                id="golongan_darah" name="golongan_darah" required>
                            <option value="">Pilih Golongan Darah</option>
                            @foreach(['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'] as $gol)
                                <option value="{{ $gol }}" {{ old('golongan_darah') == $gol ? 'selected' : '' }}>{{ $gol }}</option>
                            @endforeach
                        </select>
                        @error('golongan_darah')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="jumlah" class="form-label">Jumlah Kantong <span class="text-danger">*</span></label>
                        <input type="number" class="form-control @error('jumlah') is-invalid @enderror" 
                               id="jumlah" name="jumlah" value="{{ old('jumlah', 0) }}" min="0" required>
                        @error('jumlah')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('admin.stok-darah.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left me-1"></i> Kembali
                        </a>
                        <button type="submit" class="btn btn-blood">
                            <i class="fas fa-save me-1"></i> Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
