<?php

namespace App\Policies;

use App\Models\Admin;
use App\Photography;
use Illuminate\Auth\Access\HandlesAuthorization;

class PhotographyPolicy
{
    use HandlesAuthorization;
    

    public function create(Admin $user)
    {
        foreach (auth()->user()->roles as $role) {
            foreach ($role->permissions as $permission) {
                if ($permission->name == 'photography.crud'){
                    return true;
                }
            }
        }
        return false;
    }


}
