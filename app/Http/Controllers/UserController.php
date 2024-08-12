<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::with('role')->paginate(10);
        return view('admin.user.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role = Role::all();
        return view('admin.user.create', compact('role'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'level' => $request['level'],
            'password' => Hash::make($request['password']),
        ]);
        Alert::toast('Success - Data User has been added','success');
        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = Role::all();
        return view('admin.user.show', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = User::findOrfail($id);
        $role = Role::all();
        return view('admin.user.edit', compact('data','role'));
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
        $data =  User::findOrfail($id);
        $data->update([
            'name' => $request['name'],
            'email' => $request['email'],
            'level' => $request['level'],
            'password' => Hash::make($request['password']),
        ]);
        Alert::toast('Success - Data User has been updated','success');
        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = User::findOrfail($id);
        $data->delete();
        Alert::toast('Success - Data User has been deleted','success');
        return redirect()->route('user.index');
    }

    public function cari(Request $request)
	{
		$cari = $request->cari;
        $data = User::where('name','like','%'.$cari.'%')->orWhere('email','like','%'.$cari.'%')->paginate(10);
		return view('admin.user.index', compact(array('data')));
	}
}
