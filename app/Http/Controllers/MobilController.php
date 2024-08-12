<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mobil;

class MobilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Mobil::all();
        return view('admin.mobil.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.mobil.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file = $request->file('foto');
        $name = date('YmdHis') . "." . $file->getClientOriginalName();
        $destinationPath = 'mobil';
        $file->move($destinationPath, $name);
        Mobil::create([
            'no_plat' => $request->no_plat,
            'tipe' => $request->tipe,
            'jenis' => $request->jenis,
            'foto' => $name
        ]);


        return redirect()->route('mobil.index');
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
        $data = Mobil::findOrfail($id);
        return view('admin.mobil.edit', compact('data'));
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
        $data = Mobil::findOrfail($id);
        $file = $request->file('foto');
        $name = date('YmdHis') . "." . $file->getClientOriginalName();
        $destinationPath = 'mobil';
        $file->move($destinationPath, $name);
        $data->update([
            'no_plat' => $request->no_plat,
            'tipe' => $request->tipe,
            'jenis' => $request->jenis,
            'foto' => $name
        ]);
        return redirect()->route('mobil.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Mobil::findOrfail($id);
        $data->delete();
        return redirect()->route('mobil.index');
    }

    public function cetakForm()
    {
        $tgl = date('d F Y');
        $data =  Mobil::all();
        return view('admin.mobil.report', compact('data','tgl'));
    }
}
