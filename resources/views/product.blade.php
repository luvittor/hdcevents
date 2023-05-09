@extends('layouts.main')

@section('title', 'HDC Events - Produto')

@section('content')

    <h1>Tela de Produto</h1>

    <p>Exibindo produto de código: {{ $id }}</p>

    @if($id != 0)
        <p>O id é {{ $id }}</p>
    @else
        <p>Não existe um id definido</p>
    @endif

@endsection