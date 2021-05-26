<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Serie;
use App\Episode;
use App\Http\Requests\SeriesFormRequest;
use App\Services\{CreatorSerie, RemoverSerie};
use App\Season;

class SeriesController extends Controller
{
    public function index(Request $request){

        $series = Serie::orderby('name')
        ->get();

        $mensagem = $request->session()->get('mensagem');
        
        return view('series.index', compact('series', 'mensagem'));
    }   

    public function create(){
        return view('series.create');
    }

    public function store(
        SeriesFormRequest $request, 
        CreatorSerie $creatorSerie){
        
        $serie = $creatorSerie->createSerie(
            $request->nome, 
            $request->qtd_temporadas, 
            $request->ep_por_temporada);

        $request->session()
            ->flash('mensagem',
            "Série {$serie->id} e suas temporadas e episódios criadas com sucesso {$serie->nome}"
        );

        return redirect()->route('listar_series'); 
    }

    public function destroy(Request $request, RemoverSerie $removerSerie){        
        
        $nomeSerie = $removerSerie->removerSerie($request->id);

        $request->session()
            ->flash('mensagem',
            "Série $nomeSerie removida com sucesso"
        );
        return redirect()->route('listar_series');
    }

    public function editaNome($id, Request $request){
        $novoNome = $request->nome;
        $serie = Serie::find($id);
        $serie->nome = $novoNome;
        $serie->save();
    }
}

