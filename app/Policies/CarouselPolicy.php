<?php

namespace App\Policies;

use App\Models\Admin;
use App\Carousel;
use Illuminate\Auth\Access\HandlesAuthorization;

class CarouselPolicy
{
    use HandlesAuthorization;

    public function create(Admin $user)
    {
        foreach (auth()->user()->roles as $role) {
        foreach ($role->permissions as $permission) {
            if ($permission->name == 'carousel.crud'){
                return true;
            }
        }
    }
        return false;
    }


}
