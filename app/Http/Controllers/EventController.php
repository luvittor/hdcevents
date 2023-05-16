<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Event;
use App\Models\User;

class EventController extends Controller
{

    public function index()
    {
        $search = request('search');

        if ($search) {
            $events = Event::searchEvents($search);
        } else {
            $events = Event::all();
        }

        $vars = [
            'events' => $events,
            'search' => $search
        ];

        return view('welcome', $vars);
    }

    public function create()
    {
        return view('events.create');
    }


    private function rules($edit = false)
    {
        if (!$edit) {
            return [
                'title' => 'required|min:3',
                'date' => 'required',
                'image' => 'required|image',
                'city' => 'required|min:3',
                'private' => 'required',
                'description' => 'required|min:3'
            ];
        } else {
            return [
                'title' => 'required|min:3',
                'date' => 'required',
                'city' => 'required|min:3',
                'private' => 'required',
                'description' => 'required|min:3'
            ];
        }
    }

    private function messages()
    {
        return [
            'title.required' => 'O campo do nome do evento é obrigatório',
            'required' => 'O campo :attribute é obrigatório',
            'min' => 'O campo :attribute precisa ter no mínimo :min caracteres',
            'image' => 'O arquivo precisa ser uma imagem válida'
        ];
    }

    public function store(Request $request)
    {
        $request->validate(
            $this->rules(),
            $this->messages()
        );

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

        $user = auth()->user();
        $event->user_id = $user->id;

        $event->save();

        return redirect('/')->with("msg", "Evento criado com sucesso!");
    }

    public function show($id)
    {
        $event = Event::findOrFail($id);

        $eventOwner = User::getUser($event->user_id);

        $user = auth()->user();

        $hasUserJoined = false;

        if ($user) {
            $userEvents = $user->eventsAsParticipant->toArray();

            foreach ($userEvents as $userEvent) {
                if ($userEvent['id'] == $id) {
                    $hasUserJoined = true;
                    break;
                }
            }
        }

        $vars = [
            'event' => $event,
            'eventOwner' => $eventOwner,
            'hasUserJoined' => $hasUserJoined
        ];

        return view('events.show', $vars);
    }

    public function dashboard()
    {
        $user = auth()->user();

        $events = $user->events;

        $eventsAsParticipant = $user->eventsAsParticipant;

        return view('events.dashboard', [
            'events' => $events,
            'eventsAsParticipant' => $eventsAsParticipant
        ]);
    }

    public function destroy($id)
    {
        $event = Event::findOrFail($id);

        $user = auth()->user();
        if ($user->id != $event->user_id) return redirect('/dashboard');

        $event->delete();

        return redirect('/dashboard')->with('msg', 'Evento excluído com sucesso!');
    }

    public function edit($id)
    {
        $event = Event::findOrFail($id);

        $user = auth()->user();
        if ($user->id != $event->user_id) return redirect('/dashboard');

        return view('events.edit', ['event' => $event]);
    }

    public function update($id)
    {
        $request = request();

        $request->validate(
            $this->rules(true),
            $this->messages()
        );

        $event = Event::findOrFail($id);

        $user = auth()->user();
        if ($user->id != $event->user_id) return redirect('/dashboard');

        $data = request()->all();

        if ($request->hasFile('image') && $request->file('image')->isValid()) {

            $requestImage = $request->image;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $requestImage->move(public_path('img/events'), $imageName);

            $data['image'] = $imageName;
        }

        $event->update($data);

        return redirect('/dashboard')->with('msg', 'Evento editado com sucesso!');
    }

    function joinEvent($id)
    {
        $user = auth()->user();

        $user->eventsAsParticipant()->attach($id);

        $event = Event::findOrFail($id);

        return redirect('/dashboard')->with('msg', 'Sua presença está confirmada no evento ' . $event->title . '!');
    }

    function leaveEvent($id)
    {
        $user = auth()->user();

        $user->eventsAsParticipant()->detach($id);

        $event = Event::findOrFail($id);

        return redirect('/dashboard')->with('msg', 'Você saiu do evento ' . $event->title . '!');
    }
}
