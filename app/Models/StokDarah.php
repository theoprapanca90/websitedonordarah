<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StokDarah extends Model
{
    protected $table = 'stok_darah';

    protected $fillable = [
        'golongan_darah',
        'jumlah',
    ];
}
