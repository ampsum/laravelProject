{{--@php
    $hasliked = false;
@endphp--}}

@extends('layouts.app')


@section('title')
    {{$post->title}}
@endsection

@section('content')

    <p>{{$post->created_at->format('Y-m-d H:i')}}</p>
    <p>
        {{$post->content}}
    </p>

<div id="app">
    <form action="/posts/{{$post->id}}" method="POST">
        @method('PATCH')
        @csrf
        <p><button type="submit" name="like">Gilla</button> {{$post->likes}}</p>
        <p><button type="submit" name="comment">Kommentera</button> {{$post->comments}}</p>
    </form>
</div>

    <p>Av: {{$post->userName}}</p>

    @if(isset($id) && $post->user_id == $id)
    <p>
        <a href="/posts/{{$post->id}}/edit">Ändra</a>
    </p>
    @endif

@endsection
