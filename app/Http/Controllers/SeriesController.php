<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function index(Request $request){

        $series = ['Friends', 
        'Doutor House', 'Os pinguins de Madagascar','De férias com o Ex'];
        
        return view('series.index', compact('series'));
    }   

    public function create(){
        return view('series.create');
    }
}

