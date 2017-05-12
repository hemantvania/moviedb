<?php


namespace App\Http\Controllers;


use App\Posts;
use Illuminate\Http\Request;
use \App\User;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Posts::with('user')->orderBy('id','DESC')->get();
        $result = ['posts'=> $posts];
        $latest_movies = Posts::get_movies();
      //  $result = ['latest_moveis'=>$latest_movies];
        //return view('pages.posts', compact('posts'));
        return view('pages.posts', ['result'=>$result]);
    }

    public function getPosts()
    {
        $posts = Posts::with('user')->orderBy('id','DESC')->get();
        return $posts;
    }

    function addpost()
    {
        return view('pages.addpost');
    }
    function save(Request $request)
    {
        $this->validate($request, [
                'post_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
        ]);
        $imageName = time().'.'.$request->post_image->getClientOriginalExtension();
        $request->post_image->move(public_path('postimages'), $imageName);

       $userid = \Auth::check() ? \Auth::User()->id : 0 ;
       $post = new \App\Posts();
       $post->title = $request->title;
       $post->body = $request->body;
       $post->post_image = $imageName;
       $post->user_id = $userid;
       $post->created_at = New \DateTime();
       $post->updated_at = New \DateTime();
       $post->save();

       return redirect('/addpost')->with('message', 'Your post has been submitted!');
    }
    public function show($id)
    {
        $post = Posts::find($id);
        $post->author = User::find($post->user_id)->name;
        return view('pages.post', compact('post'));
    }
}
