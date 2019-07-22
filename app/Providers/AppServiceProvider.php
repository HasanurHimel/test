<?php

namespace App\Providers;

use App\Models\AdminRole;
use App\Models\Role;
use function foo\func;
use Illuminate\Support\ServiceProvider;
use Schema;
use App\Models\Category;
use App\Models\SubCategory;
use View;
use Cache;

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
        view::share('categories', cache()->get('categories', function (){ Category::with('subCategories')->where('publication_status', 1)->orderBy('id', 'DESC')->take(6)->get(); }));
    }
}
