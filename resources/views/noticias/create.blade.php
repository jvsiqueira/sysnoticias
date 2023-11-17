@extends('layouts.app', ['page' => __('Cadastrar Noticia'), 'pageSlug' => 'noticia'])

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">Cadastro de Noticia</h5>
                </div>
                <form method="POST" action="/noticias" autocomplete="off" enctype="multipart/form-data">
                    <div class="card-body">
                            @csrf
                            <div class="form-group">
                                <label for="image">Imagem da Noticia(Clique para Adicionar)</label>
                                <input type="file" id="image" name="image" class="from-control-file">
                              </div>
                            <div class="form-group">
                                <label>Titulo</label>
                                <input type="text" name="title" class="form-control" placeholder="Titulo" >
                                @include('alerts.feedback', ['field' => 'titulo'])
                            </div>
                            <div class="form-group">
                                <label>Descrição</label>
                                
                                <textarea name="description" id="description" class="form-control" placeholder="Descricao da Noticia" rows="5" cols="33"></textarea>
                                @include('alerts.feedback', ['field' => 'description'])
                            </div>
                          
                            <div class="form-group">	
                                <input type="checkbox" name="status" id="status" value="1"> Status
                            </div>
                         
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-fill btn-primary">Salvar</button>
                    </div>
                </form>
            </div>

          
        </div>
        
    </div>
@endsection
