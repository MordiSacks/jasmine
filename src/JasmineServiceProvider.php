<?php


namespace Jasmine;


use Illuminate\Support\Arr;
use Illuminate\Support\ServiceProvider;
use Jasmine\Console\Commands\Migrate;

class JasmineServiceProvider extends ServiceProvider
{

    public function register()
    {
        if ($this->app->runningInConsole()) {
            $this->registerPublishable();
            $this->registerConsoleCommands();
        }
    }

    public function boot()
    {
        $this->mergeConfigFrom(__DIR__ . '/../inc/config/auth.php', 'auth');

        $this->registerRoutes();

        $this->loadViewsFrom(__DIR__ . '/../inc/resources/views', 'jasmine');
    }

    private function registerRoutes()
    {
        $this->loadRoutesFrom(__DIR__ . '/../inc/routes.php');
    }

    private function registerPublishable()
    {
        $this->publishes([
            __DIR__ . '/../inc/config/jasmine.php' => config_path('jasmine.php'),
        ], 'config');
    }

    private function registerConsoleCommands()
    {
        $this->commands(Migrate::class);
    }


    /**
     * Merge the given configuration with the existing configuration.
     *
     * @param  string $path
     * @param  string $key
     *
     * @return void
     */
    protected function mergeConfigFrom($path, $key)
    {
        $config = $this->app['config']->get($key, []);
        $this->app['config']->set($key, $this->mergeConfig(require $path, $config));
    }

    /**
     * Merges the configs together and takes multi-dimensional arrays into account.
     *
     * @param  array $original
     * @param  array $merging
     *
     * @return array
     */
    protected function mergeConfig(array $original, array $merging)
    {
        $array = array_merge($original, $merging);
        foreach ($original as $key => $value) {
            if (!is_array($value)) {
                continue;
            }
            if (!Arr::exists($merging, $key)) {
                continue;
            }
            if (is_numeric($key)) {
                continue;
            }
            $array[$key] = $this->mergeConfig($value, $merging[$key]);
        }
        return $array;
    }
}