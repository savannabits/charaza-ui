<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
URL::forceScheme(env('APP_SCHEME','https'));
URL::forceRootUrl(config('app.url'));
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
$apiPrefix = env('API_VERSION','');
$apiNamespace = "Api";
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


/* Auto-generated settings api routes */
Route::group(['prefix' => $apiPrefix,'as' => 'api.', 'namespace' => $apiNamespace], function() {
    Route::group(['middleware' => ["auth:sanctum","verified"]], function() {
        Route::group(['prefix' => "settings", 'as' => 'settings.'],function() {
            Route::get("dt", "SettingController@dt")->name('dt');
        });
        Route::apiResource('settings',"SettingController")->parameters(["settings" => "setting"]);
    });
});


/* Auto-generated data-types api routes */
Route::group(['prefix' => $apiPrefix,'as' => 'api.', 'namespace' => $apiNamespace], function() {
    Route::group(['middleware' => ["auth:sanctum","verified"]], function() {
        Route::group(['prefix' => "data-types", 'as' => 'data-types.'],function() {
            Route::get("dt", "DataTypeController@dt")->name('dt');
        });
        Route::apiResource('data-types',"DataTypeController")->parameters(["data-types" => "dataType"]);
    });
});


/* Auto-generated data-types api routes */
Route::group(['prefix' => $apiPrefix,'as' => 'api.', 'namespace' => $apiNamespace], function() {
    Route::group(['middleware' => ["auth:sanctum","verified"]], function() {
        Route::group(['prefix' => "data-types", 'as' => 'data-types.'],function() {
            Route::get("dt", "DataTypeController@dt")->name('dt');
        });
        Route::apiResource('data-types',"DataTypeController")->parameters(["data-types" => "dataType"]);
    });
});
