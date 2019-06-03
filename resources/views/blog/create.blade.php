@extends('layout')

@section('content')
    Skapa nytt inlägg

    <form action="/blog" method="POST">
        {{csrf_field()}}
        <input type="text" placeholder="Titel" name="title">
        <textarea placeholder="Innehåll" name="content"></textarea>
        <button type="submit">Publicera</button>
    </form>


@endsection
