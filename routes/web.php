<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'MovieController@index')->name('movies.index');
Route::get('/movies/{movie}', 'MovieController@show')->name('movies.show');
