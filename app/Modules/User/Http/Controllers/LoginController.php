<?php

namespace App\Modules\User\Http\Controllers;

use App\Modules\User\Http\Requests\LoginFormRequest;
use App\Modules\User\Repositories\UserInterface;
use App\Modules\UserLog\Repositories\UserLogInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class LoginController extends Controller
{
    protected $user;
    protected $userlog;

    public function __construct(UserInterface $user, UserLogInterface $userlog)
    {
        $this->user = $user;
        $this->userlog = $userlog;
    }

    public function login()
    {
        if (Auth::check()) {
            return redirect()->intended(route('dashboard'));
        }else{
             return view('user::login.login');
        }

        if (Auth::guard('student')::check()) {
             return redirect()->intended(route('student-dashboard'));
        }else {
            return view('home');
        }
    }

    public function authenticate(LoginFormRequest $request)
    {

        $data = $request->all('username', 'password');

        if (auth()->attempt(['username' => $data['username'], 'password' => $data['password'], 'active' => 1])) {
            $ip_address = \Request::ip();
            $action = "logged in ";
            $this->userlog->onCreate($ip_address, $action);
            return redirect()->intended(route('dashboard'));
        } else {
            Flash('Invalid Access')->warning();
            return redirect(route('cms'));
        }

    }

    public function changePassword()
    {
        return view('user::login.change-password');
    }

    public function updatePassword(Request $request)
    {

        $oldPassword = $request->get('old_password');
        $newPassword = $request->get('password');
        $id = Auth::user()->id;
        $users = Auth::user()->find($id);
        if (!(Hash::check($oldPassword, $users->password))) {
            Flash("Old Password Do Not Match !")->error();
            return redirect(route('change-password'));
        } else {
            $data['password'] = Hash::make($newPassword);
            $this->user->update($id, $data);
            Flash("Password Successfully Updated. Please Login Again!")->success();

        }
        Auth::logout();
        return redirect(route('cms'));
    }

    public function permissionDenied()
    {
        return view('user::authPermission.permission-denied');
    }

    public function logout()
    {
        Auth::logout();

        return redirect(route('cms'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('user::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {

    }


    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit()
    {
        return view('user::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request)
    {
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy()
    {
    }
}
