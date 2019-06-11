@extends('layouts.app')
@section('title')
    Min profil
@endsection
@section('content')
    <br>
    <div class="container top-container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div>
                        <h2>Mina uppgifter</h2>
                        @foreach ($users as $user)
                            <p>Namn: {{$user->name}}</p>
                            <p>Adress: {{$user->address}}</p>
                            <p>Email: {{$user->email}}</p>
                        @endforeach
                            <p>
                                <a href="/home/{{$user->id}}/edit">Ändra</a>
                            </p>
                            <br>
                        @if($user->posts->count(1))
                            <h2>Mina inlägg</h2>
                            @foreach ($user->posts as $post)
                                <li class="">
                                    <a href="/posts/{{$post->id}}">
                                        <h2>{{$post->title}}</h2>
                                    </a>
                                    <p>Gilla {{$post->likes}} | Kommentarer {{$post->commentCount}}</p>
                                </li>
                                @foreach ($post->comments as $comment)
                                    <dt>{{ $comment->userName }}</dt>
                                    <dd>{{ $comment->content }}</dd>
                                @endforeach
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
