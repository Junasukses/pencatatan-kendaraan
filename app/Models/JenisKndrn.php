<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisKndrn extends Model
{
    use HasFactory;
    protected $table = 'jenis';
    protected $fillable = ['kategori'];

    public function kendaraan(){
        return $this->hasOne(Kendaraan::class, 'jenis_id');
    }
}
