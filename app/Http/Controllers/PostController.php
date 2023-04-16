<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    //
    public function getAllPosts()
    {
        $posts = Post::with('user')->where('state', 1)->get();
        //return $posts;
        return view('post', ['posts' => $posts]);
    }

    public function showPost($id)
    {
        $post = Post::with('user')->where('id', $id)->get();
        return view('detailPost', ['post' => $post[0]]);
    }

    public function create(Request $req)
    {
        if (Gate::allows('isAuthor')) {

            Post::create([
                'user_id' => Auth::user()->id,
                'title' => $req['title'],
                'content' => $req['content'],
            ]);

            return redirect('/posts');
        }
    }

    public function edit($id)
    {
        if (Gate::allows('isAuthor')) {
            return view('update', ['post' => Post::find($id)]);
            
        }
    }

    public function update(Request $req)
    {
        if (Gate::allows('isAuthor')) {
            $post = Post::find($req->id);
            $post->title = $req['title'];
            $post->content = $req['content'];
            $post->save();
            return redirect('/posts/'.($req->id));
        }
    }

    public function delete(Request $req)
    {
        if (Gate::allows('isAuthor')) {
            Post::find($req->id)->delete();
        } else if (Gate::allows('isAdmin')) {
            Post::where('id', $req->id)->update(['state' => 0]);
        }
        return redirect("/home");
    }
}
