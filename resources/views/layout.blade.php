<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title','Projekt')</title>
</head>
<body>
    <header>
        <ul>
            <li><a href="/">Hem</a></li>
            <li><a href="/blog">Bloggen</a></li>
            <li><a href="/events">Evenemang</a></li>
            <li><a href="/counter">Räkna utsläpp</a></li>
            <li><a href="/profile">Mina sidor</a></li>
            <li><a href="/login">Logga in</a></li>
        </ul>
    </header>
    <div id="wrap">
        @yield('content');
    </div>
</body>
</html>