@extends('layout')

@section('content')
    Blogg

    <form action="/blog/create" method="GET">
{{csrf_field()}}
    <button type="submit">Skapa nytt inlägg</button>
    </form>

    @foreach($posts as $post)
        <h2>
            {{ $post->title}}
        </h2>
        <p>{{$post->created_at->format('Y-m-d H:i')}}</p>
        <p>
            {{$post->content}}
        </p>
        <button>Gilla</button>
        <p>Likes: {{$post->likes}}</p>
        <p>Av: {{$post->userName}}</p>
    @endforeach

@endsection
