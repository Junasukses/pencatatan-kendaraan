<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JenisKndrn;
use App\Models\Kendaraan;
use App\Models\Service;

class ServiceController extends Controller
{
    public function tambahjadwal($id){
        $data = Kendaraan::find($id);
        return view('adminpage/kendaraan/createJadwal', compact('data'));
    }

    public function store(Request $request, $id){
        $validates = $request->validate([
            "jadwal" => 'required',
        ]);
        $validates["kendaraan_id"] = $id;
        Service::create($validates);
        return redirect('/kendaraan/'.$id);
    }

    public function edit($id){
        $data = Service::find($id);
        return view('adminpage/kendaraan/editService', compact('data'));
    }
    public function update(Request $request, $id){
        $validates = $request->validate([
            "jadwal" => 'required',
        ]);
        $service = Service::find($id);
        $service->update($validates);
        return redirect('/kendaraan/'.$service->kendaraan_id);
    }

    public function destroy($id){
        $service = Service::find($id);
        $service->delete();
        return redirect('/kendaraan/'.$service->kendaraan_id);
    }
}
