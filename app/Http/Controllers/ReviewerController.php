<?php

namespace App\Http\Controllers;

use App\Reviewer;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ReviewerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Reviewer::orderBy('id','desc')->paginate(10);
        return view('admin.reviewer.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.reviewer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Reviewer::create($request->all());
        Alert::toast('Success - Data Reviewer has been added','success');
        return redirect()->route('reviewer.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Reviewer  $reviewer
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Reviewer::findOrfail($id);
        return view('admin.reviewer.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Reviewer  $reviewer
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Reviewer::findOrfail($id);
        return view('admin.reviewer.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Reviewer  $reviewer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $data =  Reviewer::findOrfail($id);
        $data->update($request->all());
        Alert::toast('Success - Data Reviewer has been updated','success');
        return redirect()->route('reviewer.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reviewer  $reviewer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Reviewer::findOrfail($id);
        $data->delete();
        Alert::toast('Success - Data Reviewer has been deleted','success');
        return redirect()->route('reviewer.index');
    }

    public function report()
    {
        $tgl = date('d F Y');
        $data =  Reviewer::all();
        return view('admin.reviewer.report', compact('data','tgl'));
    }

    public function reportPerdata($id)
    {
        $tgl = date('d F Y');
        $data = Reviewer::findOrfail($id);
        return view('admin.reviewer.report2', compact('data','tgl'));
    }

    public function cari(Request $request)
	{
		$cari = $request->cari;
        $data = Reviewer::where('nama','like','%'.$cari.'%')->paginate(10);
		return view('admin.reviewer.index', compact(array('data')));
	}

    //------------------------------Editorial-----------------------------------
    public function indexEditorial(){
        $data = Reviewer::orderBy('id','desc')->paginate(10);
        return view('editorial.reviewer.index', compact('data'));
    }

    public function showEditorial($id)
    {
        $data = Reviewer::findOrfail($id);
        return view('editorial.reviewer.show', compact('data'));
    }

    public function reportEditorial()
    {
        $tgl = date('d F Y');
        $data =  Reviewer::all();
        return view('editorial.reviewer.report', compact('data','tgl'));
    }

    public function reportPerdataEditorial($id)
    {
        $tgl = date('d F Y');
        $data = Reviewer::findOrfail($id);
        return view('editorial.reviewer.report2', compact('data','tgl'));
    }

    public function cariEditorial(Request $request)
	{
		$cari = $request->cari;
        $data = Reviewer::where('nama','like','%'.$cari.'%')->paginate(10);
		return view('editorial.reviewer.index', compact(array('data')));
	}
}
