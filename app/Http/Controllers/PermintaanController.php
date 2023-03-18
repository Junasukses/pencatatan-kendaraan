<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JenisKndrn;
use App\Models\Permintaan;
use App\Models\Driver;
use App\Models\Kendaraan;
use App\Models\User;

class PermintaanController extends Controller
{
    public function index(){
        $data = Permintaan::all();
        return view('adminpage/list-peminjaman', compact('data'));
    }

    public function show($id){
        $data = Permintaan::find($id);
        $drivers = Driver::all();
        $kendaraan = Kendaraan::all();
        $atasan = User::where('role', 'atasan')->get();
        return view('adminpage/show-peminjaman', compact('data', 'drivers', 'kendaraan', 'atasan'));
    }

    public function update(Request $request, $id){
        $validates = $request->validate([
            "driver_id" => 'required',
            "kendaraan_id" => 'required',
            "user_id" => 'required',
        ]);
        $validates["status"] = "ajukan";
        Permintaan::find($id)->update($validates);
        return redirect('/permintaan');
    }

    public function create(){
        $jenis = JenisKndrn::all();
        return view('adminpage/permintaan-pinjam', compact('jenis'));
    }
    
    public function store(Request $request){
        $validates = $request->validate([
            "nama" => 'required',
            "alasan" => 'required',
        ]);
        Permintaan::create($validates);
        return redirect('/permintaan');
    }

    public function destroy($id){
        Permintaan::find($id)->delete();
        return redirect('/permintaan');
    }
}
