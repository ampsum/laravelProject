@extends('layouts.app')
@section('title')
   Evenemang
@endsection
@section('hero')
    <section class="container-fluid hero-small" style="background-image:url(../images/half1.jpg)">
        <div class="row">
            <div class="col-md-12">
                <h2>Evenemang</h2>
            </div>
        </div>
    </section>
@endsection
@section('content')
<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Alla evenemang</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Evenemang i närheten</a>
  </li>
    @if(auth()->user()->isAdmin)
        <li>
            <a class="nav-link" href="/events/create">Skapa nytt evenemang</a>
        </li>
    @endif
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
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
    </div>
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
    @php
       $userLat = $user->lat;
       $userLong = $user->long;
    @endphp
    <ul class="events-menu">
    @foreach ($events as $event)
        @php
            $eventLat = $event->lat;
            $eventLong = $event->long;
            //counts the distance between the user & the event
            if(!empty($eventLat) && !empty($eventLong) && !empty($userLong) && !empty($userLong)) {
                $route = 'https://route.api.here.com/routing/7.2/calculateroute.json?app_id=4lbg6bNUqJVj80BOpcoj&app_code=derEmKtRJUQiPFW5bgUzaQ&waypoint0='.$userLat. ','. $userLong . '&waypoint1='. $eventLat .',' . $eventLong .'&mode=fastest;car;traffic:disabled';
                $routeJson = file_get_contents($route);
                $routeArray = json_decode($routeJson, true);
                if(!empty($routeArray['response'])) {
                    $distanceKM = $routeArray['response']['route'][0]['summary']['distance'];
                    $distanceFloat = number_format($distanceKM);
                    $distance = round($distanceFloat, 0, PHP_ROUND_HALF_ODD);
                }  
            } 
        @endphp
        @php
        // Gets nearby events, within 30km
            if(!empty($distance) && $distance < 30) :
        @endphp
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
        @php
            endif;
        @endphp
        @endforeach
    </ul>
  </div>
</div>
@endsection
