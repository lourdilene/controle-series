@extends('layout')

@section('cabecalho')
Episódios
@endsection

@section('conteudo')
@include('message',['message' => $message])

    <form action="/season/{{$seasonId}}/episodes/watch" method="post">
        @csrf
        <ul class="list-group">
            @foreach($episodes as $episode)                        
                <li class="list-group-item d-flex justify-content-between align-items-center">                    
                    Episódio {{ $episode->number }}
                    <input type="checkbox"
                        name="episodes[]"
                        value="{{$episode->id}}"
                        {{$episode->watch ? 'checked' : ''}}>
                </li>

            @endforeach
        </ul>
        <button class="btn btn-primary mt-2 mb-2">Salvar</button>
    </form>
@endsection