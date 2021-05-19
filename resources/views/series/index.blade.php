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
             
            <span id="nome-serie-{{ $serie->id }}">{{ $serie->nome }}</span>

            <div class="input-group w-50" hidden id="input-nome-serie-{{ $serie->id }}">
                <input type="text" class="form-control" value="{{ $serie->nome }}">
                <div class="input-group-append">
                    <button class="btn btn-primary" onclick="editarSerie({{ $serie->id }})">
                        <i class="fas fa-check"></i>
                    </button>
                    @csrf
                </div>
            </div>

            <span class="d-flex">
              <button class="btn btn-info btn-sm" onclick="toggleInput({{$serie->id}})">
                <i class="fas fa-edit">Editar</i>
              </button>
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
  <script>
    function toggleInput(serieId){            
      const nomeSerieEl = document.getElementById(`nome-serie-${serieId}`);
      const inputSerieEl = document.getElementById(`input-nome-serie-${serieId}`);
      if (nomeSerieEl.hasAttribute('hidden')){
        nomeSerieEl.removeAttribute('hidden');
        inputSerieEl.hidden = true;
      }else{

        inputSerieEl.removeAttribute('hidden');
        nomeSerieEl.hidden = true;
      }
    }
  </script>
@endsection
