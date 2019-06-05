@extends('layouts.app')

@section('content')
<form action="/events/{{$event->id}}" method="POST" enctype="multipart/form-data">
        {{method_field('PATCH')}}
        {{csrf_field()}}
        <input type="hidden" name="event-set" value="1">
        <input type="text" name="title" placeholder="Title" value="{{$event->title}}">
        <input type="text" name="address" placeholder="Adress" value="{{$event->address}}">
        <input type="date" name="date" placeholder="Datum" value="{{$event->date}}">
        <input type="file" name="cover" placeholder="Coverbild" value="{{$event->cover}}">
        <textarea name="content" cols="30" rows="10">{{$event->content}}</textarea>
        <input type="hidden" name="lat">
        <input type="hidden" name="long">
        <input type="submit" name="submit" value="Uppdatera event">
    </form>

    <form action="/events/{{$event->id}}" method="post">
    {{csrf_field()}}
    {{method_field('DELETE')}}
    <input type="submit" value="Ta bort event">
    </form>
@endsection