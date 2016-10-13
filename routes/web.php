<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin', 'AdminController@show')->name('admin');
Route::post('/game', 'AdminController@addGame')->name('addGame');
Route::get('/game/{id}', 'GameController@show')->name('game');
Route::post('/season', 'AdminController@addSeason')->name('addSeason');