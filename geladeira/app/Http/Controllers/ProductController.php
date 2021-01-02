<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index() {
        $data = [
            [
                'name' => 'Manteiga',
                'shelf_time' => now()
            ],
            [
                'name' => 'Alface cor-de-rosa',
                'shelf_time' => now()
            ],
            [
                'name' => 'Iogurte desnatado',
                'shelf_time' => now()
            ]
        ];

        return view('product', [
            'products' => $data
        ]);
    }
}
