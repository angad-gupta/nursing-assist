<?php

namespace App\Modules\Home\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Notifications\StudentResetPassword;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
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
        $this->middleware('guest');
    }

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLinkRequestForm()
    {
        return view('home::student.auth.email');
    }

    public function sendResetLinkEmail(Request $request)
    {
        $this->validate($request, ['email' => 'required|email']);

        // We will send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.

       /*  $response = $this->broker()->sendResetLink(
            $request->only('email'), $this->resetNotifier()
        ); */
        $response = $this->broker()->sendResetLink(
            $request->only('email')
        );

        switch ($response) {
            case Password::RESET_LINK_SENT:
                return back()->with('status', "If you've provided registered e-mail, you should get recovery e-mail shortly.");

            /*  return response()->json([
            'success' => true
            ]); */

            case Password::INVALID_USER:
            default:
                return back()->with('status', "Invalid user");

        }
    }

    protected function broker()
    {
        return Password::broker('students'); //set password broker name according to guard which you have set in config/auth.php
    }

    // overwritte function resetNotifier() on trait SendsPasswordResetEmails
   /*  protected function resetNotifier()
    {
        return function ($token) {
            return new StudentResetPassword($token);
        };

    } */
}
