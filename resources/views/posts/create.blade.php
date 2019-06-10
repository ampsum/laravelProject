@extends('layouts.app')

@section('title')
    Skapa nytt inlägg
@endsection

@section('content')
    <div class="container top-container">
    <h2 class="form-h2">Skapa ett nytt inlägg</h2>

    <form action="/posts" method="POST">
        @csrf
        <div class="form-group row">
            <div class="col-md-6">
                <input class="form-control" type="text" name="title" placeholder="Title" value="{{ old('title') }}" required>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-6">
                <textarea id="content" class="form-control" placeholder="Content" name="content" cols="30" rows="10" required>{{ old('content') }}</textarea>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-6">
                <input class="btn btn-primary" type="submit" name="submit" value="Publicera inlägg">
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
    </div>


@endsection
