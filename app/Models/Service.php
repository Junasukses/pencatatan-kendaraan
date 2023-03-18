<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $table = 'service';
    protected $fillable = ['jadwal', 'kendaraan_id'];

    public function kendaraan(){
        return $this->belongsTo(Kendaraan::class, 'kendaraan_id');
    }
}
