@extends('layout')

@section('content')
    <ul>
        @foreach ($events as $event)
            <li>
            <a href="/events/{{$event->id}}">
                    <img src="" alt="">
                    <h3>{{$event->title}}</h3>
                    <p>Adress: {{$event->address}}</p>
                    <p>Datum: {{$event->date}}</p>
                </a>
            </li>
        @endforeach
    </ul>
    <a href="/events/create">Skapa en ny event</a>
@endsection