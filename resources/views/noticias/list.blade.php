@extends('layouts.app', ['page' => __('Tables'), 'pageSlug' => 'tables'])

@section('content')
<div class="row">
  
  <div class="col-md-12">
    <div class="card ">
      <div id="search-container" class="col-md-12">
        <form action="/noticias" method="GET">
            <input type="text" id="procurar" name="procurar" class="form-control" placeholder="Procurar...">
        </form>
    </div>
        @if($search)
          <h2>Buscando por: {{ $search }}</h2>
        @endif
        <div class="card-header">
            <div class="row">
                <div class="col-8">
                    <h4 class="card-title">Noticias</h4>
                </div>
                <div class="col-4 text-right">
                    <a href="noticias/create" class="btn btn-sm btn-primary">Add Noticia</a>
                </div>
            </div>
        </div>
      
      <div class="card-body">
        <div class="table-responsive">
          <table class="table tablesorter " id="">
            <thead class=" text-primary">
              <tr>
                <th>ID</th>
                <th>
                  Titulo
                </th>
                <th>
                  Data Cadastro
                </th>
                <th>
                  Status
                </th>
                <th class="text-center">
                    Opções 
                </th>
              </tr>
            </thead>
            <tbody>
                @foreach ($noticias as $item)
                <tr>
                    <td>
                      {{$item->id}}
                    </td>
                    <td>
                        {{$item->title}}
                    </td>
                    <td>
                        {{ date('d/m/Y', strtotime($item->created_at)) }}
                    </td>
                    <td class="text-center">
                       @if ($item->status)
                           Ativo
                       @else
                           Desativada
                       @endif
                       {{$item->user_id}}
                    </td>
                    <td>
                       
                        <a href="/noticias/edit/{{ $item->id }}" class="btn btn-info edit-btn"><ion-icon name="create-outline"></ion-icon> Editar</a> 

                        <form action="/noticias/{{ $item->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger delete-btn"><ion-icon name="tim-icons icon-trash-simple"></ion-icon> Deletar</button>
                        </form>
                    </td>
                  </tr> 
                @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
 
</div>
@endsection
