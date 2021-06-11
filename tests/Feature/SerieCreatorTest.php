<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Services\CreatorSerie;
use App\Serie;

class SerieCreatorTest extends TestCase
{
    public function testCreateSerie()
    {        
        $serieName = 'Nome de teste';
        $serieCreator = new CreatorSerie();
        $serieCreated = $serieCreator->createSerie($serieName,1,1);

        $this->assertInstanceOf(Serie::class,$serieCreated);
        $this->assertDatabaseHas('series',['name' => $serieName]);
        $this->assertDatabaseHas('seasons',['number' => 1]);
        $this->assertDatabaseHas('episodes',['number' => 1]);
    }
}
