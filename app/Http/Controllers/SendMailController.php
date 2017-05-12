<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Auth;
use Mail;
use URL;

class SendMailController extends Controller
{
    public function sendemail()
    {
        $userID = \Auth::User()->id;
        $userMial = \Auth::User()->email;
        $mailToken = \Auth::User()->email_token;

        $content = [

                'title'=> 'Welcome to the Travelino',

                'body'=> 'Please verify your mail by click below',

                'button' => 'Click Here',

                'userid' => $userID,

                'token' => $mailToken,

                'url'  => URL::to('/verifymail/'.$userID.'/'.$mailToken)
        ];

        $receiverAddress = $userMial;

      //  dd($content);

        Mail::to($receiverAddress)->send(new \App\Mail\NewUserVerification($content));

        \Auth::guard('web')->logout();

        return redirect('/users/success')->with('message', 'Your have registere successfully!');
    }
}
