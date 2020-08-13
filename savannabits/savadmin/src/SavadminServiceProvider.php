<?php

namespace Savannabits\Savadmin;

use Illuminate\Support\ServiceProvider;

class SavadminServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        $this->commands([
            Savadmin::class,
            Generators\Model::class,
            Generators\ApiController::class,
            Generators\Controller::class,
            Generators\ViewIndex::class,
            Generators\ViewForm::class,
            Generators\ViewFullForm::class,
            Generators\ModelFactory::class,
            Generators\Routes::class,
            Generators\ApiRoutes::class,
            Generators\IndexRequest::class,
            Generators\StoreRequest::class,
            Generators\UpdateRequest::class,
            Generators\DestroyRequest::class,
            Generators\ImpersonalLoginRequest::class,
            Generators\BulkDestroyRequest::class,
            Generators\Lang::class,
            Generators\Permissions::class,
            Generators\Export::class,
        ]);

        /*
         * Optional methods to load your package assets
         */
//         $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'savadmin');
         $this->loadViewsFrom(__DIR__.'/../resources/views', 'sv');
//         $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
//         $this->loadRoutesFrom(__DIR__.'/routes.php');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/config.php' => config_path('savadmin.php'),
                __DIR__ . '/../config/scout.php' => config_path('scout.php'),
            ], 'config');

            // Publishing the views.
            /*$this->publishes([
                __DIR__.'/../resources/views' => resource_path('views/vendor/savadmin'),
            ], 'views');*/

            // Publishing assets.
            /*$this->publishes([
                __DIR__.'/../resources/assets' => public_path('vendor/savadmin'),
            ], 'assets');*/

            // Publishing the translation files.
            /*$this->publishes([
                __DIR__.'/../resources/lang' => resource_path('lang/vendor/savadmin'),
            ], 'lang');*/

            // Registering package commands.
            // $this->commands([]);
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__ . '/../config/config.php', 'savadmin');

        // Register the main class to use with the facade
        $this->app->singleton('savadmin', function () {
            return new Savadmin;
        });
    }
}
