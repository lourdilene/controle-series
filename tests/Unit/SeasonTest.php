<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Season;
use App\Episode;

class SeasonTest extends TestCase
{
    /** @var Season */
    private $season;

    protected function setUp(): void{

        parent::setUp();
        
        $season = new Season();
    
        $episode1 = new Episode();
        $episode1->watch=true;
        $episode2 = new Episode();
        $episode2->watch=false;
        $episode3 = new Episode();
        $episode3->watch=true;
    
        $season->episodes->add($episode1);
        $season->episodes->add($episode2);
        $season->episodes->add($episode3);

        $this->season = $season;
    }

    public function testSearchForWatchedEpisodes()
    {
        $watchEpisodes = $this->season->getWatchEpisodes();
        $this->assertCount(2,$watchEpisodes);

        foreach($watchEpisodes as $episode){
            $this->assertTrue($episode->watch);
        }
    }

    public function testSearchAllEpisodes(){
        $episodes = $this->season->episodes;

        $this->assertCount(3,$episodes);
    }
}
