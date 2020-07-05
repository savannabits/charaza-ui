<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::group(['prefix' => env('API_VERSION',''),'as' => 'api.', 'namespace' => "Api"], function() {
    Route::get('/', function () {
        return "Welcome to the API";
    });
    Route::group(['prefix' => "users", "middleware" => ['auth:sanctum'], 'as' => 'users.'],function() {
        Route::get("", "UserController@index")->name('index');
        Route::get("dt", "UserController@dt")->name('dt');
    });
});
