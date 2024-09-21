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

}
