<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function index(Request $request){

        $series = ['Friends', 
        'Doutor House', 'Os pinguins de Madagascar'];

        var_dump($series);
    }   
}