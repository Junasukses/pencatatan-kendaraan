<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use HasFactory;
    protected $table = 'driver';
    protected $fillable = ["nama", "foto", "status"];

    public function permintaan(){
        return $this->hasOne(Permintaan::class, 'driver_id');
    }
}
