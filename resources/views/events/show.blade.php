@extends('layouts.main')

@section('title', $event->title)

@section('content')

<div class="row">

    <div class="col-md-10 offset-md-1">
        <div class="row">
            <div id="image-container" class="col-md-6">
                <img src="/img/events/{{ $event->image }}" class="img-fluid" alt="{{ $event->title }}">
                <p class="credito-font">{{ $event->credito }}</p>
            </div>
            <div id="info-container" class="col-md-6">
                <h1>{{ $event->title }}</h1>
                <p class="event-city"><ion-icon name="location-outline"></ion-icon>{{ $event->city }}</p>
                <p class="event-participants"><ion-icon name="people-outline"></ion-icon>{{ count($event->users) }} Participantes</p>
                <p class="event-owner"><ion-icon name="star-outline"></ion-icon>{{ $eventOwner['name'] }} </p>
                @if(!$hasUserJoined)
                    <form action="/events/join/{{ $event->id }}" method="POST">
                        @csrf
                    <a href="/events/join/{{ $event->id }}"
                        class="btn btn-primary"
                        id="event-submit"
                        onclick="event.preventDefault();
                        this.closest('form').submit();">
                        {{ __('Confirmar Presença') }}  
                        </a>
                    </form>
                @else
                <p><a class="already-joined-msg">Você já esta participando deste Evento!</a></p>
                @endif
                <h3>{{ __('O Evento conta com') }}:</h3>
                <ul id="items-list">
                @foreach($event->items as $item)
                    <li><ion-icon name="play-outline"></ion-icon> <span>{{ $item }}</span></li>
                @endforeach
                </ul>
            </div> 
            <div class="col-md-12" id="description-container">
                <h3>{{ __('Sobre o Evento') }}:</h3>
                <p class="event-description">{!! $event->description !!}</p>
                <br />
                @if($event->fonte != '')
                   <p class="credito-font">Fonte: {{ $event->fonte }}</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection