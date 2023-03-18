<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JenisKndrn;

class JenisKndrnController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = JenisKndrn::all();
        return view('adminpage/jenis-kndr/index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adminpage/jenis-kndr/create');
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
            "kategori" => 'required'
        ]);
        JenisKndrn::create($validates);
        return redirect('/jenis');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = JenisKndrn::find($id);
        return view('adminpage/jenis-kndr/edit',compact('data'));
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
            "kategori" => 'required',
        ]);
        JenisKndrn::find($id)->update($validates);
        return redirect('/jenis');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        JenisKndrn::find($id)->delete();
        return redirect('/jenis');
    }
}
