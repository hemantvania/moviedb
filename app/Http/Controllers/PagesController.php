<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use \App\Posts;
use Mail;
use App\Mail\NewUserVerification;
use Auth;

class PagesController extends Controller
{
    public function home()
    {
        $posts = Posts::getHomePost();
    	return view('pages.home', compact('posts'));
    }
    public function welcome()
    {
        return view('welcome');
    }

    public function about()
    {
    	return view('pages.about');
    }

    public function contact()
    {
       return view('pages.contact');
    }

    function login() {
        return view('auth.login');
    }

    function signup() {
        return view('pages.signup');
    }
}
