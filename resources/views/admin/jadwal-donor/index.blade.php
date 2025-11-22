@extends('layouts.admin')

@section('title', 'Jadwal Donor')
@section('page-title', 'Jadwal Donor')

@section('content')
<div class="card">
    <div class="card-header bg-white d-flex justify-content-between align-items-center">
        <h5 class="card-title mb-0">Daftar Jadwal Donor</h5>
        <a href="{{ route('admin.jadwal-donor.create') }}" class="btn btn-blood">
            <i class="fas fa-plus me-1"></i> Tambah Jadwal
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Lokasi</th>
                        <th>Tanggal</th>
                        <th>Jam</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($jadwalDonor as $index => $jadwal)
                    <tr>
                        <td>{{ $jadwalDonor->firstItem() + $index }}</td>
                        <td>{{ $jadwal->lokasi }}</td>
                        <td>{{ $jadwal->tanggal->format('d/m/Y') }}</td>
                        <td>{{ $jadwal->jam_mulai }} - {{ $jadwal->jam_selesai }}</td>
                        <td>{{ $jadwal->keterangan ?? '-' }}</td>
                        <td>
                            <a href="{{ route('admin.jadwal-donor.edit', $jadwal) }}" class="btn btn-sm btn-outline-success">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.jadwal-donor.destroy', $jadwal) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus jadwal ini?')">
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
                        <td colspan="6" class="text-center">Belum ada jadwal donor</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <div class="mt-3">
            {{ $jadwalDonor->links() }}
        </div>
    </div>
</div>
@endsection
