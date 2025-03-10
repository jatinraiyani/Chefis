<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use validate;
use App\User;
use Auth;
use App\Models\Role;
use Redirect;
use Hash;

class AuthController extends Controller
{
    /**
     * Login Page
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function login()
    {
        return view('Admin.Auth.login');
    }

    /**
     * Forgot password page
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function recover()
    {
        return view('Admin.Auth.recover');
    }

    /**
     * Logout page
     * @param Request $request
     * @return mixed
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->forget('locked');
        return Redirect::to('admin/login');
    }

    /**
     * Login Function
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function doLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ]);

        $email = $request['email'];

        $checklogin = User::where(function ($query) use ($email) {
            $query->where('email', $email)
                ->orWhere('phone_number', $email);
        })->where('status', 'active')->first();

        if (empty($checklogin)) {
            return redirect()->back()
                ->withErrors(['email' => "User block by admin..!"]);
        }

        $logindetails = array(
            'email' => $checklogin['email'],
            'password' => $request['password']
        );

        $request->session()->forget('locked');

        if (Auth::attempt($logindetails)) {
            if (!Auth::user()->hasRole('user')) {

                \BaseFunction::LoginLog(Auth::user()->id);
                return Redirect::to('admin');
            }
            Auth::logout();
            return redirect()->back()
                ->withErrors(['email' => "Only Admin Can Login Here..!"]);

        } else {
            return redirect()->back()
                ->withErrors(['email' => 'Invalid Login Details.']);
        }

    }

}
