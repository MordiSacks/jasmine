<?php

namespace Jasmine\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use Jasmine\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:jasmine_web')->except('logout');
    }

    protected function guard()
    {
        return Auth::guard('jasmine_web');
    }


    public function showLoginForm()
    {
        return view('jasmine::guest.auth.login');
    }

    public function redirectTo()
    {
        return route('jasmine.dashboard');
    }


}
