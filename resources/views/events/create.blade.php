@extends('layouts.app')

@section('content')
    <form action="/events" method="POST" enctype="multipart/form-data">
        {{csrf_field()}}
        <input type="hidden" name="event-set" value="1">
        <input type="text" name="title" placeholder="Title">
        <input type="text" name="address" placeholder="Adress">
        <input type="date" name="date" placeholder="Datum">
        <input type="file" name="cover" placeholder="Coverbild">
        <textarea name="content" cols="30" rows="10"></textarea>
        <input type="submit" name="submit" value="Lägg till event">
    </form>
@endsection