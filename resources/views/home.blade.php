@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>


                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!

                        @if($posts->count(1))
                            <h2>Mina inlägg</h2>
                            @foreach ($posts as $post)
                                <li>
                                    <a href="/posts/{{$post->id}}">
                                        <h2>{{$post->title}}</h2>
                                    </a>
                                    <p>Gilla {{$post->likes}}</p>
                                </li>
                            @endforeach
                        @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
