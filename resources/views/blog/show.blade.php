@extends('layouts.app')

@section('title')
    {{$post->title}}
@endsection

@section('content')


        <p>{{$post->created_at->format('Y-m-d H:i')}}</p>
        <p>
            {{$post->content}}
        </p>

        <form action="/blog/{{$post->id}}" method="POST">
            @method('PATCH')
            @csrf
            <p><button type="submit">Gilla</button> {{$post->likes}}</p>
        </form>

        <p>Av: {{$post->userName}}</p>

    <p>
        <a href="/blog/{{$post->id}}/edit">Ändra</a>
    </p>



@endsection
