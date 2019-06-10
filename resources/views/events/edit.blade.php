@extends('layouts.app')
@section('hero')
    <section class="container-fluid hero-small" style="background-image:url(../images/half1.jpg)">
        <div class="row">
            <div class="col-md-12">
                <h2>Evenemang: {{$event->title}} </h2>
            </div>
        </div>
    </section>
@endsection
@section('content')
<h2 class="form-h2">Redigera {{$event->title}}</h2>
<form action="/events/{{$event->id}}" method="POST" enctype="multipart/form-data">
        {{method_field('PATCH')}}
        {{csrf_field()}}
        <input type="hidden" name="event-set" value="1">
        <div class="form-group row">
            <div class="col-md-6">
                <input class="form-control" type="text" name="title" placeholder="Title" value="{{$event->title}}">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-6">
                <input class="form-control" type="text" name="address" placeholder="Address" value="{{$event->address}}">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-6">
                <input class="form-control" type="date" name="date" placeholder="Datum" value="{{$event->date}}">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-6">
                <input class="file-input" type="file" name="cover" placeholder="Coverbild" value="{{$event->cover}}">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-6">
                <label for="content">Content</label> 
            <textarea id="content" class="form-control" name="content" cols="30" rows="10">{{$event->content}}</textarea>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-6">
                <input class="btn btn-primary" type="submit" name="submit" value="Uppdatera event">
            </div>
        </div>
    </form>

    <form action="/events/{{$event->id}}" method="post">
    {{csrf_field()}}
    {{method_field('DELETE')}}
     <div class="form-group row">
         <div class="col-md-6">
            <input class="btn btn-primary" type="submit" value="Ta bort event">
         </div>   
     </div>
    </form>
@endsection