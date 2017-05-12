<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view('admin');
    }

    public function home()
    {
        return view('home');
    }

    /**
     * Returns all users for admin only
     */
    public function users4admins()
    {
        $allUsers = User::all_users();
        return view('admin.users-all',compact('allUsers'));
    }

    public function delete(Request $request)
    {
        $delete = User::where('id',$request->id)->delete();
        if(!empty($delete))
        {
            return redirect()->back()->with('message','User has been removed successfully!' );
        }

        return redirect()->back()->withErrors('Something went wrong to remove this user.' );
    }
}
