<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    public function redirectTo(){
        switch (Auth::user()->level){
            case 1:
                $this->redirectTo = '/admin';
                return $this->redirectTo;
                break;
            case 2:
                $this->redirectTo = '/editorial';
                return $this->redirectTo;
                break;
            case 3:
                $this->redirectTo = '/reviewer';
                return $this->redirectTo;
                break;
            case 4:
                $this->redirectTo = '/author';
                return $this->redirectTo;
                break;

            default:
                $this->redirectTo = '/login';
                return $this->redirectTo;
                break;
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
