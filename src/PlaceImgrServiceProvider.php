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

        Blade::directive('placeimgr_url', function ($expression) use ($placeholder) {

            list($width, $height) = explode(',', $expression);

            return $placeholder -> url( intval($width), intval($height) );
        });

        $this->publishes([
            __DIR__.'/config/public.php' => config_path('placeimgr.php'),
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
            return new PlaceImgr(new ImageCache());
        });

        $this->app->alias(PlaceImgr::class, 'placeImgr');

        // merge configs
        $this->mergeConfigFrom(__DIR__.'/config/public.php', 'placeimgr');
        $this->mergeConfigFrom(__DIR__.'/config/core.php', 'placeimgr.core');
        $this->mergeConfigFrom(__DIR__.'/config/services.php', 'placeimgr.services');
    }
}