<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class Editorial
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(!Auth::check()){
            return redirect()->route('login');
        }
 
        if(Auth::user()->level == 1){
            return redirect()->route('admin');
        }
 
        if(Auth::user()->level == 2){
            Alert::success('Login Success','Welcome To the Dashboard');
            return $next($request);
        }

        if(Auth::user()->level == 3){
            return redirect()->route('reviewer');
        }

        if(Auth::user()->level == 4){
            return redirect()->route('author');
        }
    }
}
