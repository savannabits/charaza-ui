<?php


namespace App\Bootstrappers;


use Stancl\Tenancy\Contracts\TenancyBootstrapper;
use Stancl\Tenancy\Contracts\Tenant;

class SessionBootstrapper implements TenancyBootstrapper
{

    public function bootstrap(Tenant $tenant)
    {
        \Session::flush();
        \Config::set('session.driver', "database");
        \Config::set('session.connection', "tenant");
    }

    public function revert()
    {
        \Session::flush();
        \Config::set('session.driver', "file");
    }
}
