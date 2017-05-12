<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\User;
use App\Posts;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $seachWith = $request->search;
        $result['search'] = $seachWith;
        $result['posts'] = Posts::with('user')->where('title','like',"%$seachWith%")->orWhere('body','like',"%$seachWith%")->orderBy('id','DESC')->get();//Posts::searchPost($seachWith);

        /* $result['users'] = User::with('posts')->where('name','like',"%$seachWith%")->orWhere('email','like',"%$seachWith%")->get();//Posts::searchPost($seachWith);

        $result['posts'] = DB::table('posts as p')
        ->join ('users as u', 'u.id','<>',null)
        ->select('p.title as post',
                'u.name as post',
                'u.email as post')->orWhere( 'u.name', 'like' , "%$seachWith%")->orWhere('p.body','like',"%$seachWith%")->orWhere('p.title','like',"%$seachWith%")->orWhere('u.email','like',"%$seachWith%")
                ->get(); */

        return view('pages.search',compact('result'));
    }
}
