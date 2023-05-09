@extends('layouts.main')

@section('title', 'HDC Events')

@section('content')

    <h1>Título</h1>

    <img src="{{ asset('img/banner.jpg') }}">

    @if(10 > 5)
        <p>A condição é verdadeira</p>
    @else
        <p>A condição é falsa</p>
    @endif


    <p>{{ $nome }}</p>

    <p>{{ $description }}</p>

    @if($nome == 'Luciano')
        <p>O nome é Luciano</p> 
    @elseif($nome == 'João')
        <p>O nome é João</p>
    @else
        <p>O nome não é nem Luciano nem João</p>
    @endif

    @for($i = 0; $i < 10; $i++)
        <p>O valor de i é {{ $i }}</p>
    @endfor

    @foreach($array as $i => $item)
        <p>Loop index {{ $loop->index }}</p>
        <p>O valor do array é {{ $i }} = {{ $item }}</p>
    @endforeach

    @php
        $nome = 'Luciano';
        echo $nome;
    @endphp

    <!-- comentário HTML -->

    {{-- comentário blade --}}

@endsection