<?php

namespace App\Providers;

use App\Etsy\Factory;
use Illuminate\Support\ServiceProvider;

class EtsyServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->singleton('Etsy', function() {
            return new Factory();
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        return array('Etsy');
    }
}
