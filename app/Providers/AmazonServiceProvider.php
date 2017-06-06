<?php

namespace App\Providers;

use App\Amazon\Factory;
use Illuminate\Support\ServiceProvider;

class AmazonServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->singleton('Amazon', function() {
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
        return array('Amazon');
    }
}
