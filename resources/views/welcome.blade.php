@extends('layouts.app',['page' => __('Inicio')])

@section('content')
<div id="cards-container" class="row">
    @foreach($noticias as $noticia)
    <div class="card col-md-3">
        <img src="/img/noticias/{{ $noticia->image }}" alt="{{ $noticia->title }}">
        <div class="card-body">
            <p class="card-date">{{ date('d/m/Y', strtotime($noticia->created_at)) }}</p>
            <h5 class="card-title">{{ $noticia->title }}</h5>
            <a href="/noticias/home/{{ $noticia->id }}" class="btn btn-primary">Saber mais</a>
        </div>
    </div>
    @endforeach
    @if(count($noticias) == 0 )
        <p>Não há Noticias disponíveis</p>
    @endif
</div>
@endsection
