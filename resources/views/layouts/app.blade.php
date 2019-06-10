<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/responsive.css') }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <title>@yield('title','Projekt')</title>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-light fixed-top">
            <a class="navbar-brand" href="/">Hem</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon">&#9781;</span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item"><a class="nav-link" href="/posts">Diskussionsforum</a></li>
                    <li class="nav-item"><a class="nav-link" href="/events">Evenemang</a></li>
                    <li class="nav-item"><a class="nav-link" href="/counter">Räkna utsläpp</a></li>
                </ul>
                <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div id="dropdown-menu" class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="{{ route('home') }}">
                                    Min profil
                                </a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: block;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </nav>
    </header>

    <div id="wrap">
        @yield('hero')
        @yield('content')
    </div>
    <div class="container-fluid divider"></div>
    <footer class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4">
                        <h3>Meny</h3>
                        <ul>
                            <li class="nav-item"><a class="nav-link" href="/">Hem</a></li>
                            <li class="nav-item"><a class="nav-link" href="/posts">Diskussionsforum</a></li>
                            <li class="nav-item"><a class="nav-link" href="/events">Evenemang</a></li>
                            <li class="nav-item"><a class="nav-link" href="/counter">Räkna utsläpp</a></li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <h3>Senaste inlägg</h3>
                        <ul>
                            {{-- Get latest 5 posts --}}
                            @php
                                $posts = App\post::all();
                                $i=0;
                            @endphp
                               @foreach ($posts as $post) 
                                @php
                                    $i++;
                                    if($i < 6) : 
                                @endphp
                                <li><a href="/posts/{{$post->id}}">{{$post->title}}</a></li>
                                 @php
                                    endif;
                                @endphp 
                                @endforeach        
                        </ul>
                    </div>
                    <div class="col-md-4 social">
                        <h3>Hjälp oss att bli större!</h3>
                        <ul>
                            <li>
                                <a href="#" class="fa fa-facebook"></a>
                            </li>
                            <li>
                                <a href="#" class="fa fa-twitter"></a>
                            </li>
                            <li>
                                <a href="#" class="fa fa-youtube"></a>
                            </li>
                            <li>
                                <a href="#" class="fa fa-snapchat-ghost"></a>
                            </li>
                            <li>
                                <a href="#" class="fa fa-instagram"></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 copy">
                        <p>2019 Projekt</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="{{ asset('/js/script.js') }}"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
