@extends('layouts.admin')

@section('title', 'Data Pendonor')
@section('page-title', 'Data Pendonor')

@section('content')
<div class="card">
    <div class="card-header bg-white d-flex justify-content-between align-items-center">
        <h5 class="card-title mb-0">Daftar Pendonor</h5>
        <a href="{{ route('admin.pendonor.create') }}" class="btn btn-blood">
            <i class="fas fa-plus me-1"></i> Tambah Pendonor
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Gol. Darah</th>
                        <th>Tanggal Lahir</th>
                        <th>Telepon</th>
                        <th>Total Donor</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pendonors as $index => $pendonor)
                    <tr>
                        <td>{{ $pendonors->firstItem() + $index }}</td>
                        <td>{{ $pendonor->name }}</td>
                        <td>{{ $pendonor->email }}</td>
                        <td><span class="blood-badge">{{ $pendonor->golongan_darah }}</span></td>
                        <td>{{ $pendonor->tanggal_lahir ? $pendonor->tanggal_lahir->format('d/m/Y') : '-' }}</td>
                        <td>{{ $pendonor->telepon }}</td>
                        <td>{{ $pendonor->riwayat_donor_count }}</td>
                        <td>
                            <a href="{{ route('admin.pendonor.show', $pendonor) }}" class="btn btn-sm btn-outline-primary">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('admin.pendonor.edit', $pendonor) }}" class="btn btn-sm btn-outline-success">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.pendonor.destroy', $pendonor) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus pendonor ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center">Belum ada data pendonor</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <div class="mt-3">
            {{ $pendonors->links() }}
        </div>
    </div>
</div>
@endsection
