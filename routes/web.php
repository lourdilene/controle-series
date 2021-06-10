<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/series', 'SeriesController@index')
    ->name('listar_series');

Route::get('/series/criar', 'SeriesController@create')
    ->name('form_criar_serie')
    ->middleware('auth');

Route::post('/series/criar', 'SeriesController@store')
    ->middleware('auth');

Route::delete('/series/{id}', 'SeriesController@destroy')
    ->middleware('auth');

Route::get('series/{serieId}/seasons','SeasonsController@index');

Route::post('series/{id}/editaNome','SeriesController@editaNome')
    ->middleware('auth');

Route::get('/seasons/{season}/episodes', 'EpisodesController@index');

Route::post('/season/{season}/episodes/watch', 'EpisodesController@watch')
    ->middleware('auth');

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/sair', function(){
    Auth::logout();
    return redirect('/login');
});
