<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App;
class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
          App::bind('App\Repositories\UserRepositoryInterface','App\Repositories\UserRepository');
          App::bind('App\Repositories\AnimalRepositoryInterface','App\Repositories\AnimalRepository');
          App::bind('App\Repositories\DonationTypeRepositoryInterface','App\Repositories\DonationTypeRepository');
          App::bind('App\Repositories\NewsAniRepositoryInterface','App\Repositories\NewsAniRepository');
    }
}
