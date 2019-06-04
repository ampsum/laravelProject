@extends('layout')

@section('title')
    Uppdatera
@endsection

@section('content')

    <form action="/blog/{{$post->id}}" method="POST">
        @method('PATCH')
        @csrf
        <input type="text" placeholder="Titel" name="title" value="{{ $post->title }}">
        <textarea placeholder="Innehåll" name="content">  {{ $post->content }}</textarea>
        <button type="submit">Uppdatera</button>
    </form>
    <form action="/blog/{{$post->id}}" method="POST">
        @method('DELETE')
        @csrf
        <button type="submit">Radera</button>
    </form>




@endsection
