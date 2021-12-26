@extends('layouts.main')

@section('title', 'Editando: ' . $event->title)

@section('content')
<div class="container">
<div class="row pular-linha">
<div id="event-create-container" class="col-md-6 offset-md-3 jumbotron">
    <h1>Editando: {{ $event->title }}</h1>
    <p>Autor: {{ $eventOwner['name'] }}</p>
    <form action="/events/update/{{ $event->id }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="">
            <label for="image" class="file-label">{{__('Imagem do Evento')}}</label>
            <input type="file" class="form-control-file" id="image" name="image">
            <p><img src="/img/events/{{ $event->image }}" alt="{{ $event->title }}" class="img-preview"></p>
        </div>
        <div class="form-group">
            <label for="title">Evento</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Nome do Evento" value="{{ $event->title }}">
        </div>
        <div class="form-group">
            <label for="title">Data do Evento</label>
            <input type="date" class="form-control" id="date" name="date" value="{{ $event->date->format('Y-m-d') }}">
        </div>
        <div class="form-group">
            <label for="title">Cidade</label>
            <input type="text" class="form-control" id="city" name="city" placeholder="Local do Evento" value="{{ $event->city }}">
        </div>
        <div class="form-group">
            <label for="title">O Evento e Privado?</label>
            <select class="form-control" id="private" name="private">
                <option value="0">Não</option>
                <option value="1" {{ $event->private == 1 ? "selected='selected'" : "" }}>Sim</option>
            </select>
        </div>
        <div class="form-group">
            <label for="title">Evento</label>
            <textarea class="form-control" id="description" name="description" rows="10" placeholder="O que vai acontecer no evento">{{ $event->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="title">Adicionar itens de infraestrutura</label>
            <div class="form-group">
                <input type="checkbox" name="items[]" value="Cadeiras"> Cadeiras
            </div>
            <div class="form-group">
                <input type="checkbox" name="items[]" value="Palco"> Palco
            </div>
            <div class="form-group">
                <input type="checkbox" name="items[]" value="Cerveja Gratis"> Cerveja Gratis
            </div>
            <div class="form-group">
                <input type="checkbox" name="items[]" value="Open Food"> Open Food
            </div>
            <div class="form-group">
                <input type="checkbox" name="items[]" value="Brindes"> Brindes
            </div>
        </div>
        <!-- <input type="submit" class="btn btn-primary" value="Salvar Alteração"> -->
        <button type="submit" class="btn btn-primary " style="float: right; margin-top: 10px;">Salvar Alteração</button>
    </form>
</div>
</div>
</div>
    @endsection

@section('js')
<script>
CKEDITOR.replace('description', options);
</script>
@endsection