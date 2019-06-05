@extends('layouts.app')

@section('title')
    Skapa nytt inlägg
@endsection

@section('content')


    <form action="/posts" method="POST">
        @csrf
        <input type="text" placeholder="Titel" name="title">
        <textarea placeholder="Innehåll" name="content"></textarea>
        <button type="submit">Publicera</button>
    </form>


@endsection
