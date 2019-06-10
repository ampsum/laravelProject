@extends('layouts.app')

@section('title')
    {{$post->title}}
@endsection

@section('content')
    <div class="container text-center top-container">
        <div class="row">
            <div class="col">
                <div>
                    <h3>{{$post->title}}</h3>
                    <p><small>{{$post->created_at->format('Y-m-d H:i')}}</small>
                        <br>
                    <small>Av: {{$post->userName}}</small></p>
                    <p>
                        {{$post->content}}
                    </p>
                </div>
                @if(isset($id) && $post->user_id == $id)
                    <p>
                        <a href="/posts/{{$post->id}}/edit">Ändra inlägg</a>
                    </p>
                @endif

            </div>
        </div>
    </div>
    <br>

    <div class="container ">
        <div class="row">
            <div class="col text-center">
                    <form action="/posts/{{$post->id}}" method="POST">
                        @method('PATCH')
                        @csrf
                        <p><button class="btn btn-primary" type="submit" name="like">Gilla</button> {{$post->likes}}</p>
                    </form>
            </div>
        </div>
        <form method="POST" action="/comments">
            {{csrf_field()}}
            <input type="hidden" name="post" value="{{$post->id}}">
            <!-- <input type="text" placeholder="User Name" name="userName"> -->
            <textarea class="form-control" rows="2" placeholder="Kommentar" name="content"></textarea>
            <br>
            <button class="btn btn-primary" type="submit">Skicka kommentar</button>
        </form>
        <div id="comments">
            <dl>
                @foreach ($post->comments as $comment)
                    <dt>{{ $comment->userName }}</dt>
                    <dd>{{ $comment->content }}</dd>
                @endforeach
            </dl>
        </div>
    </div>





@endsection
