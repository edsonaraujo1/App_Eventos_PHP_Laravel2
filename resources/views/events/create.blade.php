@extends('layouts.main')

@section('title', 'Plataforma Utyum')

@section('content')
<script src="/js/ckeditor/ckeditor.js"></script>
<script src="/js/ckfinder/ckfinder.js"></script>

<div class="container">
<div class="row pular-linha">
<div id="event-create-container" class="jumbotron">
    <h1>Crie o seu evento</h1>
    <form action="/events" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
        <label for="image" class="file-label">Imagem do Evento</label>
            <input type="file" multiple class="form-control-file" id="image" name="image">
            <div class="galeria"></div>
        </div>
        <div class="form-group">
            <label for="title">Evento</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Nome do Evento">
        </div>
        <div class="form-group">
            <label for="title">Data do Evento</label>
            <input type="date" class="form-control" id="date" name="date">
        </div>
        <div class="form-group">
            <label for="title">Cidade</label>
            <input type="text" class="form-control" id="city" name="city" placeholder="Local do Evento">
        </div>
        <div class="form-group">
            <label for="title">O Evento e Privado?</label>
            <select class="form-control" id="private" name="private">
                <option value="0">Não</option>
                <option value="1">Sim</option>
            </select>
        </div>
        <div class="form-group">
            <label for="title">Evento</label>
            <textarea class="form-control" id="description" name="description" rows="10" placeholder="O que vai acontecer no evento"></textarea>
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
        <!-- <input type="submit" class="btn btn-primary" value="Criar Evento"> -->
        <button type="submit" class="btn btn-primary " style="float: right; margin-top: 10px;">Criar Evento</button>
    </form>
</div>
</div>
<p>&nbsp;</p>
</div>

<script type="text/javascript">
                
                CKEDITOR.replace( 'description', {
                filebrowserBrowseUrl: '/js/ckfinder/ckfinder.html',
                filebrowserUploadUrl: '/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files'
        });
</script>
@endsection