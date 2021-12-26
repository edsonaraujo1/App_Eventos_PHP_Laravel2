@extends('layouts.main')

@section('title', 'Plataforma Utyum')

@section('content')

<div class="row" align="center">

<div id="search-container" class="col-md-12">
    <h1>{{__('buscar')}}</h1>
    <form action="/" method="GET">
        <input type="text" id="search" name="search" class="form-control" placeholder="{{__('procurar')}}">
    </form>
</div>
<div id="events-container">
    @if($search)
        <h2>{{__('buscandopor')}}: {{ $search }}</h2>
    @else
        <h2>{{__('proximo')}}</h2>
        <p class="subtitle">{{__('vejaoseventos')}}</p>
    @endif
    <!-- row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 -->
    @if(count($events) > 1)
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3">
    @else
        <div class="row row-cols-1">
    @endif
       @foreach($events as $event)
       <div class="col mb-4">
            <div class="card">
                <img class="card-img-top" src="/img/events/{{ $event->image }}" alt="{{ $event->title }}">
                <div class="card-body">
                    <p class="card-date">{{ date('d/m/Y', strtotime($event->date)) }}</p>
                    <h5 class="card-title">{{ Str::limit($event->title, 90, $end='.......') }}</h5>
                    <p class="card-participants bot_participants">{{ count($event->users) }} {{__('participantes')}}</p><br><br><br>
                    <a href="/events/{{ $event->id }}" class="btn btn-primary bot_cont">{{__('sabermais')}}</a>
                </div>
            </div>
       </div>
       @endforeach
       
       @if(count($events)==0 && $search)
           <p>{{__('naoencontrado')}} {{ $search }}! <a href="/">{{__('vertodos')}}</p>
       @elseif(count($events)==0)
           <p>{{__('naohaeventos')}}</p>
       @endif    
    </div>
</div>
</div>
<div class="d-flex justify-content-center">
        {{ $events->links() }}
       </div>
@endsection