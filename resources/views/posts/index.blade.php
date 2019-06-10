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

{{--    @foreach($posts as $post)
        <h2>
            {{ $post->title}}
        </h2>
        <p>{{$post->created_at->format('Y-m-d H:i')}}</p>
        <p>
            {{$post->content}}
        </p>

        <p><button>Gilla</button> {{$post->likes}}</p>
        <p>Av: {{$post->userName}}</p>
    @endforeach--}}

    <ul>
    @foreach ($posts as $post)
        <li>
            <a href="/posts/{{$post->id}}">
            <h2>{{$post->title}}</h2>
            </a>
        </li>
    @endforeach
    </ul>



@endsection
