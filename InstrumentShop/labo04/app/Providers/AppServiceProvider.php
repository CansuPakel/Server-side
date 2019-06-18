<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Validator;
use View;
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
     *https://stackoverflow.com/questions/36777840/how-to-validate-phone-number-in-laravel-5-2
     * @return void
     */
    public function boot()
    {
		View::composer('*', function($view)
		{
			$view->with('categories', Category::all());
		});

	}
}
