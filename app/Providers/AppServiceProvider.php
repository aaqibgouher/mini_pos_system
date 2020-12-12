<?php

namespace App\Providers;

use App\Utils\Auth;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        view()->composer('*', function($view) {
            $view->with('token', Auth::token());  
            $view->with("user_id", Auth::id());
            $view->with("user", Auth::user());
            $view->with("is_login", Auth::token() ? true : false);
        }); 
    }
}
