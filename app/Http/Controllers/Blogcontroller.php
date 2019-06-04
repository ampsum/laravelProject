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

    public function store (){
        $post = new Post();
        $post->title = request('title');
        $post->content = request('content');
        $post->likes = 0;
        $post->userId = 1; //session id
        $post->userName = 'Sara'; //session name

        $post->save();

        return redirect('/blog');
    }

    public function create (){
        return view('blog/create');
    }
}
