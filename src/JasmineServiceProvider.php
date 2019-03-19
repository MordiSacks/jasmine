<?php


namespace Jasmine;


use Illuminate\Support\ServiceProvider;

class JasmineServiceProvider extends ServiceProvider
{

    public function register()
    {
        if ($this->app->runningInConsole()) {
            $this->registerPublishable();
        }
    }

    public function boot()
    {
        $this->registerRoutes();
    }

    private function registerRoutes()
    {
        $this->loadRoutesFrom(__DIR__ . '/../inc/routes.php');
    }


    private function registerPublishable()
    {
        $this->publishes([
            __DIR__ . '/../inc/config.php' => config_path('jasmine.php'),
        ], 'config');
    }
}