<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::group(["prefix" => config('savadmin.app.prefix',''),
    "as" => config('savadmin.app.prefix').".",'middleware' => 'auth'],function() {
   Route::group(['as' => 'users.', 'prefix' => 'users'], function() {
       Route::get('', 'UserController@index')->name('index');
   });

   Route::get('roles',"RoleController@index")->name('roles.index');
});

/* Auto-generated admin routes */

Route::group(["prefix" => config('savadmin.app.prefix',''),
    "namespace" => "Admin",
    "as" => config('savadmin.app.prefix').".",'middleware' => 'auth'],function() {
    Route::group(['as' => "products.", 'prefix' => "products"], function() {
        Route::get('','ProductController@index')->name('index');
    });
});

/* Auto-generated admin routes */

Route::group(["prefix" => config('savadmin.app.prefix',''),
    "namespace" => "Admin",
    "as" => config('savadmin.app.prefix').".",'middleware' => 'auth'],function() {
    Route::group(['as' => "product-types.", 'prefix' => "product-types"], function() {
        Route::get('','ProductTypeController@index')->name('index');
    });
});


/* Auto-generated admin routes */

Route::group(["prefix" => config('savadmin.app.prefix',''),
    "namespace" => "Admin",
    "as" => config('savadmin.app.prefix').".",'middleware' => 'auth'],function() {
    Route::group(['as' => "loans.", 'prefix' => "loans"], function() {
        Route::get('','LoanController@index')->name('index');
    });
});
