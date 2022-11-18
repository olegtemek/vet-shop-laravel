<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Contracts\View\View;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*', function ($view) {
            $global_data = [];
            $global_data['categories'] = Category::with('child')->with('parent')->get();




            $view->with('global_data', $global_data);
        });
    }
}
