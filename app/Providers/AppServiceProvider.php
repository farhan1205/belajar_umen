<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

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
            'App\Repositories\CategoryRepository\iCategoryRepository',
            'App\Repositories\CategoryRepository\CategoryRepository'
        );

        $this->app->bind(
            'App\Repositories\BookRepository\iBookRepository',
            'App\Repositories\BookRepository\BookRepository',
        );

        $this->app->bind(
            'App\Repositories\AuthRepository\iAuthRepository',
            'App\Repositories\AuthRepository\AuthRepository',
        );

        $this->app->bind(
            'App\Repositories\UserRepository\iUserRepository',
            'App\Repositories\UserRepository\UserRepository',
        );
    }
}
