<?php

namespace App\Http\Controllers;
use \App\Comment;
use \App\User;
use \App\Post;
use \App\Event;
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
      $events = Event::all();
      return view('admin', ['users' => $users, 'posts' => $posts, 'comments' => $comments, 'events' => $events]);
    }

    public function show(){
        $user = auth()->user();
        return view('home', ['user' =>$user]);
    }

    public function edit (User $user){
        return view('home/edit', ['user' => $user]);

    }

    public function update(User $user){
        if (auth()->user()->isAdmin) {
            if($user->isAdmin == 0){
                $user->isAdmin = 1;
                $user->save();
                return back();
            }
            elseif($user->isAdmin == 1){
                $user->isAdmin = 0;
                $user->save();
                return back();
            }
        }
        else {
            $validated = request()->validate([
                'name' => ['required', 'min:3'],
                'adress' => ['required', 'min:3'],
                'email' => ['required', 'min:3'],
            ]);
            $user->update($validated);
            return redirect('/home');
        }
    }

    public function destroy (User $user){
        $user->delete();
        return redirect('/');
    }
}
