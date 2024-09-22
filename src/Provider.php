<?php

namespace Hybrid\GoogleReviews;

use Hybrid\Core\ServiceProvider;

/**
 * Google Reviews provider class.
 */
class Provider extends ServiceProvider {

    /**
     * Register.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('google-reviews', static fn($app) => new Reviews($app));
    }

    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/views', 'gp-reviews');

        /*
        $this->publishes([
            __DIR__.'/resources/views' => resource_path('views/vendor'),
        ]);
        $this->publishes([
            __DIR__.'/public' => public_path('vendor/gp-reviews'),
        ], 'public');
        $this->publishes([
            __DIR__.'/config/google-places-reviews.php' => config_path('google-places-reviews.php')
        ], 'google-places-reviews');
        */

        /*
        $this->loadTranslationsFrom(__DIR__.'/resources/lang', 'gp-reviews');

        $this->publishes([
            __DIR__.'/resources/lang' => resource_path('lang/vendor/gp-reviews'),
        ]);
        */
    }
}
