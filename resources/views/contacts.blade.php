@extends('layouts.main')

@section('title', 'Plataforma Utyum')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6 jumbotron mx-auto">
            <form action="/contacts" method="POST">
                @csrf
                <div class="form-group">
                    <h2>Envie o seu contato</h2>
                </div>
                @if(count($errors) > 0)
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Preencha os dados corretamnte!</strong>
                    <ul>
                        @foreach($erros->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                @if($message = Session::get('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Obrigado!</strong> {{ $message }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                @if($message = Session::get('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Ops!</strong> {{ $message }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                @endif

                <div class="form-group">
                    <label class="nome">Nome</label>
                    <input type="text" class="form-control" placeholder="Seu Nome">
                </div>
                <div class="form-group">
                    <label class="email">Email</label>
                    <input type="email" class="form-control" placeholder="Seu Email">
                </div>
                <div class="form-group">
                    <label class="mensage">Mensagem</label>
                    <textarea name="mensage" class="form-control" cols="10" placeholder="Seu Nome"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Enviar</button>
            </form>
        </div>
    </div>
</div>

@endsection