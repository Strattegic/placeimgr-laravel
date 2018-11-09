<?php

namespace Strattegic\PlaceImgr;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class PlaceImgrServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot(PlaceImgr $placeholder)
    {
        Blade::directive('placeimgr', function ($expression) use ($placeholder) {

            list($width, $height) = explode(',', $expression);

            return $placeholder -> make( intval($width), intval($height) );
        });

        $this->publishes([
            __DIR__.'/config/config.php' => config_path('placeholders.php'),
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(PlaceImgr::class, function () {
            return new PlaceImgr();
        });
        $this->app->alias(PlaceImgr::class, 'placeImgr');

        $this->mergeConfigFrom(__DIR__.'/config/config.php', 'placeholders');
        $this->mergeConfigFrom(__DIR__.'/config/services.php', 'placeholders.services');
    }
}