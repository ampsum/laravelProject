@extends('layouts.app')

@section('title')
    Blogg
@endsection

@section('content')

    <form action="/blog/create" method="POST">
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
            <a href="/blog/{{$post->id}}">
            <h2>{{$post->title}}</h2>
            </a>
        </li>
    @endforeach
    </ul>



@endsection
