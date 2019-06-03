<?php

namespace App\Http\Controllers;
use \App\Post;

use Illuminate\Http\Request;

class Blogcontroller extends Controller
{
    public function index (){
        $posts = Post::all();

        return view('blog/blog', ['posts' => $posts]);
    }
}
