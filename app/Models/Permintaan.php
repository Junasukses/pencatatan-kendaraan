<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permintaan extends Model
{
    use HasFactory;
    protected $table = 'permintaan';
    protected $fillable = ['nama', 'alasan', 'keberangkatan', 'sampai', 'status', 'kendaraan_id', 'driver_id', 'user_id'];

    public function kendaraan(){
        return $this->belongsTo(Kendaraan::class, 'kendaraan_id');
    }
    public function driver(){
        return $this->belongsTo(Driver::class, 'driver_id');
    }
    public function atasan(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
