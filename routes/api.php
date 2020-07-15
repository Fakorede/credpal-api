<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/books', 'BookController@index');

// auth:admin
Route::middleware('auth:admin')->group(function() {    
    Route::post('/books', 'BookController@store');
});

// auth:api
Route::middleware('auth:api')->group(function() {    
    Route::post('/books/{id}/reviews', 'BookController@store');
});
