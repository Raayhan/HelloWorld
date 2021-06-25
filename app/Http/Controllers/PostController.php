<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Post;
class PostController extends Controller
{
    public function index(){
        $posts = Post::orderBy('created_at','desc')->with(['user','likes'])->paginate(5);
        return view('posts.index',[
            'posts'=> $posts
        ]);
    }

    public function post(Request $request){

        $this->validate($request,[
            'body'=> 'required'
        ]);

        auth()->user()->posts()->create([
            'body'=> $request->body
        ]);
        return back();
    }

    public function destroy(Post $post){
        
       $this->authorize('delete', $post);

        $post->delete();
        return back();

    }
}
