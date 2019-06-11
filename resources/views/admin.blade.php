@extends('layouts.app')

@section('title')
    Adminpanel
@endsection
@section('content')
    <div class="container top-container">
        <div class="row justify-content-center">
            <div class="card w-100">
                <div class="card-body">
                    <h1 class="text-center">Adminpanelen</h1>
                    <br>
                    <div class="row">
                        <div class="col">
                            <h2>Alla användare</h2>
                            @foreach ($users as $user)
                                <p>Namn: {{$user->name}} | Email: {{$user->email}}</p>
                            @endforeach
                        </div>
                        <div class="col">
                            @if($events->count(1))
                                <h2>Alla evenemang</h2>
                                <a class="nav-link" href="/events/create"><input class="btn btn-primary" type="submit" value="Skapa nytt evenemang"></a>
                                @foreach ($events as $event)
                                    <li class="">
                                        <a href="/events/{{$event->id}}">
                                            <p>{{$event->title}}</p>
                                        </a>
                                        <div class="event-controll">
                                            <a href="/events/{{$event->id}}/edit"><input class="btn btn-danger" type="submit" value="Redigera / Radera"></a>
                                        </div>
                                    </li>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col">
                            @if($posts->count(1))
                                <h2>Alla inlägg</h2>
                                <ul>
                                    @foreach ($posts as $post)
                                        <li>
                                            <a href="/posts/{{$post->id}}">
                                                <p class="admin-list-item">{{$post->title}}</p>
                                            </a>
                                            <form action="/posts/{{$post->id}}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <input class="btn btn-danger" type="submit" name="submit" value="Radera inlägg">
                                            </form>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                        <div class="col">
                            @if($comments->count(1))
                                <h2>Alla kommentarer</h2>
                                <ul>
                                    @foreach ($comments as $comment)
                                        <li>
                                            <strong>kommentar av användaren {{ $comment->userName }} på post {{ $comment->post_id }}:</strong>
                                            <p>
                                            {{$comment->content}}
                                            </p>
                                            <form action="/comments/{{$comment->id}}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <input class="btn btn-danger" type="submit" name="submit" value="Radera kommentar">
                                            </form>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
