@extends('layouts.main')

@section('title', 'HDC Events')

@section('content')

    <div id="search-container" class="col-md-12">
        <h1>Busque um evento</h1>
        <form action="/" method="GET">
            <input type="text" name="search" id="search" class="form-control" placeholder="Procurar...">
        </form>
    </div>

    <div id="events-container" class="col-md-12">

        <h2>Próximos Eventos</h2>
        <p class="subtitle">Veja os eventos dos próximos dias</p>

        <div id="cards-container" class="row">
            @foreach($events as $event)
                <div class="card col-md-3">
                    <img src="{{ asset('/img/events/' .  $event->image) }}" alt="{{ $event->title }}">

                    <div class="card-body">
                        <p class="card-date">10/09/2021</p>
                        <h5 class="card-title">{{ $event->title }}</h5>
                        <p class="card-participants">X participantes</p>
                        <a href="{{ URL::to('/events/' . $event->id ) }}" class="btn btn-primary">Saber mais</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection