<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Submission;

class LoginAuthorController extends Controller
{
    public function index(){
        $data = Submission::all();
        return view('author.index', compact('data'));
    }
}
