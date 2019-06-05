@extends('layouts.app')

@section('title')
    {{$post->title}}
@endsection

@section('content')


        <p>{{$post->created_at->format('Y-m-d H:i')}}</p>
        <p>
            {{$post->content}}
        </p>

        <form action="/posts/{{$post->id}}" method="POST">
            @method('PATCH')
            @csrf
            <p><button type="submit">Gilla</button> {{$post->likes}}</p>
        </form>

        <p>Av: {{$post->userName}}</p>

    @if($post->user_id == $id)
    <p>
        <a href="/posts/{{$post->id}}/edit">Ändra</a>
    </p>
    @endif



@endsection
