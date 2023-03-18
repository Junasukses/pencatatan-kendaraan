<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kendaraan extends Model
{
    use HasFactory;
    protected $table = 'kendaraan';
    protected $fillable = ['plat', 'bbm', 'milik', 'jenis_id', 'status'];

    public function service(){
        return $this->hasMany(Service::class, 'kendaraan_id');
    }
    public function jenis(){
        return $this->belongsTo(JenisKndrn::class, 'jenis_id');
    }
    public function permintaan(){
        return $this->hasMany(Permintaan::class, 'kendaraan_id');
    }
}
