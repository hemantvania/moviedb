<?php

namespace App\Http\Controllers;

use App\ProfilePics;
use Illuminate\Http\Request;
use \App\User;

class ProfilePicsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.profile-pic');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
                'profile_image' => 'required|image|mimes:jpeg,png,jpg|max:1024',
        ]);

        $imageName = time().'.'.$request->profile_image->getClientOriginalExtension();
        $moved = $request->profile_image->move(public_path('profilepics'), $imageName);

        $userid = \Auth::check() ? \Auth::User()->id : 0 ;

        if($moved && $userid !== null)
        {
            $pic = new \App\ProfilePics();
            $pic->image = $imageName;
            $pic->user_id = $userid;
            $pic->created_at = New \DateTime();
            $pic->updated_at = New \DateTime();
            $pic->save();

            return redirect('/profile-pic')->with('message', 'Your image has been saved!');

        }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProfilePics  $profilePics
     * @return \Illuminate\Http\Response
     */
    public function show(ProfilePics $profilePics)
    {
        return  $profilePics;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProfilePics  $profilePics
     * @return \Illuminate\Http\Response
     */
    public function edit(ProfilePics $profilePics)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProfilePics  $profilePics
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProfilePics $profilePics)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProfilePics  $profilePics
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProfilePics $profilePics)
    {
        //
    }
}
