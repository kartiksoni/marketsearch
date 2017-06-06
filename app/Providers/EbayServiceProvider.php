<?php

namespace App\Providers;

use App\Ebay\Config;
use App\Ebay\Factory;
use Illuminate\Support\ServiceProvider;

class EbayServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->singleton('EbayConfig', function() {
            return new Config($this->app['config']);
        });


        $this->app->singleton('Ebay', function() {
            $config = \App::make('EbayConfig');
            return new Factory($config);
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        return array('Ebay');
    }
}
