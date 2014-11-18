<?php

namespace Malarrimo\Components;

use Illuminate\Support\ServiceProvider;

class FieldServiceProvider extends ServiceProvider
{

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app['field'] = $this->app->share(function($app)
        {
            return new FieldBuilder();
        });
    }
}