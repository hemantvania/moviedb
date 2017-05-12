<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\ProfilePics;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','date_of_birth','mobile_no', 'email', 'email_token', 'username', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function user($id)
    {
        $user = User::find($id)->name;
        return $user;
    }

    function posts()
    {
        return $this->hasMany('App\Posts');
    }

    public static function profile_pic($id = null)
    {
        $pic = ProfilePics::where('user_id',$id)->orderBy('id','DESC')->limit('1')->get();
        $pic_url =  !empty($pic[0]->image) ? url('profilepics').'/'.$pic[0]->image : "";
        return $pic_url;
    }

    public static function profile_pics()
    {
        return $this->hasMany('App\ProfilePics');
    }

    public static function all_users()
    {
        return User::orderBy('id','DESC')->get();
    }

    public static function emailVerification($request)
    {
        $verified = 0;
        $user = User::where('id', $request->id)->where('email_token', $request->token)->first();
        if(!empty($user))
        {
            $verified =  User::where('id', $request->id)->update(array('verified' => '1'));
        }
        return  $verified;
    }
}
