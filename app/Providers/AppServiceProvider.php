<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Schema;
use App\Models\Category;
use App\Models\SubCategory;
use View;

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


    public function boot()
    {
        Schema::defaultStringLength(190);
        view::share('categories', category::where('publication_status', 1)->get());
        view::share('sub_categories', SubCategory::where('publication_status', 1)->get());
    }
}
