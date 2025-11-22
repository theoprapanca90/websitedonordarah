<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JadwalDonor extends Model
{
    protected $table = 'jadwal_donor';

    protected $fillable = [
        'lokasi',
        'tanggal',
        'jam_mulai',
        'jam_selesai',
        'keterangan',
    ];

    protected function casts(): array
    {
        return [
            'tanggal' => 'date',
        ];
    }
}
