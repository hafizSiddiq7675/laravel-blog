<?php

namespace Laravel\Blog;

use Illuminate\Support\ServiceProvider;

class BlogServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

        

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */



    public function boot()
    {

        include __DIR__.'/routes.php';
        $this->loadMigrationsFrom(__DIR__ . '/Migrations');

        $this->loadViewsFrom(__DIR__.'/views', 'blog');

        $this->publishes([
            __DIR__.'/public' => public_path('blog'),
          ], 'assets');


        //   $this->loadSeeders(__DIR__ . '/Seeders');

        //   $this->publishes([
        //     __DIR__ . '/Seeders' => database_path('seeders'),
        // ], 'seeds');
    }
}
