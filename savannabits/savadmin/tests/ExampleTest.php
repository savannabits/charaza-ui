<?php

namespace Savannabits\Savadmin\Tests;

use Orchestra\Testbench\TestCase;
use Savannabits\Savadmin\SavadminServiceProvider;

class ExampleTest extends TestCase
{

    protected function getPackageProviders($app)
    {
        return [SavadminServiceProvider::class];
    }
    
    /** @test */
    public function true_is_true()
    {
        $this->assertTrue(true);
    }
}
