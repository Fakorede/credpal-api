<?php

use Illuminate\Support\Facades\Route;

Route::get('/books', 'BookController@index');

// auth:admin
Route::middleware('auth:admin')->group(function () {
    Route::post('/books', 'BookController@store');
});

// auth:api
Route::middleware('auth:api')->group(function () {
    Route::post('/books/{id}/reviews', 'ReviewController@store');
});

// user register
Route::post('/register','Api\Auth\RegisterController');

// user login
Route::post('/login', 'Api\Auth\LoginController@login');

// user logout - requires access token from login request
Route::delete('/logout', 'Api\Auth\LoginController@logout')->middleware('auth:api');

// get auth user
Route::get("auth-user", "AuthUserController@show");
