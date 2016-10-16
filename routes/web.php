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
Auth::routes();
Route::get('/','HomeController@show')->name('home');
Route::get('/admin', 'AdminController@show')->name('admin');
Route::post('/games', 'AdminController@addGame')->name('addGame');
Route::get('/games/{id}', 'GameController@show')->name('game');
Route::post('/seasons', 'AdminController@addSeason')->name('addSeason');

