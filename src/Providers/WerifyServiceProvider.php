<?php

namespace Werify\Laravel\Providers;

use Illuminate\Support\ServiceProvider;

class WerifyServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/../Routes/api.php');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../Config/config.php' => config_path('werify.php'),
            ], 'config');
        }
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../Config/config.php', 'werify');
    }
}
