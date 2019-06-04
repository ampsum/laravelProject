<?php

namespace App\Http\Controllers;

use App\events;
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
        $events = events::all();
        return view('events.index', compact('events'));
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
        events::create([
            'title' => request('title'),
            'address' => request('address'),
            'date' => request('date'),
            'cover' => 'IMAGE TO BE ADDED',
            'content' => request('content'),
            'lat' => 1,
            'long' => 2,
         ]);
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
    public function update($id)
    {   $event = events::findOrFail($id);
        $event->title = request('title');
        $event->address = request('address');
        $event->date = request('date');
        $event->cover =  'IMAGE TO BE ADDED';
        $event->content =   request('content');
        $event->lat  =  1;
        $event->long = 2;

        $event->save();
        
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
