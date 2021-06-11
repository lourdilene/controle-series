<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Services\RemoverSerie;
use App\Services\CreatorSerie;
use App\Serie;

class SerieRemoverTest extends TestCase
{
    use RefreshDatabase;

    private Serie $serie;

    protected function setUp(): void
    {
        parent::setUp();
        $serieCreator = new CreatorSerie();
        $this->serie = $serieCreator->createSerie('Novos testes1',2,3);   
    }

    public function testSerieRemover()
    {
        $this->assertDatabaseHas('series', ['id' => $this->serie->id]);
        
        $serieRemover = new RemoverSerie();
        $serieName = $serieRemover->removerSerie($this->serie->id);
            
        $this->assertIsString($serieName);
        $this->assertEquals('Novos testes1', $this->serie->name);
        $this->assertDatabaseMissing('series', ['id' => $this->serie->id]);
        
    }
}
