<?php

namespace App\Http\Controllers;

use App\Jabatan;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Jabatan::orderBy('id','desc')->paginate(10);
        return view('admin.jabatan.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.jabatan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Jabatan::create($request->all());
        Alert::toast('Success - Data Position has been added','success');
        return redirect()->route('position.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Jabatan::findOrfail($id);
        return view('admin.jabatan.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Jabatan::findOrfail($id);
        return view('admin.jabatan.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $data =  Jabatan::findOrfail($id);
        $data->update($request->all());
        Alert::success('success','Data Position has been updated');
        return redirect()->route('position.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Jabatan::findOrfail($id);
        $data->delete();
        Alert::toast('Success - Data Position has been deleted','success');
        return redirect()->route('position.index');
    }
}
