<?php

namespace App\Policies;

use App\Models\Admin;
use App\Category;
use Illuminate\Auth\Access\HandlesAuthorization;

class CategoryPolicy
{
    use HandlesAuthorization;



    public function create(Admin $user)
    {
        foreach (auth()->user()->roles as $role) {
            foreach ($role->permissions as $permission) {
                if ($permission->name == 'category.crud'){
                    return true;
                }
            }
        }
        return false;
    }


}
