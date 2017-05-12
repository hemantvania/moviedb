<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \App\User;

class ProfilePics extends Model
{
    protected $table = 'profile_pics';

    public function user()
    {
        $this->belongsTo('App\User');
    }

    public static function getProfilePics($userid = null)
    {
        $photos = ProfilePics::where('user_id',$userid)->orderBy('id','DESC')->get();
        return $photos;
    }

}
