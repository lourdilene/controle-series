<?php

namespace App\Http\Controllers;
use App\Season;

use Illuminate\Http\Request;
use App\Episode;

class EpisodesController extends Controller
{
    public function index(Season $season, Request $request){

        return view('episodes.index', 
                    ['episodes' => $season->episodes,
                    'seasonId' => $season->id,
                    'message' => $request->session()->get('message')]);
    }

    public function watch(Season $season, Request $request)
    {
        $watchEpisodes = $request->episodes;   

        $season->episodes->each(function (Episode $episode)
            use ($watchEpisodes)
            {
                $episode->watch = in_array(
                    $episode->id,
                    $watchEpisodes
                );
            });

        $season->push();

        $request->session()->flash('message','Episódios marcados como assistidos');
        
        return redirect()->back();
    }
}
