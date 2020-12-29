<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function listarSeries(Request $request){

        echo $request->query('parametro');
        exit();

        $series = ['Friends', 
        'Doutor House', 'Os pinguins de Madagascar'];

        var_dump($series);
    }   
}