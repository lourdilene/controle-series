@extends('layout')
@extends('layouts.app')

@section('cabecalho')
Temporadas de {{$serie->name}}
@endsection

@section('conteudo')
<ul class="list-group">
    @foreach ($seasons as $season)
     <li class="list-group-item d-flex justify-content-between align-items-center">
         <a href="/seasons/{{ $season->id }}/episodes">
             Temporada {{$season->number}}    
         </a>
         <span class="badge badge-secondary">
             {{$season->getWatchEpisodes()->count()}} /{{$season->episodes->count()}}
         </span>
    </li>
    @endforeach
</ul>
@endsection