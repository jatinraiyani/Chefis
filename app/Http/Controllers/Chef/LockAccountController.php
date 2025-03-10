<?php

namespace App\Http\Controllers\Chef;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LockAccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('ChefAuth');
    }

    public function index(){
        session(['locked' => 'true']);
        return view('Chef.Auth.lock');
    }

    public function unlock(Request $request){

        $password = $request->password;

        $this->validate($request, [
            'password' => 'required|string',
        ]);

        if(\Hash::check($password, \Auth::user()->password)){
            $request->session()->forget('locked');
            return redirect('chef-admin/');
        }

        return back()->withErrors('Password does not match. Please try again.');
    }
}
