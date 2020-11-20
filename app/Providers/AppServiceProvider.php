<?php

namespace App\Providers;

use Illuminate\Support\Facades\Request;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        /*$segments = Request::segments();
        $uri = Request::getRequestUri();
        if (isset($segments[1]) &&strlen(config('app.uri')) && $segments[1] === config('app.uri')) {
            $newUri = "/".config('app.uri').$uri;
            \request()->server->set('REQUEST_URI',$newUri);
        }*/
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        \URL::forceRootUrl(config('app.url'));
    }
}
