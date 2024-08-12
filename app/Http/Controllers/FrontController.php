<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Archive;
use App\Issue;

class FrontController extends Controller
{
    public function authorguidelines()
    {
        return view('authorguidelines');
    }
    
    public function welcome()
    {
        return view('welcome');
    }

    public function conferencess()
    {
        return view('conferences');
    }

    public function archive()
    {
        $data = Archive::all();
        return view('archive', compact('data'));
    }

    public function currentissue()
    {
        $data = Issue::all();
        return view('currentissue', compact('data'));
    }

    public function reviewprocess()
    {
        return view('reviewprocess');
    }

    public function editorialboard()
    {
        return view('editorialboard');
    }

    public function contact()
    {
        return view('contact');
    }
}
