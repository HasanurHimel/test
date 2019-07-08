<?php

namespace App\Policies;

use App\Models\Admin;
use App\SubCategory;
use Illuminate\Auth\Access\HandlesAuthorization;

class SubCategoryPolicy
{
    use HandlesAuthorization;
    

    public function create(Admin $user)
    {
        foreach (auth()->user()->roles as $role) {
            foreach ($role->permissions as $permission) {
                if ($permission->name == 'sub-category.crud'){
                    return true;
                }
            }
        }
        return false;
    }

}
