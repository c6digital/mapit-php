<?php

namespace C6Digital\MapIt\Laravel;

use C6Digital\MapIt\MapIt;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\ServiceProvider;

class MapItServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/mapit.php',
            'mapit'
        );

        $this->app->singleton(MapIt::class, static function (Application $app): MapIt {
            return new MapIt(
                key: $app['config']->get('mapit.key'),
                url: $app['config']->get('mapit.url'),
            );
        });
    }

    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/mapit.php' => config_path('mapit.php'),
        ]);
    }
}
