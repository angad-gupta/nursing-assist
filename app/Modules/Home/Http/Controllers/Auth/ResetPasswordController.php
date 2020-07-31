<?php

namespace App\Modules\Home\Http\Controllers\Auth;

use App\Modules\Home\Http\Requests\ChangePasswordFormRequest;
use App\Modules\Student\Entities\Student;
use DB;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Hash;

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
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/student/student-dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function redirectTo()
    {
        return route('student-account');
    }

    protected function broker()
    {
        return Password::broker('students'); //set password broker name according to guard which you have set in config/auth.php
    }

    /**
     * Get the guard to be used during password reset.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('student');
    }

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showResetForm($token)
    {
        $data['token'] = $token;
        return view('home::student.auth.reset', $data);
    }

    public function reset(ChangePasswordFormRequest $request)
    {
        try {
            $password = $request->password; dd($token);
            $token = Hash::make($request->token);
           dd($token);
            $tokenData = DB::table('password_resets')->where('token', $token)->first();

            $student = Student::where('email', $tokenData->email)->first();
            if (!$student) {
                return redirect()->to('student-account');
            }

            $student->password = Hash::make($password);
            $student->update();

            // If the user shouldn't reuse the token later, delete the token
            DB::table('password_resets')->where('email', $tokenData->email)->delete();
            //Send Email Reset Success Email
          /*   if ($this->sendSuccessEmail($tokenData->email)) {
                return view('index');
            } else {
                return redirect()->back()->withErrors(['email' => trans('A Network Error occurred. Please try again.')]);
            } */
            flash()->success("Password Changed Successfully!");

        } catch (\Throwable $e) {
            flash()->error($e->getMessage());
        }
        return redirect(route('student-account'));
    }

}
