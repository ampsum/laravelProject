@extends('layouts.app')

@section('title')
    Adminpanel
@endsection
@section('content')
    <br>
    <div class="container top-container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div>
                        <h1>Adminpanelen</h1>
                            <h2>Alla användare</h2>
                        @foreach ($users as $user)
                            <p>Namn: {{$user->name}} | Email: {{$user->email}}</p>
                        @endforeach
                            <br>
                        @if($posts->count(1))
                            <h2>Alla inlägg</h2>
                            @foreach ($posts as $post)
                                <li class="">
                                    <a href="/posts/{{$post->id}}">
                                        <h2>{{$post->title}}</h2>
                                    </a>
                                    <form action="/posts/{{$post->id}}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <div class="form-group row">
                                            <div class="col-md-6">
                                                <input class="btn btn-primary" type="submit" name="submit" value="Radera inlägg">
                                            </div>
                                        </div>
                                    </form>
                                </li>
                            @endforeach
                        @endif
                            <br>
                        @if($comments->count(1))
                            <h2>Alla kommentarer</h2>
                            @foreach ($comments as $comment)
                                <li class="">
                                        <strong>kommentar av användaren {{ $comment->userName }} på post {{ $comment->post_id }}:</strong>
                                        <p>{{$comment->content}}</p>
                                </li>
                            @endforeach
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
