<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function pemeriksaan()
    {
        return $this->belongsTo(Pemeriksaan::class);
    }

    public function pasien()
    {
        return $this->belongsTo(Pasien::class);
    }
}
