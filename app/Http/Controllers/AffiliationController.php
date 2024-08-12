<?php

namespace App\Http\Controllers;

use App\Affiliation;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


class AffiliationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Affiliation::orderBy('id','desc')->paginate(10);
        return view('admin.affiliation.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.affiliation.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Affiliation ::create($request->all());
        Alert::toast('Success - Data Affiliation has been added','success');
        return redirect()->route('affiliation.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Affiliation  $affiliation
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Affiliation::findOrfail($id);
        return view('admin.affiliation.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Affiliation  $affiliation
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Affiliation::findOrfail($id);
        return view('admin.affiliation.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Affiliation  $affiliation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $data =  Affiliation::findOrfail($id);
        $data->update($request->all());
        Alert::toast('Success - Data Affiliation has been updated','success');
        return redirect()->route('affiliation.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Affiliation  $affiliation
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Affiliation::findOrfail($id);
        $data->delete();
        Alert::toast('Success - Data Affiliation has been deleted','success');
        return redirect()->route('affiliation.index');
    }

    public function report()
    {
        $tgl = date('d F Y');
        $data = Affiliation::all();
        return view('admin.affiliation.report', compact('data','tgl'));
    }

    public function reportPerdata($id)
    {
        $tgl = date('d F Y');
        $data = Affiliation::findOrfail($id);
        return view('admin.affiliation.report2', compact('data','tgl'));
    }

    public function cari(Request $request)
	{
		$cari = $request->cari;
        $data = Affiliation::where('nama','like','%'.$cari.'%')->orWhere('kode','like','%'.$cari.'%')->paginate(10);
		return view('admin.affiliation.index', compact(array('data')));
	}


    //---------------------------Editorial------------------------------------
    public function indexEditorial(){
        $data = Affiliation::orderBy('id','desc')->paginate(10);
        return view('editorial.affiliation.index', compact('data'));
    }

    public function showEditorial($id)
    {
        $data = Affiliation::findOrfail($id);
        return view('editorial.affiliation.show', compact('data'));
    }

    public function reportEditorial()
    {
        $tgl = date('d F Y');
        $data = Affiliation::all();
        return view('editorial.affiliation.report', compact('data','tgl'));
    }

    public function reportPerdataEditorial($id)
    {
        $tgl = date('d F Y');
        $data = Affiliation::findOrfail($id);
        return view('editorial.affiliation.report2', compact('data','tgl'));
    }

    public function cariEditorial(Request $request)
	{
		$cari = $request->cari;
        $data = Affiliation::where('nama','like','%'.$cari.'%')->orWhere('kode','like','%'.$cari.'%')->paginate(10);
		return view('editorial.affiliation.index', compact(array('data')));
	}
}
