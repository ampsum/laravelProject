@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Inloggad</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <h2>Ändra uppgifter</h2>
                            <form action="/home/{{$user->id}}" method="POST">
                                @method('PATCH')
                                @csrf

                            <p>Namn:
                                <input type="text" name="name" value="{{$user->name}}">
                            </p>
                            <p>Adress:
                                <input type="text" name="adress" value="{{$user->address}}">
                            </p>
                            <p>Email:
                                <input type="text" name="email" value="{{$user->email}}">
                            </p>
                                <button type="submit">Spara</button>

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
                                <button type="submit">Radera konto</button>
                            </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
