<?php

namespace App\Http\Controllers;
use \App\Comment;
use \App\User;
use \App\Post;
use Illuminate\Support\Facades\Hash;

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
      return view('home');
    }

    public function admin()
    {
      $users = User::all();
      $posts = Post::all();
      $comments = Comment::all();
      return view('admin', ['users' => $users, 'posts' => $posts, 'comments' => $comments]);
    }

    public function show(){
        $users = User::find(auth()->user());
        $posts = User::find(auth()->user()->id)->posts;
        return view('home', ['posts' => $posts, 'users' =>$users]);
    }

    public function edit (User $user){
        return view('home/edit', ['user' => $user]);

    }

    public function update(User $user){

        $validated = request()->validate([
            'name' => ['required', 'min:3'],
            'adress' => ['required', 'min:3'],
            'email' => ['required', 'min:3'],
        ]);
        $user->update($validated);
        return redirect('/home');
    }

    public function destroy (User $user){
        $user->delete();
        return redirect('/');
    }
}
