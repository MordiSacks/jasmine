<?php

namespace Jasmine\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Jasmine\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:jasmine_web');
    }

    protected function guard()
    {
        return Auth::guard('jasmine_web');
    }

    public function broker()
    {
        return Password::broker('jasmine_users');
    }


    public function showResetForm(Request $request, $token = null)
    {
        return view('jasmine::guest.auth.passwords.reset')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }

    public function redirectTo()
    {
        return route('jasmine.dashboard');
    }

}
