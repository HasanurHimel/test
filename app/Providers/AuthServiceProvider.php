<?php

namespace App\Providers;

use App\Models\Admin;
use App\Models\Category;
use App\Models\SubCategory;
use App\Policies\AdminPolicy;
use App\Policies\AdvertisePolicy;
use App\Policies\BlogPolicy;
use App\Policies\BlogSectionPolicy;
use App\Policies\CarouselPolicy;
use App\Policies\CategoryPolicy;
use App\Policies\NoticePolicy;
use App\Policies\PhotographyPolicy;
use App\Policies\ProfilePolicy;
use App\Policies\SeoPolicy;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;
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

        Gate::before(function (Admin $user, $ability) {
            if ($user->isSuperAdmin('Super-admin')){
                return true;
            }

        });



        Gate::resource('blogs', BlogPolicy::class);
        Gate::define('blogs.status', 'app\Policies\BlogPolicy@status');
        Gate::resource('admins', AdminPolicy::class);
        Gate::resource('categories', CategoryPolicy::class);
        Gate::resource('sub_categories', SubCategoryPolicy::class);
        Gate::resource('carousels', CarouselPolicy::class);
        Gate::resource('photographies', PhotographyPolicy::class);
        Gate::resource('profile', ProfilesPolicy::class);
        Gate::resource('seo', SeoPolicy::class);
        Gate::resource('notice', NoticePolicy::class);
        Gate::resource('advertise', AdvertisePolicy::class);
        Gate::resource('blog-section', BlogSectionPolicy::class);


    }

}
