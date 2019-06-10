@extends('layouts.app')
Evenemang: {{$event->title}}
@section('hero')
    <!-- <section class="container-fluid hero-small" style="background-image:url(../images/half1.jpg)"> -->
{{--        <div class="row">
            <div class="col-md-12">
                <h2>Evenemang: {{$event->title}}</h2>
            </div>
        </div>--}}
    <!-- </section> -->
@endsection
@section('content')
    <div class="container text-center top-container">
        <div class="row">
            <div class="col">
                <div class="event">
                  <h2>Evenemang: {{$event->title}}</h2>
                    @php
                        if($event->cover !== 'empty') :  @endphp
                             <img src="{{asset('/images') . '/' . $event->cover}}" alt="" style="margin-bottom:10px;">
                    @php endif; @endphp
                    <!-- <h3>{{$event->title}}</h3> -->
                    <p>Adress: {{$event->address}}</p>
                    <p>Datum: {{$event->date}}</p>
                    <p>{{$event->content}}</p>
                </div>
                <div class="event-controll">
                <a href="/events/{{$event->id}}/edit">Redigera event</a>
                </div>
            </div>
        </div>
    </div>
    <br><br><br>
@endsection
