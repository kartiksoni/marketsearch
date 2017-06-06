<?php

namespace App\Amazon\Facades;

use Illuminate\Support\Facades\Facade;

class Amazon extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'Amazon';
    }
}
