<?php

namespace App\Http\Controllers;
use \App\Post;
use \App\User;

use Illuminate\Http\Request;

class Postscontroller extends Controller
{
    public function index (){
        $posts = Post::all();
        //$posts = User::find(1)->posts;

        return view('posts/index', ['posts' => $posts]);
    }

    public function show (Post $post){
        return view('posts/show', ['post' => $post]);
    }

    public function create (){
        return view('posts/create');
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

        return redirect('/posts');
    }

    public function edit (Post $post){
        return view('posts/edit', ['post' => $post]);
    }

    public function update (Post $post){
        if(request(['title'])){
            $post->update(request(['title', 'content']));
            return redirect('/posts');
        }
        else {
            $post->likes = $post->likes + 1;
            $post->save();
            return view('/posts/show', ['post' => $post]);
        }

    }

    public function destroy (Post $post){
        $post->delete();
        return redirect('/posts');
    }
}
