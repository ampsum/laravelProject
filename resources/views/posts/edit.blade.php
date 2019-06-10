@extends('layouts.app')

@section('title')
    Uppdatera
@endsection

@section('content')
    <h2 class="form-h2">Redigera {{$post->title}}</h2>

    <form action="/posts/{{$post->id}}" method="POST">
        @method('PATCH')
        @csrf
        <div class="form-group row">
            <div class="col-md-6">
                <input class="form-control" type="text" name="title" placeholder="Title" value="{{$post->title}}">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-6">
                <textarea id="content" class="form-control" name="content" cols="30" rows="10">{{$post->content}}</textarea>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-6">
                <input class="btn btn-primary" type="submit" name="submit" value="Uppdatera inlägg">
            </div>
        </div>

        @if($errors->any())
            <div>
                @foreach($errors->all() as $error)
                    {{ $error }}
                @endforeach
            </div>
        @endif
    </form>
    <form action="/posts/{{$post->id}}" method="POST">
        @method('DELETE')
        @csrf
        <div class="form-group row">
            <div class="col-md-6">
                <input class="btn btn-primary" type="submit" name="submit" value="Radera inlägg">
            </div>
        </div>
    </form>




@endsection
