<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;

use App\Providers\MyUserProvider;
use Illuminate\Support\ServiceProvider;

class MyAuthProvider extends ServiceProvider {

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        Auth::provider('my', function($app, array $config) {
       // Return an instance of             Illuminate\Contracts\Auth\UserProvider...
        return new MyUserProvider($app['my.connection']);
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
