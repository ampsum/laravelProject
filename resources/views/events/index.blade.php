@extends('layouts.app')

@section('content')
    <ul class="events-menu">
        @foreach ($events as $event)
            <li class="event-item">
                <a href="/events/{{$event->id}}">
                    <div class="event-img">
                        @php
                        if($event->cover !== 'empty') :  @endphp
                                <img src="{{asset('/images') . '/' . $event->cover}}" alt="">
                        @php endif; @endphp
                    </div>
                    <div class="event-text">
                        <h3>{{$event->title}}</h3>
                        <p>Adress: {{$event->address}}</p>
                        <p>Datum: {{$event->date}}</p>
                    </div>
                </a>
            </li>
        @endforeach
    </ul>
    <a href="/events/create">Skapa en ny event</a>
@endsection