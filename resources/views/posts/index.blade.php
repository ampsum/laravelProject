@extends('layouts.app')

@section('title')
    Diskussionsforum
@endsection
@section('hero')
    <section class="container-fluid hero-small" style="background-image:url(../images/half1.jpg)">
        <div class="row">
            <div class="col-md-12">
                <h2>Evenemang</h2>
            </div>
        </div>
    </section>
@endsection
@section('content')

    <form action="/posts/create" method="POST">
    @csrf
    <button type="submit">Skapa nytt inlägg</button>
    </form>

    <ul>
    @foreach ($posts as $post)
        <li>
            <a href="/posts/{{$post->id}}">
            <h2>{{$post->title}}</h2>
            </a>
            <p>Av: {{$post->userName}}</p>
        </li>
    @endforeach
    </ul>



@endsection
