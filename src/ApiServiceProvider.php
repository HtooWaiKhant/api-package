<?php

namespace Hola\Api;

use Illuminate\Support\ServiceProvider;

/**
 * Created by Hola.
 * User: hola
 * Date: 12/03/2019
 * Time: 11:29 PM
 */
class ApiServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/routes.php');
    }
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {

    }
}