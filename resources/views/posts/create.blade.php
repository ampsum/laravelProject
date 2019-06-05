@extends('layouts.app')

@section('title')
    Skapa nytt inlägg
@endsection

@section('content')


    <form action="/posts" method="POST">
        @csrf
        <input type="text" placeholder="Titel" name="title" value="{{ old('title') }}" required>
        <textarea placeholder="Innehåll" name="content" required>{{ old('content') }}</textarea>
        <button type="submit">Publicera</button>

        @if($errors->any())
            <div>
                @foreach($errors->all() as $error)
                    {{ $error }}
                @endforeach
            </div>

        @endif
    </form>


@endsection
