<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'MovieController@index')->name('movies.index');
Route::get('/movies/{movie}', 'MovieController@show')->name('movies.show');

Route::get('/actors', 'ActorsController@index')->name('actors.index');
Route::get('/movies/{actor}', 'ActorsController@show')->name('actors.show');
