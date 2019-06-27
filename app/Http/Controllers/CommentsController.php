<?php

namespace App\Http\Controllers;
use \App\Comment;
use \App\User;
use \App\Post;
use Illuminate\Http\Request;


class CommentsController extends Controller
{
    public function index() {
      $comments = Comment::all();
      return view('comments.index', ['comments' => $comments]);
    }

    public function create()	{
    	$comments = Comment::all();
    	return view('comments.create', ['comments' => $comments]);
    }

    public function store()	{
    	$comment = new Comment();
    	$comment->content = request('content');
    	$comment->userName = auth()->user()->name;
      $comment->user_id = auth()->user()->id;
      $comment->post_id = request('post');
    	$comment->save();

      $post = Post::find(request('post'));
      $post->commentCount = $post->commentCount + 1;
      $post->save();
    	return back();
    }

      public function destroy (Comment $comment){
          if (auth()->user()->isAdmin){
              $comment->delete();
              return redirect('/admin/routes');
            }
            else{
              $comment->delete();
              return redirect('/posts');
            }
     }
}
