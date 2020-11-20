<?php

use Illuminate\Support\Facades\Route;
//URL::forceScheme(env('APP_SCHEME','https'));
//URL::forceRootUrl(config('app.url'));
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

Auth::routes(['verify' =>true]);

Route::get('/',['App\Http\Controllers\FrontendController','welcome'])->name('welcome');
Route::get('/apply', 'FrontendController@showApply')->middleware('auth')->name('apply.show');
Route::post('/apply', 'FrontendController@showApply')->middleware('auth')->name('apply.submit');

Route::any('logout', "Auth\LoginController@logout")->name('logout');
Route::get('/home', 'HomeController@index')->name('home');
Route::group(["prefix" => config('savadmin.app.prefix',''),
    "as" => config('savadmin.app.prefix').".",'middleware' => ['auth','verified']],function() {
   Route::group(['as' => 'users.', 'prefix' => 'users'], function() {
       Route::get('', 'UserController@index')->name('index');
   });

   Route::get('roles',"RoleController@index")->name('roles.index');
});

/* Auto-generated admin routes */

Route::group(["prefix" => config('savadmin.app.prefix',''),
    "namespace" => "Admin",
    "as" => config('savadmin.app.prefix').".",'middleware' => ['auth','verified']],function() {
    Route::group(['as' => "roles.", 'prefix' => "roles"], function() {
        Route::get('','RoleController@index')->name('index');
        Route::get("manage-permissions", "RoleController@managePermissions")->name('manage-permissions');
    });
});


/* Auto-generated admin routes */

Route::group(["prefix" => config('savadmin.app.prefix',''),
    "namespace" => "Admin",
    "as" => config('savadmin.app.prefix').".",'middleware' => ['auth']],function() {
    Route::group(['as' => "users.", 'prefix' => "users"], function() {
        Route::get('','UserController@index')->name('index');
    });
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


/* Auto-generated admin routes */

Route::group(["prefix" => config('savadmin.app.prefix',''),
    "namespace" => "Admin",
    "as" => config('savadmin.app.prefix').".",'middleware' => ['auth','verified']],function() {
    Route::group(['as' => "articles.", 'prefix' => "articles"], function() {
        Route::get('','ArticleController@index')->name('index');
    });
});
