@extends('layouts.admin')

@section('title', 'Tambah Pendonor')
@section('page-title', 'Tambah Pendonor')

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header bg-white">
                <h5 class="card-title mb-0">Form Tambah Pendonor</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.pendonor.store') }}" method="POST">
                    @csrf
                    
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" 
                               id="name" name="name" value="{{ old('name') }}" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" 
                               id="email" name="email" value="{{ old('email') }}" required>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" 
                               id="password" name="password" required>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="golongan_darah" class="form-label">Golongan Darah <span class="text-danger">*</span></label>
                        <select class="form-select @error('golongan_darah') is-invalid @enderror" 
                                id="golongan_darah" name="golongan_darah" required>
                            <option value="">Pilih Golongan Darah</option>
                            <option value="A+" {{ old('golongan_darah') == 'A+' ? 'selected' : '' }}>A+</option>
                            <option value="A-" {{ old('golongan_darah') == 'A-' ? 'selected' : '' }}>A-</option>
                            <option value="B+" {{ old('golongan_darah') == 'B+' ? 'selected' : '' }}>B+</option>
                            <option value="B-" {{ old('golongan_darah') == 'B-' ? 'selected' : '' }}>B-</option>
                            <option value="AB+" {{ old('golongan_darah') == 'AB+' ? 'selected' : '' }}>AB+</option>
                            <option value="AB-" {{ old('golongan_darah') == 'AB-' ? 'selected' : '' }}>AB-</option>
                            <option value="O+" {{ old('golongan_darah') == 'O+' ? 'selected' : '' }}>O+</option>
                            <option value="O-" {{ old('golongan_darah') == 'O-' ? 'selected' : '' }}>O-</option>
                        </select>
                        @error('golongan_darah')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="tanggal_lahir" class="form-label">Tanggal Lahir <span class="text-danger">*</span></label>
                        <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" 
                               id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" required>
                        @error('tanggal_lahir')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="telepon" class="form-label">Telepon <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('telepon') is-invalid @enderror" 
                               id="telepon" name="telepon" value="{{ old('telepon') }}" required>
                        @error('telepon')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat <span class="text-danger">*</span></label>
                        <textarea class="form-control @error('alamat') is-invalid @enderror" 
                                  id="alamat" name="alamat" rows="3" required>{{ old('alamat') }}</textarea>
                        @error('alamat')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('admin.pendonor.index') }}" class="btn btn-secondary">
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
