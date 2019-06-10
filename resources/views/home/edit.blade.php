@extends('layouts.app')
@section('title')
    Uppdatera uppgifter
@endsection

@section('content')
    <br>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <h2 class="form-h2">Ändra uppgifter</h2>
                            <form action="/home/{{$user->id}}" method="POST">
                                @method('PATCH')
                                @csrf
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label for="name">Namn:</label>
                                        <input class="form-control" type="text" name="name" value="{{$user->name}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label for="adress">Adress:</label>
                                        <input class="form-control" type="text" name="adress" value="{{$user->address}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label for="email">Email:</label>
                                        <input class="form-control" type="text" name="email" value="{{$user->email}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <input class="btn btn-primary" type="submit" name="submit" value="Spara">
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

                            <form action="/home/{{$user->id}}" method="POST">
                                @method('DELETE')
                                @csrf
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <input class="btn btn-primary" type="submit" name="submit" value="Radera konto">
                                    </div>
                                </div>
                            </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
