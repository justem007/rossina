<?php

namespace Rossina\Providers;

use Illuminate\Support\ServiceProvider;
use Rossina\Repositories\Fractal\Fractal;
use Rossina\Repositories\Interfaces\Larasponse;

class LarasponseServiceProvider extends ServiceProvider {

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('League\Fractal\Serializer\SerializerAbstract', 'League\Fractal\Serializer\ArraySerializer');
        $this->app->bind(Larasponse::class, Fractal::class);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array('larasponse');
    }

}
