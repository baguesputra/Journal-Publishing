<?php

namespace App\Http\Controllers;

use App\Archive;
use Illuminate\Http\Request;
use App\Author;
use RealRashid\SweetAlert\Facades\Alert;

class ArchiveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Archive::with('author')->orderBy('id','desc')->paginate(10);
        return view('admin.archive.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $select_author = Author::all();
        return view('admin.archive.create', compact('select_author'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file = $request->file('document');
        $name = date('YmdHis') . "." . $file->getClientOriginalName();
        $destinationPath = 'archive';
        $file->move($destinationPath, $name);
        Archive::create([
            'judul' => $request->judul,
            'penulis' => $request->penulis,
            'tgl_masuk' => $request->tgl_masuk,
            'hal' => $request->hal,
            'tahun' => $request->tahun,
            'vol' => $request->vol,
            'document' => $name
        ]);


        // $data = Issue::create($request->all());
        Alert::toast('Success - Data Archive has been added','success');
        return redirect()->route('archive.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Archive  $archive
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Archive::findOrfail($id);
        $select_author = Author::all();
        return view('admin.archive.show', compact('data','select_author'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Archive  $archive
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Archive::findOrfail($id);
        $select_author = Author::all();
        return view('admin.archive.edit', compact('data','select_author'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Archive  $archive
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        // $file = $request->file('document')->getClientOriginalName();
        // $path = $request->file('document')->storeAs('issue/', $file);
        // $data = Archive::findOrfail($id);
        // $data->update($request->all());
        $data = Archive::findOrfail($id);
        Alert::success('success','Data Archive has been updated');
        $file = $request->file('document');
       

        if ($data->jurnal == $file){
            $data->update($request->all());
           
        } else {
        $delete = Archive::where('id',$id)->first();
        unlink('archive/'.$delete->document);
        
        $name = date('YmdHis') . "." . $file->getClientOriginalName();
        $destinationPath = 'archive';
        $file->move($destinationPath, $name);
        $data->update([
            'judul' => $request->judul,
            'penulis' => $request->penulis,
            'tgl_masuk' => $request->tgl_masuk,
            'hal' => $request->hal,
            'tahun' => $request->tahun,
            'vol' => $request->vol,
            'document' => $name
        ]);
       
        }
        Alert::toast('Success - Data Archive has been updated','success');
        return redirect()->route('archive.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Archive  $archive
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $file = Archive::where('id',$id)->first();
        unlink('archive/'.$file->document);
        $data = Archive::findOrfail($id);
        $data->delete();
        Alert::toast('Success - Data Archive has been deleted','success');
        return redirect()->route('archive.index');
    }

    public function report()
    {
        $tgl = date('d F Y');
        $data =  Archive::all();
        return view('admin.archive.report', compact('data','tgl'));
    }

    public function reportPerdata($id)
    {
        $tgl = date('d F Y');
        $data = Archive::findOrfail($id);
        return view('admin.archive.report2', compact('data','tgl'));
    }

    public function getDownload($id)
    {
        $file = Archive::where('id',$id)->first();
        $file_path = public_path('archive/'.$file->document);
        return response()->download($file_path);
    }

    public function cari(Request $request)
	{
		$cari = $request->cari;
        $data = Archive::where('judul','like','%'.$cari.'%')->orWhere('tgl_masuk','like','%'.$cari.'%')->paginate(10);
		return view('admin.archive.index', compact(array('data')));
	}

    public function cetakForm()
    {
        return view('admin.archive.cetakform');
    }

    public function cetakFilterPertanggal($tglawal,$tglakhir)
    {
        // dd(["Tanggal Awal :".$tglawal, "Tanggal Akhir:".$tglakhir]);
        // array($request->tglawal, $request->tglakhir)
        $tgl = date('d F Y');
        $data = Archive::with('author')->whereBetween('tgl_masuk',[$tglawal,$tglakhir])->get();
        return view('admin.archive.report3', compact('data','tgl'));
        // $pdf = PDF::loadview('archive.cetakfilter', compact('data'));
        // $pdf->setPaper('A4', 'potrait');
        // return $pdf->stream('Report-of-archive(per month).pdf', array('Attachment' => false));
    }

    //-----------------------Editorial-----------------------------
    public function indexEditorial(){
        $data = Archive::with('author')->orderBy('id','desc')->paginate(10);
        return view('editorial.archive.index', compact('data'));
    }

    public function showEditorial($id)
    {
        $data = Archive::findOrfail($id);
        $select_author = Author::all();
        return view('editorial.archive.show', compact('data','select_author'));
    }

    public function getDownloadEditorial($id)
    {
        $file = Archive::where('id',$id)->first();
        $file_path = public_path('archive/'.$file->document);
        return response()->download($file_path);
    }

    public function reportEditorial()
    {
        $tgl = date('d F Y');
        $data =  Archive::all();
        return view('editorial.archive.report', compact('data','tgl'));
    }

    public function reportPerdataEditorial($id)
    {
        $tgl = date('d F Y');
        $data = Archive::findOrfail($id);
        return view('editorial.archive.report2', compact('data','tgl'));
    }

    public function cariEditorial(Request $request)
	{
		$cari = $request->cari;
        $data = Archive::where('judul','like','%'.$cari.'%')->orWhere('tgl_masuk','like','%'.$cari.'%')->paginate(10);
		return view('editorial.archive.index', compact(array('data')));
	}

    public function cetakFormEditorial()
    {
        return view('editorial.archive.cetakform');
    }

    public function cetakFilterPertanggalEditorial($tglawal,$tglakhir)
    {
        // dd(["Tanggal Awal :".$tglawal, "Tanggal Akhir:".$tglakhir]);
        // array($request->tglawal, $request->tglakhir)
        $tgl = date('d F Y');
        $data = Archive::with('author')->whereBetween('tgl_masuk',[$tglawal,$tglakhir])->get();
        return view('editorial.archive.report3', compact('data','tgl'));
        // $pdf = PDF::loadview('archive.cetakfilter', compact('data'));
        // $pdf->setPaper('A4', 'potrait');
        // return $pdf->stream('Report-of-archive(per month).pdf', array('Attachment' => false));
    }

    //---------------------------------------------------------------------------------------
    public function archive(){
        $data = Archive::with('author')->orderBy('id','desc')->paginate(10);
        return view('archive', compact('data'));
    }
}
