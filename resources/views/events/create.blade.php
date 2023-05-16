@extends('layouts.main')

@section('title', 'HDC Events - Produto')

@section('content')

    <div id="event-create-container" class="col-md-6 offset-md-3">

        <h1>Crie o seu evento</h1>

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

        <form action="{{ URL::to('/events') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="title">Evento:</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Nome do evento" value="{{ old('title') }}">
            </div>

            <div class="form-group">
                <label for="title">Data do evento:</label>
                <input type="date" class="form-control" id="date" name="date" value="{{ old('date') }}">
            </div>
            
            <div class="form-group">
                <label for="image">Imagem do evento:</label>
                <input type="file" class="form-control-file" id="image" name="image">
            </div>

            <div class="form-group">
                <label for="title">Cidade:</label>
                <input type="text" class="form-control" id="city" name="city" placeholder="Local do evento" value="{{ old('city') }}">
            </div>

            <div class="form-group">
                <label for="title">O evento é privado?</label>
                <select name="private" id="private" class="form-control">
                    <option value="0">Não</option>
                    <option value="1" {{ old('private') == 1 ? 'selected' : '' }}>Sim</option>
                </select>
            </div>

            <div class="form-group">
                <label for="title">Descrição:</label>
                <textarea name="description" id="description" class="form-control" placeholder="O que vai acontecer no evento?">{{ old('description') }}</textarea>
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

            <input type="submit" class="btn btn-primary" value="Criar Evento">

        </form>

    </div>

@endsection