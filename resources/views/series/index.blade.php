@extends('layout')

@section('cabecalho')
Séries
@endsection

@section('conteudo')
@if(!empty($mensagem))
<div class="alert alert-success">
    {{$mensagem}}
</div>
@endif
  

<a href="{{ route('form_criar_serie') }}" class="btn btn-dark mb-2">Adicionar Série</a>
  <ul class="list-group">
          @foreach ($series as $serie)
           <li class="list-group-item d-flex justify-content-between align-items-center">
             {{$serie->nome}}

            <span class="d-flex">
              <a href="/series/{{$serie->id}}/temporadas" class="btn btn-info btn-sm mr-1">
                <i class="fas fas-external-link-alt">Visualizar</i>
              </a>

              <form method="POST" action="/series/{{$serie->id}}"
                onsubmit="return confirm('Tem certeza que deseja excluir ?')">
                  @csrf
                  @method('DELETE')
                <button class="btn btn-danger">Excluir</button>
              </form>
            </span>
          </li>          
          @endforeach               
  </ul>
@endsection
