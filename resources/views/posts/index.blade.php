@extends('layouts.app')

@section('title')
    Diskussionsforum
@endsection
@section('hero')
    <section class="container-fluid hero-small" style="background-image:url(../images/half1.jpg)">
        <div class="row">
            <div class="col-md-12">
                <h2>Diskutera mera!</h2>
            </div>
        </div>
    </section>
@endsection
@section('content')
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Alla inlägg</a>
        </li>
        <li>
            <a class="nav-link" href="/posts/create">Skapa ett nytt inlägg</a>
        </li>
    </ul>

{{--    <form action="/posts/create" method="POST">
    @csrf
    <button type="submit">Skapa nytt inlägg</button>
    </form>--}}
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <ul class="posts-menu">
                @foreach ($posts as $post)
                    <li class="post-item">
                        <a href="/posts/{{$post->id}}">
                            <div>
                                <h3>{{$post->title}}</h3>
                                <p>Av: {{$post->userName}} | Kommentarer: {{$post->commentCount}}</p>
                            </div>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

{{--    <ul>
    @foreach ($posts as $post)
        <li>
            <a href="/posts/{{$post->id}}">
            <h2>{{$post->title}}</h2>
            </a>
            <p>Av: {{$post->userName}}</p>
        </li>
    @endforeach
    </ul>--}}



@endsection
