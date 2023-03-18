<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kendaraan;
use App\Models\Driver;
use App\Models\Permintaan;

class AdminController extends Controller
{
    public function index(){
        $kendaraan = Kendaraan::all();
        $driver = Driver::all();
        $permintaan = Permintaan::all();
        return view('/adminpage/index', compact('kendaraan', 'permintaan', 'driver'));
    }
}
