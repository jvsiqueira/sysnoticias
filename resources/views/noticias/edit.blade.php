@extends('layouts.app', ['page' => __('Cadastrar Noticia'), 'pageSlug' => 'noticia'])

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">Cadastro de Noticia</h5>
                </div>
                <form method="POST" action="/noticias/update/{{$noticia->id}}" autocomplete="off" enctype="multipart/form-data">
                    <div class="card-body">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="image">Imagem da Noticia(Clique para Adicionar)</label>
                                <input type="file" id="image" name="image" class="from-control-file" value="{{$noticia->image}}">
                                <img src="/img/noticias/{{ $noticia->image }}" alt="{{ $noticia->title }}" class="img-preview">
                              </div>
                            <div class="form-group">
                                <label>Titulo</label>
                                <input type="text" name="title" class="form-control" placeholder="Titulo" value="{{$noticia->title}}">
                                @include('alerts.feedback', ['field' => 'titulo'])
                            </div>
                            <div class="form-group">
                                <label>Descrição</label>
                                
                                <textarea name="description" id="description" class="form-control" placeholder="Descricao da Noticia" rows="5" cols="33" value="{{$noticia->description}}">{{$noticia->description}}</textarea>
                                @include('alerts.feedback', ['field' => 'description'])
                            </div>
                          
                            <div class="form-group">	
                                <input type="checkbox" name="status" id="status" value="1"> Status
                            </div>
                         
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-fill btn-primary">Editar</button>
                    </div>
                </form>
            </div>

          
        </div>
        
    </div>
@endsection
