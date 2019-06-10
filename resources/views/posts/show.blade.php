@extends('layouts.app')

@section('title')
    {{$post->title}}
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div>
                    <h3>{{$post->title}}</h3>
                    <p>{{$post->created_at->format('Y-m-d H:i')}}</p>
                    <p>
                        {{$post->content}}
                    </p>
                </div>
                <div id="app">
                    <form action="/posts/{{$post->id}}" method="POST">
                        @method('PATCH')
                        @csrf
                        <p><button class="btn btn-primary" type="submit" name="like">Gilla</button> {{$post->likes}}</p>
                    </form>
                </div>
                <p>Av: {{$post->userName}}</p>

                @if(isset($id) && $post->user_id == $id)
                    <p>
                        <a href="/posts/{{$post->id}}/edit">Ändra</a>
                    </p>
                @endif

            </div>
        </div>
        <div class="row">


    <form method="POST" action="/comments">
    {{csrf_field()}}
    <input type="hidden" name="post" value="{{$post->id}}">
    <!-- <input type="text" placeholder="User Name" name="userName"> -->
    <input class="form-control" type="text" placeholder="Content" name="content">
    <button class="btn btn-primary" type="submit">Kommentera</button>

@foreach ($post->comments as $comment)
    <dt>{{ $comment->userName }}</dt>
    <dd>{{ $comment->content }}</dd>
@endforeach

        </div>
    </div>



@endsection
