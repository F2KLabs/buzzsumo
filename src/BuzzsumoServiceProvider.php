<?php

namespace F2klabs\Buzzsumo;

use Illuminate\Support\ServiceProvider;

class BuzzsumoServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes(array(__DIR__.'/../config/config.php'=> config_path('buzzsumo.php')));

        if(isset($_ENV['f2k.workbench']))
            require __DIR__ . '/../vendor/autoload.php';
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
