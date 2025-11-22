<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RiwayatDonor extends Model
{
    protected $table = 'riwayat_donor';

    protected $fillable = [
        'user_id',
        'tanggal',
        'lokasi',
        'status',
        'catatan',
    ];

    protected function casts(): array
    {
        return [
            'tanggal' => 'date',
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
