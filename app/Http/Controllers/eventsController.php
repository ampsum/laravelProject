<?php

namespace App\Http\Controllers;

use App\events;
use App\User;
use \App\Post;
use Illuminate\Http\Request;

class eventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId = auth()->user()->id;
        $user = User::findOrFail($userId);
        $events = events::all();
        return view('events.index', ['events' => $events, 'user' => $user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('events.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Gets lat & long for the given address 
        $address = request('address');
        $lat = '';
        $long = '';
        if($address) {
            $uri = 'https://geocoder.api.here.com/6.2/geocode.json?app_id=4lbg6bNUqJVj80BOpcoj&app_code=derEmKtRJUQiPFW5bgUzaQ&searchtext='.urlencode($address);
            $json = file_get_contents($uri);
            $arr = json_decode($json, true);
            if(!empty($arr['Response']['View'])) {
                $lat = $arr['Response']['View'][0]['Result'][0]['Location']['DisplayPosition']['Latitude'];
                $long = $arr['Response']['View'][0]['Result'][0]['Location']['DisplayPosition']['Longitude'];
            }
        }

        if($cover = $request->file('cover')) {
            $name = $cover->getClientOriginalName();
            if($cover->move('images', $name)) {
                events::create([
                    'title' => request('title'),
                    'address' => request('address'),
                    'date' => request('date'),
                    'cover' => $name,
                    'content' => request('content'),
                    'lat' => $lat,
                    'long' => $long,
                ]);
            } else {
                events::create([
                    'title' => request('title'),
                    'address' => request('address'),
                    'date' => request('date'),
                    'cover' => 'empty',
                    'content' => request('content'),
                    'lat' => $lat,
                    'long' => $long,
                ]);
            }
        } else {
            events::create([
                    'title' => request('title'),
                    'address' => request('address'),
                    'date' => request('date'),
                    'cover' => 'empty',
                    'content' => request('content'),
                    'lat' => $lat,
                    'long' => $long,
                ]);
        };
        
         return redirect('/events');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\events  $events
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = events::findOrFail($id);
        return view('events.show', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\events  $events
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $event = events::findOrFail($id);
       return view('events.edit', compact('event')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\events  $events
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {   
        $address = request('address');
        $lat = '';
        $long = '';
        if($address) {
            $uri = 'https://geocoder.api.here.com/6.2/geocode.json?app_id=4lbg6bNUqJVj80BOpcoj&app_code=derEmKtRJUQiPFW5bgUzaQ&searchtext='.urlencode($address);
            $json = file_get_contents($uri);
            $arr = json_decode($json, true);
            if(!empty($arr['Response']['View'])) {
                $lat = $arr['Response']['View'][0]['Result'][0]['Location']['DisplayPosition']['Latitude'];
                $long = $arr['Response']['View'][0]['Result'][0]['Location']['DisplayPosition']['Longitude'];
            }
        }
        $event = events::findOrFail($id);
        if($cover = $request->file('cover')) {
            $name = $cover->getClientOriginalName();
            if($cover->move('images', $name)) {
                $event->title = request('title');
                $event->address = request('address');
                $event->date = request('date');
                $event->cover =  $name;
                $event->content =   request('content');
                $event->lat  =  $lat;
                $event->long = $long;
                $event->save();
            } else {
                $event->title = request('title');
                $event->address = request('address');
                $event->date = request('date');
                $event->cover =  'empty';
                $event->content =   request('content');
                $event->lat  =  $lat;
                $event->long = $long;
                $event->save();
            }
        } else {
            $event->title = request('title');
                $event->address = request('address');
                $event->date = request('date');
                $event->cover =  'empty';
                $event->content =   request('content');
                $event->lat  =  $lat;
                $event->long = $long;
                $event->save();
        }
         return redirect('/events');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\events  $events
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        events::findOrFail($id)->delete();
        return redirect('/events');
    }
}
