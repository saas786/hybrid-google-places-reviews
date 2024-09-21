<?php
/**
 * View service provider.
 */

namespace Hybrid\GoogleReviews\View;

use Hybrid\Core\ServiceProvider;
use function Hybrid\public_path;
use function Hybrid\Tools\WordPress\get_child_theme_file_path;

/**
 * View service provider.
 */
class Provider extends ServiceProvider {

    /**
     * Boot.
     */
    public function boot() {
        $this->loadViewsFrom(
            [
                get_child_theme_file_path( 'views/hybrid-google-places-reviews' ),
                get_parent_theme_file_path( 'views/hybrid-google-places-reviews' ),
                public_path( 'views' ),
            ],
            'Hybrid\GoogleReviews'
        );
    }

}
