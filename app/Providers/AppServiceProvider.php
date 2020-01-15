<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Queue;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Schema::defaultStringLength(191);
        
        //force http request to https
        /*
        if (app()->environment('remote')) {
            URL::forceSchema('https');
        }
        */
        /*
        if (\App::environment('remote')) {
            URL::forceSchema('https');
        }
        */
        /*
        if (!\App::environment('local')) {
            URL::forceSchema('https');
        }
        */
    }
}
