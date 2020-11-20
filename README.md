
## About Charaza UI
Charaza UI is a Laravel Starter that is integrated with savannabits/savadmin Admin Generator to enable you kickstart and rapidly develop your next laravel project.
Equipped with the latest laravel tools, Charaza UI doesn't leave much of the boilerplate work to you. The auth module is scaffolded for you. The templates are setup for you.
The routing is already set up for you. All you have to do is just start writing your modules' code. What is even better: you don't have to go through much trouble to generate fully operational modules 
including Models, API controllers, Datatable Controllers, API and backend routes, views for editing and showing, code for deleting... The savadmin generator does all this for you with a single command:
```shell script
php artisan sv:generate table_name
```
![Screenshot](https://github.com/savannabits/charaza-ui/blob/master/storage/screenshots/Screenshot_20201120_092151.png?raw=false)
![Screenshot](https://github.com/savannabits/charaza-ui/blob/master/storage/screenshots/Screenshot_20201120_092249.png?raw=false)
![Screenshot](https://github.com/savannabits/charaza-ui/blob/master/storage/screenshots/Screenshot_20201120_091437.png?raw=false)
## Features
- Code Generation with savannabits/savadmin
- Laravel 8 Scaffold
- Laravel Jetstream Frontend
- Livewire 2 Scaffold
- Laravel Fortify User Management
- Alpine.js working with Livewire to give you a true SPA experience with just Laravel blade!
- Backend and API Generation with Laravel and Vue.js (using BootstrapVue)
- Profile and Info and Update
- API Keys using Jetstream and Laravel Sanctum
- Optional DB cacheing
- Fuzzy Search using Laravel TNTSearch
## Installation
Charaza UI is meant for easing your work when beginning new projects. To start an all powered-up new project, simply create it from charaza as follows:
```
composer create-project savannabits/charaza-ui my-project
```
## Usage
The package comes with an optional docker configuration. It is highly recommended to use this to experience the full power with minimal configuration.
After setting your .env variables, run the following to build and spin-up the docker containers:
```shell script
docker-compose build app
docker-compose up -d
```
This will boot up the app server exposed under the port you configured in the env. To enter the container's shell, there is a simple shell script included to enable this:
```shell script
bash app-exec [yoru command]
bash app-exec bash
```

However, if you don't wish to use docker, no worry! All you have to do is configure database variables as you see fit, then proceed to the next step

Next, proceed with the normal laravel setup steps:
```
composer install
yarn install
php artisan key:generate
php artisan migrate
php artisan optimize:clear
yarn back-dev (or back-prod)
yarn css-prod (or css-prod)
yarn dev (or prod or watch)
```
There you go! Your system is now setup and you are ready to create your next amazing app!

### Code Generator:
Using the code generator to generate your commands is easy:
1. Create your migration file and edit it accordingly
2. Run the Migration
3. Use the generator to generate the model, controllers, routes, Menus, views and js assets.
4. Modify any of them as you wish (customize)
5. If you are not running `yarn back-watch`, then run `yarn back-dev` to rebuild the assets

### Example:
Let us generate an `Articles` module from the `articles` table
1. Create the `articles` table
```shell script
bash app-exec bash #(If you are using docker)
php artisan make:migration create_articles_table
```
2. Edit the articles migration as you wish:
```php
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description');
            $table->text('body');
            $table->foreignId('author_id')->constrained('users')->restrictOnDelete();
            $table->timestamps();
        });
    }
```
3. Run the migration
```shell script
bash app-exec 'php artisan migrate' #(For docker users)
php artisan migrate #(Non-docker users)
```
4. Use the generator to generate the model, controller, routes, menus, views and assets
```shell script
bash app-exec bash #Enter the container's bash - for Docker users
php artisan sv:generate articles # The code generator
```
__NB__ If you already generated the files but would like to force overwrite use ```--force``,
   ```shell script
    php artisan sv:generate articles --force
   ```
Output:
![Articles](https://github.com/savannabits/charaza-ui/blob/master/storage/screenshots/Screenshot_20201120_091437.png?raw=false)
![Articles](https://github.com/savannabits/charaza-ui/blob/master/storage/screenshots/Screenshot_20201120_092032.png?raw=false)
![Articles](https://github.com/savannabits/charaza-ui/blob/master/storage/screenshots/Screenshot_20201120_092101.png?raw=false)
### Generated files

__app/Models/Article.php__
```php
<?php

namespace App\Models;
/* Imports */
use DateTimeInterface;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use Rennokki\QueryCache\Traits\QueryCacheable;

class Article extends Model
{
use Searchable;
        use QueryCacheable;
    public $cacheFor=60*60*24; //cache for 1 day
    protected static $flushCacheOnUpdate=true; //invalidate the cache when the database is changed
protected $fillable = [
        'title',
        'description',
        'body',
        'author_id',
    
    ];
    
protected $searchable = [
            'id',
            'title',
            'description',
            'body',
            'author_id',
    
    ];
    
    
    
    protected $dates = [
            'created_at',
        'updated_at',
    ];

    protected $appends = ["api_route"];

    public function toSearchableArray() {
        return collect($this->only($this->searchable))->merge([
            // Add more keys here
        ])->toArray();
    }
    
    /* ************************ ACCESSOR ************************* */

    public function getApiRouteAttribute() {
        return route("api.articles.index");
    }
    protected function serializeDate(DateTimeInterface $date) {
        return $date->format('Y-m-d H:i:s');
    }

    /* ************************ RELATIONS ************************ */
    /**
    * Many to One Relationship to \App\Models\User::class
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function author() {
        return $this->belongsTo(\App\Models\User::class,"author_id","id");
    }
}
```
__app/Http/Controllers/Api/ArticleController.php__
```php
<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Article\IndexArticle;
use App\Http\Requests\Api\Article\StoreArticle;
use App\Http\Requests\Api\Article\UpdateArticle;
use App\Models\Article;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Savannabits\Savadmin\Helpers\ApiResponse;
use Savannabits\Savadmin\Helpers\SavbitsHelper;
use Yajra\DataTables\Facades\DataTables;

class ArticleController  extends Controller
{
    private $api, $helper;
    public function __construct(ApiResponse $apiResponse, SavbitsHelper $helper)
    {
        $this->api = $apiResponse;
        $this->helper = $helper;
    }

    /**
     * Display a listing of the resource (paginated).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(IndexArticle $request)
    {
        $data = $this->helper::listing(Article::class, $request)->customQuery(function ($builder) use($request) {
        /**@var  Article|Builder $builder*/
        // Add custom queries here
        })->process();
        return $this->api->success()->message("List of Articles")->payload($data)->send();
    }

    public function dt(Request $request) {
        return DataTables::of(Article::query())
            ->addColumn("actions",function($model) {
                $actions = '';
                if (\Auth::user()->can('articles.show')) $actions .= '<button class="btn btn-outline-primary btn-square action-button mr-2" title="View Details" data-action="show-article" data-tag="button" data-id="'.$model->id.'"><i class="mdi mdi-eye"></i></button>';
                if (\Auth::user()->can('articles.edit')) $actions .= '<button class="btn btn-outline-warning btn-square action-button mr-2" title="Edit Item" data-action="edit-article" data-tag="button" data-id="'.$model->id.'"><i class="mdi mdi-pencil"></i></button>';
                if (\Auth::user()->can('articles.delete')) $actions .= '<button class="btn btn-outline-danger btn-square action-button mr-2" title="Delete Item" data-action="delete-article" data-tag="button" data-id="'.$model->id.'"><i class="mdi mdi-delete"></i></button>';
                return $actions;
            })
            ->rawColumns(['actions'])
            ->make();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreArticle $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreArticle $request)
    {
        try {
            $array = $request->sanitizedArray();
            $article = new Article($array);
            
            // Save Relationships
            $object = $request->sanitizedObject();
            if (isset($object->author)) {
                $article->author()
                    ->associate($object->author->id);
            }
                        

            $article->saveOrFail();
            return $this->api->success()->message('Article Created')->payload($article)->send();
        } catch (\Throwable $exception) {
            \Log::error($exception);
            return $this->api->failed()->message($exception->getMessage())->payload([])->code(500)->send();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @param Article $article
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Request $request, Article $article)
    {
        try {
            //Fetch relationships
            $article->load([
            'author',
        ]);
            return $this->api->success()->message("Article $article->id")->payload($article)->send();
        } catch (\Throwable $exception) {
            return $this->api->failed()->message($exception->getMessage())->send();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateArticle $request
     * @param {$modelBaseName} $article
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateArticle $request, Article $article)
    {
        try {
            $data = $request->sanitizedArray();
            $article->update($data);
            
            // Save Relationships
                $object = $request->sanitizedObject();
            if (isset($object->author)) {
                $article->author()
                    ->associate($object->author->id);
            }
                        

            $article->saveOrFail();
            return $this->api->success()->message("Article has been updated")->payload($article)->code(200)->send();
        } catch (\Throwable $exception) {
            \Log::error($exception);
            return $this->api->failed()->code(400)->message($exception->getMessage())->send();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Article $article
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return $this->api->success()->message("Article has been deleted")->payload($article)->code(200)->send();
    }

}
```
__Appended Routes:__
api.php
```php
    /* Auto-generated articles api routes */
    Route::group(['prefix' => $apiPrefix,'as' => 'api.', 'namespace' => $apiNamespace], function() {
        Route::group(['middleware' => ["auth:sanctum","verified"]], function() {
            Route::group(['prefix' => "articles", 'as' => 'articles.'],function() {
                Route::get("dt", "ArticleController@dt")->name('dt');
            });
            Route::apiResource('articles',"ArticleController")->parameters(["articles" => "article"]);
        });
    });
```

web.php
```php
    /* Auto-generated admin routes */
    
    Route::group(["prefix" => config('savadmin.app.prefix',''),
        "namespace" => "Admin",
        "as" => config('savadmin.app.prefix').".",'middleware' => ['auth','verified']],function() {
        Route::group(['as' => "articles.", 'prefix' => "articles"], function() {
            Route::get('','ArticleController@index')->name('index');
        });
    });
```

__You can check the rest of the files as follows:__

- app/Http/Controllers/Admin/ArticleController.php
- resources/js/backend/articles.js
- resources/views/backend/articles/*

## Contributing

Thank you for considering contributing to the CharazaUI! Please email Savannabits <savannabits@gmail.com> for more info.

## Code of Conduct

In order to ensure that the Charaza community is welcoming to all, please review and abide by the [Code of Conduct](https://savannabits.com).

## Security Vulnerabilities

If you discover a security vulnerability within Charaza, please send an e-mail to Sam Maosa via [maosa.sam@gmail.com](mailto:maosa.sam@gmail.com). All security vulnerabilities will be promptly addressed.

## License

The Charaza UI Starter is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
