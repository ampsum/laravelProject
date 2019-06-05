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
            'likes' => 0,
            'user_id' => 1,
            'userName' => 'Anna'
        ]);*/

        $post = new Post();
        $post->title = request('title');
        $post->content = request('content');
        $post->likes = 0;
        $post->user_id = 1; //session id
        $post->userName = 'Sara'; //session name

        $post->save();

        return redirect('/blog');
    }

    public function edit (Post $post){
        return view('blog/edit', ['post' => $post]);
    }

    public function update (Post $post){
        if(request(['title'])){
            $post->update(request(['title', 'content']));
            return redirect('/blog');
        }
        else {
            $post->likes = $post->likes + 1;
            $post->save();
            return view('/blog/show', ['post' => $post]);
        }

    }

    public function destroy (Post $post){
        $post->delete();
        return redirect('/blog');
    }
}
