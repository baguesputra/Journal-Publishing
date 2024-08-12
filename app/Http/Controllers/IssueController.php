<?php

namespace App\Http\Controllers;

use App\Issue;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class IssueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Issue::orderBy('id','desc')->paginate(10);
        return view('admin.issue.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.issue.create');
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
        $destinationPath = 'issue';
        $file->move($destinationPath, $name);
        Issue::create([
            'judul' => $request->judul,
            'penulis' => $request->penulis,
            'tgl_masuk' => $request->tgl_masuk,
            'hal' => $request->hal,
            'tahun' => $request->tahun,
            'vol' => $request->vol,
            'document' => $name
        ]);


        // $data = Issue::create($request->all());
        Alert::toast('Success - Data Current Issue has been added','success');
        return redirect()->route('current-issue.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Issue  $issue
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Issue::findOrfail($id);
        return view('admin.issue.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Issue  $issue
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Issue::findOrfail($id);
        return view('admin.issue.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Issue  $issue
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        // $file = $request->file('document')->getClientOriginalName();
        // $path = $request->file('document')->storeAs('issue/', $file);
        // $data = Issue::findOrfail($id);
        // $data->update($request->all());
        $data = Issue::findOrfail($id);
        $file = $request->file('document');
       

        if ($data->jurnal == $file){
            $data->update($request->all());
           
        } else {
        $file = Issue::where('id',$id)->first();
        unlink('issue/'.$data->document);
        
        $name = date('YmdHis') . "." . $file->getClientOriginalName();
        $destinationPath = 'issue';
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
        Alert::toast('Success - Data Current Issue has been updated','success');
        return redirect()->route('current-issue.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Issue  $issue
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $file = Issue::where('id',$id)->first();
        unlink('issue/'.$file->document);
        $data = Issue::findOrfail($id);
        $data->delete();
        Alert::toast('Success - Data Current Issue has been deleted','success');
        return redirect()->route('current-issue.index');
    }

    public function report()
    {
        $tgl = date('d F Y');
        $data =  Issue::all();
        return view('admin.issue.report', compact('data','tgl'));
    }

    public function reportPerdata($id)
    {
        $tgl = date('d F Y');
        $data = Issue::findOrfail($id);
        return view('admin.issue.report2', compact('data','tgl'));
    }

    public function getDownload($id)
    { 
        $file = Issue::where('id',$id)->first();
        $file_path = public_path('issue/'.$file->document);
        return response()->download($file_path);
    }

    public function cari(Request $request)
	{
		$cari = $request->cari;
        $data = Issue::where('judul','like','%'.$cari.'%')->orWhere('penulis','like','%'.$cari.'%')->paginate(10);
		return view('admin.issue.index', compact(array('data')));
	}

    public function cetakForm()
    {
        return view('admin.issue.cetakform');
    }

    public function cetakFilterPertanggal($tglawal,$tglakhir)
    {
        // dd(["Tanggal Awal :".$tglawal, "Tanggal Akhir:".$tglakhir]);
        // array($request->tglawal, $request->tglakhir)
        $tgl = date('d F Y');
        $data = Issue::whereBetween('tgl_masuk',[$tglawal,$tglakhir])->get();
        return view('admin.issue.report3', compact('data','tgl'));
        // $pdf = PDF::loadview('archive.cetakfilter', compact('data'));
        // $pdf->setPaper('A4', 'potrait');
        // return $pdf->stream('Report-of-archive(per month).pdf', array('Attachment' => false));
    }

    //---------------------------Editorial--------------------------------
    public function indexEditorial(){
        $data = Issue::orderBy('id','desc')->paginate(10);
        return view('editorial.issue.index', compact('data'));
    }

    public function showEditorial($id)
    {
        $data = Issue::findOrfail($id);
        return view('editorial.issue.show', compact('data'));
    }

    public function getDownloadEditorial($id)
    {
        $file = Issue::where('id',$id)->first();
        $file_path = public_path('issue/'.$file->document);
        return response()->download($file_path);
    }

    public function reportEditorial()
    {
        $tgl = date('d F Y');
        $data =  Issue::all();
        return view('editorial.issue.report', compact('data','tgl'));
    }

    public function reportPerdataEditorial($id)
    {
        $tgl = date('d F Y');
        $data = Issue::findOrfail($id);
        return view('editorial.issue.report2', compact('data','tgl'));
    }

    public function cariEditorial(Request $request)
	{
		$cari = $request->cari;
        $data = Issue::where('judul','like','%'.$cari.'%')->orWhere('penulis','like','%'.$cari.'%')->paginate(10);
		return view('editorial.issue.index', compact(array('data')));
	}

    public function cetakFormEditorial()
    {
        return view('editorial.issue.cetakform');
    }

    public function cetakFilterPertanggalEditorial($tglawal,$tglakhir)
    {
        // dd(["Tanggal Awal :".$tglawal, "Tanggal Akhir:".$tglakhir]);
        // array($request->tglawal, $request->tglakhir)
        $tgl = date('d F Y');
        $data = Issue::whereBetween('tgl_masuk',[$tglawal,$tglakhir])->get();
        return view('editorial.issue.report3', compact('data','tgl'));
        // $pdf = PDF::loadview('archive.cetakfilter', compact('data'));
        // $pdf->setPaper('A4', 'potrait');
        // return $pdf->stream('Report-of-archive(per month).pdf', array('Attachment' => false));
    }
}
