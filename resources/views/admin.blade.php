@extends('layouts.app')

@section('title')
    Adminpanel
@endsection
@section('content')
    <div class="container top-container">
        <div class="row justify-content-center">
            <div class="card w-100">
                <div class="card-body">
                    <h1 class="text-center">Adminpanelen</h1>
                    <br>
                    <div class="row">
                        <div class="col">
                            <h2>Alla användare</h2>
                            @foreach ($users as $user)
                            <table class="adminpanel-table">
                              <tr>
                                <td class="adminpanel-td-50">
                                  <p>Namn: {{$user->name}}</p>
                                </td>
                                <td class="adminpanel-td-50">
                                  <p>Email: {{$user->email}}</p>
                                </td>
                              </tr>
                            </table>
                            @endforeach
                        </div>
                        <div class="col">
                            @if($events->count(1))
                                <h2>Alla evenemang</h2>
                                <a class="nav-link" href="/events/create"><input class="btn btn-primary" type="submit" value="Skapa nytt evenemang"></a>
                                @foreach ($events as $event)
                                    <table class="adminpanel-table">
                                      <tr>
                                        <td class="adminpanel-td">
                                        <a href="/events/{{$event->id}}">
                                            {{$event->title}}
                                        </a>
                                      </td>
                                      <td class="adminpanel-td-right">
                                            <a href="/events/{{$event->id}}/edit"><input class="btn btn-danger" type="submit" value="Redigera / Radera"></a>
                                        </td>
                                      </tr>
                                    </table>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col">
                            @if($posts->count(1))
                                <h2>Alla inlägg</h2>
                                    @foreach ($posts as $post)
                                        <table class="adminpanel-table">
                                          <tr>
                                            <td class="adminpanel-td">
                                            <a href="/posts/{{$post->id}}">
                                                <p class="admin-list-item">{{$post->title}}</p>
                                            </a>
                                          </td>
                                          <td class="adminpanel-td-left">
                                            <form action="/posts/{{$post->id}}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <input class="btn btn-danger" type="submit" name="submit" value="Radera inlägg">
                                            </form>
                                          </td>
                                        </tr>
                                      </table>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                        <div class="col">
                            @if($comments->count(1))
                                <h2>Alla kommentarer</h2>
                                    @foreach ($comments as $comment)
                                        <table class="adminpanel-table">
                                          <tr>
                                            <td style="width:100%;" colspan="2">
                                            <strong>kommentar av användaren {{ $comment->userName }} på <a href="/posts/{{$comment->post_id}}">post med id-nummer {{ $comment->post_id }}</a>:</strong>
                                            </td>
                                          </tr>
                                          <tr>
                                          <td class="adminpanel-td">
                                            <p>
                                            {{$comment->content}}
                                            </p>
                                          </td>
                                          <td class="adminpanel-td-right">
                                            <form action="/comments/{{$comment->id}}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <input class="btn btn-danger adminpanel-btn" type="submit" name="submit" value="Radera kommentar">
                                            </form>
                                          </td>
                                        </tr>
                                      </table>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
