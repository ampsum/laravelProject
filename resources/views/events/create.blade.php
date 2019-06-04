@extends('layout')

@section('content')
    <form action="/events" method="POST">
        {{csrf_field()}}
        <input type="text" name="title" placeholder="Title">
        <input type="text" name="address" placeholder="Adress">
        <input type="date" name="date" placeholder="Datum">
        <input type="file" name="cover" placeholder="Coverbild">
        <input type="hidden" name="lat">
        <input type="hidden" name="long">
        <input type="submit" name="submit" value="Lägg till event">
    </form>
@endsection