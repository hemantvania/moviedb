<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class AdminLoginController extends Controller
{
    function __construct()
    {
        $this->middleware('guest:admin');
    }

    public function ShowLoginForm()
    {
        return view('auth.admin-login');
    }

    public function login(Request $request)
    {
        // validate the form data
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        //Attempt to log user in
        if(Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password ], $request->remember ))
        {
            //success
            return redirect()->intended(Route('admin.dashboard'));
        }

        // if unsuccess
        return redirect()->back()->withInput($request->only('email','remember'));
    }
}
