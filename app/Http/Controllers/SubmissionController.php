<?php

namespace App\Http\Controllers;

use App\Submission;
use App\User;
use App\Archive;
use App\Author;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SubmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Submission::with('user')->orderBy('id','desc')->paginate(10);
        return view('admin.submission.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $select_user = User::all();
        return view('admin.submission.create', compact('select_user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file = $request->file('jurnal');
        $name = date('YmdHis') . "." . $file->getClientOriginalName();
        $destinationPath = 'submission';
        $file->move($destinationPath, $name);
        Submission::create([
            'user_id' => $request->user_id,
            'tgl_pengajuan' => $request->tgl_pengajuan,
            'judul' => $request->judul,
            'pengaju' => $request->pengaju,
            'abstrak' => $request->abstrak,
            'user_reviewer' => $request->user_reviewer,
            'unsur' => $request->unsur,
            'ruang_lingkup' => $request->ruang_lingkup,
            'kecukupan' => $request->kecukupan,
            'kelengkapan' => $request->kelengkapan,
            'total' => $request->total,
            'nilai' => $request->nilai,
            'komentar' => $request->komentar,
            'jurnal' => $name,
            'status' => $request->status
        ]);


        // $data = Issue::create($request->all());
        Alert::success('success','Data Submission has been added');
        return redirect()->route('submission.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Submission  $submission
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Submission::findOrfail($id);
        $select_user = User::all();
        return view('admin.submission.show', compact('data','select_user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Submission  $submission
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Submission::findOrfail($id);
        $select_user = User::all();
        return view('admin.submission.edit', compact('data','select_user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Submission  $submission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        // $file = $request->file('jurnal')->getClientOriginalName();
        // $path = $request->file('jurnal')->storeAs('submission/', $file);
        // $data = Submission::findOrfail($id);
        // $data->update($request->all());
        $data =    Submission::findOrfail($id);
        Alert::toast('Success - Data Submission has been updated','success');
        $file = $request->file('jurnal');
       

        if ($data->document == $file){
            $data->update($request->all());
           
        } else {
            $file = Submission::where('id',$id)->first();
            unlink('submission/'.$data->jurnal);
        
        $name = date('YmdHis') . "." . $file->getClientOriginalName();
        $destinationPath = 'submission';
        $file->move($destinationPath, $name);
        $data->update([
            'user_id' => $request->user_id,
            'tgl_pengajuan' => $request->tgl_pengajuan,
            'judul' => $request->judul,
            'pengaju' => $request->pengaju,
            'abstrak' => $request->abstrak,
            'user_reviewer' => $request->user_reviewer,
            'unsur' => $request->unsur,
            'ruang_lingkup' => $request->ruang_lingkup,
            'kecukupan' => $request->kecukupan,
            'kelengkapan' => $request->kelengkapan,
            'total' => $request->total,
            'nilai' => $request->nilai,
            'komentar' => $request->komentar,
            'jurnal' => $name,
            'status' => $request->status
        ]);
       
        }
        Alert::toast('Success - Data Submissions has been updated','success');
        return redirect()->route('submission.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Submission  $submission
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $file = Submission::where('id',$id)->first();
        unlink('submission/'.$file->document);
        $data = Submission::findOrfail($id);
        $data->delete();
        Alert::toast('Success - Data Submissions has been deleted','success');
        return redirect()->route('submission.index');
    }

    public function report()
    {
        $tgl = date('d F Y');
        $data =  Submission::all();
        return view('admin.submission.report', compact('data','tgl'));
    }

    public function reportPerdata($id)
    {
        $tgl = date('d F Y');
        $data = Submission::findOrfail($id);
        return view('admin.submission.report2', compact('data','tgl'));
    }

    public function getDownload($id)
    {
        $file = Submission::where('id',$id)->first();
        $file_path = public_path('issue/'.$file->document);
        return response()->download($file_path);
    }

    public function publish($id)
    {
        $data = Submission::findOrfail($id);
        $select_user = User::all();
        $select_author = Author::all();
        return view('admin.submission.publish', compact('data','select_user','select_author'));
    }

    public function storePublish(Request $request)
    {
       
        $file = $request->file('document');
       
        $file = $request->file('jurnal');
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
        return redirect()->route('submission.index');
    }

    public function cari(Request $request)
	{
		$cari = $request->cari;
        $data = Submission::where('judul','like','%'.$cari.'%')->orWhere('pengaju','like','%'.$cari.'%')->paginate(10);
		return view('admin.submission.index', compact(array('data')));
	}

    public function cetakForm()
    {
        return view('admin.submission.cetakform');
    }

    public function cetakFilterPertanggal($tglawal,$tglakhir)
    {
        // dd(["Tanggal Awal :".$tglawal, "Tanggal Akhir:".$tglakhir]);
        // array($request->tglawal, $request->tglakhir)
        $tgl = date('d F Y');
        $data = Submission::with('user')->whereBetween('tgl_pengajuan',[$tglawal,$tglakhir])->get();
        return view('admin.submission.report3', compact('data','tgl'));
        // $pdf = PDF::loadview('archive.cetakfilter', compact('data'));
        // $pdf->setPaper('A4', 'potrait');
        // return $pdf->stream('Report-of-archive(per month).pdf', array('Attachment' => false));
    }

    public function schedule(){
        $data = Submission::with('user')->orderBy('id','desc')->paginate(10);
        return view('admin.submission.schedule', compact('data'));
    }

    //----------------------------Editorial-------------------------------------
    public function indexEditorial(){
        $data = Submission::with('user')->orderBy('id','desc')->paginate(10);
        return view('editorial.submission.index', compact('data'));
    }

    public function showEditorial($id)
    {
        $data = Submission::findOrfail($id);
        $select_user = User::all();
        return view('editorial.submission.show', compact('data','select_user'));
    }

    public function editEditorial($id){
        $data = Submission::findOrfail($id);
        $select_user = User::all();
        return view('editorial.submission.edit', compact('data','select_user'));
    }

    public function updateEditorial(Request $request, $id){
        $data = Submission::findOrfail($id);
        $data->update($request->all());
        Alert::toast('Success - Reviewer has been selected','success');
        return redirect()->route('editorial.submission');
    }

    public function getDownloadEditorial($id)
    {
        $file = Submission::where('id',$id)->first();
        $file_path = public_path('submission/'.$file->jurnal);
        return response()->download($file_path);
    }

    public function reportEditorial()
    {
        $tgl = date('d F Y');
        $data =  Submission::all();
        return view('editorial.submission.report', compact('data','tgl'));
    }

    public function reportPerdataEditorial($id)
    {
        $tgl = date('d F Y');
        $data = Submission::findOrfail($id);
        return view('editorial.submission.report2', compact('data','tgl'));
    }

    public function cariEditorial(Request $request)
	{
		$cari = $request->cari;
        $data = Submission::where('judul','like','%'.$cari.'%')->orWhere('pengaju','like','%'.$cari.'%')->orWhere('status','like','%'.$cari.'%')->paginate(10);
		return view('editorial.submission.index', compact(array('data')));
	}

    public function cetakFormEditorial()
    {
        return view('editorial.submission.cetakform');
    }

    public function cetakFilterPertanggalEditorial($tglawal,$tglakhir)
    {
        // dd(["Tanggal Awal :".$tglawal, "Tanggal Akhir:".$tglakhir]);
        // array($request->tglawal, $request->tglakhir)
        $tgl = date('d F Y');
        $data = Submission::with('user')->whereBetween('tgl_pengajuan',[$tglawal,$tglakhir])->get();
        return view('editorial.submission.report3', compact('data','tgl'));
        // $pdf = PDF::loadview('archive.cetakfilter', compact('data'));
        // $pdf->setPaper('A4', 'potrait');
        // return $pdf->stream('Report-of-archive(per month).pdf', array('Attachment' => false));
    }



    //-----------------------------------reviewer--------------------------------------------
    public function indexReviewer(){
        $data = Submission::with('user')->orderBy('id','desc')->paginate(10);
        return view('reviewer.review.index', compact('data'));
    }

    public function showReviewer($id)
    {
        $data = Submission::findOrfail($id);
        $select_user = User::all();
        return view('reviewer.review.show', compact('data','select_user'));
    }

    public function editReviewer($id){
        $data = Submission::findOrfail($id);
        $select_user = User::all();
        return view('reviewer.review.edit', compact('data','select_user'));
    }

    public function updateReviewer(Request $request, $id){
        $data = Submission::findOrfail($id);
        $data->update($request->all());
        Alert::success('success','Data has been reviewed');
        return redirect()->route('reviewer.submission');
    }

    public function getDownloadReviewer($id)
    {
        $file = Submission::where('id',$id)->first();
        $file_path = public_path('submission/'.$file->jurnal);
        return response()->download($file_path);
    }






    //------------------------------------author---------------------------------------------
    public function indexAuthor(){
        $data = Submission::with('user')->orderBy('id','desc')->paginate(10);
        return view('author.submission.index', compact('data'));
    }

    public function createAuthor()
    {
        
        $select_user = User::all();
        return view('author.submission.create', compact('select_user'));
    }

    public function storeAuthor(Request $request)
    {
        $file = $request->file('jurnal');
        $name = date('YmdHis') . "." . $file->getClientOriginalName();
        $destinationPath = 'submission';
        $file->move($destinationPath, $name);
        Submission::create([
            'user_id' => $request->user_id,
            'tgl_pengajuan' => $request->tgl_pengajuan,
            'judul' => $request->judul,
            'pengaju' => $request->pengaju,
            'abstrak' => $request->abstrak,
            'user_reviewer' => $request->user_reviewer,
            'unsur' => $request->unsur,
            'ruang_lingkup' => $request->ruang_lingkup,
            'kecukupan' => $request->kecukupan,
            'kelengkapan' => $request->kelengkapan,
            'total' => $request->total,
            'nilai' => $request->nilai,
            'komentar' => $request->komentar,
            'jurnal' => $name,
            'status' => $request->status
        ]);


        // $data = Issue::create($request->all());
        Alert::success('success','Data Submission has been added');
        return redirect()->route('author.submission');
    }

    public function showAuthor($id)
    {
        $data = Submission::findOrfail($id);
        $select_user = User::all();
        return view('author.submission.show', compact('data','select_user'));
    }

    public function editAuthor($id){
        $data = Submission::findOrfail($id);
        $select_user = User::all();
        return view('author.submission.edit', compact('data','select_user'));
    }

    public function updateAuthor(Request $request, $id){
        $data = Submission::findOrfail($id);
        $data->update($request->all());
        return redirect()->route('author.submission');
    }

    public function loaPrint($id)
    {
        $tgl = date('d F Y');
        $data = Submission::findOrfail($id);
        return view('author.submission.loa', compact('data','tgl'));
    }
}
