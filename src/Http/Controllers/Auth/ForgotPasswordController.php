<?php

namespace Jasmine\Http\Controllers\Auth;

use Jasmine\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:jasmine_web');
    }

    public function broker()
    {
        return Password::broker('jasmine_users');
    }


    public function showLinkRequestForm()
    {
        return view('jasmine::guest.auth.passwords.email');
    }
}
