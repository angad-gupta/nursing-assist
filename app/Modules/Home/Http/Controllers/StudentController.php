<?php

namespace App\Modules\Home\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Modules\Home\Http\Requests\StudentLoginFormRequest;
use App\Modules\Student\Repositories\StudentInterface;

class StudentController extends Controller
{
    protected $student;
    
    public function __construct(StudentInterface $student)
    {
        $this->student = $student;
    }

     public function studentLogin()
    {
        if (Auth::guard('student')::check()) {
            return redirect()->intended(route('home'));
        } else {
            return view('home::student.dashboard');
        }
    }


    public function studentAuthenticate(StudentLoginFormRequest $request)
    {

        $data = $request->all('email', 'password');  

       if (Auth::guard('student')->attempt(['email' => $data['email'], 'password' => $data['password'],'active' => 1])) {
            return redirect()->intended(route('student-dashboard'));
        } else {
            Flash('Invalid Access')->warning();
            return redirect(route('student-account'));
        }

    }

    public function updateStudentPassword(Request $request){

        $oldPassword = $request->get('old_password');
        $newPassword = $request->get('password');

        $id = Auth::guard('student')->user()->id;  
        $users = Auth::guard('student')->user()->find($id); 

        if (!(Hash::check($oldPassword, $users->password))) { 
            Flash("Old Password Do Not Match !")->error();  
            return redirect(route('student-dashboard'));
        } else {
            $data['password'] = Hash::make($newPassword);
            $this->student->update($id, $data);
            Flash("Password Successfully Updated. Please Login Again!")->success();

        }
        Auth::guard('student')->logout();
        return redirect(route('student-account'));

    }

     public function studentLogout()
    {
        Auth::guard('student')->logout();

        return redirect(route('home'));
    }

   
}
