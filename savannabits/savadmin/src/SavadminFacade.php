<?php

namespace Savannabits\Savadmin;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Savannabits\Savadmin\Skeleton\SkeletonClass
 */
class SavadminFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'savadmin';
    }
}
