@extends('layouts.main')

@section('title', 'Plataforma Utyum')

@section('content')

<div class="container">
    <div class="row pular-linha">
        <div class="col-md-6 jumbotron mx-auto">
            <form action="/contact" method="POST">
                @csrf
                <div class="form-group">
                    <h1>{{__('Envie o seu contato') }}</h1>
                </div>
                @if(count($errors) > 0)
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>{{__('Preencha os dados corretamnte!') }}</strong>
                    <ul>
                        @foreach($errors->all() as $error)
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
                        <strong>{{__('Obrigado!') }}</strong> {{ $message }}
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
                    <label class="nome text-gray-700">{{__('Nome') }}</label>
                    <input type="text" name="nome" class="form-control" placeholder="{{__('Seu Nome') }}">
                </div>
                <div class="form-group">
                    <label class="email text-gray-700">{{__('Email') }}</label>
                    <input type="email" name="email" class="form-control" placeholder="{{__('Seu Email') }}">
                </div>
                <div class="form-group">
                    <label class="mensagem text-gray-700">{{__('Mensagem') }}</label>
                    <textarea name="mensagem" class="form-control" rows="5" placeholder="{{__('Digite uma mensagem') }}"></textarea>
                </div>
                <div class="form-group">
                    <p>
                    <button type="submit" class="btn btn-primary " style="float: right; margin-top: 10px;">{{__('Enviar') }}</button>
                    </p>
                    
                </div>
            </form>
        </div>
    </div>
</div>

@endsection