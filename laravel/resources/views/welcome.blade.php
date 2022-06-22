@extends('templates.main')

@section('title', 'Plataforma de Eventos')

@section('content')

<div id="search-container" class="col-md-12">
    <h1>Buscar um Evento</h1>
    <form action="{{ url('/') }}" method="GET">
        <input type="text" name="search" id="search" class="form-control" placeholder="Faça sua pesquisa">
    </form>
</div>
<div id="events-container" class="col-md-12">
    @if ($search)
    <h2>Buscando por: {{ $search }}</h2>
    @else
    <h2>Próximos Eventos</h2>
    <p class="subtitle">Veja os eventos dos próximos dias</p>
    @endif
    <div id="cards-container" class="row">
        @foreach ($events as $event)
            <div class="card col-md-3">
                <img src="{{ asset('assets/images/events/')}}/{{ $event->image }}" alt="{{ $event->title }}">
                <div class="card-body">
                    <p class="card-date">{{ date('d/m/Y', strtotime($event->date)) }}</p>
                    <h5 class="card-title">{{ $event->title }}</h5>
                    <p class="card-participants">X participantes</p>
                    <a href="{{ url('events', ['id' => $event->id]) }}" class="btn btn-primary">Saiba mais</a>
                </div>
            </div>
        @endforeach
        @if (count($events) == 0 && $search)
            <p>Não foi possível encontrar nenhum evento com {{ $search }}! <a href="{{ url('/') }}">Ver todos!</a></p>
            @elseif(count($events) == 0)
            <p>Não há eventos disponíveis</p>
        @endif
    </div>
</div>


@endsection