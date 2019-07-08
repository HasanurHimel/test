<?php

namespace App\Policies;

use App\Models\Admin;
use App\Models\Blog;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdminPolicy
{
    use HandlesAuthorization;
    

    public function create(Admin $user)
    {

        foreach (\auth()->user()->roles as $role){
            foreach ($role->permissions as $permission){
                if ($permission->name == 'admin.crud'){
                    return true;
                }
            }
        }
        return false;
    }


}
