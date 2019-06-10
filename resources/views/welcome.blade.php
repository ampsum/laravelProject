@extends('layouts.app')

@section('content')
    <div class="container-fluid homePage">
        <div class="row">
            <div class="col-md-12">
                <section class="hero" style="background-image:url(../images/hero2.jpg)">
                    <div class="container">
                        <div class="text centered-y">
                            <h2>Ta reda på ditt dagliga utsläpp</h2>
                            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolores harum maiores consequatur hic, possimus porro ab enim voluptas</p>
                             <a class="btn btn-primary" href="/counter">Till utsälppräknaren</a>
                        </div>
                    </div>
                </section>
                <section class="home-content"> 
                    <div class="row">
                        <div class="col-md-6 text half first" style="background-image:url()">
                            <h2>Delta i diskussioner om klimatet</h2>
                            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolores harum maiores consequatur hic, possimus porro ab enim voluptas</p>
                            <a class="btn btn-primary" href="/posts">Till diskussionsforum</a>
                        </div>
                        <div class="col-md-6 text half second" style="background-image:url()">
                            <h2>Hitta klimatrelaterade evenemang</h2>
                            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolores harum maiores consequatur hic, possimus porro ab enim voluptas</p>
                            <a class="btn btn-primary" href="/events">Till evenemang</a>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
