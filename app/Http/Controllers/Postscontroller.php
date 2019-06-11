<?php

namespace App\Http\Controllers;
use \App\Post;
use \App\User;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index (){
        $posts = Post::all();

        return view('posts/index', ['posts' => $posts]);
    }

    public function show (Post $post){
        $id = auth()->user()->id ;
        return view('posts/show', ['id'=> $id, 'post' => $post]);
    }

    public function create (){
        return view('posts/create');
    }

    public function store (){
        request()->validate([
           'title' => ['required', 'min:3'],
           'content' => ['required', 'min:3']
        ]);

        $post = new Post();
        $post->title = request('title');
        $post->content = request('content');
        $post->likes = 0;
        $post->commentCount = 0;
        $post->user_id = auth()->user()->id;
        $post->userName = auth()->user()->name;
        $post->save();

        return redirect('/posts');
    }

    public function edit (Post $post){
        if ($post->user_id == auth()->user()->id) {
            return view('posts/edit', ['post' => $post]);
        }
        else{
            return redirect('/posts');
        }
    }

    public function update (Post $post){
        if(request(['title'])){
            $validated = request()->validate([
                'title' => ['required', 'min:3'],
                'content' => ['required', 'min:3']
            ]);
            $post->update($validated);
            return redirect('/posts');
        }
        elseif (request(['like'])){
            if($this->hasliked == false){
                $post->likes = $post->likes + 1;
                $post->save();
                $this->hasliked = true;
                return view('/posts/show', ['post' => $post]);
            }
            elseif ($this->hasliked == true){
                $post->likes = $post->likes - 1;
                $post->save();
                return view('/posts/show', ['post' => $post]);
            }
        }
    }

    public function destroy (Post $post){
        if (auth()->user()->isAdmin){
            $post-> delete();
            return back();
        }
        else{
            $post->delete();
            return redirect('/posts');
        }
    }
}
