@extends('layouts.main')

@section('title', 'HDC Events - ' . $event->title)

@section('content')

    <div id="event-create-container" class="col-md-6 offset-md-3">

        <h1>Editando: {{ $event->title }}</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    <h5>Ocorreu um erro:</h5>

                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach

                </ul>
            </div>
        @endif

        <form action="{{ URL::to('/events/update/' . $event->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title">Evento:</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Nome do evento" value="{{ old('title') === null ? $event->title : old('title') }}">
            </div>

            <div class="form-group">
                <label for="title">Data do evento:</label>
                <input type="date" class="form-control" id="date" name="date" value="{{ old('date') === null ? $event->date->format('Y-m-d') : old('date') }}">
            </div>
            
            <div class="form-group">
                <label for="image">Imagem do evento:</label>
                <input type="file" class="form-control-file" id="image" name="image">
                <img src="{{ URL::to('/img/events/' . $event->image) }}" alt="{{ $event->title }}" class="img-preview">
            </div>

            <div class="form-group">
                <label for="city">Cidade:</label>
                <input type="text" class="form-control" id="city" name="city" placeholder="Local do evento" value="{{ old('city') === null ? $event->city : old('city') }}">
            </div>

            <div class="form-group">
                <label for="private">O evento é privado?</label>
                <select name="private" id="private" class="form-control">
                    <option value="0">Não</option>
                    <option value="1" {{ (old('private') === null ? $event->private : old('private')) == 1 ? "selected" : "" }}>Sim</option>
                </select>
            </div>

            <div class="form-group">
                <label for="description">Descrição:</label>
                <textarea name="description" id="description" class="form-control" placeholder="O que vai acontecer no evento?">{{ old('description') === null ? $event->description : old('description') }}</textarea>
            </div>

            <div class="form-group">
                <label for="items[]">Adicione itens de infraestrutura:</label>
                <div class="form-group">
                    <label class="items_checkboxes"><input type="checkbox" name="items[]" value="Cadeiras"> Cadeiras</label>
                </div>
                <div class="form-group">
                    <label class="items_checkboxes"><input type="checkbox" name="items[]" value="Palco"> Palco</label>
                </div>
                <div class="form-group">
                    <label class="items_checkboxes"><input type="checkbox" name="items[]" value="Cerveja grátis"> Cerveja grátis</label>
                </div>
                <div class="form-group">
                    <label class="items_checkboxes"><input type="checkbox" name="items[]" value="Open food"> Open food</label>
                </div>
                <div class="form-group">
                    <label class="items_checkboxes"><input type="checkbox" name="items[]" value="Brindes"> Brindes</label>
                </div>
            </div>

            <input type="submit" class="btn btn-primary" value="Atualizar Evento">

        </form>

    </div>

@endsection