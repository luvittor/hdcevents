@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')

    <div class="col-md-10 offset-md-1 dashboard-title-container">
        <h1>Meus eventos</h1>
    </div>

    <div class="col-md-10 offset-md-1 dashboard-events-container">

        @if(count($events))

        @else

            <p>Você ainda não tem eventos. <a href="{{ URL::to('/events/create') }}">Criar evento</a></p>

        @endif

    </div>

@endsection