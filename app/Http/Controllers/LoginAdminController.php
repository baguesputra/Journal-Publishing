<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Submission;
use App\Issue;
use App\Reviewer;
use App\Author;
use App\Archive;
use App\Editorial;
use App\Affiliation;
use App\User;

class LoginAdminController extends Controller
{
    public function index(){
        $author = Author::orderBy('id','desc')->paginate(10);
        $archive = Archive::with('author')->orderBy('id','desc')->paginate(10);
        $editorial = Editorial::orderBy('id','desc')->paginate(10);
        $issue = Issue::orderBy('id','desc')->paginate(10);
        $reviewer = Reviewer::orderBy('id','desc')->paginate(10);
        $submission = Submission::with('user')->orderBy('id','desc')->paginate(10);
        $affiliation = Affiliation::orderBy('id','desc')->paginate(10);
        $user = User::orderBy('id','desc')->paginate(10);
        return view('admin.index', compact('author','archive','editorial','issue','reviewer','submission','affiliation','user'));
    }
}
