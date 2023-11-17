@extends('layouts.app', ['page' => __('Noticia'), 'pageSlug' => 'noticia'])

@section('content')
<div class="col-md-10 offset-md-1">
    <div class="row">
      <div id="image-container" class="col-md-6">
        <img src="/img/noticias/{{ $noticia->image }}" class="img-fluid" alt="{{ $noticia->title }}">
      </div>
      <div id="info-container" class="col-md-6">
        <h1>{{ $noticia->title }}</h1>
        <p class="event-owner"><ion-icon name="star-outline"></ion-icon> {{ $noticia->autor }} <i class="tim-icons icon-attach-87"></i>  {{ date('d/m/Y:H H:m',strtotime($noticia->created_at))}}</p>
     
      
      </div>
      <div class="col-md-12" id="description-container">
        <h3>Sobre A Noticia:</h3>
        <p class="event-description">{{ $noticia->description }}</p>
      </div>
    </div>
  </div>
@endsection
