@php
    $wrong = '';
    $distance = 0;
    $transport = 0;
    if(isset($_POST['counter-set']) && $_POST['counter-set'] == 1) {
       $home = ['postcode' => $_POST['postcode-home'], 'city' => $_POST['homecity']];
       $work = ['postcode' => $_POST['postcode-work'], 'city' => $_POST['workcity']];
       $transport = $_POST['transport'];
       // Gets lat & long for the home address
       if(!empty($home)) {
            $homeUri = 'https://geocoder.api.here.com/6.2/geocode.json?app_id=4lbg6bNUqJVj80BOpcoj&app_code=derEmKtRJUQiPFW5bgUzaQ&searchtext='.urlencode($home['postcode']).urlencode($home['city']);
            $homeJson = file_get_contents($homeUri);
            $homeArray = json_decode($homeJson, true);
            if(!empty($homeArray['Response']['View'])) {
                $homeLat = $homeArray['Response']['View'][0]['Result'][0]['Location']['DisplayPosition']['Latitude'];
                $homeLong = $homeArray['Response']['View'][0]['Result'][0]['Location']['DisplayPosition']['Longitude'];
            } else {$wrong = 'du har angett en felaktig hemadress!'; }
        }
        //Gets lat & long for the work address
          if(!empty($work)) {
            $workUri = 'https://geocoder.api.here.com/6.2/geocode.json?app_id=4lbg6bNUqJVj80BOpcoj&app_code=derEmKtRJUQiPFW5bgUzaQ&searchtext='.urlencode($work['postcode']).urlencode($work['city']);
            $workJson = file_get_contents($workUri);
            $workArray = json_decode($workJson, true);
            if(!empty($workArray['Response']['View'])) {
                $workLat = $workArray['Response']['View'][0]['Result'][0]['Location']['DisplayPosition']['Latitude'];
                $workLong = $workArray['Response']['View'][0]['Result'][0]['Location']['DisplayPosition']['Longitude'];
            } else {$wrong = 'du har angett en felaktig jobbadress!'; }
          }
        //counts the distance between home &  work
          if(!empty($work) && !empty($home) && !empty($homeLat) && !empty($homeLong) && !empty($workLat) && !empty($workLong)) {
            $route = 'https://route.api.here.com/routing/7.2/calculateroute.json?app_id=4lbg6bNUqJVj80BOpcoj&app_code=derEmKtRJUQiPFW5bgUzaQ&waypoint0='.$workLat. ','. $workLong . '&waypoint1='. $homeLat .',' . $homeLong .'&mode=fastest;car;traffic:disabled';
            $routeJson = file_get_contents($route);
            $routeArray = json_decode($routeJson, true);
            if(!empty($routeArray['response'])) {
                $distanceKM = $routeArray['response']['route'][0]['summary']['distance'];
                $distanceFloat = number_format($distanceKM);
                $distance = round($distanceFloat, 0, PHP_ROUND_HALF_ODD);
            } else {echo 'Något har gått fel! Kolla så att du har fyllt i rätt uppgifter..';}   
          } 
    }
@endphp


@extends('layouts.app')
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
    <div class="container">
        <div class="row">
            <div class="col-md-9 counter-div">
                <form action="/counter" method="POST" id="counter">
                    {{csrf_field()}}
                    <input type="hidden" name="counter-set" value="1">
                    <div class="row">
                        <div class="col-md-6">
                            <h3>Ditt hem</h3>
                            <input type="text" name="postcode-home" placeholder="Postnummer" required>
                            <input type="text" name="homecity" placeholder="Ort" required>
                        </div>
                         <div class="col-md-6">
                            <h3>Ditt jobb/skola/etc</h3>
                            <input type="text" name="postcode-work" placeholder="Postnummer" required>
                            <input type="text" name="workcity" placeholder="Ort" required>
                        </div>
                    </div>
                    <div>@php
                            if($wrong) : echo $wrong; endif;
                        @endphp
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <h3>Välj transportmedel</h3>
                            <div class="select">
                                <select name="transport" >
                                <option value="2.94">Personbil bensin</option>
                                <option value="0.25">Personbil diesel</option>
                                <option value="0.24">Personbil E-85 (Etanol)</option>
                                <option value="0.65">Lätt lastbil</option>
                                <option value="1.02">Lastbil utan släp</option>
                                <option value="1.24">Lastbil med släp</option>
                                <option value="6.17">MC</option>
                                <option value="3.28">Moped</option>
                                <option value="0">Tåg</option>
                                <option value="0">Spårvagn</option>
                            </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <input class="btn btn-primary" id="count" type="submit" value="Beräkna">
                        </div>
                    </div>
                </form>
                <br><br><br>
                <div class="result">
                    <div class="row">
                        <div class="col-md-12" id="show">
                            Ditt utsläpp: @php
                                echo 'ca ' . $distance*$transport . ' CO g/km';
                            @endphp
                             <hr>
                            <strong>Så här har vi räknat &#8628;</strong> <br>
                            Din hemadress: @php
                                if (!empty($home)) :
                                echo $home['postcode'] .' '. $home['city'];
                                endif;
                            @endphp <br>
                            Din jobbadress: @php
                                if(!empty($work)) :
                                echo $work['postcode'] .' '. $work['city'];
                                endif;
                            @endphp  <br>
                            Avståndet mellan ditt hem och ditt jobb: @php
                              echo  $distance;
                            @endphp Km<br>
                            Ditt valda transportmedels utsläpp per km: @php
                                echo $transport;
                            @endphp CO<br> <br>
                             
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
