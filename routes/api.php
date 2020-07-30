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
$apiPrefix = env('API_VERSION','');
$apiNamespace = "Api";
Route::get('/', function () {
    return "Welcome to the API";
});

Route::group(['prefix' => $apiPrefix, 'as' => 'api.', 'namespace' => $apiNamespace], function() {
    Route::group(['middleware' => "auth:sanctum"], function() {
        Route::group(['prefix' => "users", 'as' => 'users.'],function() {
            Route::get("dt", "UserController@dt")->name('dt');
        });
        Route::apiResource('users',"UserController")->parameters(["users" => "user"]);
    });
});

Route::group(['prefix' => $apiPrefix,'as' => 'api.', 'namespace' => $apiNamespace], function() {
    Route::group(['middleware' => "auth:sanctum"], function() {
        Route::group(['prefix' => "roles", 'as' => 'roles.'],function() {
            Route::get("dt", "RoleController@dt")->name('dt');
        });
        Route::apiResource('roles',"RoleController")->parameters(["roles" => "role"]);
    });
});


/* Auto-generated product-types api routes */
Route::group(['prefix' => $apiPrefix,'as' => 'api.', 'namespace' => $apiNamespace], function() {
    Route::group(['middleware' => "auth:sanctum"], function() {
        Route::group(['prefix' => "product-types", 'as' => 'product-types.'],function() {
            Route::get("dt", "ProductTypeController@dt")->name('dt');
        });
        Route::apiResource('product-types',"ProductTypeController")->parameters(["product-types" => "productType"]);
    });
});


/* Auto-generated products api routes */
Route::group(['prefix' => $apiPrefix,'as' => 'api.', 'namespace' => $apiNamespace], function() {
    Route::group(['middleware' => "auth:sanctum"], function() {
        Route::group(['prefix' => "products", 'as' => 'products.'],function() {
            Route::get("dt", "ProductController@dt")->name('dt');
        });
        Route::apiResource('products',"ProductController")->parameters(["products" => "product"]);
    });
});


/* Auto-generated loans api routes */
Route::group(['prefix' => $apiPrefix,'as' => 'api.', 'namespace' => $apiNamespace], function() {
    Route::group(['middleware' => "auth:sanctum"], function() {
        Route::group(['prefix' => "loans", 'as' => 'loans.'],function() {
            Route::get("dt", "LoanController@dt")->name('dt');
        });
        Route::apiResource('loans',"LoanController")->parameters(["loans" => "loan"]);
    });
});
