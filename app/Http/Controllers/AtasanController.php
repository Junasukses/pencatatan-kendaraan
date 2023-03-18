<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permintaan;
use App\Models\Kendaraan;
use App\Models\Driver;
use Illuminate\Support\Facades\Auth;
Use Carbon\Carbon;

class AtasanController extends Controller
{
    public function index(){
        $data = Permintaan::where('user_id', Auth::id())->get();
        return view('/atasan/index', compact('data'));
    }

    public function show($id){
        $data = Permintaan::find($id);
        return view('/atasan/show', compact('data'));
    }

    public function update(Request $request, $id){
        $permintaan = Permintaan::find($id);
        switch ($request->input('action')) {
            case 'setuju':
                $permintaan["status"] = "setuju";
                $permintaan["keberangkatan"] = Carbon::now()->toDateTimeString();
                Driver::find($permintaan->driver_id)->update(["status" => "digunakan"]);
                Kendaraan::find($permintaan->kendaraan_id)->update(["status" => "digunakan"]);
                break;
            default:
                $permintaan["status"] = "tolak";
                break;
        }
        $permintaan->update();
        return redirect('/atasan');
    }
}
