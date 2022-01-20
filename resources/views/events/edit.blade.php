@extends('layouts.main')

@section('title', 'Editando: ' . $event->title)

@section('content')
<script src="/js/ckeditor/ckeditor.js"></script>
<script src="/js/ckfinder/ckfinder.js"></script>
<div class="container">
<div class="row pular-linha">
<div id="event-create-container" class="jumbotron">
    <h1>Editando: {{ $event->title }}</h1>
    <p>Autor: {{ $eventOwner['name'] }}</p>
    <form action="/events/update/{{ $event->id }}" method="POST" data-toggle="validator" enctype="multipart/form-data" role="form">
        @csrf
        @method('PUT')
        <div class="">
            <label for="image" class="file-label">{{__('Imagem do Evento')}}</label>
            <input type="file" class="form-control-file" id="image" name="image">
            <p><img src="/img/events/{{ $event->image }}" alt="{{ $event->title }}" class="img-preview"></p>
            <div class="galeria"></div>
        </div>
        <div class="form-group">
            <label for="title">Credito da Imagem</label>
            <input type="text" class="form-control" id="credito" name="credito" placeholder="Digite o Credito da Imagem" value="{{ $event->credito }}" required>
            <div class="help-block with-errors"></div>
        </div>
        <div class="form-group">
            <label for="title">Evento</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Nome do Evento" value="{{ $event->title }}" required>
            <div class="help-block with-errors"></div>
        </div>
        <div class="form-group">
            <label for="title">Data do Evento</label>
            <input type="date" class="form-control" id="date" name="date" value="{{ $event->date->format('Y-m-d') }}">
            <div class="help-block with-errors"></div>
        </div>
        <div class="form-group">
            <label for="title">Cidade</label>
            <input type="text" class="form-control" id="city" name="city" placeholder="Local do Evento" value="{{ $event->city }}" required>
            <div class="help-block with-errors"></div>
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
            <label for="title">Fonte da Matéria</label>
            <input type="text" class="form-control" id="fonte" name="fonte" placeholder="Digite a fonte e os credito da matéria" value="{{ $event->fonte }}" required>
            <div class="help-block with-errors"></div>
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
<p>&nbsp;</p>
</div>
    @endsection

<!-- @section('js') -->

<script type="text/javascript">
                
                CKEDITOR.replace( 'description', {
                filebrowserBrowseUrl: '/js/ckfinder/ckfinder.html',
                filebrowserUploadUrl: '/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files'
        });
</script>

@endsection