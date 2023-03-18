<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Driver;
use File;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Driver::all();
        return view ('adminpage/driver/index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adminpage/driver/create');
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
            "nama" => 'required',
            "foto" => 'required|image|mimes:png,jpg,jpeg',
        ]);
        $filename = time().".".$request->foto->extension();
        $validates["foto"] = $filename;
        $request->foto->move('images', $filename);
        Driver::create($validates);
        return redirect('/driver');
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
        $data = Driver::find($id);
        return view('/adminpage/driver/edit', compact('data'));
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
        $driver = Driver::find($id);
        $validates = $request->validate([
            "nama" => 'required',
            "foto" => 'image|mimes:png,jpg,jpeg'
        ]);
        if ($request->foto) {
            $filename = time().".".$request->foto->extension();
            $request->foto->move('images', $filename);
            $validates["foto"] = $filename;
            File::delete('images/'.$driver->foto);
        }

        $driver->update($validates);
        return redirect('/driver');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $driver = Driver::find($id);
        File::delete('images/'.$driver->foto);
        $driver->delete();
        return redirect('/driver');
    }
}
