<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Submission;

class LoginReviewerController extends Controller
{
    public function index(){
        $data = Submission::all();
        return view('reviewer.index', compact('data'));
    }
}
