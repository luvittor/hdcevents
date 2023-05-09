@extends('layouts.main')

@section('title', 'HDC Events - Produtos')

@section('content')

        <h1>Tela de Produtos</h1>

        @if($search != '')
            <p>O usuário está buscando por: {{ $search }}</p>
        @endif

@endsection