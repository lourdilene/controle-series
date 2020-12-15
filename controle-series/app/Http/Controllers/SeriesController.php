<?php

namespace App\Http\Controllers;

class SeriesController extends Controller
{
    public function listarSeries(){
        $series = ['Friends', 
        'Doutor House', 'Os pinguins de Madagascar'];

        var_dump($series);
    }   
}