@extends('layouts.app')

@section('content')
<h2 class="form-h2">Lägg till ett nytt evenemang</h2>
    <form action="/events" method="POST" enctype="multipart/form-data">
        {{csrf_field()}}
        <input type="hidden" name="event-set" value="1">
            <div class="form-group row">
              <div class="col-md-6">
                  <input class="form-control" type="text" name="title" placeholder="Title">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-md-6">
                   <input class="form-control" type="text" name="address" placeholder="Address">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-md-6">
                  <input class="form-control" type="date" name="date" placeholder="Datum">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-md-6">
                   <input class="file-input" type="file" name="cover" placeholder="Coverbild">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-md-6">
                 <label for="content">Content</label> 
                <textarea id="content" class="form-control" name="content" cols="30" rows="10"></textarea>
              </div>
            </div>
            <div class="form-group row">
            <div class="col-md-6">
                <input class="btn btn-primary" type="submit" name="submit" value="Lägg till event">
            </div>
          </div>
    </form>
@endsection
