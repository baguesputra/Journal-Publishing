<?php

namespace App\Http\Controllers;

use App\Editorial;
use Illuminate\Http\Request;
use App\Jabatan;
use RealRashid\SweetAlert\Facades\Alert;

class EditorialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Editorial::orderBy('id','desc')->paginate(10);
        return view('admin.editorial.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $select_jabatan = Jabatan::all();
        return view('admin.editorial.create', compact('select_jabatan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Editorial::create($request->all());
        Alert::toast('Success - Data Editorial has been added','success');
        return redirect()->route('editorial.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Editorial  $editorial
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $select_jabatan = Jabatan::all();
        $data = Editorial::findOrfail($id);
        return view('admin.editorial.show', compact('data','select_jabatan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Editorial  $editorial
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $select_jabatan = Jabatan::all();
        $data = Editorial::findOrfail($id);
        return view('admin.editorial.edit', compact('data','select_jabatan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Editorial  $editorial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data =  Editorial::findOrfail($id);
        $data->update($request->all());
        Alert::toast('Success - Data Editorial has been updated','success');
        return redirect()->route('editorial.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Editorial  $editorial
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Editorial::findOrfail($id);
        $data->delete();
        Alert::toast('Success - Data Editorial has been deleted','success');
        return redirect()->route('author.index');
    }

    public function report()
    {
        $tgl = date('d F Y');
        $data = Editorial::with('jabatan')->get();
        return view('admin.editorial.report', compact('data','tgl'));
    }

    public function reportPerdata($id)
    {
        $tgl = date('d F Y');
        $data = Editorial::findOrfail($id);
        return view('admin.editorial.report2', compact('data','tgl'));
    }

    public function cari(Request $request)
	{
		$cari = $request->cari;
        $data = Editorial::where('nama','like','%'.$cari.'%')->paginate(10);
		return view('admin.editorial.index', compact(array('data')));
	}

    //-------------------------------Editorial---------------------------------------
    public function indexEditorial(){
        $data = Editorial::orderBy('id','desc')->paginate(10);
        return view('editorial.editorial.index', compact('data'));
    }

    public function showEditorial($id)
    {
        $select_jabatan = Jabatan::all();
        $data = Editorial::findOrfail($id);
        return view('editorial.editorial.show', compact('data','select_jabatan'));
    }

    public function reportEditorial()
    {
        $tgl = date('d F Y');
        $data = Editorial::with('jabatan')->get();
        return view('editorial.editorial.report', compact('data','tgl'));
    }

    public function reportPerdataEditorial($id)
    {
        $tgl = date('d F Y');
        $data = Editorial::findOrfail($id);
        return view('editorial.editorial.report2', compact('data','tgl'));
    }

    public function cariEditorial(Request $request)
	{
		$cari = $request->cari;
        $data = Editorial::where('nama','like','%'.$cari.'%')->paginate(10);
		return view('editorial.editorial.index', compact(array('data')));
	}
}

