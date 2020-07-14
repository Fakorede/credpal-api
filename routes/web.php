<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('{any}', 'AppController@index')
    ->where('any', '.*')
    ->middleware('auth')
    ->name('home');
