<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\User;
use \App\Posts;
use \App\ProfilePics;

class UserController extends Controller
{
    public function user($id = null)
    {
        $userId = !empty($id) ? $id : ( !empty(\Auth::User()->id) ? \Auth::User()->id : 0 );
        if(empty($id))
        {
            return \Auth::User()->name;
        }
        return User::find($userId)->name;
    }
    public function profile($id = null)
    {
        $userid = \Auth::check() ? \Auth::User()->id : 0 ;
        if(!empty($id))
        {
            $userid = $id;
        }
        $user = User::find($userid);
        $picUrl = User::profile_pic($userid);

        $user->isself = empty($id) ? 1 : ( !empty(\Auth::User()->id) && $id == \Auth::User()->id ? 1 : 0 );

        $result['user'] = $user;
        $result['profile_pic'] = $picUrl;

        return view('users.profile', $result);
    }
    public function edit()
    {
        $userid = \Auth::check() ? \Auth::User()->id : 0 ;
        $user = \Auth::User()->find($userid);
        return view('users.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $userid = \Auth::check() ? \Auth::User()->id : 0 ;

        $validator = \Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required',
                'mobile_no' => 'required',
                'date_of_birth' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('profile/edit')
            ->withErrors($validator)
            ->withInput();
        }

        $user = \Auth::User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->mobile_no = $request->mobile_no;
        $user->date_of_birth = $request->date_of_birth;
        $user->updated_at = New \DateTime();
        $user->save();

        return redirect('/profile')->with('message', 'Your profile has been updated successfully!');
    }

    public function posts($user)
    {
        $posts = Posts::with('user')->where('user_id',$user)->orderBy('id','DESC')->get();
        $postUser = $this->user($user);
        $result = ['posts'=> $posts, 'postuser'=>$postUser] ;
        return view('pages.posts', ['result'=>$result]);
        //return view('pages.posts', compact('posts'));
    }

    public function gallery($userid = null)
    {
        if(!empty($userid)){
            $postUser = $this->user($userid);
            $result['postuser'] =$postUser ;
        }

        if($userid == null)
        {
            $userid = \Auth::check() ? \Auth::User()->id : 0 ;
        }
        $photos = ProfilePics::getProfilePics($userid);
        $result['photos'] = $photos;



        return view('users.photos', $result);
    }
    /**
     * Returns all users for admin only
     */
    public function users4admins()
    {
        $allUsers = User::all_users();
        return view('admin.users-all',compact('allUsers'));
    }

    public function verifymail(Request $request )
    {
        $verifyUser = User::emailVerification($request);

        if(!empty($verifyUser))
        {
            return redirect('/login')->with('message', 'Your email has been verified successfully! Please login now.');
        }

        return redirect('/login')->withErrors('Verification has failed.');

    }

    public function success()
    {
        return view('users.success');
    }
}
