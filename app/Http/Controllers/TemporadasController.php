<?php

namespace App\Http\Controllers;
use App\Serie;

use Illuminate\Http\Request;
use PhpParser\Node\Expr\BinaryOp\Concat;

class TemporadasController extends Controller
{
    public function index(int $serieId){
        $serie = Serie::find($serieId);

        $temporadas = $serie->temporadas;

        return view('temporadas.index',
            compact('serie', 'temporadas'));
    }
}
