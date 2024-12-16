<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// V1 routes
Route::group(['prefix' => 'v1', 'namespace' => 'App\Http\Controllers\Api\V1'], function (){

    // Protected routes
    Route::middleware('auth:sanctim')->group(function (){
        Route::post('/logout', "AuthController@logout");
    });

    // Free routes
    Route::middleware('guest')->group(function (){
        Route::post('/register', 'AuthController@register');
        Route::post('/login', 'AuthController@login');
    });

});
