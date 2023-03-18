<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JenisKndrn;
use App\Models\Kendaraan;
use App\Models\Service;

class KendaraanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Kendaraan::all();
        return view('adminpage/kendaraan/index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jenis = JenisKndrn::all();
        return view('adminpage/kendaraan/create', compact('jenis'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validates = $request->validate([
            "plat" => 'required',
            "milik" => 'required',
            "jenis_id" => 'required',
        ]);
        Kendaraan::create($validates);
        return redirect('/kendaraan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Kendaraan::find($id);
        return view('/adminpage/kendaraan/show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Kendaraan::find($id);
        $jenis = JenisKndrn::all();
        return view('/adminpage/kendaraan/edit', compact('data', 'jenis'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validates = $request->validate([
            "plat" => 'required',
            "milik" => 'required',
            "jenis_id" => 'required',
        ]);
        Kendaraan::find($id)->update($validates);
        return redirect('/kendaraan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Kendaraan::find($id)->delete();
        return redirect('/kendaraan');
    }
}
