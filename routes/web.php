<?php

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
    return redirect('games');
});

Route::get('/players', 'PlayersController@home');
Route::get('/sponsors', 'SponsorsController@home');
Route::get('/games', 'GamesController@home');
Route::get('/performances', 'PerformancesController@home');
