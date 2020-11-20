<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
//URL::forceScheme(env('APP_SCHEME','https'));
//URL::forceRootUrl(config('app.url'));
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
$apiPrefix = config('api.prefix');
$apiNamespace = config('api.namespace',"Api");
Route::get('/', function () {
    return "Welcome to the API";
});


/* Auto-generated roles api routes */
Route::group(['prefix' => $apiPrefix,'as' => 'api.', 'namespace' => $apiNamespace], function() {
    Route::group(['middleware' => ["auth:sanctum","verified"]], function() {
        Route::group(['prefix' => "roles", 'as' => 'roles.'],function() {
            Route::get("dt", "RoleController@dt")->name('dt');
            Route::post("{role}/toggle-permission", "RoleController@togglePermission")->name('toggle-permission');
        });
        Route::apiResource('roles',"RoleController")->parameters(["roles" => "role"]);
    });
});


/* Auto-generated users api routes */
Route::group(['prefix' => $apiPrefix,'as' => 'api.', 'namespace' => $apiNamespace], function() {
    Route::group(['middleware' =>["auth:sanctum","verified"]], function() {
        Route::group(['prefix' => "users", 'as' => 'users.'],function() {
            Route::get("dt", "UserController@dt")->name('dt');
        });
        Route::apiResource('users',"UserController")->parameters(["users" => "user"]);
    });
});


/* Auto-generated articles api routes */
Route::group(['prefix' => $apiPrefix,'as' => 'api.', 'namespace' => $apiNamespace], function() {
    Route::group(['middleware' => ["auth:sanctum","verified"]], function() {
        Route::group(['prefix' => "articles", 'as' => 'articles.'],function() {
            Route::get("dt", "ArticleController@dt")->name('dt');
        });
        Route::apiResource('articles',"ArticleController")->parameters(["articles" => "article"]);
    });
});
