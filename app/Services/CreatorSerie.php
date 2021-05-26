<?php

namespace App\Services;

use App\Serie;
use Illuminate\Support\Facades\DB;
use App\Season;

class CreatorSerie
{
    public function createSerie(string $nameSerie, 
        int $qtdSeasons, 
        int $epBySeason): Serie
    {        
        DB::beginTransaction();
            $serie = Serie::create(['name' => $nameSerie]);
            $this->createSeasons($qtdSeasons, $epBySeason, $serie);
        DB::commit();        
        
        return $serie;
    }

    private function createSeasons(int $qtdSeasons, int $epBySeason, Serie $serie): void{
        for ($i=1; $i < $qtdSeasons; $i++) {
            $season = $serie->seasons()->create(['number' => $i]);
            $this->createEpisodes($epBySeason, $season);           
        }
    }

    private function createEpisodes(int $epBySeason, Season $season): void{
        for ($j=1; $j < $epBySeason; $j++) { 
            $episode = $season->episodes()->create(['number' => $j]);
        }
    }
}