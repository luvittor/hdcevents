<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Event;

class EventController extends Controller
{
    
    public function index() {
        
        $events = Event::all();
        
        $vars = [
            'events' => $events
        ];
    
        return view('welcome', $vars);

    }

    public function create() {
        return view('events.create');
    }

}
