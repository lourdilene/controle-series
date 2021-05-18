<?php

namespace App\Services;

use App\Serie;
use Illuminate\Support\Facades\DB;
use App\Temporada;

class CriadorDeSerie
{
    public function criarSerie(string $nomeSerie, 
        int $qtdTemporadas, 
        int $epPorTemporada): Serie
    {        
        DB::beginTransaction();
            $serie = Serie::create(['nome' => $nomeSerie]);
            $this->criaTemporadas($qtdTemporadas, $epPorTemporada, $serie);
        DB::commit();        
        
        return $serie;
    }

    private function criaTemporadas(int $qtdTemporadas, int $epPorTemporada, Serie $serie): void{
        for ($i=1; $i < $qtdTemporadas; $i++) {
            $temporada = $serie->temporadas()->create(['numero' => $i]);
            $this->criaEpisodios($epPorTemporada, $temporada);           
        }
    }

    private function criaEpisodios(int $epPorTemporada, Temporada $temporada): void{
        for ($j=1; $j < $epPorTemporada; $j++) { 
            $episodio = $temporada->episodios()->create(['numero' => $j]);
        }
    }
}