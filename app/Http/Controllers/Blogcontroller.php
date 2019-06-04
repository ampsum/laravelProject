<?php

namespace App\Http\Controllers;
use \App\Post;

use Illuminate\Http\Request;

class Blogcontroller extends Controller
{
    public function index (){
        $posts = Post::all();

        return view('blog/index', ['posts' => $posts]);
    }

    public function store (){
        $post = new Post();
        $post->title = request('title');
        $post->content = request('content');
        $post->likes = 0;
        $post->userId = 1;
        $post->userName = 'Sara';

        $post->save();

        return redirect('/blog');

    }

    public function create (){
        return view('blog/create');
    }
}
