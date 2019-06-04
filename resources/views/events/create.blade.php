@extends('layout')

@section('content')
    <form action="/events" method="POST">
        {{csrf_field()}}
        <input type="hidden" name="event-set" value="1">
        <input type="text" name="title" placeholder="Title">
        <input type="text" name="address" placeholder="Adress">
        <input type="date" name="date" placeholder="Datum">
        <input type="file" name="cover" placeholder="Coverbild">
        <textarea name="content" cols="30" rows="10"></textarea>
        <input type="hidden" name="lat">
        <input type="hidden" name="long">
        <input type="submit" name="submit" value="Lägg till event">
    </form>
@endsection