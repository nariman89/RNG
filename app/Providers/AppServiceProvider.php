<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Category;

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
		Schema::defaultStringLength(191);

		view()->composer('layouts.app', function($view){
            $view->with('items', Category::all());

            ///vi skrive den här istället än controller därför den categories finns i base page för att släppa skicka data varjegång show app skicka data från columns categories till variable items
        });
    }
}
