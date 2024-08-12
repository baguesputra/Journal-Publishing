<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Role::orderBy('id','desc')->paginate(10);
        return view('admin.role.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.role.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Role::create($request->all());
        Alert::toast('Success - Data Role has been added','success');
        return redirect()->route('role.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Role::findOrfail($id);
        return view('admin.role.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Role::findOrfail($id);
        return view('admin.role.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $data =  Role::findOrfail($id);
        $data->update($request->all());
        Alert::toast('Success - Data Role has been updated','success');
        return redirect()->route('role.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Role::findOrfail($id);
        $data->delete();
        Alert::toast('Success - Data Role has been deleted','success');
        return redirect()->route('role.index');
    }

    public function report()
    {
        $tgl = date('d F Y');
        $data = Role::all();
        // $pdf = PDF::loadview('admin.affiliation.report', compact('data', 'tgl'));
        // $pdf->setPaper('A4', 'landscape');
        // return $pdf->stream('Laporan-BahanDentist.pdf', array('Attachment'=> false));
    }
}
