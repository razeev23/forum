<?php

namespace App\Providers;
use App\Channel;
use View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

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
        Schema ::defaultStringLength(191);
//it make available to all the audience
        View::share('channels',channel::all());
        
    }
}
