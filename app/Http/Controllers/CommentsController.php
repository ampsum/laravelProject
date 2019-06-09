<?php

namespace App\Http\Controllers;
use \App\Comment;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function index()      // GET
    {
      $comments = Comment::all();

      return view('comments.index', ['comments' => $comments]);
    }

    public function create()		 // get för att visa create-sidan
    {
    	$comments = Comment::all();
    	return view('comments.create', ['comments' => $comments]);
    }

    public function store()			 // för att posta från create-sidans formulär
    {
    	$comment = new Comment();
    	$comment->content = request('content');
    	$comment->userName = request('userName');
    	$comment->user_id = request('user_id');
    	$comment->post_id = request('post_id');	

    	$comment->save();

    	return redirect('/comments');			// redirectar användaren till CommentsController@index

    }

}
