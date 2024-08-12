<?php

namespace App\Http\Controllers;

use App\Author;
use App\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Author::orderBy('id','desc')->paginate(10);
        return view('admin.author.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        $select_user = User::all();
        return view('admin.author.create', compact('select_user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Author::create($request->all());
        Alert::toast('Success - Data Author has been added','success');
        return redirect()->route('author.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $select_user = User::all();
        $data = Author::findOrfail($id);
        return view('admin.author.show', compact('data','select_user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $select_user = User::all();
        $data = Author::findOrfail($id);
        return view('admin.author.edit', compact('data','select_user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $data =  Author::findOrfail($id);
        $data->update($request->all());
        Alert::toast('Success - Data Author has been updated','success');
        return redirect()->route('author.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Author::findOrfail($id);
        $data->delete();
        Alert::toast('Success - Data Author has been deleted','success');
        return redirect()->route('author.index');
    }

    public function report()
    {
        $tgl = date('d F Y');
        $data = Author::all();
        return view('admin.author.report', compact('data','tgl'));
    }

    public function reportPerdata($id)
    {
        $tgl = date('d F Y');
        $data = Author::findOrfail($id);
        return view('admin.author.report2', compact('data','tgl'));
    }

    public function cari(Request $request)
	{
		$cari = $request->cari;
        $data = Author::where('nama','like','%'.$cari.'%')->paginate(10);
		return view('admin.author.index', compact(array('data')));
	}

    //----------------------------------Editorial----------------------------------------
    public function indexEditorial(){
        $data = Author::orderBy('id','desc')->paginate(10);
        return view('editorial.author.index', compact('data'));
    }

    public function showEditorial($id)
    {
        $select_user = User::all();
        $data = Author::findOrfail($id);
        return view('editorial.author.show', compact('data','select_user'));
    }

    public function reportEditorial()
    {
        $tgl = date('d F Y');
        $data = Author::all();
        return view('editorial.author.report', compact('data','tgl'));
    }

    public function reportPerdataEditorial($id)
    {
        $tgl = date('d F Y');
        $data = Author::findOrfail($id);
        return view('editorial.author.report2', compact('data','tgl'));
    }

    public function cariEditorial(Request $request)
	{
		$cari = $request->cari;
        $data = Author::where('id','like','%'.$cari.'%')->orWhere('nama','like','%'.$cari.'%')->paginate(10);
		return view('editorial.author.index', compact(array('data')));
	}

    //------------------------------Author----------------------------------------
    // public function editAuthor($id)
    // {
    //     $select_user = User::all();
    //     $data = Author::findOrfail($id);
    //     return view('author.profile.edit', compact('data','select_user'));
    // }


}
