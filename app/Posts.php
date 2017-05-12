<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \App\TMDb;

class Posts extends Model
{
    protected $table = 'posts';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function scopePosts()
    {
        $posts = Posts::with('user')->orderBy('id','DESC')->limit(4)->get();
        return $posts;
    }

    public static function getHomePost()
    {
        $posts = Posts::with('user')->orderBy('id','DESC')->limit(4)->get();
        return $posts;
    }

    public static function searchPost($key=null)
    {
       return Posts::with('user')->where('title','like',"%$key%")->orWhere('body','like',"%$key%")->orderBy('id','DESC')->get();
    }

    public static function get_movies()
    {

    /*     $tmdb = new TMDb('AdrorcjdstjrlajsDojrtjerpjp');
        $token = $tmdb->getAuthToken();
        return $tmdb->getLatestMovie(); */
    }
}
