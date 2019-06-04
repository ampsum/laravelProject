<?php

namespace App\Http\Controllers;
use \App\Post;
use \App\User;

use Illuminate\Http\Request;

class Blogcontroller extends Controller
{
    public function index (){
        $posts = Post::all();
        //$posts = User::find(1)->posts;

        return view('blog/index', ['posts' => $posts]);
    }

    public function show (Post $post){
        return view('blog/show', ['post' => $post]);
    }

    public function create (){
        return view('blog/create');
    }

    public function store (){
/*        Post::create([
           'title' => request('title'),
           'content' => request('content'),
        ]);*/

        $post = new Post();
        $post->title = request('title');
        $post->content = request('content');

        $post->likes = 0;
        $post->userId = 1; //session id
        $post->userName = 'Sara'; //session name

        $post->save();

        return redirect('/blog');
    }

    public function edit (Post $post){
        return view('blog/edit', ['post' => $post]);
    }
    public function update (Post $post){

        $post->title = request('title');
        $post->content = request('content');

        $post->save();

        return redirect('/blog');
    }
    public function destroy (Post $post){
        $post->delete();
        return redirect('/blog');
    }
}
