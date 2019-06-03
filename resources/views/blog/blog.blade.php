@extends('layout')

@section('content')
    Blogg

    @foreach($posts as $post)
        <li>
            {{ $post->title}}
        </li>
    @endforeach

@endsection
