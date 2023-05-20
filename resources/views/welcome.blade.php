@extends('layouts.main')

@section('title', 'HDC Events')

@section('content')

    <div id="search-container" class="col-md-12">
        <h1>Busque um evento</h1>
        <form action="{{ URL::to('/') }}" method="GET">
            <input type="text" name="search" id="search" class="form-control" placeholder="Procurar..." value="{{ $search }}">
        </form>
    </div>

    <div id="events-container" class="col-md-12">

        @if(empty($search))
            <h2>Próximos Eventos</h2>
            <p class="subtitle">Veja os eventos dos próximos dias:</p>
        @else
            <h2>Buscando por: {{ $search }}</h2>
        @endif

        <div id="cards-container" class="row">
            @if(count($events) == 0)
                @if(empty($search))
                    <p>Não há eventos disponíveis</p>
                @else
                    <p>Não foi possível encontrar nenhum evento com <b>{{ $search }}</b>. <a href="/">Ver todos</a></p>
                @endif
            @else
                @foreach($events as $event)
                    <div class="card col-md-3">
                        <img src="{{ asset('/img/events/' .  $event->image) }}" alt="{{ $event->title }}">

                        <div class="card-body">
                            <p class="card-date">{{ date('d/m/Y', strtotime($event->date)) }}</p>
                            <h5 class="card-title">{{ $event->title }}</h5>
                            <p class="card-participants">{{ count($event->users) }} participantes</p>
                            <a href="{{ URL::to('/events/' . $event->id ) }}" class="btn btn-primary">Saber mais</a>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>

@endsection