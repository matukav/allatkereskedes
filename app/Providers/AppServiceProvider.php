<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::define( "super", function( $user ) {

            return $user->admin == 2;
        });

        Gate::define( "user", function( $user ) {

            return $user->admin == 0;
        });
    }
}
