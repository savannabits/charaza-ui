<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;
use Stancl\Tenancy\Middleware\InitializeTenancyByPath;
use Stancl\Tenancy\Middleware\InitializeTenancyByRequestData;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * The path to the "home" route for your application.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        InitializeTenancyByRequestData::$header = config('savadmin.tenancy.header_name',"X-Tenant");
        InitializeTenancyByRequestData::$queryParameter = config('savadmin.tenancy.query_parameter_name',"tenant");
        InitializeTenancyByPath::$onFail = function ($exception, $request, $next) {
            session()->flash('error', $exception->getMessage());
//            return redirect(url(''));
            throw new NotFoundHttpException($exception->getMessage(),$exception);
        };
        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();
        $this->mapWebRoutes();
        $this->mapCentralRoutes();
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware(['web',InitializeTenancyByPath::class])
            ->namespace($this->namespace)
            ->prefix("{tenant?}")
            ->group(base_path('routes/web.php'));
    }

    protected function mapCentralRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/central.php'));
    }
    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
            ->middleware(['api',InitializeTenancyByRequestData::class])
            ->namespace($this->namespace)
            ->group(base_path('routes/api.php'));
    }
}
