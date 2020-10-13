<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Quiz\Domain\Repository\QuizRepository as QuizRepositoryInterface;
use Quiz\Eloquent\Repository\QuizRepository;
use Illuminate\Support\Facades\Route;
use Quiz\Common\Id;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            QuizRepositoryInterface::class,
            QuizRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Route::bind('Id', function ($value) {
            return Id::create($value);
        });
    }
}
