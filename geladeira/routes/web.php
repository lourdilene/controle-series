<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/products', [ProductController::class, 'index'] );


Route::get('/products', function () {
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
});