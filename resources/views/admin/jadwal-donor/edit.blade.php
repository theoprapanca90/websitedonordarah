@extends('layouts.admin')

@section('title', 'Edit Jadwal Donor')
@section('page-title', 'Edit Jadwal Donor')

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header bg-white">
                <h5 class="card-title mb-0">Form Edit Jadwal Donor</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.jadwal-donor.update', $jadwalDonor) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-3">
                        <label for="lokasi" class="form-label">Lokasi <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('lokasi') is-invalid @enderror" 
                               id="lokasi" name="lokasi" value="{{ old('lokasi', $jadwalDonor->lokasi) }}" required>
                        @error('lokasi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="tanggal" class="form-label">Tanggal <span class="text-danger">*</span></label>
                        <input type="date" class="form-control @error('tanggal') is-invalid @enderror" 
                               id="tanggal" name="tanggal" value="{{ old('tanggal', $jadwalDonor->tanggal->format('Y-m-d')) }}" required>
                        @error('tanggal')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="jam_mulai" class="form-label">Jam Mulai <span class="text-danger">*</span></label>
                            <input type="time" class="form-control @error('jam_mulai') is-invalid @enderror" 
                                   id="jam_mulai" name="jam_mulai" value="{{ old('jam_mulai', $jadwalDonor->jam_mulai) }}" required>
                            @error('jam_mulai')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="jam_selesai" class="form-label">Jam Selesai <span class="text-danger">*</span></label>
                            <input type="time" class="form-control @error('jam_selesai') is-invalid @enderror" 
                                   id="jam_selesai" name="jam_selesai" value="{{ old('jam_selesai', $jadwalDonor->jam_selesai) }}" required>
                            @error('jam_selesai')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="keterangan" class="form-label">Keterangan</label>
                        <textarea class="form-control @error('keterangan') is-invalid @enderror" 
                                  id="keterangan" name="keterangan" rows="3">{{ old('keterangan', $jadwalDonor->keterangan) }}</textarea>
                        @error('keterangan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('admin.jadwal-donor.index') }}" class="btn btn-secondary">
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
