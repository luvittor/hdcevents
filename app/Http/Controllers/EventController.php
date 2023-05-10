<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Event;

class EventController extends Controller
{

    public function index()
    {

        $events = Event::all();

        $vars = [
            'events' => $events
        ];

        return view('welcome', $vars);
    }

    public function create()
    {
        return view('events.create');
    }

    public function store(Request $request)
    {
        $event = new Event;

        $event->title = $request->title;
        $event->date = $request->date;
        $event->city = $request->city;
        $event->private = $request->private;
        $event->description = $request->description;
        $event->items = $request->items;

        if ($request->hasFile('image') && $request->file('image')->isValid()) {

            $requestImage = $request->image;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $requestImage->move(public_path('img/events'), $imageName);

            $event->image = $imageName;
        }





        $event->save();

        return redirect('/')->with("msg", "Evento criado com sucesso!");
    }

    public function show($id){

        $event = Event::findOrFail($id);

        $vars = [
            'event' => $event
        ];

        return view('events.show', $vars);

    }



}
