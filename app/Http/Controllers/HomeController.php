<?php

namespace App\Http\Controllers;
use \App\User;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::find(auth()->user());
        $posts = User::find(auth()->user()->id)->posts;
        return view('home', ['posts' => $posts, 'users' =>$users]);
    }
}
