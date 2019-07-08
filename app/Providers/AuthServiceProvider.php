<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\SubCategory;
use App\Policies\AdminPolicy;
use App\Policies\BlogPolicy;
use App\Policies\CarouselPolicy;
use App\Policies\CategoryPolicy;
use App\Policies\PhotographyPolicy;
use App\Policies\ProfilePolicy;
use App\Policies\ProfilesPolicy;
use App\Policies\SubCategoryPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
//    protected $policies = [
//         'App\Models' => 'App\Policies\BlogPolicy',
//         'App\Models' => 'App\Policies\BlogPolicy',
//    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::resource('blogs', BlogPolicy::class);
        Gate::define('blogs.publication_status', 'app\Policies\BlogPolicy@publication_status');
        Gate::resource('admins', AdminPolicy::class);
        Gate::resource('categories', CategoryPolicy::class);
        Gate::resource('sub_categories', SubCategoryPolicy::class);
        Gate::resource('carousels', CarouselPolicy::class);
        Gate::resource('photographies', PhotographyPolicy::class);
        Gate::resource('profile', ProfilesPolicy::class);

    }
}
