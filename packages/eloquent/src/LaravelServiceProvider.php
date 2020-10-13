<?php

namespace Quiz\Eloquent;

use Illuminate\Support\ServiceProvider;
use Quiz\Eloquent\Generator\IdGenerator;
use Quiz\Common\IdGenerator as IdGeneratorInterface;

class LaravelServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            IdGeneratorInterface::class,
            IdGenerator::class
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');
    }
}
